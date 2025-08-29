<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriteria_penilaian')->insert([
            ['nama_kriteria_penilaian' => 'Rubrik Kuantitatif' ],
            ['nama_kriteria_penilaian' => 'Rubrik Penilaian Keaktifan' ],
            ['nama_kriteria_penilaian' => 'Rubrik Penilaian Presentasi' ],
            ['nama_kriteria_penilaian' => 'Rubrik Penilaian Laporan' ],
        ]);
    }
}
