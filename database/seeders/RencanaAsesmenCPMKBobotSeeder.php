<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RencanaAsesmenCPMKBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rencana_asesmen_cpmk_bobot')->insert([
            // untuk Matkul IMK Kurikulum 2020
            ['id_asesmen_cpmk_bobot' => 1, 'id_rencana_asesmen' => 1, 'id_cpmk' => 32, 'bobot' => 8.5],
            ['id_asesmen_cpmk_bobot' => 2, 'id_rencana_asesmen' => 1, 'id_cpmk' => 33, 'bobot' => 8.5],
            ['id_asesmen_cpmk_bobot' => 3, 'id_rencana_asesmen' => 1, 'id_cpmk' => 34, 'bobot' => 3.0],
            ['id_asesmen_cpmk_bobot' => 4, 'id_rencana_asesmen' => 1, 'id_cpmk' => 35, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 5, 'id_rencana_asesmen' => 2, 'id_cpmk' => 32, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 6, 'id_rencana_asesmen' => 2, 'id_cpmk' => 33, 'bobot' => 5.5],
            ['id_asesmen_cpmk_bobot' => 7, 'id_rencana_asesmen' => 2, 'id_cpmk' => 34, 'bobot' => 5.5],
            ['id_asesmen_cpmk_bobot' => 8, 'id_rencana_asesmen' => 2, 'id_cpmk' => 35, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 9, 'id_rencana_asesmen' => 3, 'id_cpmk' => 32, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 10, 'id_rencana_asesmen' => 3, 'id_cpmk' => 33, 'bobot' => 20.0],
            ['id_asesmen_cpmk_bobot' => 11, 'id_rencana_asesmen' => 3, 'id_cpmk' => 34, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 12, 'id_rencana_asesmen' => 3, 'id_cpmk' => 35, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 13, 'id_rencana_asesmen' => 4, 'id_cpmk' => 32, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 14, 'id_rencana_asesmen' => 4, 'id_cpmk' => 33, 'bobot' => 3.5],
            ['id_asesmen_cpmk_bobot' => 15, 'id_rencana_asesmen' => 4, 'id_cpmk' => 34, 'bobot' => 5.5],
            ['id_asesmen_cpmk_bobot' => 16, 'id_rencana_asesmen' => 4, 'id_cpmk' => 35, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 17, 'id_rencana_asesmen' => 5, 'id_cpmk' => 32, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 18, 'id_rencana_asesmen' => 5, 'id_cpmk' => 33, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 19, 'id_rencana_asesmen' => 5, 'id_cpmk' => 34, 'bobot' => 7.0],
            ['id_asesmen_cpmk_bobot' => 20, 'id_rencana_asesmen' => 5, 'id_cpmk' => 35, 'bobot' => 8.0],
            ['id_asesmen_cpmk_bobot' => 21, 'id_rencana_asesmen' => 6, 'id_cpmk' => 32, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 22, 'id_rencana_asesmen' => 6, 'id_cpmk' => 33, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 23, 'id_rencana_asesmen' => 6, 'id_cpmk' => 34, 'bobot' => 25.0],
            ['id_asesmen_cpmk_bobot' => 24, 'id_rencana_asesmen' => 6, 'id_cpmk' => 35, 'bobot' => 0.0],

            // untuk Matkul IMK Kurikulum 2025
            ['id_asesmen_cpmk_bobot' => 25, 'id_rencana_asesmen' => 7, 'id_cpmk' => 76, 'bobot' => 8.5],
            ['id_asesmen_cpmk_bobot' => 26, 'id_rencana_asesmen' => 7, 'id_cpmk' => 77, 'bobot' => 8.5],
            ['id_asesmen_cpmk_bobot' => 27, 'id_rencana_asesmen' => 7, 'id_cpmk' => 78, 'bobot' => 3.0],
            ['id_asesmen_cpmk_bobot' => 28, 'id_rencana_asesmen' => 7, 'id_cpmk' => 79, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 29, 'id_rencana_asesmen' => 8, 'id_cpmk' => 76, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 30, 'id_rencana_asesmen' => 8, 'id_cpmk' => 77, 'bobot' => 5.5],
            ['id_asesmen_cpmk_bobot' => 31, 'id_rencana_asesmen' => 8, 'id_cpmk' => 78, 'bobot' => 5.5],
            ['id_asesmen_cpmk_bobot' => 32, 'id_rencana_asesmen' => 8, 'id_cpmk' => 79, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 33, 'id_rencana_asesmen' => 9, 'id_cpmk' => 76, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 34, 'id_rencana_asesmen' => 9, 'id_cpmk' => 77, 'bobot' => 20.0],
            ['id_asesmen_cpmk_bobot' => 35, 'id_rencana_asesmen' => 9, 'id_cpmk' => 78, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 36, 'id_rencana_asesmen' => 9, 'id_cpmk' => 79, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 37, 'id_rencana_asesmen' => 10, 'id_cpmk' => 76, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 38, 'id_rencana_asesmen' => 10, 'id_cpmk' => 77, 'bobot' => 3.5],
            ['id_asesmen_cpmk_bobot' => 39, 'id_rencana_asesmen' => 10, 'id_cpmk' => 78, 'bobot' => 5.5],
            ['id_asesmen_cpmk_bobot' => 40, 'id_rencana_asesmen' => 10, 'id_cpmk' => 79, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 41, 'id_rencana_asesmen' => 11, 'id_cpmk' => 76, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 42, 'id_rencana_asesmen' => 11, 'id_cpmk' => 77, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 43, 'id_rencana_asesmen' => 11, 'id_cpmk' => 78, 'bobot' => 7.0],
            ['id_asesmen_cpmk_bobot' => 44, 'id_rencana_asesmen' => 11, 'id_cpmk' => 79, 'bobot' => 8.0],
            ['id_asesmen_cpmk_bobot' => 45, 'id_rencana_asesmen' => 12, 'id_cpmk' => 76, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 46, 'id_rencana_asesmen' => 12, 'id_cpmk' => 77, 'bobot' => 0.0],
            ['id_asesmen_cpmk_bobot' => 47, 'id_rencana_asesmen' => 12, 'id_cpmk' => 78, 'bobot' => 25.0],
            ['id_asesmen_cpmk_bobot' => 48, 'id_rencana_asesmen' => 12, 'id_cpmk' => 79, 'bobot' => 0.0],
        ]);
    }
}
