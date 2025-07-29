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
            ['id_ps' => 1, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan menganalisis infrastruktur sipil yang aman dan efisien.', 'desc_peo_en' => 'Graduates are able to design and analyze safe and efficient civil infrastructure.'],
            ['id_ps' => 1, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola proyek konstruksi dengan mempertimbangkan biaya, waktu, dan mutu.', 'desc_peo_en' => 'Graduates are able to manage construction projects by considering cost, time, and quality.'],
            ['id_ps' => 1, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu berinovasi dalam penerapan teknologi dan material konstruksi berkelanjutan.', 'desc_peo_en' => 'Graduates are able to innovate in the application of sustainable construction technology and materials.'],

            // Teknik Pertambangan (id_ps = 2)
            ['id_ps' => 2, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merencanakan dan melaksanakan operasi penambangan yang efektif dan aman.', 'desc_peo_en' => 'Graduates are able to plan and execute effective and safe mining operations.'],
            ['id_ps' => 2, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola aspek lingkungan dan keselamatan kerja di industri pertambangan.', 'desc_peo_en' => 'Graduates are able to manage environmental and occupational safety aspects in the mining industry.'],
            ['id_ps' => 2, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu melakukan evaluasi ekonomis terhadap cadangan bahan galian.', 'desc_peo_en' => 'Graduates are able to conduct economic evaluations of mineral reserves.'],

            // Teknik Mesin (id_ps = 3)
            ['id_ps' => 3, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan menganalisis sistem mekanikal dan termal.', 'desc_peo_en' => 'Graduates are able to design and analyze mechanical and thermal systems.'],
            ['id_ps' => 3, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola operasional dan perawatan mesin-mesin industri.', 'desc_peo_en' => 'Graduates are able to manage the operation and maintenance of industrial machinery.'],
            ['id_ps' => 3, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu mengembangkan solusi inovatif di bidang konversi energi dan manufaktur.', 'desc_peo_en' => 'Graduates are able to develop innovative solutions in the fields of energy conversion and manufacturing.'],

            // Teknik Lingkungan (id_ps = 4)
            ['id_ps' => 4, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang sistem pengelolaan limbah dan pengendalian pencemaran.', 'desc_peo_en' => 'Graduates are able to design waste management and pollution control systems.'],
            ['id_ps' => 4, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu menganalisis dan memitigasi dampak lingkungan dari suatu kegiatan.', 'desc_peo_en' => 'Graduates are able to analyze and mitigate the environmental impacts of an activity.'],
            ['id_ps' => 4, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu menerapkan prinsip pembangunan berkelanjutan dalam rekayasa lingkungan.', 'desc_peo_en' => 'Graduates are able to apply sustainable development principles in environmental engineering.'],

            // Arsitektur (id_ps = 5)
            ['id_ps' => 5, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu menghasilkan rancangan arsitektur yang fungsional, estetis, dan berkonteks.', 'desc_peo_en' => 'Graduates are able to produce architectural designs that are functional, aesthetic, and contextual.'],
            ['id_ps' => 5, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengintegrasikan teknologi bangunan dan prinsip desain berkelanjutan.', 'desc_peo_en' => 'Graduates are able to integrate building technology and sustainable design principles.'],
            ['id_ps' => 5, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu berperan dalam proses perencanaan dan pengembangan lingkungan binaan.', 'desc_peo_en' => 'Graduates are able to play a role in the planning and development process of the built environment.'],

            // Teknik Kimia (id_ps = 6)
            ['id_ps' => 6, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan mengoperasikan proses industri kimia yang efisien dan aman.', 'desc_peo_en' => 'Graduates are able to design and operate efficient and safe chemical industry processes.'],
            ['id_ps' => 6, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengembangkan produk dan material baru melalui rekayasa kimia.', 'desc_peo_en' => 'Graduates are able to develop new products and materials through chemical engineering.'],
            ['id_ps' => 6, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu menyelesaikan masalah dalam industri proses dengan pendekatan analitis.', 'desc_peo_en' => 'Graduates are able to solve problems in the process industry with an analytical approach.'],

            // Teknologi Informasi (id_ps = 7)
            ['id_ps' => 7, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan mengembangkan solusi perangkat lunak yang andal dan aman.', 'desc_peo_en' => 'Graduates are able to design and develop reliable and secure software solutions.'],
            ['id_ps' => 7, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola infrastruktur teknologi informasi dan layanan data.', 'desc_peo_en' => 'Graduates are able to manage information technology infrastructure and data services.'],
            ['id_ps' => 7, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu berinovasi dan berwirausaha berbasis teknologi digital.', 'desc_peo_en' => 'Graduates are able to innovate and start businesses based on digital technology.'],
            ['id_ps' => 7, 'kode_peo' => 'PEO-4', 'desc_peo_id' => 'Lulusan mampu merancang dan mengembangkan solusi perangkat lunak yang andal dan aman.', 'desc_peo_en' => 'Graduates are able to design and develop reliable and secure software solutions.'],
            ['id_ps' => 7, 'kode_peo' => 'PEO-5', 'desc_peo_id' => 'Lulusan mampu mengelola infrastruktur teknologi informasi dan layanan data.', 'desc_peo_en' => 'Graduates are able to manage information technology infrastructure and data services.'],
            ['id_ps' => 7, 'kode_peo' => 'PEO-6', 'desc_peo_id' => 'Lulusan mampu berinovasi dan berwirausaha berbasis teknologi digital.', 'desc_peo_en' => 'Graduates are able to innovate and start businesses based on digital technology.'],

            // Teknik Elektro (id_ps = 8)
            ['id_ps' => 8, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan menganalisis sistem tenaga listrik dan elektronika.', 'desc_peo_en' => 'Graduates are able to design and analyze electrical power and electronics systems.'],
            ['id_ps' => 8, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengembangkan sistem kendali, otomasi, dan telekomunikasi.', 'desc_peo_en' => 'Graduates are able to develop control, automation, and telecommunication systems.'],
            ['id_ps' => 8, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu beradaptasi dengan perkembangan teknologi di bidang ketenagalistrikan.', 'desc_peo_en' => 'Graduates are able to adapt to technological developments in the electricity sector.'],

            // Teknik Geologi (id_ps = 9)
            ['id_ps' => 9, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu melakukan eksplorasi dan evaluasi sumber daya kebumian.', 'desc_peo_en' => 'Graduates are able to explore and evaluate earth resources.'],
            ['id_ps' => 9, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu menerapkan prinsip geologi untuk rekayasa dan mitigasi bencana.', 'desc_peo_en' => 'Graduates are able to apply geological principles for engineering and disaster mitigation.'],
            ['id_ps' => 9, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu menganalisis data geologi untuk pemahaman sistem kebumian.', 'desc_peo_en' => 'Graduates are able to analyze geological data to understand earth systems.'],
        ]);
    }
}