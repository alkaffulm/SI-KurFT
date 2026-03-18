<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
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

        // Ambil id_ps dari user login
        $id_ps = session('userRoleId');

        // Loop mulai dari baris kedua (baris pertama biasanya header)
        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // skip header

            $nim = $row[1] ?? null;
            $nama = $row[0] ?? null;
            $jenis_kelamin = $row[5] ?? null; // kolom jenis_kelamin
            $angkatan = $row[4] ?? null;      // kolom angkatan

            if ($nim && $nama) {
                MahasiswaModel::updateOrCreate(
                    ['nim' => $nim, 'id_ps' => $id_ps],
                    [
                        'nama_lengkap' => $nama,
                        'jenis_kelamin' => $jenis_kelamin,
                        'angkatan' => $angkatan,
                    ]
                );
            }
        }

        return redirect()->route('master-mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil diupload!');
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
