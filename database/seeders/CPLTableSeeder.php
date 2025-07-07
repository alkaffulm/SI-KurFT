<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CPLTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpl')->insert([
            ['id_ps' => 1, 'desc' => 'Mampu menerapkan pengetahuan matematika, sains, dan prinsip rekayasa', 'tahun_kurikulum' => 2023],
            ['id_ps' => 1, 'desc' => 'Mampu merancang dan melaksanakan eksperimen serta menganalisis data', 'tahun_kurikulum' => 2023],
            ['id_ps' => 1, 'desc' => 'Mampu merancang sistem sesuai kebutuhan dengan mempertimbangkan aspek kesehatan dan keselamatan', 'tahun_kurikulum' => 2023],
            ['id_ps' => 1, 'desc' => 'Mampu bekerja dalam tim multidisiplin', 'tahun_kurikulum' => 2023],
            ['id_ps' => 1, 'desc' => 'Mampu mengidentifikasi, merumuskan, dan memecahkan masalah rekayasa', 'tahun_kurikulum' => 2023],
            ['id_ps' => 1, 'desc' => 'Mampu berkomunikasi secara efektif', 'tahun_kurikulum' => 2023],
            ['id_ps' => 1, 'desc' => 'Mampu memahami tanggung jawab profesi dan etika', 'tahun_kurikulum' => 2023],
            ['id_ps' => 2, 'desc' => 'Mampu menerapkan pengetahuan sistem informasi untuk memecahkan masalah bisnis', 'tahun_kurikulum' => 2023],
            ['id_ps' => 2, 'desc' => 'Mampu merancang dan mengembangkan sistem informasi yang efektif', 'tahun_kurikulum' => 2023],
        ]);
    }
}
