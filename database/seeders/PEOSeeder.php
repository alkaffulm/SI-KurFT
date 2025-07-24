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
            // Teknik Sipil (id_ps = 1)
            ['id_ps' => 1, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merancang dan menganalisis infrastruktur sipil yang aman dan efisien.'],
            ['id_ps' => 1, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengelola proyek konstruksi dengan mempertimbangkan biaya, waktu, dan mutu.'],
            ['id_ps' => 1, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu berinovasi dalam penerapan teknologi dan material konstruksi berkelanjutan.'],

            // Teknik Pertambangan (id_ps = 2)
            ['id_ps' => 2, 'kode_peo' => 'PEO-4', 'desc_peo' => 'Lulusan mampu merencanakan dan melaksanakan operasi penambangan yang efektif dan aman.'],
            ['id_ps' => 2, 'kode_peo' => 'PEO-5', 'desc_peo' => 'Lulusan mampu mengelola aspek lingkungan dan keselamatan kerja di industri pertambangan.'],
            ['id_ps' => 2, 'kode_peo' => 'PEO-6', 'desc_peo' => 'Lulusan mampu melakukan evaluasi ekonomis terhadap cadangan bahan galian.'],

            // Teknik Mesin (id_ps = 3)
            ['id_ps' => 3, 'kode_peo' => 'PEO-7', 'desc_peo' => 'Lulusan mampu merancang dan menganalisis sistem mekanikal dan termal.'],
            ['id_ps' => 3, 'kode_peo' => 'PEO-8', 'desc_peo' => 'Lulusan mampu mengelola operasional dan perawatan mesin-mesin industri.'],
            ['id_ps' => 3, 'kode_peo' => 'PEO-9', 'desc_peo' => 'Lulusan mampu mengembangkan solusi inovatif di bidang konversi energi dan manufaktur.'],

            // Teknik Lingkungan (id_ps = 4)
            ['id_ps' => 4, 'kode_peo' => 'PEO-10', 'desc_peo' => 'Lulusan mampu merancang sistem pengelolaan limbah dan pengendalian pencemaran.'],
            ['id_ps' => 4, 'kode_peo' => 'PEO-11', 'desc_peo' => 'Lulusan mampu menganalisis dan memitigasi dampak lingkungan dari suatu kegiatan.'],
            ['id_ps' => 4, 'kode_peo' => 'PEO-12', 'desc_peo' => 'Lulusan mampu menerapkan prinsip pembangunan berkelanjutan dalam rekayasa lingkungan.'],

            // Arsitektur (id_ps = 5)
            ['id_ps' => 5, 'kode_peo' => 'PEO-13', 'desc_peo' => 'Lulusan mampu menghasilkan rancangan arsitektur yang fungsional, estetis, dan berkonteks.'],
            ['id_ps' => 5, 'kode_peo' => 'PEO-14', 'desc_peo' => 'Lulusan mampu mengintegrasikan teknologi bangunan dan prinsip desain berkelanjutan.'],
            ['id_ps' => 5, 'kode_peo' => 'PEO-15', 'desc_peo' => 'Lulusan mampu berperan dalam proses perencanaan dan pengembangan lingkungan binaan.'],

            // Teknik Kimia (id_ps = 6)
            ['id_ps' => 6, 'kode_peo' => 'PEO-16', 'desc_peo' => 'Lulusan mampu merancang dan mengoperasikan proses industri kimia yang efisien dan aman.'],
            ['id_ps' => 6, 'kode_peo' => 'PEO-17', 'desc_peo' => 'Lulusan mampu mengembangkan produk dan material baru melalui rekayasa kimia.'],
            ['id_ps' => 6, 'kode_peo' => 'PEO-18', 'desc_peo' => 'Lulusan mampu menyelesaikan masalah dalam industri proses dengan pendekatan analitis.'],

            // Teknologi Informasi (id_ps = 7)
            ['id_ps' => 7, 'kode_peo' => 'PEO-19', 'desc_peo' => 'Lulusan mampu merancang dan mengembangkan solusi perangkat lunak yang andal dan aman.'],
            ['id_ps' => 7, 'kode_peo' => 'PEO-20', 'desc_peo' => 'Lulusan mampu mengelola infrastruktur teknologi informasi dan layanan data.'],
            ['id_ps' => 7, 'kode_peo' => 'PEO-21', 'desc_peo' => 'Lulusan mampu berinovasi dan berwirausaha berbasis teknologi digital.'],

            // Teknik Elektro (id_ps = 8)
            ['id_ps' => 8, 'kode_peo' => 'PEO-22', 'desc_peo' => 'Lulusan mampu merancang dan menganalisis sistem tenaga listrik dan elektronika.'],
            ['id_ps' => 8, 'kode_peo' => 'PEO-23', 'desc_peo' => 'Lulusan mampu mengembangkan sistem kendali, otomasi, dan telekomunikasi.'],
            ['id_ps' => 8, 'kode_peo' => 'PEO-24', 'desc_peo' => 'Lulusan mampu beradaptasi dengan perkembangan teknologi di bidang ketenagalistrikan.'],

            // Teknik Geologi (id_ps = 9)
            ['id_ps' => 9, 'kode_peo' => 'PEO-25', 'desc_peo' => 'Lulusan mampu melakukan eksplorasi dan evaluasi sumber daya kebumian.'],
            ['id_ps' => 9, 'kode_peo' => 'PEO-26', 'desc_peo' => 'Lulusan mampu menerapkan prinsip geologi untuk rekayasa dan mitigasi bencana.'],
            ['id_ps' => 9, 'kode_peo' => 'PEO-27', 'desc_peo' => 'Lulusan mampu menganalisis data geologi untuk pemahaman sistem kebumian.'],
        ]);
    }
}