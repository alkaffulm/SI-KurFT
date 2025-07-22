<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peo')->insert([
            ['kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan memiliki kompetensi menjadi seorang administrator, meliputi administrator sistem komputer, jaringan, dan basis data. '],
            ['kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan memiliki kompetensi menjadi seorang pengembang (developer), meliputi pengembang aplikasi perangkat lunak, web, dan sistem.'],
            ['kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan memiliki kompetensi menjadi seorang analis, meliputi analis keamanan siber dan sistem komputer. '],
            ['kode_peo' => 'PEO-4', 'desc_peo' => 'Lulusan memiliki kompetensi menjadi seorang peneliti'],
            ['kode_peo' => 'PEO-5', 'desc_peo' => 'Lulusan memiliki kompetensi untuk melaksanakan dan memelihara suatu sistem informasi. '],
            ['kode_peo' => 'PEO-6', 'desc_peo' => 'Lulusan memiliki kompetensi menjadi seorang ilmuwan data (data scientist), meliputi analisis data, pengembangan model kecerdasan buatan, dan visualisasi data.'],
            ['kode_peo' => 'PEO-7', 'desc_peo' => 'Lulusan memiliki kompetensi untuk mengelola proyek teknologi informasi, meliputi perencanaan, eksekusi, dan pengawasan proyek sesuai dengan metodologi pengembangan modern.'],
            ['kode_peo' => 'PEO-8', 'desc_peo' => 'Lulusan memiliki kompetensi menjadi seorang insinyur cloud dan DevOps, meliputi pengelolaan infrastruktur awan (cloud), otomatisasi perilisan perangkat lunak, dan penerapan praktik Continuous Integration/Continuous Deployment (CI/CD).'],
            ['kode_peo' => 'PEO-9', 'desc_peo' => 'Lulusan memiliki kemampuan berwirausaha di bidang teknologi (technopreneurship), meliputi identifikasi peluang bisnis, pengembangan produk digital, dan strategi pemasaran teknologi.'],

        ]);
    }
}
