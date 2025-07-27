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
        // setiap 1 prodi punya 5 cpmk
        // setiap 1 prodi punya 3 cpl

        // prodi pertama (CPMK 1-5, CPL 1-3)
        ['id_cpmk' => 1, 'id_cpl' => 1],
        ['id_cpmk' => 1, 'id_cpl' => 2],
        ['id_cpmk' => 1, 'id_cpl' => 3],
        ['id_cpmk' => 2, 'id_cpl' => 1],
        ['id_cpmk' => 2, 'id_cpl' => 3],
        ['id_cpmk' => 3, 'id_cpl' => 1],
        ['id_cpmk' => 3, 'id_cpl' => 2],
        ['id_cpmk' => 3, 'id_cpl' => 3],
        ['id_cpmk' => 4, 'id_cpl' => 1],
        ['id_cpmk' => 4, 'id_cpl' => 2],
        ['id_cpmk' => 5, 'id_cpl' => 1],
        ['id_cpmk' => 5, 'id_cpl' => 2],
        ['id_cpmk' => 5, 'id_cpl' => 3],

        // prodi kedua (CPMK 6-10, CPL 4-6)
        ['id_cpmk' => 6, 'id_cpl' => 4],
        ['id_cpmk' => 6, 'id_cpl' => 5],
        ['id_cpmk' => 6, 'id_cpl' => 6],
        ['id_cpmk' => 7, 'id_cpl' => 4],
        ['id_cpmk' => 7, 'id_cpl' => 6],
        ['id_cpmk' => 8, 'id_cpl' => 4],
        ['id_cpmk' => 8, 'id_cpl' => 5],
        ['id_cpmk' => 8, 'id_cpl' => 6],
        ['id_cpmk' => 9, 'id_cpl' => 4],
        ['id_cpmk' => 9, 'id_cpl' => 5],
        ['id_cpmk' => 10, 'id_cpl' => 4],
        ['id_cpmk' => 10, 'id_cpl' => 5],
        ['id_cpmk' => 10, 'id_cpl' => 6],

        // prodi ketiga (CPMK 11-15, CPL 7-9)
        ['id_cpmk' => 11, 'id_cpl' => 7],
        ['id_cpmk' => 11, 'id_cpl' => 8],
        ['id_cpmk' => 11, 'id_cpl' => 9],
        ['id_cpmk' => 12, 'id_cpl' => 7],
        ['id_cpmk' => 12, 'id_cpl' => 9],
        ['id_cpmk' => 13, 'id_cpl' => 7],
        ['id_cpmk' => 13, 'id_cpl' => 8],
        ['id_cpmk' => 13, 'id_cpl' => 9],
        ['id_cpmk' => 14, 'id_cpl' => 7],
        ['id_cpmk' => 14, 'id_cpl' => 8],
        ['id_cpmk' => 15, 'id_cpl' => 7],
        ['id_cpmk' => 15, 'id_cpl' => 8],
        ['id_cpmk' => 15, 'id_cpl' => 9],

        // prodi keempat (CPMK 16-20, CPL 10-12)
        ['id_cpmk' => 16, 'id_cpl' => 10],
        ['id_cpmk' => 16, 'id_cpl' => 11],
        ['id_cpmk' => 16, 'id_cpl' => 12],
        ['id_cpmk' => 17, 'id_cpl' => 10],
        ['id_cpmk' => 17, 'id_cpl' => 12],
        ['id_cpmk' => 18, 'id_cpl' => 10],
        ['id_cpmk' => 18, 'id_cpl' => 11],
        ['id_cpmk' => 18, 'id_cpl' => 12],
        ['id_cpmk' => 19, 'id_cpl' => 10],
        ['id_cpmk' => 19, 'id_cpl' => 11],
        ['id_cpmk' => 20, 'id_cpl' => 10],
        ['id_cpmk' => 20, 'id_cpl' => 11],
        ['id_cpmk' => 20, 'id_cpl' => 12],

        // prodi kelima (CPMK 21-25, CPL 13-15)
        ['id_cpmk' => 21, 'id_cpl' => 13],
        ['id_cpmk' => 21, 'id_cpl' => 14],
        ['id_cpmk' => 21, 'id_cpl' => 15],
        ['id_cpmk' => 22, 'id_cpl' => 13],
        ['id_cpmk' => 22, 'id_cpl' => 15],
        ['id_cpmk' => 23, 'id_cpl' => 13],
        ['id_cpmk' => 23, 'id_cpl' => 14],
        ['id_cpmk' => 23, 'id_cpl' => 15],
        ['id_cpmk' => 24, 'id_cpl' => 13],
        ['id_cpmk' => 24, 'id_cpl' => 14],
        ['id_cpmk' => 25, 'id_cpl' => 13],
        ['id_cpmk' => 25, 'id_cpl' => 14],
        ['id_cpmk' => 25, 'id_cpl' => 15],

        // prodi keenam (CPMK 26-30, CPL 16-18)
        ['id_cpmk' => 26, 'id_cpl' => 16],
        ['id_cpmk' => 26, 'id_cpl' => 17],
        ['id_cpmk' => 26, 'id_cpl' => 18],
        ['id_cpmk' => 27, 'id_cpl' => 16],
        ['id_cpmk' => 27, 'id_cpl' => 18],
        ['id_cpmk' => 28, 'id_cpl' => 16],
        ['id_cpmk' => 28, 'id_cpl' => 17],
        ['id_cpmk' => 28, 'id_cpl' => 18],
        ['id_cpmk' => 29, 'id_cpl' => 16],
        ['id_cpmk' => 29, 'id_cpl' => 17],
        ['id_cpmk' => 30, 'id_cpl' => 16],
        ['id_cpmk' => 30, 'id_cpl' => 17],
        ['id_cpmk' => 30, 'id_cpl' => 18],

        // prodi ketujuh (CPMK 31-35, CPL 19-21)
        ['id_cpmk' => 31, 'id_cpl' => 19],
        ['id_cpmk' => 31, 'id_cpl' => 20],
        ['id_cpmk' => 31, 'id_cpl' => 21],
        ['id_cpmk' => 32, 'id_cpl' => 19],
        ['id_cpmk' => 32, 'id_cpl' => 21],
        ['id_cpmk' => 33, 'id_cpl' => 19],
        ['id_cpmk' => 33, 'id_cpl' => 20],
        ['id_cpmk' => 33, 'id_cpl' => 21],
        ['id_cpmk' => 34, 'id_cpl' => 19],
        ['id_cpmk' => 34, 'id_cpl' => 20],
        ['id_cpmk' => 35, 'id_cpl' => 19],
        ['id_cpmk' => 35, 'id_cpl' => 20],
        ['id_cpmk' => 35, 'id_cpl' => 21],

        // prodi kedelapan (CPMK 36-40, CPL 22-24)
        ['id_cpmk' => 36, 'id_cpl' => 22],
        ['id_cpmk' => 36, 'id_cpl' => 23],
        ['id_cpmk' => 36, 'id_cpl' => 24],
        ['id_cpmk' => 37, 'id_cpl' => 22],
        ['id_cpmk' => 37, 'id_cpl' => 24],
        ['id_cpmk' => 38, 'id_cpl' => 22],
        ['id_cpmk' => 38, 'id_cpl' => 23],
        ['id_cpmk' => 38, 'id_cpl' => 24],
        ['id_cpmk' => 39, 'id_cpl' => 22],
        ['id_cpmk' => 39, 'id_cpl' => 23],
        ['id_cpmk' => 40, 'id_cpl' => 22],
        ['id_cpmk' => 40, 'id_cpl' => 23],
        ['id_cpmk' => 40, 'id_cpl' => 24],

        // prodi kesembilan (CPMK 41-45, CPL 25-27)
        ['id_cpmk' => 41, 'id_cpl' => 25],
        ['id_cpmk' => 41, 'id_cpl' => 26],
        ['id_cpmk' => 41, 'id_cpl' => 27],
        ['id_cpmk' => 42, 'id_cpl' => 25],
        ['id_cpmk' => 42, 'id_cpl' => 27],
        ['id_cpmk' => 43, 'id_cpl' => 25],
        ['id_cpmk' => 43, 'id_cpl' => 26],
        ['id_cpmk' => 43, 'id_cpl' => 27],
        ['id_cpmk' => 44, 'id_cpl' => 25],
        ['id_cpmk' => 44, 'id_cpl' => 26],
        ['id_cpmk' => 45, 'id_cpl' => 25],
        ['id_cpmk' => 45, 'id_cpl' => 26],
        ['id_cpmk' => 45, 'id_cpl' => 27],

        ]);
    }
}
