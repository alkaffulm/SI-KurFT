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


        ]);
    }
}
