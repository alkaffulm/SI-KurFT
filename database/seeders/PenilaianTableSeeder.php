<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penilaian')->insert([
            ['id_rps_detail' => 1, 'jenis_penilaian' => 'Quiz', 'bobot' => 20.0],
            ['id_rps_detail' => 1, 'jenis_penilaian' => 'Tugas', 'bobot' => 30.0],
            ['id_rps_detail' => 2, 'jenis_penilaian' => 'UTS', 'bobot' => 35.0],
            ['id_rps_detail' => 2, 'jenis_penilaian' => 'UAS', 'bobot' => 40.0],
            ['id_rps_detail' => 3, 'jenis_penilaian' => 'Praktikum', 'bobot' => 25.0],
            ['id_rps_detail' => 4, 'jenis_penilaian' => 'Presentasi', 'bobot' => 15.0],
            ['id_rps_detail' => 5, 'jenis_penilaian' => 'Project', 'bobot' => 45.0],
            ['id_rps_detail' => 6, 'jenis_penilaian' => 'Quiz', 'bobot' => 20.0],
            ['id_rps_detail' => 7, 'jenis_penilaian' => 'Lab Report', 'bobot' => 30.0],
        ]);
    }
}
