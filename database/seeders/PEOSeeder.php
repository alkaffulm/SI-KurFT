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
            ['id_ps' => 1, 'id_kurikulum' => 1, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan menganalisis infrastruktur sipil yang aman dan efisien.', 'desc_peo_en' => 'Graduates are able to design and analyze safe and efficient civil infrastructure.'],
            ['id_ps' => 1, 'id_kurikulum' => 1, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola proyek konstruksi dengan mempertimbangkan biaya, waktu, dan mutu.', 'desc_peo_en' => 'Graduates are able to manage construction projects by considering cost, time, and quality.'],
            ['id_ps' => 1, 'id_kurikulum' => 1, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu berinovasi dalam penerapan teknologi dan material konstruksi berkelanjutan.', 'desc_peo_en' => 'Graduates are able to innovate in the application of sustainable construction technology and materials.'],

            // Teknik Pertambangan (id_ps = 2)
            ['id_ps' => 2, 'id_kurikulum' => 2, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merencanakan dan melaksanakan operasi penambangan yang efektif dan aman.', 'desc_peo_en' => 'Graduates are able to plan and execute effective and safe mining operations.'],
            ['id_ps' => 2, 'id_kurikulum' => 2, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola aspek lingkungan dan keselamatan kerja di industri pertambangan.', 'desc_peo_en' => 'Graduates are able to manage environmental and occupational safety aspects in the mining industry.'],
            ['id_ps' => 2, 'id_kurikulum' => 2, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu melakukan evaluasi ekonomis terhadap cadangan bahan galian.', 'desc_peo_en' => 'Graduates are able to conduct economic evaluations of mineral reserves.'],

            // Teknik Mesin (id_ps = 3)
            ['id_ps' => 3, 'id_kurikulum' => 3, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan menganalisis sistem mekanikal dan termal.', 'desc_peo_en' => 'Graduates are able to design and analyze mechanical and thermal systems.'],
            ['id_ps' => 3, 'id_kurikulum' => 3, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola operasional dan perawatan mesin-mesin industri.', 'desc_peo_en' => 'Graduates are able to manage the operation and maintenance of industrial machinery.'],
            ['id_ps' => 3, 'id_kurikulum' => 3, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu mengembangkan solusi inovatif di bidang konversi energi dan manufaktur.', 'desc_peo_en' => 'Graduates are able to develop innovative solutions in the fields of energy conversion and manufacturing.'],

            // Teknik Lingkungan (id_ps = 4)
            ['id_ps' => 4, 'id_kurikulum' => 4, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang sistem pengelolaan limbah dan pengendalian pencemaran.', 'desc_peo_en' => 'Graduates are able to design waste management and pollution control systems.'],
            ['id_ps' => 4, 'id_kurikulum' => 4, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu menganalisis dan memitigasi dampak lingkungan dari suatu kegiatan.', 'desc_peo_en' => 'Graduates are able to analyze and mitigate the environmental impacts of an activity.'],
            ['id_ps' => 4, 'id_kurikulum' => 4, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu menerapkan prinsip pembangunan berkelanjutan dalam rekayasa lingkungan.', 'desc_peo_en' => 'Graduates are able to apply sustainable development principles in environmental engineering.'],

            // Arsitektur (id_ps = 5)
            ['id_ps' => 5, 'id_kurikulum' => 5, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu menghasilkan rancangan arsitektur yang fungsional, estetis, dan berkonteks.', 'desc_peo_en' => 'Graduates are able to produce architectural designs that are functional, aesthetic, and contextual.'],
            ['id_ps' => 5, 'id_kurikulum' => 5, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengintegrasikan teknologi bangunan dan prinsip desain berkelanjutan.', 'desc_peo_en' => 'Graduates are able to integrate building technology and sustainable design principles.'],
            ['id_ps' => 5, 'id_kurikulum' => 5, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu berperan dalam proses perencanaan dan pengembangan lingkungan binaan.', 'desc_peo_en' => 'Graduates are able to play a role in the planning and development process of the built environment.'],

            // Teknik Kimia (id_ps = 6)
            ['id_ps' => 6, 'id_kurikulum' => 6, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan mengoperasikan proses industri kimia yang efisien dan aman.', 'desc_peo_en' => 'Graduates are able to design and operate efficient and safe chemical industry processes.'],
            ['id_ps' => 6, 'id_kurikulum' => 6, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengembangkan produk dan material baru melalui rekayasa kimia.', 'desc_peo_en' => 'Graduates are able to develop new products and materials through chemical engineering.'],
            ['id_ps' => 6, 'id_kurikulum' => 6, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu menyelesaikan masalah dalam industri proses dengan pendekatan analitis.', 'desc_peo_en' => 'Graduates are able to solve problems in the process industry with an analytical approach.'],

            // Teknologi Informasi (id_ps = 7)
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan mengembangkan solusi perangkat lunak yang andal dan aman.', 'desc_peo_en' => 'Graduates are able to design and develop reliable and secure software solutions.'],
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengelola infrastruktur teknologi informasi dan layanan data.', 'desc_peo_en' => 'Graduates are able to manage information technology infrastructure and data services.'],
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu berinovasi dan berwirausaha berbasis teknologi digital.', 'desc_peo_en' => 'Graduates are able to innovate and start businesses based on digital technology.'],
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-4', 'desc_peo_id' => 'Lulusan mampu merancang dan mengembangkan solusi perangkat lunak yang andal dan aman.', 'desc_peo_en' => 'Graduates are able to design and develop reliable and secure software solutions.'],
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-5', 'desc_peo_id' => 'Lulusan mampu mengelola infrastruktur teknologi informasi dan layanan data.', 'desc_peo_en' => 'Graduates are able to manage information technology infrastructure and data services.'],
            ['id_ps' => 7, 'id_kurikulum' => 7, 'kode_peo' => 'PEO-6', 'desc_peo_id' => 'Lulusan mampu berinovasi dan berwirausaha berbasis teknologi digital.', 'desc_peo_en' => 'Graduates are able to innovate and start businesses based on digital technology.'],

            // Teknik Elektro (id_ps = 8)
            ['id_ps' => 8, 'id_kurikulum' => 8, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu merancang dan menganalisis sistem tenaga listrik dan elektronika.', 'desc_peo_en' => 'Graduates are able to design and analyze electrical power and electronics systems.'],
            ['id_ps' => 8, 'id_kurikulum' => 8, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu mengembangkan sistem kendali, otomasi, dan telekomunikasi.', 'desc_peo_en' => 'Graduates are able to develop control, automation, and telecommunication systems.'],
            ['id_ps' => 8, 'id_kurikulum' => 8, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu beradaptasi dengan perkembangan teknologi di bidang ketenagalistrikan.', 'desc_peo_en' => 'Graduates are able to adapt to technological developments in the electricity sector.'],

            // Teknik Geologi (id_ps = 9)
            ['id_ps' => 9, 'id_kurikulum' => 9, 'kode_peo' => 'PEO-1', 'desc_peo_id' => 'Lulusan mampu melakukan eksplorasi dan evaluasi sumber daya kebumian.', 'desc_peo_en' => 'Graduates are able to explore and evaluate earth resources.'],
            ['id_ps' => 9, 'id_kurikulum' => 9, 'kode_peo' => 'PEO-2', 'desc_peo_id' => 'Lulusan mampu menerapkan prinsip geologi untuk rekayasa dan mitigasi bencana.', 'desc_peo_en' => 'Graduates are able to apply geological principles for engineering and disaster mitigation.'],
            ['id_ps' => 9, 'id_kurikulum' => 9, 'kode_peo' => 'PEO-3', 'desc_peo_id' => 'Lulusan mampu menganalisis data geologi untuk pemahaman sistem kebumian.', 'desc_peo_en' => 'Graduates are able to analyze geological data to understand earth systems.'],

            // kurikulum 2025
            // Teknik Sipil (id_ps = 1, kurikulum 2025)
            ['id_ps' => 1, 'id_kurikulum' => 10, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu merancang infrastruktur sipil berkelanjutan dengan teknologi digital dan material inovatif.', 'desc_peo_en' => '(2025) Graduates are able to design sustainable civil infrastructure with digital technology and innovative materials.'],
            ['id_ps' => 1, 'id_kurikulum' => 10, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu mengelola proyek konstruksi berbasis BIM dan prinsip lean construction.', 'desc_peo_en' => '(2025) Graduates are able to manage construction projects based on BIM and lean construction principles.'],
            ['id_ps' => 1, 'id_kurikulum' => 10, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu mengintegrasikan konsep smart city dan resilient infrastructure dalam perencanaan.', 'desc_peo_en' => '(2025) Graduates are able to integrate smart city and resilient infrastructure concepts in planning.'],

            // Teknik Pertambangan (id_ps = 2, kurikulum 2025)
            ['id_ps' => 2, 'id_kurikulum' => 11, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu menerapkan teknologi otomasi dan AI dalam operasi pertambangan berkelanjutan.', 'desc_peo_en' => '(2025) Graduates are able to apply automation and AI technology in sustainable mining operations.'],
            ['id_ps' => 2, 'id_kurikulum' => 11, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu mengimplementasikan circular economy dan rehabilitasi lingkungan pasca tambang.', 'desc_peo_en' => '(2025) Graduates are able to implement a circular economy and post-mining environmental rehabilitation.'],
            ['id_ps' => 2, 'id_kurikulum' => 11, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu melakukan analisis big data untuk optimasi ekstraksi mineral dan energi.', 'desc_peo_en' => '(2025) Graduates are able to perform big data analysis for mineral and energy extraction optimization.'],

            // Teknik Mesin (id_ps = 3, kurikulum 2025)
            ['id_ps' => 3, 'id_kurikulum' => 12, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu merancang sistem mekanikal cerdas dengan integrasi IoT dan Industry 4.0.', 'desc_peo_en' => '(2025) Graduates are able to design smart mechanical systems with IoT and Industry 4.0 integration.'],
            ['id_ps' => 3, 'id_kurikulum' => 12, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu mengembangkan teknologi energi terbarukan dan sistem propulsi ramah lingkungan.', 'desc_peo_en' => '(2025) Graduates are able to develop renewable energy technology and environmentally friendly propulsion systems.'],
            ['id_ps' => 3, 'id_kurikulum' => 12, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu menerapkan additive manufacturing dan digital twin dalam proses manufaktur.', 'desc_peo_en' => '(2025) Graduates are able to apply additive manufacturing and digital twin in the manufacturing process.'],

            // Teknik Lingkungan (id_ps = 4, kurikulum 2025)
            ['id_ps' => 4, 'id_kurikulum' => 13, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu merancang sistem pengelolaan limbah berbasis teknologi hijau dan smart monitoring.', 'desc_peo_en' => '(2025) Graduates are able to design waste management systems based on green technology and smart monitoring.'],
            ['id_ps' => 4, 'id_kurikulum' => 13, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu mengimplementasikan solusi nature-based untuk adaptasi perubahan iklim.', 'desc_peo_en' => '(2025) Graduates are able to implement nature-based solutions for climate change adaptation.'],
            ['id_ps' => 4, 'id_kurikulum' => 13, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu mengintegrasikan prinsip ekonomi sirkular dalam desain sistem lingkungan.', 'desc_peo_en' => '(2025) Graduates are able to integrate circular economy principles in environmental system design.'],

            // Arsitektur (id_ps = 5, kurikulum 2025)
            ['id_ps' => 5, 'id_kurikulum' => 14, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu menciptakan arsitektur adaptif dengan teknologi parametrik dan generative design.', 'desc_peo_en' => '(2025) Graduates are able to create adaptive architecture with parametric technology and generative design.'],
            ['id_ps' => 5, 'id_kurikulum' => 14, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu mengintegrasikan net-zero energy building dan biophilic design principles.', 'desc_peo_en' => '(2025) Graduates are able to integrate net-zero energy building and biophilic design principles.'],
            ['id_ps' => 5, 'id_kurikulum' => 14, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu merancang ruang responsif terhadap perubahan iklim dan kebutuhan komunitas.', 'desc_peo_en' => '(2025) Graduates are able to design spaces that are responsive to climate change and community needs.'],

            // Teknik Kimia (id_ps = 6, kurikulum 2025)
            ['id_ps' => 6, 'id_kurikulum' => 15, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu mengembangkan proses kimia berkelanjutan dengan teknologi green chemistry.', 'desc_peo_en' => '(2025) Graduates are able to develop sustainable chemical processes with green chemistry technology.'],
            ['id_ps' => 6, 'id_kurikulum' => 15, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu menerapkan bioengineering dan nanoteknologi untuk material masa depan.', 'desc_peo_en' => '(2025) Graduates are able to apply bioengineering and nanotechnology for future materials.'],
            ['id_ps' => 6, 'id_kurikulum' => 15, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu mengoptimalkan proses industri dengan AI dan machine learning.', 'desc_peo_en' => '(2025) Graduates are able to optimize industrial processes with AI and machine learning.'],

            // Teknologi Informasi (id_ps = 7, kurikulum 2025)
            ['id_ps' => 7, 'id_kurikulum' => 16, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu mengembangkan sistem AI, blockchain, dan quantum computing applications.', 'desc_peo_en' => '(2025) Graduates are able to develop AI systems, blockchain, and quantum computing applications.'],
            ['id_ps' => 7, 'id_kurikulum' => 16, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu merancang arsitektur cloud-native dan edge computing solutions.', 'desc_peo_en' => '(2025) Graduates are able to design cloud-native architecture and edge computing solutions.'],
            ['id_ps' => 7, 'id_kurikulum' => 16, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu memimpin transformasi digital dengan pemahaman ethical AI dan cybersecurity.', 'desc_peo_en' => '(2025) Graduates are able to lead digital transformation with an understanding of ethical AI and cybersecurity.'],

            // Teknik Elektro (id_ps = 8, kurikulum 2025)
            ['id_ps' => 8, 'id_kurikulum' => 17, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu merancang smart grid dan sistem energi terbarukan terintegrasi.', 'desc_peo_en' => '(2025) Graduates are able to design smart grids and integrated renewable energy systems.'],
            ['id_ps' => 8, 'id_kurikulum' => 17, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu mengembangkan teknologi vehicle electrification dan wireless power transfer.', 'desc_peo_en' => '(2025) Graduates are able to develop vehicle electrification and wireless power transfer technology.'],
            ['id_ps' => 8, 'id_kurikulum' => 17, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu menerapkan AI dalam sistem kendali adaptif dan predictive maintenance.', 'desc_peo_en' => '(2025) Graduates are able to apply AI in adaptive control systems and predictive maintenance.'],

            // Teknik Geologi (id_ps = 9, kurikulum 2025)
            ['id_ps' => 9, 'id_kurikulum' => 18, 'kode_peo' => '(2025)PEO-1', 'desc_peo_id' => '(2025)Lulusan mampu menggunakan remote sensing dan GIS untuk eksplorasi sumber daya berkelanjutan.', 'desc_peo_en' => '(2025) Graduates are able to use remote sensing and GIS for sustainable resource exploration.'],
            ['id_ps' => 9, 'id_kurikulum' => 18, 'kode_peo' => '(2025)PEO-2', 'desc_peo_id' => '(2025)Lulusan mampu menerapkan machine learning dalam prediksi bencana dan pemetaan geologi.', 'desc_peo_en' => '(2025) Graduates are able to apply machine learning in disaster prediction and geological mapping.'],
            ['id_ps' => 9, 'id_kurikulum' => 18, 'kode_peo' => '(2025)PEO-3', 'desc_peo_id' => '(2025)Lulusan mampu mengintegrasikan geologi dengan teknologi carbon capture dan geothermal energy.', 'desc_peo_en' => '(2025) Graduates are able to integrate geology with carbon capture and geothermal energy technology.'],
        ]);
    }
}