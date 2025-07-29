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
            // PS 1
            ['id_cpl' => 1, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu menganalisis kebutuhan rekayasa', 'desc_cpl_en' => 'Able to analyze engineering needs'],
            ['id_cpl' => 2, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu merancang sistem teknik', 'desc_cpl_en' => 'Able to design engineering systems'],
            ['id_cpl' => 3, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu menggunakan perangkat teknik modern', 'desc_cpl_en' => 'Able to use modern engineering tools'],

            // PS 2
            ['id_cpl' => 4, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengevaluasi proses pertambangan', 'desc_cpl_en' => 'Able to evaluate mining processes'],
            ['id_cpl' => 5, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengelola keselamatan tambang', 'desc_cpl_en' => 'Able to manage mine safety'],
            ['id_cpl' => 6, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengoperasikan alat berat tambang', 'desc_cpl_en' => 'Able to operate heavy mining equipment'],

            // PS 3
            ['id_cpl' => 7, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu merancang sistem mekanis', 'desc_cpl_en' => 'Able to design mechanical systems'],
            ['id_cpl' => 8, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu melakukan analisis termodinamika', 'desc_cpl_en' => 'Able to perform thermodynamic analysis'],
            ['id_cpl' => 9, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu menggunakan software teknik mesin', 'desc_cpl_en' => 'Able to use mechanical engineering software'],

            // PS 4
            ['id_cpl' => 10, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu mengelola limbah secara berkelanjutan', 'desc_cpl_en' => 'Able to manage waste sustainably'],
            ['id_cpl' => 11, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu menerapkan teknologi pengolahan air', 'desc_cpl_en' => 'Able to apply water treatment technology'],
            ['id_cpl' => 12, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu melakukan audit lingkungan', 'desc_cpl_en' => 'Able to conduct environmental audits'],

            // PS 5
            ['id_cpl' => 13, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu mendesain bangunan yang estetis dan fungsional', 'desc_cpl_en' => 'Able to design aesthetic and functional buildings'],
            ['id_cpl' => 14, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu mengintegrasikan nilai budaya dalam desain', 'desc_cpl_en' => 'Able to integrate cultural values in design'],
            ['id_cpl' => 15, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu menggunakan perangkat lunak arsitektur', 'desc_cpl_en' => 'Able to use architectural software'],

            // PS 6
            ['id_cpl' => 16, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu menganalisis proses reaksi kimia', 'desc_cpl_en' => 'Able to analyze chemical reaction processes'],
            ['id_cpl' => 17, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu mengoperasikan alat industri kimia', 'desc_cpl_en' => 'Able to operate chemical industry equipment'],
            ['id_cpl' => 18, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu merancang instalasi kimia', 'desc_cpl_en' => 'Able to design chemical installations'],

            // PS 7
            ['id_cpl' => 19, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => 'Able to build software applications'],
            ['id_cpl' => 20, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengelola data secara efisien', 'desc_cpl_en' => 'Able to manage data efficiently'],
            ['id_cpl' => 21, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => 'Able to apply artificial intelligence'],
            ['id_cpl' => 22, 'nama_kode_cpl' => 'CPL-4', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => 'Able to build software applications'],
            ['id_cpl' => 23, 'nama_kode_cpl' => 'CPL-5', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengelola data secara efisien', 'desc_cpl_en' => 'Able to manage data efficiently'],
            ['id_cpl' => 24, 'nama_kode_cpl' => 'CPL-6', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => 'Able to apply artificial intelligence'],

            // PS 8
            ['id_cpl' => 25, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu merancang sistem kontrol elektronik', 'desc_cpl_en' => 'Able to design electronic control systems'],
            ['id_cpl' => 26, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu melakukan analisis sinyal digital', 'desc_cpl_en' => 'Able to perform digital signal analysis'],
            ['id_cpl' => 27, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu menggunakan mikrokontroler dalam sistem', 'desc_cpl_en' => 'Able to use microcontrollers in systems'],

            // PS 9
            ['id_cpl' => 28, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu melakukan pemetaan geologi', 'desc_cpl_en' => 'Able to perform geological mapping'],
            ['id_cpl' => 29, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu menganalisis struktur batuan', 'desc_cpl_en' => 'Able to analyze rock structures'],
            ['id_cpl' => 30, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu melakukan interpretasi data geofisika', 'desc_cpl_en' => 'Able to interpret geophysical data'],
        ]);
    }
}