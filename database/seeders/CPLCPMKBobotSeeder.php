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
            ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>1],



        ]);
    }
}
