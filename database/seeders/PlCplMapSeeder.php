<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlCplMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pl_cpl_map')->insert([
            ['id_pl' => 1, 'id_cpl' => 1],
            ['id_pl' => 1, 'id_cpl' => 2],
            ['id_pl' => 2, 'id_cpl' => 3],
        ]);
    }
}
