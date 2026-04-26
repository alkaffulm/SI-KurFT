<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
class MasterMahasiswaController extends Controller
{
    public function index()
    {
        $id_ps = session('userRoleId');
        $mahasiswa = MahasiswaModel::where('id_ps', $id_ps)->get();
        $userRole = session()->get('userRole');

        if($userRole == 'pimpinan' || $userRole == 'upm'){
            return view('pimpinanUpm.mahasiswaAll', [
                'userRole' => $userRole,
            ]);
        }
        else {
            return view('Admin.Master Mahasiswa.master_mahasiswa', [
                'mahasiswa' => $mahasiswa
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.form.Master Mahasiswa.tambahKelas');
    }

    public function importExcel(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|file|mimes:xlsx,xls|max:2048',
        ]);

        $file = $request->file('file_excel');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        $id_ps = session('userRoleId');

        DB::beginTransaction();

        try {
            foreach ($rows as $index => $row) {
                if ($index == 0) continue;

                $nama = trim($row[0] ?? '');
                $nim = trim($row[1] ?? '');
                $angkatan = $row[4] ?? null;
                $jenis_kelamin = $row[5] ?? null;
                $status = $row[6] ?? null;
                $tahun_kurikulum = trim($row[7] ?? '');

                if (!$nim || !$nama) continue;

                $kurikulum = DB::table('kurikulum')
                    ->where('id_ps', $id_ps)
                    ->where('tahun', $tahun_kurikulum)
                    ->first();

                if (!$kurikulum) {
                    throw new \Exception(
                        "Baris ".($index+1)." (NIM: $nim) → Kurikulum tahun $tahun_kurikulum tidak ditemukan"
                    );
                }

                MahasiswaModel::updateOrCreate(
                    [
                        'nim' => $nim,
                        'id_ps' => $id_ps
                    ],
                    [
                        'nama_lengkap' => $nama,
                        'jenis_kelamin' => $jenis_kelamin,
                        'angkatan' => $angkatan,
                        'status' => $status,
                        'id_kurikulum' => $kurikulum->id_kurikulum,
                    ]
                );
            }

            DB::commit();

            return redirect()->route('master-mahasiswa.index')
                ->with('success', 'Data mahasiswa berhasil diupload!');
                
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(string $id){
        $mahasiswa = MahasiswaModel::findOrFail($id);

        return view('Admin.form.Master Mahasiswa.edit-per-mahasiswa',
        ['mahasiswa'=>$mahasiswa]
    );
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nim' => 'required|string|max:20',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|string',
            'angkatan' => 'required|integer',
        ]);

        $mahasiswa = MahasiswaModel::findOrFail($id);
        $mahasiswa->update($request->all());

        return redirect()->route('master-mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }


    public function destroy(string $id)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('master-mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
