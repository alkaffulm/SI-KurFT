<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKCPMKSubCPMKMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mk_cpmk_sub_cpmk')->insert([
            // setiap prodi punya 5 id_mk
            // setiap id_mk punya 1 id_cpmk
            // setiap id_cpmk punya 3 id_sub_cpmk

            // prodi pertama
            ['id_mk' => 1, 'id_cpmk' => 1, 'id_sub_cpmk'=>1],
            ['id_mk' => 1, 'id_cpmk' => 1, 'id_sub_cpmk'=>2],
            ['id_mk' => 1, 'id_cpmk' => 1, 'id_sub_cpmk'=>3],

            ['id_mk' => 2, 'id_cpmk' => 2, 'id_sub_cpmk'=>4],
            ['id_mk' => 2, 'id_cpmk' => 2, 'id_sub_cpmk'=>5],
            ['id_mk' => 2, 'id_cpmk' => 2, 'id_sub_cpmk'=>6],

            ['id_mk' => 3, 'id_cpmk' => 3, 'id_sub_cpmk'=>7],
            ['id_mk' => 3, 'id_cpmk' => 3, 'id_sub_cpmk'=>8],
            ['id_mk' => 3, 'id_cpmk' => 3, 'id_sub_cpmk'=>9],

            ['id_mk' => 4, 'id_cpmk' => 4, 'id_sub_cpmk'=>10],
            ['id_mk' => 4, 'id_cpmk' => 4, 'id_sub_cpmk'=>11],
            ['id_mk' => 4, 'id_cpmk' => 4, 'id_sub_cpmk'=>12],

            ['id_mk' => 5, 'id_cpmk' => 5, 'id_sub_cpmk'=>13],
            ['id_mk' => 5, 'id_cpmk' => 5, 'id_sub_cpmk'=>14],
            ['id_mk' => 5, 'id_cpmk' => 5, 'id_sub_cpmk'=>15],

            // prodi kedua
            ['id_mk' => 6, 'id_cpmk' => 6, 'id_sub_cpmk'=>16],
            ['id_mk' => 6, 'id_cpmk' => 6, 'id_sub_cpmk'=>17],
            ['id_mk' => 6, 'id_cpmk' => 6, 'id_sub_cpmk'=>18],

            ['id_mk' => 7, 'id_cpmk' => 7, 'id_sub_cpmk'=>19],
            ['id_mk' => 7, 'id_cpmk' => 7, 'id_sub_cpmk'=>20],
            ['id_mk' => 7, 'id_cpmk' => 7, 'id_sub_cpmk'=>21],

            ['id_mk' => 8, 'id_cpmk' => 8, 'id_sub_cpmk'=>22],
            ['id_mk' => 8, 'id_cpmk' => 8, 'id_sub_cpmk'=>23],
            ['id_mk' => 8, 'id_cpmk' => 8, 'id_sub_cpmk'=>24],

            ['id_mk' => 9, 'id_cpmk' => 9, 'id_sub_cpmk'=>25],
            ['id_mk' => 9, 'id_cpmk' => 9, 'id_sub_cpmk'=>26],
            ['id_mk' => 9, 'id_cpmk' => 9, 'id_sub_cpmk'=>27],

            ['id_mk' => 10, 'id_cpmk' => 10, 'id_sub_cpmk'=>28],
            ['id_mk' => 10, 'id_cpmk' => 10, 'id_sub_cpmk'=>29],
            ['id_mk' => 10, 'id_cpmk' => 10, 'id_sub_cpmk'=>30],

            // prodi ketiga
            ['id_mk' => 11, 'id_cpmk' => 11, 'id_sub_cpmk'=>31],
            ['id_mk' => 11, 'id_cpmk' => 11, 'id_sub_cpmk'=>32],
            ['id_mk' => 11, 'id_cpmk' => 11, 'id_sub_cpmk'=>33],

            ['id_mk' => 12, 'id_cpmk' => 12, 'id_sub_cpmk'=>34],
            ['id_mk' => 12, 'id_cpmk' => 12, 'id_sub_cpmk'=>35],
            ['id_mk' => 12, 'id_cpmk' => 12, 'id_sub_cpmk'=>36],

            ['id_mk' => 13, 'id_cpmk' => 13, 'id_sub_cpmk'=>37],
            ['id_mk' => 13, 'id_cpmk' => 13, 'id_sub_cpmk'=>38],
            ['id_mk' => 13, 'id_cpmk' => 13, 'id_sub_cpmk'=>39],

            ['id_mk' => 14, 'id_cpmk' => 14, 'id_sub_cpmk'=>40],
            ['id_mk' => 14, 'id_cpmk' => 14, 'id_sub_cpmk'=>41],
            ['id_mk' => 14, 'id_cpmk' => 14, 'id_sub_cpmk'=>42],

            ['id_mk' => 15, 'id_cpmk' => 15, 'id_sub_cpmk'=>43],
            ['id_mk' => 15, 'id_cpmk' => 15, 'id_sub_cpmk'=>44],
            ['id_mk' => 15, 'id_cpmk' => 15, 'id_sub_cpmk'=>45],

            // prodi keempat
            ['id_mk' => 16, 'id_cpmk' => 16, 'id_sub_cpmk'=>46],
            ['id_mk' => 16, 'id_cpmk' => 16, 'id_sub_cpmk'=>47],
            ['id_mk' => 16, 'id_cpmk' => 16, 'id_sub_cpmk'=>48],

            ['id_mk' => 17, 'id_cpmk' => 17, 'id_sub_cpmk'=>49],
            ['id_mk' => 17, 'id_cpmk' => 17, 'id_sub_cpmk'=>50],
            ['id_mk' => 17, 'id_cpmk' => 17, 'id_sub_cpmk'=>51],

            ['id_mk' => 18, 'id_cpmk' => 18, 'id_sub_cpmk'=>52],
            ['id_mk' => 18, 'id_cpmk' => 18, 'id_sub_cpmk'=>53],
            ['id_mk' => 18, 'id_cpmk' => 18, 'id_sub_cpmk'=>54],

            ['id_mk' => 19, 'id_cpmk' => 19, 'id_sub_cpmk'=>55],
            ['id_mk' => 19, 'id_cpmk' => 19, 'id_sub_cpmk'=>56],
            ['id_mk' => 19, 'id_cpmk' => 19, 'id_sub_cpmk'=>57],

            ['id_mk' => 20, 'id_cpmk' => 20, 'id_sub_cpmk'=>58],
            ['id_mk' => 20, 'id_cpmk' => 20, 'id_sub_cpmk'=>59],
            ['id_mk' => 20, 'id_cpmk' => 20, 'id_sub_cpmk'=>60],

            // prodi kelima
            ['id_mk' => 21, 'id_cpmk' => 21, 'id_sub_cpmk'=>61],
            ['id_mk' => 21, 'id_cpmk' => 21, 'id_sub_cpmk'=>62],
            ['id_mk' => 21, 'id_cpmk' => 21, 'id_sub_cpmk'=>63],

            ['id_mk' => 22, 'id_cpmk' => 22, 'id_sub_cpmk'=>64],
            ['id_mk' => 22, 'id_cpmk' => 22, 'id_sub_cpmk'=>65],
            ['id_mk' => 22, 'id_cpmk' => 22, 'id_sub_cpmk'=>66],

            ['id_mk' => 23, 'id_cpmk' => 23, 'id_sub_cpmk'=>67],
            ['id_mk' => 23, 'id_cpmk' => 23, 'id_sub_cpmk'=>68],
            ['id_mk' => 23, 'id_cpmk' => 23, 'id_sub_cpmk'=>69],

            ['id_mk' => 24, 'id_cpmk' => 24, 'id_sub_cpmk'=>70],
            ['id_mk' => 24, 'id_cpmk' => 24, 'id_sub_cpmk'=>71],
            ['id_mk' => 24, 'id_cpmk' => 24, 'id_sub_cpmk'=>72],

            ['id_mk' => 25, 'id_cpmk' => 25, 'id_sub_cpmk'=>73],
            ['id_mk' => 25, 'id_cpmk' => 25, 'id_sub_cpmk'=>74],
            ['id_mk' => 25, 'id_cpmk' => 25, 'id_sub_cpmk'=>75],

            // prodi keenam
            ['id_mk' => 26, 'id_cpmk' => 26, 'id_sub_cpmk'=>76],
            ['id_mk' => 26, 'id_cpmk' => 26, 'id_sub_cpmk'=>77],
            ['id_mk' => 26, 'id_cpmk' => 26, 'id_sub_cpmk'=>78],

            ['id_mk' => 27, 'id_cpmk' => 27, 'id_sub_cpmk'=>79],
            ['id_mk' => 27, 'id_cpmk' => 27, 'id_sub_cpmk'=>80],
            ['id_mk' => 27, 'id_cpmk' => 27, 'id_sub_cpmk'=>81],

            ['id_mk' => 28, 'id_cpmk' => 28, 'id_sub_cpmk'=>82],
            ['id_mk' => 28, 'id_cpmk' => 28, 'id_sub_cpmk'=>83],
            ['id_mk' => 28, 'id_cpmk' => 28, 'id_sub_cpmk'=>84],

            ['id_mk' => 29, 'id_cpmk' => 29, 'id_sub_cpmk'=>85],
            ['id_mk' => 29, 'id_cpmk' => 29, 'id_sub_cpmk'=>86],
            ['id_mk' => 29, 'id_cpmk' => 29, 'id_sub_cpmk'=>87],

            ['id_mk' => 30, 'id_cpmk' => 30, 'id_sub_cpmk'=>88],
            ['id_mk' => 30, 'id_cpmk' => 30, 'id_sub_cpmk'=>89],
            ['id_mk' => 30, 'id_cpmk' => 30, 'id_sub_cpmk'=>90],

            // prodi ketujuh
            ['id_mk' => 31, 'id_cpmk' => 31, 'id_sub_cpmk'=>91],
            ['id_mk' => 31, 'id_cpmk' => 31, 'id_sub_cpmk'=>92],
            ['id_mk' => 31, 'id_cpmk' => 31, 'id_sub_cpmk'=>93],

            ['id_mk' => 32, 'id_cpmk' => 32, 'id_sub_cpmk'=>94],
            ['id_mk' => 32, 'id_cpmk' => 32, 'id_sub_cpmk'=>95],
            ['id_mk' => 32, 'id_cpmk' => 32, 'id_sub_cpmk'=>96],

            ['id_mk' => 33, 'id_cpmk' => 33, 'id_sub_cpmk'=>97],
            ['id_mk' => 33, 'id_cpmk' => 33, 'id_sub_cpmk'=>98],
            ['id_mk' => 33, 'id_cpmk' => 33, 'id_sub_cpmk'=>99],

            ['id_mk' => 34, 'id_cpmk' => 34, 'id_sub_cpmk'=>100],
            ['id_mk' => 34, 'id_cpmk' => 34, 'id_sub_cpmk'=>101],
            ['id_mk' => 34, 'id_cpmk' => 34, 'id_sub_cpmk'=>102],

            ['id_mk' => 35, 'id_cpmk' => 35, 'id_sub_cpmk'=>103],
            ['id_mk' => 35, 'id_cpmk' => 35, 'id_sub_cpmk'=>104],
            ['id_mk' => 35, 'id_cpmk' => 35, 'id_sub_cpmk'=>105],

            // prodi kedelapan
            ['id_mk' => 36, 'id_cpmk' => 36, 'id_sub_cpmk'=>106],
            ['id_mk' => 36, 'id_cpmk' => 36, 'id_sub_cpmk'=>107],
            ['id_mk' => 36, 'id_cpmk' => 36, 'id_sub_cpmk'=>108],

            ['id_mk' => 37, 'id_cpmk' => 37, 'id_sub_cpmk'=>109],
            ['id_mk' => 37, 'id_cpmk' => 37, 'id_sub_cpmk'=>110],
            ['id_mk' => 37, 'id_cpmk' => 37, 'id_sub_cpmk'=>111],

            ['id_mk' => 38, 'id_cpmk' => 38, 'id_sub_cpmk'=>112],
            ['id_mk' => 38, 'id_cpmk' => 38, 'id_sub_cpmk'=>113],
            ['id_mk' => 38, 'id_cpmk' => 38, 'id_sub_cpmk'=>114],

            ['id_mk' => 39, 'id_cpmk' => 39, 'id_sub_cpmk'=>115],
            ['id_mk' => 39, 'id_cpmk' => 39, 'id_sub_cpmk'=>116],
            ['id_mk' => 39, 'id_cpmk' => 39, 'id_sub_cpmk'=>117],

            ['id_mk' => 40, 'id_cpmk' => 40, 'id_sub_cpmk'=>118],
            ['id_mk' => 40, 'id_cpmk' => 40, 'id_sub_cpmk'=>119],
            ['id_mk' => 40, 'id_cpmk' => 40, 'id_sub_cpmk'=>120],

            // prodi kesembilan
            ['id_mk' => 41, 'id_cpmk' => 41, 'id_sub_cpmk'=>121],
            ['id_mk' => 41, 'id_cpmk' => 41, 'id_sub_cpmk'=>122],
            ['id_mk' => 41, 'id_cpmk' => 41, 'id_sub_cpmk'=>123],

            ['id_mk' => 42, 'id_cpmk' => 42, 'id_sub_cpmk'=>124],
            ['id_mk' => 42, 'id_cpmk' => 42, 'id_sub_cpmk'=>125],
            ['id_mk' => 42, 'id_cpmk' => 42, 'id_sub_cpmk'=>126],

            ['id_mk' => 43, 'id_cpmk' => 43, 'id_sub_cpmk'=>127],
            ['id_mk' => 43, 'id_cpmk' => 43, 'id_sub_cpmk'=>128],
            ['id_mk' => 43, 'id_cpmk' => 43, 'id_sub_cpmk'=>129],

            ['id_mk' => 44, 'id_cpmk' => 44, 'id_sub_cpmk'=>130],
            ['id_mk' => 44, 'id_cpmk' => 44, 'id_sub_cpmk'=>131],
            ['id_mk' => 44, 'id_cpmk' => 44, 'id_sub_cpmk'=>132],

            ['id_mk' => 45, 'id_cpmk' => 45, 'id_sub_cpmk'=>133],
            ['id_mk' => 45, 'id_cpmk' => 45, 'id_sub_cpmk'=>134],
            ['id_mk' => 45, 'id_cpmk' => 45, 'id_sub_cpmk'=>135],

        ]);
    }
}
