<?php

namespace App\Imports;

use App\Models\KelasMahasiswaModel;
use App\Models\MahasiswaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelasMahasiswaImport implements ToModel, WithHeadingRow
{
    protected $id_kelas;
    protected $id_ps; // tambahin ini

    public function __construct($id_kelas, $id_ps)
    {
        $this->id_kelas = $id_kelas;
        $this->id_ps    = $id_ps;
    }

    public function model(array $row)
    {
        // 1. Insert/Update mahasiswa pakai id_ps dari admin
        $mahasiswa = MahasiswaModel::updateOrCreate(
            ['nim' => $row['nim']], // cek berdasarkan NIM
            [
                'id_ps'        => $this->id_ps, // langsung dari constructor, bukan dari Excel
                'nama_lengkap' => $row['nama'],
                'angkatan'     => $row['angkatan'],
                'jenis_kelamin'=> $row['jenis_kelamin'],
            ]
        );

        // 2. Masukin mahasiswa ke kelas
        return KelasMahasiswaModel::firstOrCreate([
            'id_kelas' => $this->id_kelas,
            'nim'      => $mahasiswa->nim,
        ]);
    }
}
