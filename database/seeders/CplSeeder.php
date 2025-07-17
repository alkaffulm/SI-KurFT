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
        ]);

    }
}
