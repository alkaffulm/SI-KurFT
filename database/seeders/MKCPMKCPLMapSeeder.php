<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKCPMKCPLMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mk_cpmk_cpl_map')->insert([
            ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>1],
            ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>2],
            ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>3],

            ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>4],
            ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>5],
            ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>2],

            // untuk MK IMK kurikulum 2020
            ['id_mk' => 34, 'id_cpl' => 24, 'id_cpmk'=>32],
            ['id_mk' => 34, 'id_cpl' => 26, 'id_cpmk'=>33],
            ['id_mk' => 34, 'id_cpl' => 26, 'id_cpmk'=>34],
            ['id_mk' => 34, 'id_cpl' => 29, 'id_cpmk'=>35],


            // // untuk MK IMK kurikulum 2025
            ['id_mk' => 80, 'id_cpl' => 57, 'id_cpmk'=>76],
            ['id_mk' => 80, 'id_cpl' => 58, 'id_cpmk'=>77],
            ['id_mk' => 80, 'id_cpl' => 58, 'id_cpmk'=>78],
            ['id_mk' => 80, 'id_cpl' => 59, 'id_cpmk'=>79],
        ]);
    }
}
