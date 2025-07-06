<?php

namespace Database\Seeders;

use App\Models\ProgramStudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramStudi::truncate();

        $daftarProdi = [
            ['nama_prodi' => 'Teknologi Informasi'],
            ['nama_prodi' => 'Rekayasa Geologi'],
            ['nama_prodi' => 'Teknik Sipil'],
            ['nama_prodi' => 'Teknik Mesin'],
            ['nama_prodi' => 'Rekayasa Elektro'],
            ['nama_prodi' => 'Arsitektur'],
            ['nama_prodi' => 'Teknik Mesin'],
            ['nama_prodi' => 'Teknik Kimia'],
            ['nama_prodi' => 'Teknik Lingkungan'],
            ['nama_prodi' => 'Teknik Pertambangan'],
        ];
        foreach ($daftarProdi as $dp) {
            ProgramStudi::create($dp);
        }
    }
}
