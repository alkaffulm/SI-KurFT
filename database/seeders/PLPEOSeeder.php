<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PLPEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pl_peo_map')->insert([
            ['id_pl' => 1, 'id_peo' => 1],
            ['id_pl' => 2, 'id_peo' => 1],
            ['id_pl' => 2, 'id_peo' => 2],

            ['id_pl' => 3, 'id_peo' => 2],
            ['id_pl' => 4, 'id_peo' => 2],
            ['id_pl' => 4, 'id_peo' => 3],

            ['id_pl' => 5, 'id_peo' => 1],
            ['id_pl' => 5, 'id_peo' => 3],
            ['id_pl' => 6, 'id_peo' => 3],

            ['id_pl' => 7, 'id_peo' => 4],
            ['id_pl' => 8, 'id_peo' => 4],

            ['id_pl' => 9, 'id_peo' => 5],
            ['id_pl' => 10, 'id_peo' => 5],

            ['id_pl' => 11, 'id_peo' => 6],
            ['id_pl' => 12, 'id_peo' => 6],

            ['id_pl' => 13, 'id_peo' => 7],
            ['id_pl' => 14, 'id_peo' => 7],

            ['id_pl' => 15, 'id_peo' => 8],
            ['id_pl' => 16, 'id_peo' => 8],

            ['id_pl' => 17, 'id_peo' => 9],
            ['id_pl' => 18, 'id_peo' => 9],
        ]);
    }
}
