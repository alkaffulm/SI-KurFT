<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKCPMKBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mk_cpmk_bobot')->insert([
            ['id_mk_cpmk_bobot' => 1, 'id_mk_cpmk_cpl' => 20, 'bobot' => 50],
            ['id_mk_cpmk_bobot' => 2, 'id_mk_cpmk_cpl' => 21, 'bobot' => 50],
        ]);
    }
}
