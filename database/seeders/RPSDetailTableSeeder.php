<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RPSDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps_detail')->insert([
            ['id_rps' => 1, 'id_sub_cpmk' => 1, 'minggu' => 1, 'penilaian' => 80.5, 'bobot' => 20.0],
            ['id_rps' => 1, 'id_sub_cpmk' => 2, 'minggu' => 2, 'penilaian' => 85.0, 'bobot' => 25.0],
            ['id_rps' => 1, 'id_sub_cpmk' => 3, 'minggu' => 3, 'penilaian' => 78.5, 'bobot' => 20.0],
            ['id_rps' => 2, 'id_sub_cpmk' => 3, 'minggu' => 1, 'penilaian' => 82.0, 'bobot' => 30.0],
            ['id_rps' => 2, 'id_sub_cpmk' => 4, 'minggu' => 2, 'penilaian' => 79.5, 'bobot' => 25.0],
            ['id_rps' => 3, 'id_sub_cpmk' => 5, 'minggu' => 1, 'penilaian' => 88.0, 'bobot' => 35.0],
            ['id_rps' => 3, 'id_sub_cpmk' => 6, 'minggu' => 2, 'penilaian' => 83.5, 'bobot' => 30.0],
            ['id_rps' => 4, 'id_sub_cpmk' => 7, 'minggu' => 1, 'penilaian' => 86.0, 'bobot' => 40.0],
            ['id_rps' => 4, 'id_sub_cpmk' => 8, 'minggu' => 2, 'penilaian' => 81.5, 'bobot' => 35.0],
        ]);
    }
}
