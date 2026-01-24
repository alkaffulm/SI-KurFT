<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('program_studi')->insert([
            // Prodi S1
            ['id_ps' => 1, 'nama_prodi' => 'Teknik Sipil'],
            ['id_ps' => 2, 'nama_prodi' => 'Teknik Pertambangan'],
            ['id_ps' => 3, 'nama_prodi' => 'Teknik Mesin'],
            ['id_ps' => 4, 'nama_prodi' => 'Teknik Lingkungan'],
            ['id_ps' => 5, 'nama_prodi' => 'Arsitektur'],
            ['id_ps' => 6, 'nama_prodi' => 'Teknik Kimia'],
            ['id_ps' => 7, 'nama_prodi' => 'Teknologi Informasi'],
            ['id_ps' => 8, 'nama_prodi' => 'Rekayasa Elektro'],
            ['id_ps' => 9, 'nama_prodi' => 'Rekayasa Geologi'],
            // Prodi S2
            ['id_ps' => 10, 'nama_prodi' => 'Magister Teknik Sipil'],
            ['id_ps' => 11, 'nama_prodi' => 'Magister Teknik Mesin'],
            ['id_ps' => 12, 'nama_prodi' => 'Magister Arsitektur'],
            ['id_ps' => 13, 'nama_prodi' => 'Magister Teknik Kimia'],
            // Prodi S3
            ['id_ps' => 14, 'nama_prodi' => 'Teknik Berkelanjutan' ],
    
        ]);
    }
}
