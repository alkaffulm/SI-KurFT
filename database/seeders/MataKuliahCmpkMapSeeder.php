<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahCmpkMapSeeder extends Seeder
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
        ]);
    }
}
