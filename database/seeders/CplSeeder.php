<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CplSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpl')->insert([
            // kurikulum 2020
            ['id_cpl' => 1, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 1, 'id_kurikulum' => 1, 'desc' => 'Mampu menganalisis kebutuhan rekayasa', 'bobot_maksimum' => 100],
            ['id_cpl' => 2, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 1, 'id_kurikulum' => 1, 'desc' => 'Mampu merancang sistem teknik', 'bobot_maksimum' => 100],
            ['id_cpl' => 3, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 1, 'id_kurikulum' => 1, 'desc' => 'Mampu menggunakan perangkat teknik modern', 'bobot_maksimum' => 100],

            ['id_cpl' => 4, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 2, 'id_kurikulum' => 2, 'desc' => 'Mampu mengevaluasi proses pertambangan', 'bobot_maksimum' => 100],
            ['id_cpl' => 5, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 2, 'id_kurikulum' => 2, 'desc' => 'Mampu mengelola keselamatan tambang', 'bobot_maksimum' => 100],
            ['id_cpl' => 6, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 2, 'id_kurikulum' => 2, 'desc' => 'Mampu mengoperasikan alat berat tambang', 'bobot_maksimum' => 100],

            ['id_cpl' => 7, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 3, 'id_kurikulum' => 3, 'desc' => 'Mampu merancang sistem mekanis', 'bobot_maksimum' => 100],
            ['id_cpl' => 8, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 3, 'id_kurikulum' => 3, 'desc' => 'Mampu melakukan analisis termodinamika', 'bobot_maksimum' => 100],
            ['id_cpl' => 9, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 3, 'id_kurikulum' => 3, 'desc' => 'Mampu menggunakan software teknik mesin', 'bobot_maksimum' => 100],

            ['id_cpl' => 10, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 4, 'id_kurikulum' => 4, 'desc' => 'Mampu mengelola limbah secara berkelanjutan', 'bobot_maksimum' => 100],
            ['id_cpl' => 11, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 4, 'id_kurikulum' => 4, 'desc' => 'Mampu menerapkan teknologi pengolahan air', 'bobot_maksimum' => 100],
            ['id_cpl' => 12, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 4, 'id_kurikulum' => 4, 'desc' => 'Mampu melakukan audit lingkungan', 'bobot_maksimum' => 100],

            ['id_cpl' => 13, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 5, 'id_kurikulum' => 5, 'desc' => 'Mampu mendesain bangunan yang estetis dan fungsional', 'bobot_maksimum' => 100],
            ['id_cpl' => 14, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 5, 'id_kurikulum' => 5, 'desc' => 'Mampu mengintegrasikan nilai budaya dalam desain', 'bobot_maksimum' => 100],
            ['id_cpl' => 15, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 5, 'id_kurikulum' => 5, 'desc' => 'Mampu menggunakan perangkat lunak arsitektur', 'bobot_maksimum' => 100],

            ['id_cpl' => 16, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 6, 'id_kurikulum' => 6, 'desc' => 'Mampu menganalisis proses reaksi kimia', 'bobot_maksimum' => 100],
            ['id_cpl' => 17, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 6, 'id_kurikulum' => 6, 'desc' => 'Mampu mengoperasikan alat industri kimia', 'bobot_maksimum' => 100],
            ['id_cpl' => 18, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 6, 'id_kurikulum' => 6, 'desc' => 'Mampu merancang instalasi kimia', 'bobot_maksimum' => 100],

            ['id_cpl' => 19, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 7, 'id_kurikulum' => 7, 'desc' => 'Mampu membangun aplikasi perangkat lunak', 'bobot_maksimum' => 100],
            ['id_cpl' => 20, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 7, 'id_kurikulum' => 7, 'desc' => 'Mampu mengelola data secara efisien', 'bobot_maksimum' => 100],
            ['id_cpl' => 21, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 7, 'id_kurikulum' => 7, 'desc' => 'Mampu menerapkan kecerdasan buatan', 'bobot_maksimum' => 100],

            ['id_cpl' => 22, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 8, 'id_kurikulum' => 8, 'desc' => 'Mampu merancang sistem kontrol elektronik', 'bobot_maksimum' => 100],
            ['id_cpl' => 23, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 8, 'id_kurikulum' => 8, 'desc' => 'Mampu melakukan analisis sinyal digital', 'bobot_maksimum' => 100],
            ['id_cpl' => 24, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 8, 'id_kurikulum' => 8, 'desc' => 'Mampu menggunakan mikrokontroler dalam sistem', 'bobot_maksimum' => 100],

            ['id_cpl' => 25, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 9, 'id_kurikulum' => 9, 'desc' => 'Mampu melakukan pemetaan geologi', 'bobot_maksimum' => 100],
            ['id_cpl' => 26, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 9, 'id_kurikulum' => 9, 'desc' => 'Mampu menganalisis struktur batuan', 'bobot_maksimum' => 100],
            ['id_cpl' => 27, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 9, 'id_kurikulum' => 9, 'desc' => 'Mampu melakukan interpretasi data geofisika', 'bobot_maksimum' => 100],

            // kurikulum 2025
            ['id_cpl' => 28, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 10, 'id_ps' => 1, 'desc' => '(2025)Mampu menganalisis kebutuhan rekayasa', 'bobot_maksimum' => 100],
            ['id_cpl' => 29, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 10, 'id_ps' => 1, 'desc' => '(2025)Mampu merancang sistem teknik', 'bobot_maksimum' => 100],
            ['id_cpl' => 30, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 10, 'id_ps' => 1, 'desc' => '(2025)Mampu menggunakan perangkat teknik modern', 'bobot_maksimum' => 100],

            ['id_cpl' => 31, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 11, 'id_ps' => 2, 'desc' => '(2025)Mampu mengevaluasi proses pertambangan', 'bobot_maksimum' => 100],
            ['id_cpl' => 32, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 11, 'id_ps' => 2, 'desc' => '(2025)Mampu mengelola keselamatan tambang', 'bobot_maksimum' => 100],
            ['id_cpl' => 33, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 11, 'id_ps' => 2, 'desc' => '(2025)Mampu mengoperasikan alat berat tambang', 'bobot_maksimum' => 100],

            ['id_cpl' => 34, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 12, 'id_ps' => 3, 'desc' => '(2025)Mampu merancang sistem mekanis', 'bobot_maksimum' => 100],
            ['id_cpl' => 35, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 12, 'id_ps' => 3, 'desc' => '(2025)Mampu melakukan analisis termodinamika', 'bobot_maksimum' => 100],
            ['id_cpl' => 36, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 12, 'id_ps' => 3, 'desc' => '(2025)Mampu menggunakan software teknik mesin', 'bobot_maksimum' => 100],

            ['id_cpl' => 37, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 13, 'id_ps' => 4, 'desc' => '(2025)Mampu mengelola limbah secara berkelanjutan', 'bobot_maksimum' => 100],
            ['id_cpl' => 38, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 13, 'id_ps' => 4, 'desc' => '(2025)Mampu menerapkan teknologi pengolahan air', 'bobot_maksimum' => 100],
            ['id_cpl' => 39, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 13, 'id_ps' => 4, 'desc' => '(2025)Mampu melakukan audit lingkungan', 'bobot_maksimum' => 100],

            ['id_cpl' => 40, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 14, 'id_ps' => 5, 'desc' => '(2025)Mampu mendesain bangunan yang estetis dan fungsional', 'bobot_maksimum' => 100],
            ['id_cpl' => 41, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 14, 'id_ps' => 5, 'desc' => '(2025)Mampu mengintegrasikan nilai budaya dalam desain', 'bobot_maksimum' => 100],
            ['id_cpl' => 42, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 14, 'id_ps' => 5, 'desc' => '(2025)Mampu menggunakan perangkat lunak arsitektur', 'bobot_maksimum' => 100],

            ['id_cpl' => 43, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 15, 'id_ps' => 6, 'desc' => '(2025)Mampu menganalisis proses reaksi kimia', 'bobot_maksimum' => 100],
            ['id_cpl' => 44, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 15, 'id_ps' => 6, 'desc' => '(2025)Mampu mengoperasikan alat industri kimia', 'bobot_maksimum' => 100],
            ['id_cpl' => 45, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 15, 'id_ps' => 6, 'desc' => '(2025)Mampu merancang instalasi kimia', 'bobot_maksimum' => 100],

            ['id_cpl' => 46, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 16, 'id_ps' => 7, 'desc' => '(2025)Mampu membangun aplikasi perangkat lunak', 'bobot_maksimum' => 100],
            ['id_cpl' => 47, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 16, 'id_ps' => 7, 'desc' => '(2025)Mampu mengelola data secara efisien', 'bobot_maksimum' => 100],
            ['id_cpl' => 48, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 16, 'id_ps' => 7, 'desc' => '(2025)Mampu menerapkan kecerdasan buatan', 'bobot_maksimum' => 100],

            ['id_cpl' => 49, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 17, 'id_ps' => 8, 'desc' => '(2025)Mampu merancang sistem kontrol elektronik', 'bobot_maksimum' => 100],
            ['id_cpl' => 50, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 17, 'id_ps' => 8, 'desc' => '(2025)Mampu melakukan analisis sinyal digital', 'bobot_maksimum' => 100],
            ['id_cpl' => 51, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 17, 'id_ps' => 8, 'desc' => '(2025)Mampu menggunakan mikrokontroler dalam sistem', 'bobot_maksimum' => 100],

            ['id_cpl' => 52, 'nama_kode_cpl' => '(2025)CPL-1', 'id_kurikulum' => 18, 'id_ps' => 9, 'desc' => '(2025)Mampu melakukan pemetaan geologi', 'bobot_maksimum' => 100],
            ['id_cpl' => 53, 'nama_kode_cpl' => '(2025)CPL-2', 'id_kurikulum' => 18, 'id_ps' => 9, 'desc' => '(2025)Mampu menganalisis struktur batuan', 'bobot_maksimum' => 100],
            ['id_cpl' => 54, 'nama_kode_cpl' => '(2025)CPL-3', 'id_kurikulum' => 18, 'id_ps' => 9, 'desc' => '(2025)Mampu melakukan interpretasi data geofisika', 'bobot_maksimum' => 100],

        ]);

    }
}
