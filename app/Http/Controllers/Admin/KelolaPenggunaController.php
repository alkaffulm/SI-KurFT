<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelolaPenggunaController extends Controller
{
    public function __construct()
    {
        $userRole = session()->get('userRole');
        view()->share('userRole', $userRole);
    }

    public function index()
    {
        $id_ps = session('userRoleId');
        $userRole = session()->get('userRole');

        $users = UserModel::with(['roles' => function($query) use ($id_ps) {
                // FILTER ROLE:
                // Hanya ambil role yang melekat pada Prodi ini 
                // ATAU role yang bersifat Global/Fakultas (id_ps = null)
                $query->wherePivot('id_ps', $id_ps)
                      ->orWherePivotNull('id_ps');
            }])
            ->forProdi($id_ps)
            ->orderBy('id_user', 'desc')
            ->get();

        if($userRole == 'pimpinan' || $userRole == 'upm'){
            return view('pimpinanUpm.penggunaAll', ['userRole' => $userRole,]);
        }
        else {  
            return view('Admin.Kelola Pengguna.kelola_pengguna', compact('users'));
        }
    }

    public function create()
    {
        $roles = RoleModel::orderBy('id_role')->get();
        $id_ps = session('userRoleId');
        return view('Admin.form.Kelola Pengguna.formAdd', compact('roles', 'id_ps'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_ps' => ['required'],
            'NIP' => ['nullable', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:100', 'unique:user,username'],
            'email' => ['required', 'email', 'max:150'],
            'password' => ['required', 'string', 'min:6'],
            'roles' => ['nullable', 'array'],
        ]);

        $user = UserModel::create([
            'NIP' => $validated['NIP'] ?? null,
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);


        // Format sync harus: [ id_role => ['id_ps' => nilai], ... ]
        $rolesData = [];
        if (!empty($validated['roles'])) {
            foreach ($validated['roles'] as $roleId) {
                $rolesData[$roleId] = ['id_ps' => $validated['id_ps']];
            }
        }
        $user->roles()->sync($rolesData);

        return redirect()->route('admin.kelola-pengguna.index')
            ->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id_user)
    {
        $id_ps = session('userRoleId');
        $user = UserModel::with('roles')
                    ->forProdi($id_ps)
                    ->findOrFail($id_user);
        $roles = RoleModel::orderBy('id_role')->get();

        // Ambil Role ID yang dimiliki user, tapi difilter hanya yang di prodi ini
        // (Jaga-jaga kalau user punya jabatan di prodi lain, admin ini gak boleh ngotak-ngatik jabatan prodi lain)
        $userRoleIds = $user->roles()
                            ->wherePivot('id_ps', $id_ps)
                            ->pluck('role.id_role') // Ambil ID Role-nya
                            ->toArray();

        return view('Admin.form.Kelola Pengguna.formEdit', compact('user', 'roles', 'userRoleIds'));
    }

    public function update(Request $request, $id_user)
    {
        $user = UserModel::findOrFail($id_user);

        $validated = $request->validate([
            'id_ps' => ['required'],
            'NIP' => ['nullable','string','max:50'],
            'username' => [
                'required','string','max:100',
                'unique:user,username,' . $user->id_user . ',id_user'
            ],
            'email' => [
                'required','email','max:150',
                'unique:user,email,' . $user->id_user . ',id_user'
            ],
            'password' => ['nullable','string','min:6'],
            'roles' => ['nullable','array'],
            'roles.*' => ['integer','exists:role,id_role'],
        ]);

        $data = [
            'NIP' => $validated['NIP'] ?? null,
            'username' => $validated['username'],
            'email' => $validated['email'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        // Kita tidak boleh pakai sync() biasa karena itu akan menghapus jabatan user di Prodi Lain (kalau ada)
        // Kita harus pakai syncWithPivotValues atau strategi manual khusus scope prodi ini.
        
        // Strategi Aman:
        // 1. Detach semua role user INI khusus di prodi INI ($validated['id_ps'])
        // 2. Attach role baru
        
        // Hapus role lama di prodi ini
        $user->roles()->wherePivot('id_ps', $validated['id_ps'])->detach();

        // Pasang role baru (jika ada yang dipilih)
        if (!empty($validated['roles'])) {
            foreach ($validated['roles'] as $roleId) {
                $user->roles()->attach($roleId, ['id_ps' => $validated['id_ps']]);
            }
        }

        return redirect()->route('admin.kelola-pengguna.index')
            ->with('success', 'User berhasil diupdate.');
    }


    public function destroy($id_user)
    {
        $id_ps = session('userRoleId');
        $user = UserModel::findOrFail($id_user);
        
        // Admin Prodi ini tidak boleh menghapus User yang juga Dosen di prodi lain (Usernya jangan dihapus, jabatannya di prodi ini saja yang dicabut)
        $user->roles()->wherePivot('id_ps', $id_ps)->detach();
        
        // Cek apakah user masih punya role di tempat lain?
        if ($user->roles()->count() == 0) {
            // Kalau sudah tidak punya role dimanapun, baru hapus akunnya permanen
            $user->delete();
            $msg = 'User berhasil dihapus permanen.';
        } else {
            $msg = 'Akses User pada Prodi ini berhasil dicabut (User masih aktif di Prodi lain).';
        }

        return redirect()->route('admin.kelola-pengguna.index')
            ->with('success', $msg);
    }
}
