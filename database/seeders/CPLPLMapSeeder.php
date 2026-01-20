<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CPLPLMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpl_pl_map')->insert([
            // ['id_pl' => 1, 'id_cpl' => 1],
            // ['id_pl' => 2, 'id_cpl' => 1],
            // ['id_pl' => 2, 'id_cpl' => 2],

            // ['id_pl' => 3, 'id_cpl' => 2],
            // ['id_pl' => 4, 'id_cpl' => 2],
            // ['id_pl' => 4, 'id_cpl' => 3],

            // ['id_pl' => 5, 'id_cpl' => 1],
            // ['id_pl' => 5, 'id_cpl' => 3],
            // ['id_pl' => 6, 'id_cpl' => 3],

            // ['id_pl' => 7, 'id_cpl' => 4],
            // ['id_pl' => 8, 'id_cpl' => 4],

            // ['id_pl' => 9, 'id_cpl' => 5],
            // ['id_pl' => 10, 'id_cpl' => 5],

            // ['id_pl' => 11, 'id_cpl' => 6],
            // ['id_pl' => 12, 'id_cpl' => 6],

            // ['id_pl' => 13, 'id_cpl' => 7],
            // ['id_pl' => 14, 'id_cpl' => 7],

            // ['id_pl' => 15, 'id_cpl' => 8],
            // ['id_pl' => 16, 'id_cpl' => 8],

            // ['id_pl' => 17, 'id_cpl' => 9],
            // ['id_pl' => 18, 'id_cpl' => 9],

            // CPL-1 → PL-1, PL-2
            ['id_cpl' => 19, 'id_pl' => 13],
            ['id_cpl' => 19, 'id_pl' => 14],

            // CPL-2 → PL-2
            ['id_cpl' => 20, 'id_pl' => 14],

            // CPL-3 → PL-3
            ['id_cpl' => 21, 'id_pl' => 15],

            // CPL-4 → PL-3, PL-4
            ['id_cpl' => 22, 'id_pl' => 15],
            ['id_cpl' => 22, 'id_pl' => 16],

            // CPL-5 → PL-4
            ['id_cpl' => 23, 'id_pl' => 16],

            // CPL-6 → PL-1
            ['id_cpl' => 24, 'id_pl' => 13],

            // CPL-7 → PL-2, PL-5
            ['id_cpl' => 25, 'id_pl' => 14],
            ['id_cpl' => 25, 'id_pl' => 17],

            // CPL-8 → PL-1 s.d PL-5
            ['id_cpl' => 26, 'id_pl' => 13],
            ['id_cpl' => 26, 'id_pl' => 14],
            ['id_cpl' => 26, 'id_pl' => 15],
            ['id_cpl' => 26, 'id_pl' => 16],
            ['id_cpl' => 26, 'id_pl' => 17],

            // CPL-9 → PL-1 s.d PL-5
            ['id_cpl' => 27, 'id_pl' => 13],
            ['id_cpl' => 27, 'id_pl' => 14],
            ['id_cpl' => 27, 'id_pl' => 15],
            ['id_cpl' => 27, 'id_pl' => 16],
            ['id_cpl' => 27, 'id_pl' => 17],
        ]);
    }
}
