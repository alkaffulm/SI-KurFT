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
            // PS 1
            ['id_cpl' => 1, 'id_kurikulum' => 1, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu menganalisis kebutuhan rekayasa', 'desc_cpl_en' => 'Able to analyze engineering needs'],
            ['id_cpl' => 2, 'id_kurikulum' => 1, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu merancang sistem teknik', 'desc_cpl_en' => 'Able to design engineering systems'],
            ['id_cpl' => 3, 'id_kurikulum' => 1, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 1, 'desc_cpl_id' => 'Mampu menggunakan perangkat teknik modern', 'desc_cpl_en' => 'Able to use modern engineering tools'],

            // PS 2
            ['id_cpl' => 4, 'id_kurikulum' => 2, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengevaluasi proses pertambangan', 'desc_cpl_en' => 'Able to evaluate mining processes'],
            ['id_cpl' => 5, 'id_kurikulum' => 2, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengelola keselamatan tambang', 'desc_cpl_en' => 'Able to manage mine safety'],
            ['id_cpl' => 6, 'id_kurikulum' => 2, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 2, 'desc_cpl_id' => 'Mampu mengoperasikan alat berat tambang', 'desc_cpl_en' => 'Able to operate heavy mining equipment'],

            // PS 3
            ['id_cpl' => 7, 'id_kurikulum' => 3, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu merancang sistem mekanis', 'desc_cpl_en' => 'Able to design mechanical systems'],
            ['id_cpl' => 8, 'id_kurikulum' => 3, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu melakukan analisis termodinamika', 'desc_cpl_en' => 'Able to perform thermodynamic analysis'],
            ['id_cpl' => 9, 'id_kurikulum' => 3, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 3, 'desc_cpl_id' => 'Mampu menggunakan software teknik mesin', 'desc_cpl_en' => 'Able to use mechanical engineering software'],

            // PS 4
            ['id_cpl' => 10, 'id_kurikulum' => 4, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu mengelola limbah secara berkelanjutan', 'desc_cpl_en' => 'Able to manage waste sustainably'],
            ['id_cpl' => 11, 'id_kurikulum' => 4, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu menerapkan teknologi pengolahan air', 'desc_cpl_en' => 'Able to apply water treatment technology'],
            ['id_cpl' => 12, 'id_kurikulum' => 4, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 4, 'desc_cpl_id' => 'Mampu melakukan audit lingkungan', 'desc_cpl_en' => 'Able to conduct environmental audits'],

            // PS 5
            ['id_cpl' => 13, 'id_kurikulum' => 5, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu mendesain bangunan yang estetis dan fungsional', 'desc_cpl_en' => 'Able to design aesthetic and functional buildings'],
            ['id_cpl' => 14, 'id_kurikulum' => 5, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu mengintegrasikan nilai budaya dalam desain', 'desc_cpl_en' => 'Able to integrate cultural values in design'],
            ['id_cpl' => 15, 'id_kurikulum' => 5, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 5, 'desc_cpl_id' => 'Mampu menggunakan perangkat lunak arsitektur', 'desc_cpl_en' => 'Able to use architectural software'],

            // PS 6
            ['id_cpl' => 16, 'id_kurikulum' => 6, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu menganalisis proses reaksi kimia', 'desc_cpl_en' => 'Able to analyze chemical reaction processes'],
            ['id_cpl' => 17, 'id_kurikulum' => 6, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu mengoperasikan alat industri kimia', 'desc_cpl_en' => 'Able to operate chemical industry equipment'],
            ['id_cpl' => 18, 'id_kurikulum' => 6, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 6, 'desc_cpl_id' => 'Mampu merancang instalasi kimia', 'desc_cpl_en' => 'Able to design chemical installations'],

            // PS 7
            ['id_cpl' => 19, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan prinsip matematika, statistika, dan logika komputasi untuk menganalisis, memodelkan, serta menyelesaikan masalah berbasis teknologi informasi.', 'desc_cpl_en' => 'Able to apply principles of mathematics, statistics, and computational logic to analyze, model, and solve information technology–based problems.'],
            ['id_cpl' => 20, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengidentifikasi kebutuhan pemangku kepentingan serta merancang, membangun, mengintegrasikan, dan mengevaluasi sistem komputasi yang memenuhi aspek fungsional, keamanan, keandalan, sesuai dengan batasan sumber daya organisasi.', 'desc_cpl_en' => 'Able to identify stakeholder needs and to design, build, integrate, and evaluate computing systems that meet functional, security, and reliability requirements while adhering to organizational resource constraints.'],
            ['id_cpl' => 21, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengkonfigurasi, mengelola, dan mengintegrasikan infrastruktur jaringan, sistem operasi, serta layanan komputasi awan untuk mendukung kinerja organisasi.', 'desc_cpl_en' => 'Able to configure, manage, and integrate network infrastructure, operating systems, and cloud computing services to support organizational performance.'],
            // ['id_cpl' => 22, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-4', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan prinsip keamanan siber dan manajemen risiko untuk melindungi data, aplikasi, dan infrastruktur teknologi informasi.', 'desc_cpl_en' => 'Able to apply cybersecurity principles and risk management to protect data, applications, and information technology infrastructure.'],
            // ['id_cpl' => 23, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-5', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengelola layanan, proyek, dan sumber daya teknologi informasi berdasarkan standar tata kelola dan praktik terbaik industri untuk mendukung tujuan organisasi.', 'desc_cpl_en' => 'Able to manage information technology services, projects, and resources based on governance standards and industry best practices to support organizational goals.'],
            // ['id_cpl' => 24, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-6', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengolah, menganalisis, dan memvisualisasikan data untuk menghasilkan wawasan yang mendukung pengambilan keputusan berbasis pengetahuan (data-driven decision making).', 'desc_cpl_en' => 'Able to process, analyze, and visualize data to generate insights that support knowledge-based (data-driven) decision making.'],
            // ['id_cpl' => 25, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-7', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu merancang dan memvalidasi pengalaman pengguna yang efektif, inklusif, dan inovatif melalui penerapan prinsip HCI dengan mempertimbangkan estetika, empati, dan konteks penggunaan.', 'desc_cpl_en' => 'Able to design and validate effective, inclusive, and innovative user experiences through the application of HCI principles, with consideration for aesthetics, empathy, and context of use.'],
            // ['id_cpl' => 26, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-8', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu berkomunikasi secara efektif, bekerja sama dalam tim multidisiplin, serta menunjukkan sikap profesional, etis, tangguh, dan bertanggung jawab terhadap masyarakat dan lingkungan, khususnya lingkungan lahan basah.', 'desc_cpl_en' => 'Able to communicate effectively, collaborate within multidisciplinary teams, and demonstrate professional, ethical, resilient, and responsible behavior toward society and the environment, particularly wetland ecosystems.'],            
            // ['id_cpl' => 27, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-9', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu mengembangkan diri dan beradaptasi terhadap perkembangan ilmu pengetahuan, teknologi, serta praktik profesional di bidang teknologi informasi secara berkelanjutan melalui pembelajaran sepanjang hayat dan semangat kewirausahaan serta nilai kejiwaan WASAKA.', 'desc_cpl_en' => 'Able to develop oneself and adapt to advancements in science, technology, and professional practices in the field of information technology through continuous lifelong learning, an entrepreneurial mindset, and the WASAKA values.'],
            
            // ['id_cpl' => 28, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-10', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan konsep dan teori dasar ilmu komputer, termasuk algoritma, struktur data, teori komputasi, sistem operasi, serta arsitektur komputer, sebagai dasar perancangan dan penerapan solusi berbasis teknologi informasi ', 'desc_cpl_en' => 'Able to apply basic concepts and theories of computer science, including algorithms, data structures, computation theory, operating systems, and computer architecture, as the foundation for designing and implementing information technology-based solutions'],
            // ['id_cpl' => 29, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-11', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan prinsip-prinsip rekayasa perangkat lunak, desain interaksi, dan manajemen proyek, serta metodologi integrasi sistem untuk mendukung pengembangan, pengujian, dan pemeliharaan sistem informasi yang efektif dan berorientasi pengguna ', 'desc_cpl_en' => 'Able to apply software engineering principles, interaction design, and project management, as well as system integration methodologies to support the development, testing, and maintenance of effective and user-oriented information systems'],
            // ['id_cpl' => 30, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-12', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan konsep dasar pengolahan data, statistik, data mining, visualisasi data, serta prinsip dasar kecerdasan buatan dan pembelajaran mesin sebagai landasan untuk pengambilan keputusan berbasis data ', 'desc_cpl_en' => 'Able to apply basic concepts of data processing, statistics, data mining, data visualization, as well as basic principles of artificial intelligence and machine learning as the foundation for data-driven decision making'],
            // ['id_cpl' => 31, 'id_kurikulum' => 7, 'nama_kode_cpl' => 'CPL-13', 'id_ps' => 7, 'desc_cpl_id' => 'Mampu menerapkan teori jaringan komputer, protokol komunikasi, prinsip keamanan informasi, manajemen risiko TI, serta kebijakan dan regulasi perlindungan data yang berlaku dalam bidang teknologi informasi', 'desc_cpl_en' => 'Able to apply computer network theory, communication protocols, information security principles, IT risk management, as well as data protection policies and regulations applicable in the field of information technology'],

            // PS 8
            ['id_cpl' => 32, 'id_kurikulum' => 8, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu merancang sistem kontrol elektronik', 'desc_cpl_en' => 'Able to design electronic control systems'],
            ['id_cpl' => 33, 'id_kurikulum' => 8, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu melakukan analisis sinyal digital', 'desc_cpl_en' => 'Able to perform digital signal analysis'],
            ['id_cpl' => 34, 'id_kurikulum' => 8, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 8, 'desc_cpl_id' => 'Mampu menggunakan mikrokontroler dalam sistem', 'desc_cpl_en' => 'Able to use microcontrollers in systems'],

            // PS 9
            ['id_cpl' => 35, 'id_kurikulum' => 9, 'nama_kode_cpl' => 'CPL-1', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu melakukan pemetaan geologi', 'desc_cpl_en' => 'Able to perform geological mapping'],
            ['id_cpl' => 36, 'id_kurikulum' => 9, 'nama_kode_cpl' => 'CPL-2', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu menganalisis struktur batuan', 'desc_cpl_en' => 'Able to analyze rock structures'],
            ['id_cpl' => 37, 'id_kurikulum' => 9, 'nama_kode_cpl' => 'CPL-3', 'id_ps' => 9, 'desc_cpl_id' => 'Mampu melakukan interpretasi data geofisika', 'desc_cpl_en' => 'Able to interpret geophysical data'],
       

            // kurikulum 2025
            // PS 1
            ['id_cpl' => 38, 'id_kurikulum' => 10, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 1, 'desc_cpl_id' => '(2025)Mampu menganalisis kebutuhan rekayasa', 'desc_cpl_en' => '(2025)Able to analyze engineering needs'],
            ['id_cpl' => 39, 'id_kurikulum' => 10, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 1, 'desc_cpl_id' => '(2025)Mampu merancang sistem teknik', 'desc_cpl_en' => '(2025)Able to design engineering systems'],
            ['id_cpl' => 40, 'id_kurikulum' => 10, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 1, 'desc_cpl_id' => '(2025)Mampu menggunakan perangkat teknik modern', 'desc_cpl_en' => '(2025)Able to use modern engineering tools'],

            // PS 2
            ['id_cpl' => 41, 'id_kurikulum' => 11, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 2, 'desc_cpl_id' => '(2025)Mampu mengevaluasi proses pertambangan', 'desc_cpl_en' => '(2025)Able to evaluate mining processes'],
            ['id_cpl' => 42, 'id_kurikulum' => 11, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 2, 'desc_cpl_id' => '(2025)Mampu mengelola keselamatan tambang', 'desc_cpl_en' => '(2025)Able to manage mine safety'],
            ['id_cpl' => 43, 'id_kurikulum' => 11, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 2, 'desc_cpl_id' => '(2025)Mampu mengoperasikan alat berat tambang', 'desc_cpl_en' => '(2025)Able to operate heavy mining equipment'],

            // PS 3
            ['id_cpl' => 44, 'id_kurikulum' => 12, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 3, 'desc_cpl_id' => '(2025)Mampu merancang sistem mekanis', 'desc_cpl_en' => '(2025)Able to design mechanical systems'],
            ['id_cpl' => 45, 'id_kurikulum' => 12, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 3, 'desc_cpl_id' => '(2025)Mampu melakukan analisis termodinamika', 'desc_cpl_en' => '(2025)Able to perform thermodynamic analysis'],
            ['id_cpl' => 46, 'id_kurikulum' => 12, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 3, 'desc_cpl_id' => '(2025)Mampu menggunakan software teknik mesin', 'desc_cpl_en' => '(2025)Able to use mechanical engineering software'],

            // PS 4
            ['id_cpl' => 47, 'id_kurikulum' => 13, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 4, 'desc_cpl_id' => '(2025)Mampu mengelola limbah secara berkelanjutan', 'desc_cpl_en' => '(2025)Able to manage waste sustainably'],
            ['id_cpl' => 48, 'id_kurikulum' => 13, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 4, 'desc_cpl_id' => '(2025)Mampu menerapkan teknologi pengolahan air', 'desc_cpl_en' => '(2025)Able to apply water treatment technology'],
            ['id_cpl' => 49, 'id_kurikulum' => 13, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 4, 'desc_cpl_id' => '(2025)Mampu melakukan audit lingkungan', 'desc_cpl_en' => '(2025)Able to conduct environmental audits'],

            // PS 5
            ['id_cpl' => 50, 'id_kurikulum' => 14, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 5, 'desc_cpl_id' => '(2025)Mampu mendesain bangunan yang estetis dan fungsional', 'desc_cpl_en' => '(2025)Able to design aesthetic and functional buildings'],
            ['id_cpl' => 51, 'id_kurikulum' => 14, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 5, 'desc_cpl_id' => '(2025)Mampu mengintegrasikan nilai budaya dalam desain', 'desc_cpl_en' => '(2025)Able to integrate cultural values in design'],
            ['id_cpl' => 52, 'id_kurikulum' => 14, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 5, 'desc_cpl_id' => '(2025)Mampu menggunakan perangkat lunak arsitektur', 'desc_cpl_en' => '(2025)Able to use architectural software'],

            // PS 6
            ['id_cpl' => 53, 'id_kurikulum' => 15, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 6, 'desc_cpl_id' => '(2025)Mampu menganalisis proses reaksi kimia', 'desc_cpl_en' => '(2025)Able to analyze chemical reaction processes'],
            ['id_cpl' => 54, 'id_kurikulum' => 15, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 6, 'desc_cpl_id' => '(2025)Mampu mengoperasikan alat industri kimia', 'desc_cpl_en' => '(2025)Able to operate chemical industry equipment'],
            ['id_cpl' => 55, 'id_kurikulum' => 15, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 6, 'desc_cpl_id' => '(2025)Mampu merancang instalasi kimia', 'desc_cpl_en' => '(2025)Able to design chemical installations'],

            // PS 7
            ['id_cpl' => 56, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => '(2025)Able to build software applications'],
            ['id_cpl' => 57, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu mengelola data secara efisien', 'desc_cpl_en' => '(2025)Able to manage data efficiently'],
            ['id_cpl' => 58, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => '(2025)Able to apply artificial intelligence'],
            // ['id_cpl' => 59, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-4', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu membangun aplikasi perangkat lunak', 'desc_cpl_en' => '(2025)Able to build software applications'],
            // ['id_cpl' => 60, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-5', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu mengelola data secara efisien', 'desc_cpl_en' => '(2025)Able to manage data efficiently'],
            // ['id_cpl' => 61, 'id_kurikulum' => 16, 'nama_kode_cpl' => '(2025)CPL-6', 'id_ps' => 7, 'desc_cpl_id' => '(2025)Mampu menerapkan kecerdasan buatan', 'desc_cpl_en' => '(2025)Able to apply artificial intelligence'],

            // // PS 8
            // ['id_cpl' => 62, 'id_kurikulum' => 17, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 8, 'desc_cpl_id' => '(2025)Mampu merancang sistem kontrol elektronik', 'desc_cpl_en' => '(2025)Able to design electronic control systems'],
            // ['id_cpl' => 63, 'id_kurikulum' => 17, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 8, 'desc_cpl_id' => '(2025)Mampu melakukan analisis sinyal digital', 'desc_cpl_en' => '(2025)Able to perform digital signal analysis'],
            // ['id_cpl' => 64, 'id_kurikulum' => 17, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 8, 'desc_cpl_id' => '(2025)Mampu menggunakan mikrokontroler dalam sistem', 'desc_cpl_en' => '(2025)Able to use microcontrollers in systems'],

            // // PS 9
            // ['id_cpl' => 65, 'id_kurikulum' => 18, 'nama_kode_cpl' => '(2025)CPL-1', 'id_ps' => 9, 'desc_cpl_id' => '(2025)Mampu melakukan pemetaan geologi', 'desc_cpl_en' => '(2025)Able to perform geological mapping'],
            // ['id_cpl' => 66, 'id_kurikulum' => 18, 'nama_kode_cpl' => '(2025)CPL-2', 'id_ps' => 9, 'desc_cpl_id' => '(2025)Mampu menganalisis struktur batuan', 'desc_cpl_en' => '(2025)Able to analyze rock structures'],
            // ['id_cpl' => 67, 'id_kurikulum' => 18, 'nama_kode_cpl' => '(2025)CPL-3', 'id_ps' => 9, 'desc_cpl_id' => '(2025)Mampu melakukan interpretasi data geofisika', 'desc_cpl_en' => '(2025)Able to interpret geophysical data'],
       
       
       
        ]);
    }
}