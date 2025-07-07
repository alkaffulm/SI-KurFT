<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahCPMKMapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah_cpmk_map')->insert([
            ['id_mk' => 1, 'id_cpmk' => 1],
            ['id_mk' => 1, 'id_cpmk' => 2],
            ['id_mk' => 2, 'id_cpmk' => 3],
            ['id_mk' => 2, 'id_cpmk' => 4],
            ['id_mk' => 3, 'id_cpmk' => 5],
            ['id_mk' => 3, 'id_cpmk' => 6],
            ['id_mk' => 4, 'id_cpmk' => 7],
            ['id_mk' => 4, 'id_cpmk' => 8],
            ['id_mk' => 5, 'id_cpmk' => 9],
        ]);
    }
}
