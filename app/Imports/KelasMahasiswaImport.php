<?php

namespace App\Imports;

use App\Models\KelasMahasiswaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KelasMahasiswaImport implements ToModel, WithHeadingRow
{
    protected $id_kelas;

    // constructor supaya bisa nerima id_kelas
    public function __construct($id_kelas)
    {
        $this->id_kelas = $id_kelas;
    }
    
    public function model(array $row)
    {
        return new KelasMahasiswaModel([
            'id_kelas' => $this->id_kelas,
            'nama'     => $row['nama'],     
            'nim' => $row['nim'],
        ]);
    }
}
