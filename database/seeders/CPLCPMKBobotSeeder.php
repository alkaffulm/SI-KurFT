<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CPLCPMKBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpl_cpmk_bobot')->insert([
            ['id_mk' => 34, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_cpl' => 24, 'id_cpmk' => 32, 'bobot' => 100.0],
            ['id_mk' => 34, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_cpl' => 26, 'id_cpmk' => 33, 'bobot' => 50.0],
            ['id_mk' => 34, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_cpl' => 26, 'id_cpmk' => 34, 'bobot' => 50.0],
            ['id_mk' => 34, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_cpl' => 29, 'id_cpmk' => 35, 'bobot' => 100.0],
        ]);
    }
}
