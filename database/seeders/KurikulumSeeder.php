<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kurikulum')->insert([
            ['id_kurikulum' => 1, 'id_ps' => 1, 'tahun' => 2020],
            ['id_kurikulum' => 2, 'id_ps' => 1, 'tahun' => 2022],
            ['id_kurikulum' => 3, 'id_ps' => 2, 'tahun' => 2020],
            ['id_kurikulum' => 4, 'id_ps' => 2, 'tahun' => 2022],
            ['id_kurikulum' => 5, 'id_ps' => 3, 'tahun' => 2020],
            ['id_kurikulum' => 6, 'id_ps' => 3, 'tahun' => 2022],
            ['id_kurikulum' => 7, 'id_ps' => 4, 'tahun' => 2020],
            ['id_kurikulum' => 8, 'id_ps' => 4, 'tahun' => 2022],
            ['id_kurikulum' => 9, 'id_ps' => 5, 'tahun' => 2020],
            ['id_kurikulum' => 10, 'id_ps' => 5, 'tahun' => 2022],
            ['id_kurikulum' => 11, 'id_ps' => 6, 'tahun' => 2020],
            ['id_kurikulum' => 12, 'id_ps' => 6, 'tahun' => 2022],
            ['id_kurikulum' => 13, 'id_ps' => 7, 'tahun' => 2020],
            ['id_kurikulum' => 14, 'id_ps' => 7, 'tahun' => 2022],
            ['id_kurikulum' => 15, 'id_ps' => 8, 'tahun' => 2020],
            ['id_kurikulum' => 16, 'id_ps' => 8, 'tahun' => 2022],
            ['id_kurikulum' => 17, 'id_ps' => 9, 'tahun' => 2020],
            ['id_kurikulum' => 18, 'id_ps' => 9, 'tahun' => 2022],
        ]);
    }
}
