<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BkMkMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bk_mk_map')->insert([
            ['id_bk' => 1, 'id_mk' => 1],
            ['id_bk' => 1, 'id_mk' => 2],
            ['id_bk' => 2, 'id_mk' => 3],
            ['id_bk' => 2, 'id_mk' => 4],
            ['id_bk' => 3, 'id_mk' => 5],
            ['id_bk' => 3, 'id_mk' => 6],
            ['id_bk' => 4, 'id_mk' => 7],
            ['id_bk' => 4, 'id_mk' => 8],
            ['id_bk' => 5, 'id_mk' => 9],
            ['id_bk' => 5, 'id_mk' => 10],
            ['id_bk' => 6, 'id_mk' => 11],
            ['id_bk' => 6, 'id_mk' => 12],
            ['id_bk' => 7, 'id_mk' => 13],
            ['id_bk' => 7, 'id_mk' => 14],
            ['id_bk' => 8, 'id_mk' => 15],
            ['id_bk' => 8, 'id_mk' => 8],
            ['id_bk' => 9, 'id_mk' => 9],
            ['id_bk' => 9, 'id_mk' => 10],
            ['id_bk' => 10, 'id_mk' => 11],
            ['id_bk' => 10, 'id_mk' => 12],
            ['id_bk' => 11, 'id_mk' => 13],
            ['id_bk' => 11, 'id_mk' => 14],

            ['id_bk' => 11, 'id_mk' => 1],
            ['id_bk' => 11, 'id_mk' => 2],
            ['id_bk' => 1, 'id_mk' => 3],
            ['id_bk' => 2, 'id_mk' => 4],
            ['id_bk' => 3, 'id_mk' => 5],
            ['id_bk' => 11, 'id_mk' => 6],
            ['id_bk' => 11, 'id_mk' => 7],
            ['id_bk' => 11, 'id_mk' => 8],
            ['id_bk' => 11, 'id_mk' => 9],
            ['id_bk' => 11, 'id_mk' => 10],
            ['id_bk' => 11, 'id_mk' => 11],
            ['id_bk' => 11, 'id_mk' => 12],
            ['id_bk' => 11, 'id_mk' => 13],
            ['id_bk' => 11, 'id_mk' => 14],
            ['id_bk' => 8, 'id_mk' => 15],
            ['id_bk' => 8, 'id_mk' => 8],
            ['id_bk' => 9, 'id_mk' => 9],
            ['id_bk' => 9, 'id_mk' => 10],
            ['id_bk' => 10, 'id_mk' => 11],
            ['id_bk' => 10, 'id_mk' => 12],
            ['id_bk' => 11, 'id_mk' => 13],
            ['id_bk' => 11, 'id_mk' => 14],

            ['id_bk' => 1, 'id_mk' => 13],
            ['id_bk' => 1, 'id_mk' => 13],
            ['id_bk' => 2, 'id_mk' => 14],
            ['id_bk' => 2, 'id_mk' => 14],
            ['id_bk' => 3, 'id_mk' => 15],
            ['id_bk' => 3, 'id_mk' => 15],
            ['id_bk' => 4, 'id_mk' => 16],
            ['id_bk' => 4, 'id_mk' => 16],
            ['id_bk' => 5, 'id_mk' => 17],
            ['id_bk' => 5, 'id_mk' => 17],
            ['id_bk' => 6, 'id_mk' => 18],
            ['id_bk' => 6, 'id_mk' => 18],
            ['id_bk' => 7, 'id_mk' => 19],
            ['id_bk' => 7, 'id_mk' => 19],
            ['id_bk' => 8, 'id_mk' => 20],
            ['id_bk' => 8, 'id_mk' => 20],
            ['id_bk' => 9, 'id_mk' => 21],
            ['id_bk' => 9, 'id_mk' => 21],
            ['id_bk' => 10, 'id_mk' => 22],
            ['id_bk' => 10, 'id_mk' => 22],
            ['id_bk' => 11, 'id_mk' => 23],
            ['id_bk' => 11, 'id_mk' => 23],

            ['id_bk' => 1, 'id_mk' => 24],
            ['id_bk' => 2, 'id_mk' => 24],
            ['id_bk' => 3, 'id_mk' => 25],
            ['id_bk' => 4, 'id_mk' => 25],
            ['id_bk' => 5, 'id_mk' => 26],
            ['id_bk' => 6, 'id_mk' => 26],
            ['id_bk' => 7, 'id_mk' => 27],
            ['id_bk' => 8, 'id_mk' => 27],

            // untuk matkul IMK kurikulum 2020
            ['id_bk' => 29, 'id_mk' => 34],

            // untuk matkul IMK kurikulum 2025
            ['id_bk' => 57, 'id_mk' => 80],
        ]);
    }
}
