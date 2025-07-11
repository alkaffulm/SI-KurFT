<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CpmkCplMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpmk_cpl_map')->insert([
            ['id_cpmk' => 1, 'id_cpl' => 1],
            ['id_cpmk' => 1, 'id_cpl' => 2],
            ['id_cpmk' => 2, 'id_cpl' => 3],
            ['id_cpmk' => 3, 'id_cpl' => 1],
        ]);
    }
}
