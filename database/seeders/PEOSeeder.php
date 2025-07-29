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
            // kurikulum 2020
            // Teknik Sipil (id_ps = 1)
            ['id_ps' => 1, 'id_kurikulum' => 1, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merancang dan menganalisis infrastruktur sipil yang aman dan efisien.'],
            ['id_ps' => 1, 'id_kurikulum' => 1, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengelola proyek konstruksi dengan mempertimbangkan biaya, waktu, dan mutu.'],
            ['id_ps' => 1, 'id_kurikulum' => 1, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu berinovasi dalam penerapan teknologi dan material konstruksi berkelanjutan.'],

            // Teknik Pertambangan (id_ps = 2)
            ['id_ps' => 2, 'id_kurikulum' => 2, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merencanakan dan melaksanakan operasi penambangan yang efektif dan aman.'],
            ['id_ps' => 2, 'id_kurikulum' => 2, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengelola aspek lingkungan dan keselamatan kerja di industri pertambangan.'],
            ['id_ps' => 2, 'id_kurikulum' => 2, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu melakukan evaluasi ekonomis terhadap cadangan bahan galian.'],

            // Teknik Mesin (id_ps = 3)
            ['id_ps' => 3, 'id_kurikulum' => 3, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merancang dan menganalisis sistem mekanikal dan termal.'],
            ['id_ps' => 3, 'id_kurikulum' => 3, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengelola operasional dan perawatan mesin-mesin industri.'],
            ['id_ps' => 3, 'id_kurikulum' => 3, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu mengembangkan solusi inovatif di bidang konversi energi dan manufaktur.'],

            // Teknik Lingkungan (id_ps = 4)
            ['id_ps' => 4, 'id_kurikulum' => 4, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merancang sistem pengelolaan limbah dan pengendalian pencemaran.'],
            ['id_ps' => 4, 'id_kurikulum' => 4, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu menganalisis dan memitigasi dampak lingkungan dari suatu kegiatan.'],
            ['id_ps' => 4, 'id_kurikulum' => 4, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu menerapkan prinsip pembangunan berkelanjutan dalam rekayasa lingkungan.'],

            // Arsitektur (id_ps = 5)
            ['id_ps' => 5, 'id_kurikulum' => 5, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu menghasilkan rancangan arsitektur yang fungsional, estetis, dan berkonteks.'],
            ['id_ps' => 5, 'id_kurikulum' => 5, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengintegrasikan teknologi bangunan dan prinsip desain berkelanjutan.'],
            ['id_ps' => 5, 'id_kurikulum' => 5, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu berperan dalam proses perencanaan dan pengembangan lingkungan binaan.'],

            // Teknik Kimia (id_ps = 6)
            ['id_ps' => 6, 'id_kurikulum' => 6, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merancang dan mengoperasikan proses industri kimia yang efisien dan aman.'],
            ['id_ps' => 6, 'id_kurikulum' => 6, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengembangkan produk dan material baru melalui rekayasa kimia.'],
            ['id_ps' => 6, 'id_kurikulum' => 6, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu menyelesaikan masalah dalam industri proses dengan pendekatan analitis.'],

            // Teknologi Informasi (id_ps = 7)
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merancang dan mengembangkan solusi perangkat lunak yang andal dan aman.'],
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengelola infrastruktur teknologi informasi dan layanan data.'],
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu berinovasi dan berwirausaha berbasis teknologi digital.'],

            // Teknik Elektro (id_ps = 8)
            ['id_ps' => 8, 'id_kurikulum' => 8, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu merancang dan menganalisis sistem tenaga listrik dan elektronika.'],
            ['id_ps' => 8, 'id_kurikulum' => 8, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu mengembangkan sistem kendali, otomasi, dan telekomunikasi.'],
            ['id_ps' => 8, 'id_kurikulum' => 8, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu beradaptasi dengan perkembangan teknologi di bidang ketenagalistrikan.'],

            // Teknik Geologi (id_ps = 9)
            ['id_ps' => 9, 'id_kurikulum' => 9, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Lulusan mampu melakukan eksplorasi dan evaluasi sumber daya kebumian.'],
            ['id_ps' => 9, 'id_kurikulum' => 9, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Lulusan mampu menerapkan prinsip geologi untuk rekayasa dan mitigasi bencana.'],
            ['id_ps' => 9, 'id_kurikulum' => 9, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Lulusan mampu menganalisis data geologi untuk pemahaman sistem kebumian.'],

            // kurikulum 2025
            // Teknik Sipil (id_ps = 1, kurikulum 2025)
            ['id_ps' => 1, 'id_kurikulum' => 10, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu merancang infrastruktur sipil berkelanjutan dengan teknologi digital dan material inovatif.'],
            ['id_ps' => 1, 'id_kurikulum' => 10, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu mengelola proyek konstruksi berbasis BIM dan prinsip lean construction.'],
            ['id_ps' => 1, 'id_kurikulum' => 10, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu mengintegrasikan konsep smart city dan resilient infrastructure dalam perencanaan.'],

            // Teknik Pertambangan (id_ps = 2, kurikulum 2025)
            ['id_ps' => 2, 'id_kurikulum' => 11, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu menerapkan teknologi otomasi dan AI dalam operasi pertambangan berkelanjutan.'],
            ['id_ps' => 2, 'id_kurikulum' => 11, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu mengimplementasikan circular economy dan rehabilitasi lingkungan pasca tambang.'],
            ['id_ps' => 2, 'id_kurikulum' => 11, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu melakukan analisis big data untuk optimasi ekstraksi mineral dan energi.'],

            // Teknik Mesin (id_ps = 3, kurikulum 2025)
            ['id_ps' => 3, 'id_kurikulum' => 12, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu merancang sistem mekanikal cerdas dengan integrasi IoT dan Industry 4.0.'],
            ['id_ps' => 3, 'id_kurikulum' => 12, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu mengembangkan teknologi energi terbarukan dan sistem propulsi ramah lingkungan.'],
            ['id_ps' => 3, 'id_kurikulum' => 12, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu menerapkan additive manufacturing dan digital twin dalam proses manufaktur.'],

            // Teknik Lingkungan (id_ps = 4, kurikulum 2025)
            ['id_ps' => 4, 'id_kurikulum' => 13, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu merancang sistem pengelolaan limbah berbasis teknologi hijau dan smart monitoring.'],
            ['id_ps' => 4, 'id_kurikulum' => 13, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu mengimplementasikan solusi nature-based untuk adaptasi perubahan iklim.'],
            ['id_ps' => 4, 'id_kurikulum' => 13, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu mengintegrasikan prinsip ekonomi sirkular dalam desain sistem lingkungan.'],

            // Arsitektur (id_ps = 5, kurikulum 2025)
            ['id_ps' => 5, 'id_kurikulum' => 14, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu menciptakan arsitektur adaptif dengan teknologi parametrik dan generative design.'],
            ['id_ps' => 5, 'id_kurikulum' => 14, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu mengintegrasikan net-zero energy building dan biophilic design principles.'],
            ['id_ps' => 5, 'id_kurikulum' => 14, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu merancang ruang responsif terhadap perubahan iklim dan kebutuhan komunitas.'],

            // Teknik Kimia (id_ps = 6, kurikulum 2025)
            ['id_ps' => 6, 'id_kurikulum' => 15, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu mengembangkan proses kimia berkelanjutan dengan teknologi green chemistry.'],
            ['id_ps' => 6, 'id_kurikulum' => 15, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu menerapkan bioengineering dan nanoteknologi untuk material masa depan.'],
            ['id_ps' => 6, 'id_kurikulum' => 15, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu mengoptimalkan proses industri dengan AI dan machine learning.'],

            // Teknologi Informasi (id_ps = 7, kurikulum 2025)
            ['id_ps' => 7, 'id_kurikulum' => 16, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu mengembangkan sistem AI, blockchain, dan quantum computing applications.'],
            ['id_ps' => 7, 'id_kurikulum' => 16, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu merancang arsitektur cloud-native dan edge computing solutions.'],
            ['id_ps' => 7, 'id_kurikulum' => 16, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu memimpin transformasi digital dengan pemahaman ethical AI dan cybersecurity.'],

            // Teknik Elektro (id_ps = 8, kurikulum 2025)
            ['id_ps' => 8, 'id_kurikulum' => 17, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu merancang smart grid dan sistem energi terbarukan terintegrasi.'],
            ['id_ps' => 8, 'id_kurikulum' => 17, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu mengembangkan teknologi vehicle electrification dan wireless power transfer.'],
            ['id_ps' => 8, 'id_kurikulum' => 17, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu menerapkan AI dalam sistem kendali adaptif dan predictive maintenance.'],

            // Teknik Geologi (id_ps = 9, kurikulum 2025)
            ['id_ps' => 9, 'id_kurikulum' => 18, 'kode_peo' => '(2025)PEO-1', 'desc_peo' => '(2025)Lulusan mampu menggunakan remote sensing dan GIS untuk eksplorasi sumber daya berkelanjutan.'],
            ['id_ps' => 9, 'id_kurikulum' => 18, 'kode_peo' => '(2025)PEO-2', 'desc_peo' => '(2025)Lulusan mampu menerapkan machine learning dalam prediksi bencana dan pemetaan geologi.'],
            ['id_ps' => 9, 'id_kurikulum' => 18, 'kode_peo' => '(2025)PEO-3', 'desc_peo' => '(2025)Lulusan mampu mengintegrasikan geologi dengan teknologi carbon capture dan geothermal energy.'],
        ]);
    }
}