<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKCPMKCPLMapSeeder extends Seeder
{

    public function run()
    {
        $data = [
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 1],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 2],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 3],
            // ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 4],
            // ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 5],
            // ['id_mk' => 3, 'id_cpl' => 3, 'id_cpmk' => 6],

            // id mk = 92, 93, 94 ,95 , dan 96
            // id cpl = 19, 20, dan 21
            // id cpmk = 31, 32, 33, 34, 35

            ['id_mk' => 92, 'id_cpl' => 19, 'id_cpmk' => 31],
            ['id_mk' => 92, 'id_cpl' => 19, 'id_cpmk' => 32],
            ['id_mk' => 92, 'id_cpl' => 19, 'id_cpmk' => 33],

            ['id_mk' => 92, 'id_cpl' => 20, 'id_cpmk' => 31],
            ['id_mk' => 92, 'id_cpl' => 20, 'id_cpmk' => 32],
            ['id_mk' => 92, 'id_cpl' => 20, 'id_cpmk' => 33],

            ['id_mk' => 33, 'id_cpl' => 19, 'id_cpmk' => 31],
            ['id_mk' => 33, 'id_cpl' => 20, 'id_cpmk' => 32],
            ['id_mk' => 33, 'id_cpl' => 21, 'id_cpmk' => 33],

            
            // ['id_mk' => 34, 'id_cpl' => 19, 'id_cpmk' => 31],
            // ['id_mk' => 34, 'id_cpl' => 20, 'id_cpmk' => 32],
            // ['id_mk' => 34, 'id_cpl' => 21, 'id_cpmk' => 33],
            // ['id_mk' => 34, 'id_cpl' => 22, 'id_cpmk' => 34],

            // ['id_mk' => 35, 'id_cpl' => 19, 'id_cpmk' => 31],
            // ['id_mk' => 35, 'id_cpl' => 20, 'id_cpmk' => 32],
            // ['id_mk' => 35, 'id_cpl' => 21, 'id_cpmk' => 33],
            // ['id_mk' => 35, 'id_cpl' => 22, 'id_cpmk' => 34],

            // ['id_mk' => 36, 'id_cpl' => 19, 'id_cpmk' => 31],
            // ['id_mk' => 36, 'id_cpl' => 20, 'id_cpmk' => 32],
            // ['id_mk' => 36, 'id_cpl' => 21, 'id_cpmk' => 34],
            // ['id_mk' => 36, 'id_cpl' => 22, 'id_cpmk' => 35],

            // ['id_mk' => 92, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 92, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 92, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 92, 'id_cpl' => 26, 'id_cpmk' => 34],

            // ['id_mk' => 93, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 93, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 93, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 93, 'id_cpl' => 30, 'id_cpmk' => 33],

            // ['id_mk' => 94, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 94, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 94, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 94, 'id_cpl' => 25, 'id_cpmk' => 32],

            // ['id_mk' => 95, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 95, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 95, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 95, 'id_cpl' => 29, 'id_cpmk' => 31],

            // ['id_mk' => 96, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 96, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 96, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 96, 'id_cpl' => 24, 'id_cpmk' => 35],

            // ['id_mk' => 97, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 97, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 97, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 97, 'id_cpl' => 28, 'id_cpmk' => 34],

            // ['id_mk' => 98, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 98, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 98, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 98, 'id_cpl' => 23, 'id_cpmk' => 33],

            // ['id_mk' => 99, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 99, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 99, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 99, 'id_cpl' => 27, 'id_cpmk' => 32],

            // ['id_mk' => 100, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 100, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 100, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 100, 'id_cpl' => 31, 'id_cpmk' => 31],

            // ['id_mk' => 101, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 101, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 101, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 101, 'id_cpl' => 26, 'id_cpmk' => 35],

            // ['id_mk' => 102, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 102, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 102, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 102, 'id_cpl' => 30, 'id_cpmk' => 34],

            // ['id_mk' => 103, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 103, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 103, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 103, 'id_cpl' => 25, 'id_cpmk' => 33],

            // ['id_mk' => 104, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 104, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 104, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 104, 'id_cpl' => 29, 'id_cpmk' => 32],

            // ['id_mk' => 105, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 105, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 105, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 105, 'id_cpl' => 24, 'id_cpmk' => 31],

            // ['id_mk' => 106, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 106, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 106, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 106, 'id_cpl' => 28, 'id_cpmk' => 35],

            // ['id_mk' => 107, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 107, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 107, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 107, 'id_cpl' => 23, 'id_cpmk' => 34],

            // ['id_mk' => 108, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 108, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 108, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 108, 'id_cpl' => 27, 'id_cpmk' => 33],

            // ['id_mk' => 109, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 109, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 109, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 109, 'id_cpl' => 31, 'id_cpmk' => 32],

            // ['id_mk' => 110, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 110, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 110, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 110, 'id_cpl' => 26, 'id_cpmk' => 31],

            // ['id_mk' => 111, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 111, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 111, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 111, 'id_cpl' => 30, 'id_cpmk' => 35],

            // ['id_mk' => 112, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 112, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 112, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 112, 'id_cpl' => 25, 'id_cpmk' => 34],

            // ['id_mk' => 113, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 113, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 113, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 113, 'id_cpl' => 29, 'id_cpmk' => 33],

            // ['id_mk' => 114, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 114, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 114, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 114, 'id_cpl' => 24, 'id_cpmk' => 32],

            // ['id_mk' => 115, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 115, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 115, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 115, 'id_cpl' => 28, 'id_cpmk' => 31],

            // ['id_mk' => 116, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 116, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 116, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 116, 'id_cpl' => 23, 'id_cpmk' => 35],
            
            // ['id_mk' => 117, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 117, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 117, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 117, 'id_cpl' => 27, 'id_cpmk' => 34],

            // ['id_mk' => 118, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 118, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 118, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 118, 'id_cpl' => 31, 'id_cpmk' => 33],
            
            // ['id_mk' => 119, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 119, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 119, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 119, 'id_cpl' => 26, 'id_cpmk' => 32],

            // ['id_mk' => 120, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 120, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 120, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 120, 'id_cpl' => 30, 'id_cpmk' => 31],

            // ['id_mk' => 121, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 121, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 121, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 121, 'id_cpl' => 25, 'id_cpmk' => 35],

            // ['id_mk' => 122, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 122, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 122, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 122, 'id_cpl' => 29, 'id_cpmk' => 34],

            // ['id_mk' => 123, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 123, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 123, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 123, 'id_cpl' => 24, 'id_cpmk' => 33],

            // ['id_mk' => 124, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 124, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 124, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 124, 'id_cpl' => 28, 'id_cpmk' => 32],

            // ['id_mk' => 125, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 125, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 125, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 125, 'id_cpl' => 23, 'id_cpmk' => 31],

            // ['id_mk' => 126, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 126, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 126, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 126, 'id_cpl' => 27, 'id_cpmk' => 35],

            // ['id_mk' => 127, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 127, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 127, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 127, 'id_cpl' => 31, 'id_cpmk' => 34],

            // ['id_mk' => 128, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 128, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 128, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 128, 'id_cpl' => 26, 'id_cpmk' => 33],

            // ['id_mk' => 129, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 129, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 129, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 129, 'id_cpl' => 30, 'id_cpmk' => 32],

            // ['id_mk' => 130, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 130, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 130, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 130, 'id_cpl' => 25, 'id_cpmk' => 31],

            // ['id_mk' => 131, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 131, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 131, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 131, 'id_cpl' => 29, 'id_cpmk' => 35],

            // ['id_mk' => 132, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 132, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 132, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 132, 'id_cpl' => 24, 'id_cpmk' => 34],

            // ['id_mk' => 133, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 133, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 133, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 133, 'id_cpl' => 28, 'id_cpmk' => 33],

            // ['id_mk' => 134, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 134, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 134, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 134, 'id_cpl' => 23, 'id_cpmk' => 32],

            // ['id_mk' => 135, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 135, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 135, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 135, 'id_cpl' => 27, 'id_cpmk' => 31],

            // ['id_mk' => 136, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 136, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 136, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 136, 'id_cpl' => 31, 'id_cpmk' => 35],

            // ['id_mk' => 137, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 137, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 137, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 137, 'id_cpl' => 26, 'id_cpmk' => 34],

            // ['id_mk' => 138, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 138, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 138, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 138, 'id_cpl' => 30, 'id_cpmk' => 33],

            // ['id_mk' => 139, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 139, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 139, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 139, 'id_cpl' => 25, 'id_cpmk' => 32],

            // ['id_mk' => 140, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 140, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 140, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 140, 'id_cpl' => 29, 'id_cpmk' => 31],

            // ['id_mk' => 141, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 141, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 141, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 141, 'id_cpl' => 24, 'id_cpmk' => 35],

            // ['id_mk' => 142, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 142, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 142, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 142, 'id_cpl' => 28, 'id_cpmk' => 34],
            
            // ['id_mk' => 143, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 143, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 143, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 143, 'id_cpl' => 23, 'id_cpmk' => 33],

            // ['id_mk' => 144, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 144, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 144, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 144, 'id_cpl' => 27, 'id_cpmk' => 32],

            // ['id_mk' => 145, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 145, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 145, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 145, 'id_cpl' => 31, 'id_cpmk' => 31],

            // ['id_mk' => 146, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 146, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 146, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 146, 'id_cpl' => 26, 'id_cpmk' => 35],

            // ['id_mk' => 147, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 147, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 147, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 147, 'id_cpl' => 30, 'id_cpmk' => 34],

            // ['id_mk' => 148, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 148, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 148, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 148, 'id_cpl' => 25, 'id_cpmk' => 33],

            // ['id_mk' => 149, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 149, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 149, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 149, 'id_cpl' => 29, 'id_cpmk' => 32],

            // ['id_mk' => 150, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 150, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 150, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 150, 'id_cpl' => 24, 'id_cpmk' => 31],

            // ['id_mk' => 151, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 151, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 151, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 151, 'id_cpl' => 28, 'id_cpmk' => 35],

            // ['id_mk' => 152, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 152, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 152, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 152, 'id_cpl' => 23, 'id_cpmk' => 34],

            // ['id_mk' => 153, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 153, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 153, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 153, 'id_cpl' => 27, 'id_cpmk' => 33],

            // ['id_mk' => 154, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 154, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 154, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 154, 'id_cpl' => 31, 'id_cpmk' => 32],

            // ['id_mk' => 155, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 155, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 155, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 155, 'id_cpl' => 26, 'id_cpmk' => 31],

            // ['id_mk' => 156, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 156, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 156, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 156, 'id_cpl' => 30, 'id_cpmk' => 35],

            // ['id_mk' => 157, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 157, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 157, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 157, 'id_cpl' => 25, 'id_cpmk' => 34],

            // ['id_mk' => 158, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 158, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 158, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 158, 'id_cpl' => 29, 'id_cpmk' => 33],

            // ['id_mk' => 159, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 159, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 159, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 159, 'id_cpl' => 24, 'id_cpmk' => 32],

            // ['id_mk' => 160, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 160, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 160, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 160, 'id_cpl' => 28, 'id_cpmk' => 31],

            // ['id_mk' => 161, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 161, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 161, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 161, 'id_cpl' => 23, 'id_cpmk' => 35],

            // ['id_mk' => 162, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 162, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 162, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 162, 'id_cpl' => 27, 'id_cpmk' => 34],

            // ['id_mk' => 163, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 163, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 163, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 163, 'id_cpl' => 31, 'id_cpmk' => 33],
            
            // ['id_mk' => 164, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 164, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 164, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 164, 'id_cpl' => 26, 'id_cpmk' => 32],
        ];

        DB::table('mk_cpmk_cpl_map')->insert($data);
    }
    // public function run()
    // {
    //     // Data manual khusus
    //     $data = [
    //         ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 1],
    //         ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 2],
    //         ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 3],
    //         ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 4],
    //         ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 5],
    //         ['id_mk' => 3, 'id_cpl' => 3, 'id_cpmk' => 6],

    //         ['id_mk' => 31, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 31, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 31, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 31, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 32, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 32, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 32, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 32, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 33, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 33, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 33, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 33, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 34, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 34, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 34, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 34, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 35, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 35, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 35, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 35, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 36, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 36, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 36, 'id_cpl' => 21, 'id_cpmk' => 34],
    //         ['id_mk' => 36, 'id_cpl' => 22, 'id_cpmk' => 35],
    //     ];

    //     $idCplStart = 23;
    //     $idCplEnd = 31;
    //     $idCpmkStart = 31;
    //     $idCpmkEnd = 35;
        
    //     $idCpl = $idCplStart;
    //     $idCpmk = $idCpmkStart;
        
    //     for ($idMk = 92; $idMk <= 164; $idMk++) {
    //         for ($i = 0; $i < 4; $i++) {
    //             $data[] = [
    //                 'id_mk' => $idMk,
    //                 'id_cpl' => $idCpl,
    //                 'id_cpmk' => $idCpmk,
    //             ];

    //             $idCpl++;
    //             $idCpmk++;

    //             if ($idCpl > $idCplEnd) $idCpl = $idCplStart;
    //             if ($idCpmk > $idCpmkEnd) $idCpmk = $idCpmkStart;
    //         }
    //     }

    //     DB::table('mk_cpmk_cpl_map')->insert($data);
    // }
}
    // public function run(): void
    // {

        // $data = [
        //     // DATA MANUAL KHUSUS
        //     ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 1],
        //     ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 2],
        //     ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 3],
        //     ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 4],
        //     ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 5],
        //     ['id_mk' => 3, 'id_cpl' => 3, 'id_cpmk' => 6],

        //     ['id_mk' => 31, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 31, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 31, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 31, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 32, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 32, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 32, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 32, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 33, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 33, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 33, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 33, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 34, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 34, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 34, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 34, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 35, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 35, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 35, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 35, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 36, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 36, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 36, 'id_cpl' => 21, 'id_cpmk'=>34],
        //     ['id_mk' => 36, 'id_cpl' => 22, 'id_cpmk'=>35],
        // ];

        // DB::table('mk_cpmk_cpl_map')->insert([
            // id mk yang bisa dipilih itu dari 92-164
            // id_cpmk yang bisa di pilih itu dari 31-35
            // cpl yang bisa dipilih itu dari 19-31
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>1],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>2],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>3],

            // ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>4],
            // ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>5],
            // ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>2],
            // // untuk MK IMK kurikulum 2025
        //     ['id_mk' => 80, 'id_cpl' => 57, 'id_cpmk'=>76],
        //     ['id_mk' => 80, 'id_cpl' => 58, 'id_cpmk'=>77],
        //     ['id_mk' => 80, 'id_cpl' => 58, 'id_cpmk'=>78],
        //     ['id_mk' => 80, 'id_cpl' => 59, 'id_cpmk'=>79],

        //     ['id_mk' => 92,  'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 92,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 92,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 92,  'id_cpl' => 20, 'id_cpmk' => 32],

        //     ['id_mk' => 93,  'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 93,  'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 93,  'id_cpl' => 22, 'id_cpmk' => 34],
        //     ['id_mk' => 93,  'id_cpl' => 22, 'id_cpmk' => 34],

        //     ['id_mk' => 94,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 94,  'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 94,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 94,  'id_cpl' => 21, 'id_cpmk' => 33],

        //     ['id_mk' => 95,  'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 95,  'id_cpl' => 22, 'id_cpmk' => 35],
        //     ['id_mk' => 95,  'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 95,  'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 96,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 96,  'id_cpl' => 23, 'id_cpmk' => 33],

        //     ['id_mk' => 97,  'id_cpl' => 24, 'id_cpmk' => 31],
        //     ['id_mk' => 97,  'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 98,  'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 98,  'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 99,  'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 99,  'id_cpl' => 25, 'id_cpmk' => 33],
        //     ['id_mk' => 99,  'id_cpl' => 27, 'id_cpmk' => 34],

        //     ['id_mk' => 100, 'id_cpl' => 24, 'id_cpmk' => 31],
        //     ['id_mk' => 100, 'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 101, 'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 101, 'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 102, 'id_cpl' => 28, 'id_cpmk' => 31],
        //     ['id_mk' => 102, 'id_cpl' => 29, 'id_cpmk' => 32],

        //     ['id_mk' => 103, 'id_cpl' => 28, 'id_cpmk' => 33],
        //     ['id_mk' => 103, 'id_cpl' => 30, 'id_cpmk' => 34],
        //     ['id_mk' => 103, 'id_cpl' => 31, 'id_cpmk' => 35],

        //     ['id_mk' => 104, 'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 104, 'id_cpl' => 20, 'id_cpmk' => 32],

        //     ['id_mk' => 105, 'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 105, 'id_cpl' => 22, 'id_cpmk' => 34],

        //     ['id_mk' => 106, 'id_cpl' => 23, 'id_cpmk' => 35],
        //     ['id_mk' => 106, 'id_cpl' => 24, 'id_cpmk' => 31],

        //     ['id_mk' => 107, 'id_cpl' => 25, 'id_cpmk' => 33],
        //     ['id_mk' => 107, 'id_cpl' => 26, 'id_cpmk' => 34],

        //     ['id_mk' => 108, 'id_cpl' => 27, 'id_cpmk' => 35],
        //     ['id_mk' => 108, 'id_cpl' => 28, 'id_cpmk' => 31],

        //     ['id_mk' => 109, 'id_cpl' => 29, 'id_cpmk' => 32],
        //     ['id_mk' => 109, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 110, 'id_cpl' => 31, 'id_cpmk' => 34],
        //     ['id_mk' => 110, 'id_cpl' => 19, 'id_cpmk' => 35],

        //     ['id_mk' => 111, 'id_cpl' => 20, 'id_cpmk' => 31],
        //     ['id_mk' => 111, 'id_cpl' => 21, 'id_cpmk' => 32],
        //     ['id_mk' => 111, 'id_cpl' => 22, 'id_cpmk' => 33],

        //     ['id_mk' => 112, 'id_cpl' => 23, 'id_cpmk' => 34],
        //     ['id_mk' => 112, 'id_cpl' => 24, 'id_cpmk' => 35],

        //     ['id_mk' => 113, 'id_cpl' => 25, 'id_cpmk' => 32],
        //     ['id_mk' => 113, 'id_cpl' => 26, 'id_cpmk' => 33],

        //     ['id_mk' => 114, 'id_cpl' => 27, 'id_cpmk' => 34],
        //     ['id_mk' => 114, 'id_cpl' => 28, 'id_cpmk' => 35],

        //     ['id_mk' => 115, 'id_cpl' => 29, 'id_cpmk' => 31],
        //     ['id_mk' => 115, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 116, 'id_cpl' => 31, 'id_cpmk' => 35],
        //     ['id_mk' => 116, 'id_cpl' => 19, 'id_cpmk' => 31],

        //     ['id_mk' => 117, 'id_cpl' => 20, 'id_cpmk' => 33],
        //     ['id_mk' => 117, 'id_cpl' => 21, 'id_cpmk' => 35],

        //     ['id_mk' => 118, 'id_cpl' => 22, 'id_cpmk' => 32],
        //     ['id_mk' => 118, 'id_cpl' => 23, 'id_cpmk' => 33],

        //     ['id_mk' => 119, 'id_cpl' => 24, 'id_cpmk' => 34],
        //     ['id_mk' => 119, 'id_cpl' => 25, 'id_cpmk' => 35],

        //     ['id_mk' => 120, 'id_cpl' => 26, 'id_cpmk' => 32],
        //     ['id_mk' => 120, 'id_cpl' => 27, 'id_cpmk' => 33],

        //     ['id_mk' => 121, 'id_cpl' => 28, 'id_cpmk' => 34],
        //     ['id_mk' => 121, 'id_cpl' => 29, 'id_cpmk' => 35],

        //     ['id_mk' => 122, 'id_cpl' => 30, 'id_cpmk' => 31],
        //     ['id_mk' => 122, 'id_cpl' => 31, 'id_cpmk' => 33],

        //     ['id_mk' => 123, 'id_cpl' => 19, 'id_cpmk' => 35],
        //     ['id_mk' => 123, 'id_cpl' => 20, 'id_cpmk' => 31],

        //     ['id_mk' => 124, 'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 124, 'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 125, 'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 125, 'id_cpl' => 24, 'id_cpmk' => 34],

        //     ['id_mk' => 126, 'id_cpl' => 25, 'id_cpmk' => 35],
        //     ['id_mk' => 126, 'id_cpl' => 26, 'id_cpmk' => 31],

        //     ['id_mk' => 127, 'id_cpl' => 27, 'id_cpmk' => 33],
        //     ['id_mk' => 127, 'id_cpl' => 28, 'id_cpmk' => 35],

        //     ['id_mk' => 128, 'id_cpl' => 29, 'id_cpmk' => 31],
        //     ['id_mk' => 128, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 129, 'id_cpl' => 31, 'id_cpmk' => 34],
        //     ['id_mk' => 129, 'id_cpl' => 19, 'id_cpmk' => 35],

        //     ['id_mk' => 130, 'id_cpl' => 20, 'id_cpmk' => 31],
        //     ['id_mk' => 130, 'id_cpl' => 21, 'id_cpmk' => 33],

        //    ['id_mk' => 131, 'id_cpl' => 22, 'id_cpmk' => 34],
        //     ['id_mk' => 131, 'id_cpl' => 23, 'id_cpmk' => 35],

        //     ['id_mk' => 132, 'id_cpl' => 24, 'id_cpmk' => 32],
        //     ['id_mk' => 132, 'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 133, 'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 133, 'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 134, 'id_cpl' => 28, 'id_cpmk' => 31],
        //     ['id_mk' => 134, 'id_cpl' => 29, 'id_cpmk' => 33],

        //     ['id_mk' => 135, 'id_cpl' => 30, 'id_cpmk' => 34],
        //     ['id_mk' => 135, 'id_cpl' => 31, 'id_cpmk' => 35],

        //     ['id_mk' => 136, 'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 136, 'id_cpl' => 20, 'id_cpmk' => 33],

        //     ['id_mk' => 137, 'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 137, 'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 138, 'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 138, 'id_cpl' => 24, 'id_cpmk' => 33],

        //     ['id_mk' => 139, 'id_cpl' => 25, 'id_cpmk' => 34],
        //     ['id_mk' => 139, 'id_cpl' => 26, 'id_cpmk' => 35],

        //     ['id_mk' => 140, 'id_cpl' => 27, 'id_cpmk' => 31],
        //     ['id_mk' => 140, 'id_cpl' => 28, 'id_cpmk' => 33],

        //     ['id_mk' => 141, 'id_cpl' => 29, 'id_cpmk' => 34],
        //     ['id_mk' => 141, 'id_cpl' => 30, 'id_cpmk' => 35],

        //     ['id_mk' => 142, 'id_cpl' => 31, 'id_cpmk' => 32],
        //     ['id_mk' => 142, 'id_cpl' => 19, 'id_cpmk' => 33],

        //     ['id_mk' => 143, 'id_cpl' => 20, 'id_cpmk' => 34],
        //     ['id_mk' => 143, 'id_cpl' => 21, 'id_cpmk' => 35],

        //     ['id_mk' => 144, 'id_cpl' => 22, 'id_cpmk' => 31],
        //     ['id_mk' => 144, 'id_cpl' => 23, 'id_cpmk' => 33],

        //     ['id_mk' => 145, 'id_cpl' => 24, 'id_cpmk' => 34],
        //     ['id_mk' => 145, 'id_cpl' => 25, 'id_cpmk' => 35],

        //     ['id_mk' => 146, 'id_cpl' => 26, 'id_cpmk' => 32],
        //     ['id_mk' => 146, 'id_cpl' => 27, 'id_cpmk' => 33],

        //     ['id_mk' => 147, 'id_cpl' => 28, 'id_cpmk' => 34],
        //     ['id_mk' => 147, 'id_cpl' => 29, 'id_cpmk' => 35],

        //     ['id_mk' => 148, 'id_cpl' => 30, 'id_cpmk' => 31],
        //     ['id_mk' => 148, 'id_cpl' => 31, 'id_cpmk' => 33],

        //     ['id_mk' => 149, 'id_cpl' => 19, 'id_cpmk' => 34],
        //     ['id_mk' => 149, 'id_cpl' => 20, 'id_cpmk' => 35],

        //     ['id_mk' => 150, 'id_cpl' => 21, 'id_cpmk' => 32],
        //     ['id_mk' => 150, 'id_cpl' => 22, 'id_cpmk' => 33],

        //     ['id_mk' => 151, 'id_cpl' => 23, 'id_cpmk' => 34],
        //     ['id_mk' => 151, 'id_cpl' => 24, 'id_cpmk' => 35],

        //     ['id_mk' => 152, 'id_cpl' => 25, 'id_cpmk' => 31],
        //     ['id_mk' => 152, 'id_cpl' => 26, 'id_cpmk' => 33],

        //     ['id_mk' => 153, 'id_cpl' => 27, 'id_cpmk' => 34],
        //     ['id_mk' => 153, 'id_cpl' => 28, 'id_cpmk' => 35],

        //     ['id_mk' => 154, 'id_cpl' => 29, 'id_cpmk' => 32],
        //     ['id_mk' => 154, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 155, 'id_cpl' => 31, 'id_cpmk' => 34],
        //     ['id_mk' => 155, 'id_cpl' => 19, 'id_cpmk' => 35],

        //     ['id_mk' => 156, 'id_cpl' => 20, 'id_cpmk' => 31],
        //     ['id_mk' => 156, 'id_cpl' => 21, 'id_cpmk' => 33],

        //     ['id_mk' => 157, 'id_cpl' => 22, 'id_cpmk' => 34],
        //     ['id_mk' => 157, 'id_cpl' => 23, 'id_cpmk' => 35],

        //     ['id_mk' => 158, 'id_cpl' => 24, 'id_cpmk' => 31],
        //     ['id_mk' => 158, 'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 159, 'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 159, 'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 160, 'id_cpl' => 28, 'id_cpmk' => 32],
        //     ['id_mk' => 160, 'id_cpl' => 29, 'id_cpmk' => 33],

        //     ['id_mk' => 161, 'id_cpl' => 30, 'id_cpmk' => 34],
        //     ['id_mk' => 161, 'id_cpl' => 31, 'id_cpmk' => 35],

        //     ['id_mk' => 162, 'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 162, 'id_cpl' => 20, 'id_cpmk' => 33],

        //     ['id_mk' => 163, 'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 163, 'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 164, 'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 164, 'id_cpl' => 24, 'id_cpmk' => 33],
        // ]);

//         $idCplStart = 23;
//         $idCplEnd = 31;
//         $idCpmkStart = 31;
//         $idCpmkEnd = 35;

//         $idCpl = $idCplStart;
//         $idCpmk = $idCpmkStart;

//         for ($idMk = 92; $idMk <= 164; $idMk++) {
//             for ($i = 0; $i < 4; $i++) {
//                 $data[] = [
//                     'id_mk' => $idMk,
//                     'id_cpl' => $idCpl,
//                     'id_cpmk' => $idCpmk,
//                 ];

//                 // Naikkan CPL dan CPMK setiap baris
//                 $idCpl++;
//                 $idCpmk++;

//                 // Reset kalau sudah lewat batas
//                 if ($idCpl > $idCplEnd) $idCpl = $idCplStart;
//                 if ($idCpmk > $idCpmkEnd) $idCpmk = $idCpmkStart;
//             }
//         }

//         DB::table('mapping_mk_cpl_cpmk')->insert($data);

//     }
// }
