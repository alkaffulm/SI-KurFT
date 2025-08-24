<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\KurikulumModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return view('login');
  }

  // public function login(Request $request)
  // {
  //   $credentials = $request->validate([
  //     'nip' => ['required', 'string'],
  //     'password' => ['required', 'string'],
  //     'login_as' => ['required', 'string'],
  //   ]);

  //   $user = UserModel::where('NIP', $credentials['nip'])->first();

  //   // UPDATED: Using trim() for a safer comparison
  //   if ($user && trim($user->password) === trim($credentials['password'])) {
  //     $roleMap = [
  //       'Koordinator Program Studi' => 'Kaprodi',
  //       'Pimpinan FT' => 'PimpinanFT',
  //       'Dosen' => 'Dosen',
  //       'UPM' => 'UPM',
  //     ];

  //     $roleName = $roleMap[$credentials['login_as']] ?? null;
  //     $role = DB::table('role')->where('role', $roleName)->first();

  //     if (!$role || !DB::table('user_role_map')->where('id_user', $user->id_user)->where('id_role', $role->id_role)->exists()) {
  //       return back()->withErrors([
  //         'nip' => 'Anda tidak memiliki izin untuk peran yang dipilih.',
  //       ])->withInput($request->only('nip', 'login_as'));
  //     }

  //     Auth::login($user);

  //     $prodi = null;
  //     if ($user->id_ps) {
  //       $prodi = DB::table('program_studi')->where('id_ps', $user->id_ps)->first();
  //     }

  //     $viewRoleMap = [
  //       'Kaprodi' => 'kaprodi',
  //       'Dosen' => 'dosen',
  //       'PimpinanFT' => 'pimpinan',
  //     ];
  //     $sessionRole = $viewRoleMap[$roleName] ?? 'dosen';

  //     $request->session()->regenerate();
  //     $request->session()->put('userRole', $sessionRole);
  //     $request->session()->put('userName', $user->username);
  //     $request->session()->put('userProdi', $prodi ? $prodi->nama_prodi : 'Fakultas Teknik');
  //     $request->session()->put('userRoleId', $user->id_ps);

  //     return redirect()->intended('dashboard');
  //   }

  //   return back()->withErrors([
  //     'nip' => 'NIP atau Password yang Anda masukkan salah.',
  //   ])->withInput($request->only('nip', 'login_as'));
  // }

    public function login(Request $request){
        // 1. Validasi input form
        $credentials = $request->validate([
            'nip' => ['required', 'string'],
            'password' => ['required', 'string'],
            'login_as' => ['required', 'string'],
        ]);

        // 2. Coba lakukan autentikasi
        if (Auth::attempt(['NIP' => $credentials['nip'], 'password' => $credentials['password']])) {
            
            // Autentikasi berhasil, sekarang cek rolenya
            $user = Auth::user(); // Dapatkan user yang sedang login

            // Logika untuk verifikasi role (tetap sama seperti kode Anda)
            $roleMap = [
                'Koordinator Program Studi' => 'Kaprodi',
                'Pimpinan FT' => 'PimpinanFT',
                'Dosen' => 'Dosen',
                'UPM' => 'UPM',
            ];
            $roleName = $roleMap[$credentials['login_as']] ?? null;
            $role = DB::table('role')->where('role', $roleName)->first();

            if (!$role || !DB::table('user_role_map')->where('id_user', $user->id_user)->where('id_role', $role->id_role)->exists()) {
                Auth::logout(); // Logout-kan kembali karena role tidak sesuai
                return back()->withErrors(['nip' => 'Anda tidak memiliki izin untuk peran yang dipilih.',])->withInput($request->only('nip', 'login_as'));
            }

            // 3. Jika Role Sesuai, panggil authenticated() (dijelaskan di bawah)
            return $this->authenticated($request, $user);
        }

        // 4. Jika autentikasi gagal
        return back()->withErrors(['nip' => 'NIP atau Password yang Anda masukkan salah.',])->withInput($request->only('nip', 'login_as'));
    }

    protected function authenticated(Request $request, $user){
        // Regenerasi sesi untuk keamanan
        $request->session()->regenerate();
        
        // AMBIL dan SIMPAN SEMUA DATA PENTING KE SESSION BARU
        $roleMap = [ 'Koordinator Program Studi' => 'Kaprodi', 'Pimpinan FT' => 'PimpinanFT', 'Dosen' => 'Dosen', 'UPM' => 'UPM' ];
        $roleName = $roleMap[$request->input('login_as')] ?? null;
        
        $viewRoleMap = [ 'Kaprodi' => 'kaprodi', 'Dosen' => 'dosen', 'PimpinanFT' => 'pimpinan'];
        $sessionRole = $viewRoleMap[$roleName] ?? 'dosen';
        
        $prodi = $user->id_ps ? DB::table('program_studi')->where('id_ps', $user->id_ps)->first() : null;

        $request->session()->put('userRole', $sessionRole);
        $request->session()->put('userName', $user->username);
        $request->session()->put('userProdi', $prodi ? $prodi->nama_prodi : 'Fakultas Teknik');
        $request->session()->put('userRoleId', $user->id_ps);

        // $activeKurikulum = KurikulumModel::where('id_ps', $user->id_ps)->orderBy('tahun', 'asc')->first();
        // if($activeKurikulum) {
        //   $request->session()->put('tahun', $activeKurikulum->tahun);
        //   $request->session()->put('id_kurikulum_aktif', $activeKurikulum->id_kurikulum);
        // }

        $activeKurikulum = null;
        // bekerja jika user mengalami session_timeout atau logout
        if($user->last_active_kurikulum_id) {
          $activeKurikulum = KurikulumModel::find($user->last_active_kurikulum_id);
        }

        // bekerja jika user baru pertama kali login ke website atau migrate:fresh
        if(!$activeKurikulum) {
          $activeKurikulum = KurikulumModel::where('id_ps', $user->id_ps)->orderBy('tahun', 'asc')->first();
        }

        if($activeKurikulum) {
          $request->session()->put('tahun', $activeKurikulum->tahun);
          $request->session()->put('id_kurikulum_aktif', $activeKurikulum->id_kurikulum);
        }

        return redirect()->intended('dashboard');
    }

  public function logout(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }
}
