<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BkCplMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bk_cpl_map')->insert([
            ['id_bk' => 1, 'id_cpl' => 1],
            ['id_bk' => 1, 'id_cpl' => 2],
            ['id_bk' => 2, 'id_cpl' => 3],
            ['id_bk' => 2, 'id_cpl' => 4],
            ['id_bk' => 3, 'id_cpl' => 5],
            ['id_bk' => 3, 'id_cpl' => 6],
            ['id_bk' => 4, 'id_cpl' => 7],
            ['id_bk' => 4, 'id_cpl' => 8],
            ['id_bk' => 5, 'id_cpl' => 9],
            ['id_bk' => 5, 'id_cpl' => 10],
            ['id_bk' => 6, 'id_cpl' => 11],
            ['id_bk' => 6, 'id_cpl' => 12],
            ['id_bk' => 7, 'id_cpl' => 13],
            ['id_bk' => 7, 'id_cpl' => 14],
            ['id_bk' => 8, 'id_cpl' => 15],
            ['id_bk' => 8, 'id_cpl' => 8],
            ['id_bk' => 9, 'id_cpl' => 9],
            ['id_bk' => 9, 'id_cpl' => 10],
            ['id_bk' => 10, 'id_cpl' => 11],
            ['id_bk' => 10, 'id_cpl' => 12],
            ['id_bk' => 11, 'id_cpl' => 13],
            ['id_bk' => 11, 'id_cpl' => 14],

            ['id_bk' => 11, 'id_cpl' => 1],
            ['id_bk' => 11, 'id_cpl' => 2],
            ['id_bk' => 1, 'id_cpl' => 3],
            ['id_bk' => 2, 'id_cpl' => 4],
            ['id_bk' => 3, 'id_cpl' => 5],
            ['id_bk' => 11, 'id_cpl' => 6],
            ['id_bk' => 11, 'id_cpl' => 7],
            ['id_bk' => 11, 'id_cpl' => 8],
            ['id_bk' => 11, 'id_cpl' => 9],
            ['id_bk' => 11, 'id_cpl' => 10],
            ['id_bk' => 11, 'id_cpl' => 11],
            ['id_bk' => 11, 'id_cpl' => 12],
            ['id_bk' => 11, 'id_cpl' => 13],
            ['id_bk' => 11, 'id_cpl' => 14],
            ['id_bk' => 8, 'id_cpl' => 15],
            ['id_bk' => 8, 'id_cpl' => 8],
            ['id_bk' => 9, 'id_cpl' => 9],
            ['id_bk' => 9, 'id_cpl' => 10],
            ['id_bk' => 10, 'id_cpl' => 11],
            ['id_bk' => 10, 'id_cpl' => 12],
            ['id_bk' => 11, 'id_cpl' => 13],
            ['id_bk' => 11, 'id_cpl' => 14],

            ['id_bk' => 1, 'id_cpl' => 13],
            ['id_bk' => 1, 'id_cpl' => 13],
            ['id_bk' => 2, 'id_cpl' => 14],
            ['id_bk' => 2, 'id_cpl' => 14],
            ['id_bk' => 3, 'id_cpl' => 15],
            ['id_bk' => 3, 'id_cpl' => 15],
            ['id_bk' => 4, 'id_cpl' => 16],
            ['id_bk' => 4, 'id_cpl' => 16],
            ['id_bk' => 5, 'id_cpl' => 17],
            ['id_bk' => 5, 'id_cpl' => 17],
            ['id_bk' => 6, 'id_cpl' => 18],
            ['id_bk' => 6, 'id_cpl' => 18],
            ['id_bk' => 7, 'id_cpl' => 19],
            ['id_bk' => 7, 'id_cpl' => 19],
            ['id_bk' => 8, 'id_cpl' => 20],
            ['id_bk' => 8, 'id_cpl' => 20],
            ['id_bk' => 9, 'id_cpl' => 21],
            ['id_bk' => 9, 'id_cpl' => 21],
            ['id_bk' => 10, 'id_cpl' => 22],
            ['id_bk' => 10, 'id_cpl' => 22],
            ['id_bk' => 11, 'id_cpl' => 23],
            ['id_bk' => 11, 'id_cpl' => 23],

            ['id_bk' => 1, 'id_cpl' => 24],
            ['id_bk' => 2, 'id_cpl' => 24],
            ['id_bk' => 3, 'id_cpl' => 25],
            ['id_bk' => 4, 'id_cpl' => 25],
            ['id_bk' => 5, 'id_cpl' => 26],
            ['id_bk' => 6, 'id_cpl' => 26],
            ['id_bk' => 7, 'id_cpl' => 27],
            ['id_bk' => 8, 'id_cpl' => 27],
        ]);
    }
}
