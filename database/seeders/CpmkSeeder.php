<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CpmkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpmk')->insert([
            // kurikulum 2020
            // Teknik Sipil (id_ps = 1)
            ['id_cpmk' => 1,  'id_kurikulum' => 1, 'id_ps' => 1, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu menganalisis gaya dan keseimbangan pada struktur statis.', 'desc_cpmk_en' => 'Able to analyze forces and equilibrium in static structures.'],
            ['id_cpmk' => 2,  'id_kurikulum' => 1, 'id_ps' => 1, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu merancang komponen dasar struktur beton bertulang sesuai standar.', 'desc_cpmk_en' => 'Able to design basic reinforced concrete structural components according to standards.'],
            ['id_cpmk' => 3,  'id_kurikulum' => 1, 'id_ps' => 1, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu menyelesaikan permasalahan aliran fluida dalam saluran terbuka dan tertutup.', 'desc_cpmk_en' => 'Able to solve fluid flow problems in open and closed channels.'],
            ['id_cpmk' => 4,  'id_kurikulum' => 1, 'id_ps' => 1, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu menerapkan prinsip manajemen untuk proyek konstruksi.', 'desc_cpmk_en' => 'Able to apply management principles for construction projects.'],
            ['id_cpmk' => 5,  'id_kurikulum' => 1, 'id_ps' => 1, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu mengidentifikasi sifat-sifat tanah untuk keperluan rekayasa pondasi.', 'desc_cpmk_en' => 'Able to identify soil properties for foundation engineering purposes.'],

            // Teknik Pertambangan (id_ps = 2)
            ['id_cpmk' => 6, 'id_kurikulum' => 2, 'id_ps' => 2, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu menjelaskan proses-proses geologi dasar dan formasi batuan.', 'desc_cpmk_en' => 'Able to explain basic geological processes and rock formations.'],
            ['id_cpmk' => 7, 'id_kurikulum' => 2, 'id_ps' => 2, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu menerapkan metode survei untuk eksplorasi deposit mineral.', 'desc_cpmk_en' => 'Able to apply survey methods for mineral deposit exploration.'],
            ['id_cpmk' => 8,  'id_kurikulum' => 2, 'id_ps' => 2, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu merencanakan operasi penambangan di permukaan.', 'desc_cpmk_en' => 'Able to plan surface mining operations.'],
            ['id_cpmk' => 9,  'id_kurikulum' => 2, 'id_ps' => 2, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu merancang sistem ventilasi untuk tambang bawah tanah.', 'desc_cpmk_en' => 'Able to design ventilation systems for underground mines.'],
            ['id_cpmk' => 10, 'id_kurikulum' => 2, 'id_ps' => 2, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu menghitung dan mengevaluasi kelayakan cadangan mineral.', 'desc_cpmk_en' => 'Able to calculate and evaluate the feasibility of mineral reserves.'],

            // Teknik Mesin (id_ps = 3)
            ['id_cpmk' => 11, 'id_kurikulum' => 3, 'id_ps' => 3, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu menerapkan hukum-hukum termodinamika pada sistem energi.', 'desc_cpmk_en' => 'Able to apply the laws of thermodynamics to energy systems.'],
            ['id_cpmk' => 12, 'id_kurikulum' => 3, 'id_ps' => 3, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu menganalisis aliran fluida dalam perpipaan dan permesinan.', 'desc_cpmk_en' => 'Able to analyze fluid flow in piping and machinery.'],
            ['id_cpmk' => 13, 'id_kurikulum' => 3, 'id_ps' => 3, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu menganalisis efisiensi pada sistem konversi energi.', 'desc_cpmk_en' => 'Able to analyze efficiency in energy conversion systems.'],
            ['id_cpmk' => 14, 'id_kurikulum' => 3, 'id_ps' => 3, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu menghitung laju perpindahan panas secara konduksi, konveksi, dan radiasi.', 'desc_cpmk_en' => 'Able to calculate heat transfer rates by conduction, convection, and radiation.'],
            ['id_cpmk' => 15, 'id_kurikulum' => 3, 'id_ps' => 3, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu merancang komponen mesin dasar dengan mempertimbangkan kekuatan material.', 'desc_cpmk_en' => 'Able to design basic machine components considering material strength.'],

            // Teknik Lingkungan (id_ps = 4)
            ['id_cpmk' => 16, 'id_kurikulum' => 4, 'id_ps' => 4, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu mengidentifikasi polutan kimia di lingkungan.', 'desc_cpmk_en' => 'Able to identify chemical pollutants in the environment.'],
            ['id_cpmk' => 17, 'id_kurikulum' => 4, 'id_ps' => 4, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu merancang unit pengolahan air bersih skala sederhana.', 'desc_cpmk_en' => 'Able to design a simple-scale clean water treatment unit.'],
            ['id_cpmk' => 18, 'id_kurikulum' => 4, 'id_ps' => 4, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu memilih teknologi yang tepat untuk pengelolaan limbah.', 'desc_cpmk_en' => 'Able to select appropriate technology for waste management.'],
            ['id_cpmk' => 19, 'id_kurikulum' => 4, 'id_ps' => 4, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu menyusun dokumen analisis dampak lingkungan.', 'desc_cpmk_en' => 'Able to compile environmental impact analysis documents.'],
            ['id_cpmk' => 20, 'id_kurikulum' => 4, 'id_ps' => 4, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu menerapkan prinsip rekayasa untuk solusi masalah lingkungan.', 'desc_cpmk_en' => 'Able to apply engineering principles for environmental problem-solving.'],
            
            // Arsitektur (id_ps = 5)
            ['id_cpmk' => 21, 'id_kurikulum' => 5, 'id_ps' => 5, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu membuat komposisi dasar bentuk dan ruang arsitektur.', 'desc_cpmk_en' => 'Able to create basic compositions of architectural form and space.'],
            ['id_cpmk' => 22, 'id_kurikulum' => 5, 'id_ps' => 5, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu mengidentifikasi karakteristik arsitektur berbasis kearifan lokal.', 'desc_cpmk_en' => 'Able to identify the characteristics of architecture based on local wisdom.'],
            ['id_cpmk' => 23, 'id_kurikulum' => 5, 'id_ps' => 5, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu memilih sistem struktur dan material yang sesuai untuk bangunan.', 'desc_cpmk_en' => 'Able to select appropriate structural systems and materials for buildings.'],
            ['id_cpmk' => 24, 'id_kurikulum' => 5, 'id_ps' => 5, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu menganalisis elemen-elemen perancangan dalam skala kota.', 'desc_cpmk_en' => 'Able to analyze design elements on an urban scale.'],
            ['id_cpmk' => 25, 'id_kurikulum' => 5, 'id_ps' => 5, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu menyusun jadwal dan estimasi biaya untuk proyek arsitektur.', 'desc_cpmk_en' => 'Able to create schedules and cost estimates for architectural projects.'],

            // Teknik Kimia (id_ps = 6)
            ['id_cpmk' => 26, 'id_kurikulum' => 6, 'id_ps' => 6, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu menyelesaikan perhitungan stoikiometri dalam reaksi kimia.', 'desc_cpmk_en' => 'Able to solve stoichiometric calculations in chemical reactions.'],
            ['id_cpmk' => 27, 'id_kurikulum' => 6, 'id_ps' => 6, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu menganalisis proses pemisahan campuran kimia.', 'desc_cpmk_en' => 'Able to analyze chemical mixture separation processes.'],
            ['id_cpmk' => 28, 'id_kurikulum' => 6, 'id_ps' => 6, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu merancang reaktor kimia sederhana.', 'desc_cpmk_en' => 'Able to design a simple chemical reactor.'],
            ['id_cpmk' => 29, 'id_kurikulum' => 6, 'id_ps' => 6, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu memilih instrumen yang tepat untuk pengukuran proses industri.', 'desc_cpmk_en' => 'Able to select the right instruments for industrial process measurement.'],
            ['id_cpmk' => 30, 'id_kurikulum' => 6, 'id_ps' => 6, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu menjelaskan aspek ekonomi dan keselamatan dalam industri kimia.', 'desc_cpmk_en' => 'Able to explain the economic and safety aspects of the chemical industry.'],

            // Teknologi Informasi (id_ps = 7)
            ['id_cpmk' => 31, 'id_kurikulum' => 7, 'id_ps' => 7, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu merancang dan mengimplementasikan algoritma untuk menyelesaikan masalah.', 'desc_cpmk_en' => 'Able to design and implement algorithms to solve problems.'],
            ['id_cpmk' => 32, 'id_kurikulum' => 7, 'id_ps' => 7, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu memilih dan menerapkan struktur data yang efisien.', 'desc_cpmk_en' => 'Able to choose and implement efficient data structures.'],
            ['id_cpmk' => 33, 'id_kurikulum' => 7, 'id_ps' => 7, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu merancang dan membuat query pada basis data relasional.', 'desc_cpmk_en' => 'Able to design and create queries on a relational database.'],
            ['id_cpmk' => 34, 'id_kurikulum' => 7, 'id_ps' => 7, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu menerapkan siklus hidup pengembangan perangkat lunak.', 'desc_cpmk_en' => 'Able to apply the software development life cycle.'],
            ['id_cpmk' => 35, 'id_kurikulum' => 7, 'id_ps' => 7, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu menerapkan algoritma dasar kecerdasan buatan.', 'desc_cpmk_en' => 'Able to implement basic artificial intelligence algorithms.'],
            ['id_cpmk' => 36, 'id_kurikulum' => 7, 'id_ps' => 7, 'nama_kode_cpmk' => 'CPMK-6',  'desc_cpmk_id' => 'Mampu menerapkan algoritma dasar kecerdasan buatan.', 'desc_cpmk_en' => 'Able to implement basic artificial intelligence algorithms.'],
            
            // Teknik Elektro (id_ps = 8)
            ['id_cpmk' => 37, 'id_kurikulum' => 8, 'id_ps' => 8, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu menganalisis rangkaian listrik arus searah (DC) dan bolak-balik (AC).', 'desc_cpmk_en' => 'Able to analyze direct current (DC) and alternating current (AC) electrical circuits.'],
            ['id_cpmk' => 38, 'id_kurikulum' => 8, 'id_ps' => 8, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu merancang rangkaian elektronika analog sederhana.', 'desc_cpmk_en' => 'Able to design simple analog electronics circuits.'],
            ['id_cpmk' => 39, 'id_kurikulum' => 8, 'id_ps' => 8, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu merancang rangkaian logika kombinasional dan sekuensial.', 'desc_cpmk_en' => 'Able to design combinational and sequential logic circuits.'],
            ['id_cpmk' => 40, 'id_kurikulum' => 8, 'id_ps' => 8, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu memprogram mikrokontroler untuk aplikasi sistem tertanam.', 'desc_cpmk_en' => 'Able to program microcontrollers for embedded system applications.'],
            ['id_cpmk' => 41, 'id_kurikulum' => 8, 'id_ps' => 8, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu menganalisis respon sistem kendali.', 'desc_cpmk_en' => 'Able to analyze the response of control systems.'],

            // Teknik Geologi (id_ps = 9)
            ['id_cpmk' => 42, 'id_kurikulum' => 9, 'id_ps' => 9, 'nama_kode_cpmk' => 'CPMK-1',  'desc_cpmk_id' => 'Mampu menjelaskan proses-proses yang membentuk bentang alam.', 'desc_cpmk_en' => 'Able to explain the processes that form landscapes.'],
            ['id_cpmk' => 43, 'id_kurikulum' => 9, 'id_ps' => 9, 'nama_kode_cpmk' => 'CPMK-2',  'desc_cpmk_id' => 'Mampu mengidentifikasi mineral pembentuk batuan.', 'desc_cpmk_en' => 'Able to identify rock-forming minerals.'],
            ['id_cpmk' => 44, 'id_kurikulum' => 9, 'id_ps' => 9, 'nama_kode_cpmk' => 'CPMK-3',  'desc_cpmk_id' => 'Mampu mengklasifikasikan jenis-jenis batuan beku, sedimen, dan metamorf.', 'desc_cpmk_en' => 'Able to classify types of igneous, sedimentary, and metamorphic rocks.'],
            ['id_cpmk' => 45, 'id_kurikulum' => 9, 'id_ps' => 9, 'nama_kode_cpmk' => 'CPMK-4',  'desc_cpmk_id' => 'Mampu menginterpretasikan struktur lipatan dan sesar pada peta geologi.', 'desc_cpmk_en' => 'Able to interpret fold and fault structures on a geological map.'],
            ['id_cpmk' => 46, 'id_kurikulum' => 9, 'id_ps' => 9, 'nama_kode_cpmk' => 'CPMK-5',  'desc_cpmk_id' => 'Mampu menilai stabilitas lereng dan pondasi dari sudut pandang geologi.', 'desc_cpmk_en' => 'Able to assess slope and foundation stability from a geological perspective.'],
        
            // kurikulum 2025
            // Teknik Sipil (id_ps = 1)
            ['id_cpmk' => 47,  'id_kurikulum' => 10, 'id_ps' => 1, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu menganalisis gaya dan keseimbangan pada struktur statis. (2025)', 'desc_cpmk_en' => 'Able to analyze forces and equilibrium in static structures. (2025)'],
            ['id_cpmk' => 48,  'id_kurikulum' => 10, 'id_ps' => 1, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu merancang komponen dasar struktur beton bertulang sesuai standar. (2025)', 'desc_cpmk_en' => 'Able to design basic reinforced concrete structural components according to standards. (2025)'],
            ['id_cpmk' => 49,  'id_kurikulum' => 10, 'id_ps' => 1, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu menyelesaikan permasalahan aliran fluida dalam saluran terbuka dan tertutup. (2025)', 'desc_cpmk_en' => 'Able to solve fluid flow problems in open and closed channels. (2025)'],
            ['id_cpmk' => 50,  'id_kurikulum' => 10, 'id_ps' => 1, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu menerapkan prinsip manajemen untuk proyek konstruksi. (2025)', 'desc_cpmk_en' => 'Able to apply management principles for construction projects. (2025)'],
            ['id_cpmk' => 51,  'id_kurikulum' => 10, 'id_ps' => 1, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu mengidentifikasi sifat-sifat tanah untuk keperluan rekayasa pondasi. (2025)', 'desc_cpmk_en' => 'Able to identify soil properties for foundation engineering purposes. (2025)'],

            // Teknik Pertambangan (id_ps = 2)
            ['id_cpmk' => 52, 'id_kurikulum' => 11, 'id_ps' => 2, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu menjelaskan proses-proses geologi dasar dan formasi batuan. (2025)', 'desc_cpmk_en' => 'Able to explain basic geological processes and rock formations. (2025)'],
            ['id_cpmk' => 53, 'id_kurikulum' => 11, 'id_ps' => 2, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu menerapkan metode survei untuk eksplorasi deposit mineral. (2025)', 'desc_cpmk_en' => 'Able to apply survey methods for mineral deposit exploration. (2025)'],
            ['id_cpmk' => 54,  'id_kurikulum' => 11, 'id_ps' => 2, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu merencanakan operasi penambangan di permukaan. (2025)', 'desc_cpmk_en' => 'Able to plan surface mining operations. (2025)'],
            ['id_cpmk' => 55,  'id_kurikulum' => 11, 'id_ps' => 2, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu merancang sistem ventilasi untuk tambang bawah tanah. (2025)', 'desc_cpmk_en' => 'Able to design ventilation systems for underground mines. (2025)'],
            ['id_cpmk' => 56, 'id_kurikulum' => 11, 'id_ps' => 2, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu menghitung dan mengevaluasi kelayakan cadangan mineral. (2025)', 'desc_cpmk_en' => 'Able to calculate and evaluate the feasibility of mineral reserves. (2025)'],

            // Teknik Mesin (id_ps = 3)
            ['id_cpmk' => 57, 'id_kurikulum' => 12, 'id_ps' => 3, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu menerapkan hukum-hukum termodinamika pada sistem energi. (2025)', 'desc_cpmk_en' => 'Able to apply the laws of thermodynamics to energy systems. (2025)'],
            ['id_cpmk' => 58, 'id_kurikulum' => 12, 'id_ps' => 3, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu menganalisis aliran fluida dalam perpipaan dan permesinan. (2025)', 'desc_cpmk_en' => 'Able to analyze fluid flow in piping and machinery. (2025)'],
            ['id_cpmk' => 59, 'id_kurikulum' => 12, 'id_ps' => 3, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu menganalisis efisiensi pada sistem konversi energi. (2025)', 'desc_cpmk_en' => 'Able to analyze efficiency in energy conversion systems. (2025)'],
            ['id_cpmk' => 60, 'id_kurikulum' => 12, 'id_ps' => 3, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu menghitung laju perpindahan panas secara konduksi, konveksi, dan radiasi. (2025)', 'desc_cpmk_en' => 'Able to calculate heat transfer rates by conduction, convection, and radiation. (2025)'],
            ['id_cpmk' => 61, 'id_kurikulum' => 12, 'id_ps' => 3, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu merancang komponen mesin dasar dengan mempertimbangkan kekuatan material. (2025)', 'desc_cpmk_en' => 'Able to design basic machine components considering material strength. (2025)'],

            // Teknik Lingkungan (id_ps = 4)
            ['id_cpmk' => 62, 'id_kurikulum' => 13, 'id_ps' => 4, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu mengidentifikasi polutan kimia di lingkungan. (2025)', 'desc_cpmk_en' => 'Able to identify chemical pollutants in the environment. (2025)'],
            ['id_cpmk' => 63, 'id_kurikulum' => 13, 'id_ps' => 4, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu merancang unit pengolahan air bersih skala sederhana. (2025)', 'desc_cpmk_en' => 'Able to design a simple-scale clean water treatment unit. (2025)'],
            ['id_cpmk' => 64, 'id_kurikulum' => 13, 'id_ps' => 4, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu memilih teknologi yang tepat untuk pengelolaan limbah. (2025)', 'desc_cpmk_en' => 'Able to select appropriate technology for waste management. (2025)'],
            ['id_cpmk' => 65, 'id_kurikulum' => 13, 'id_ps' => 4, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu menyusun dokumen analisis dampak lingkungan. (2025)', 'desc_cpmk_en' => 'Able to compile environmental impact analysis documents. (2025)'],
            ['id_cpmk' => 66, 'id_kurikulum' => 13, 'id_ps' => 4, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu menerapkan prinsip rekayasa untuk solusi masalah lingkungan. (2025)', 'desc_cpmk_en' => 'Able to apply engineering principles for environmental problem-solving. (2025)'],

            // Arsitektur (id_ps = 5)
            ['id_cpmk' => 67, 'id_kurikulum' => 14, 'id_ps' => 5, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu membuat komposisi dasar bentuk dan ruang arsitektur. (2025)', 'desc_cpmk_en' => 'Able to create basic compositions of architectural form and space. (2025)'],
            ['id_cpmk' => 68, 'id_kurikulum' => 14, 'id_ps' => 5, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu mengidentifikasi karakteristik arsitektur berbasis kearifan lokal. (2025)', 'desc_cpmk_en' => 'Able to identify the characteristics of architecture based on local wisdom. (2025)'],
            ['id_cpmk' => 69, 'id_kurikulum' => 14, 'id_ps' => 5, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu memilih sistem struktur dan material yang sesuai untuk bangunan. (2025)', 'desc_cpmk_en' => 'Able to select appropriate structural systems and materials for buildings. (2025)'],
            ['id_cpmk' => 70, 'id_kurikulum' => 14, 'id_ps' => 5, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu menganalisis elemen-elemen perancangan dalam skala kota. (2025)', 'desc_cpmk_en' => 'Able to analyze design elements on an urban scale. (2025)'],
            ['id_cpmk' => 71, 'id_kurikulum' => 14, 'id_ps' => 5, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu menyusun jadwal dan estimasi biaya untuk proyek arsitektur. (2025)', 'desc_cpmk_en' => 'Able to create schedules and cost estimates for architectural projects. (2025)'],

            // Teknik Kimia (id_ps = 6)
            ['id_cpmk' => 72, 'id_kurikulum' => 15, 'id_ps' => 6, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu menyelesaikan perhitungan stoikiometri dalam reaksi kimia. (2025)', 'desc_cpmk_en' => 'Able to solve stoichiometric calculations in chemical reactions. (2025)'],
            ['id_cpmk' => 73, 'id_kurikulum' => 15, 'id_ps' => 6, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu menganalisis proses pemisahan campuran kimia. (2025)', 'desc_cpmk_en' => 'Able to analyze chemical mixture separation processes. (2025)'],
            ['id_cpmk' => 74, 'id_kurikulum' => 15, 'id_ps' => 6, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu merancang reaktor kimia sederhana. (2025)', 'desc_cpmk_en' => 'Able to design a simple chemical reactor. (2025)'],
            ['id_cpmk' => 75, 'id_kurikulum' => 15, 'id_ps' => 6, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu memilih instrumen yang tepat untuk pengukuran proses industri. (2025)', 'desc_cpmk_en' => 'Able to select the right instruments for industrial process measurement. (2025)'],
            ['id_cpmk' => 76, 'id_kurikulum' => 15, 'id_ps' => 6, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu menjelaskan aspek ekonomi dan keselamatan dalam industri kimia. (2025)', 'desc_cpmk_en' => 'Able to explain the economic and safety aspects of the chemical industry. (2025)'],

            // Teknologi Informasi (id_ps = 7)
            ['id_cpmk' => 77, 'id_kurikulum' => 16, 'id_ps' => 7, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu merancang dan mengimplementasikan algoritma untuk menyelesaikan masalah. (2025)', 'desc_cpmk_en' => 'Able to design and implement algorithms to solve problems. (2025)'],
            ['id_cpmk' => 78, 'id_kurikulum' => 16, 'id_ps' => 7, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu memilih dan menerapkan struktur data yang efisien. (2025)', 'desc_cpmk_en' => 'Able to choose and implement efficient data structures. (2025)'],
            ['id_cpmk' => 79, 'id_kurikulum' => 16, 'id_ps' => 7, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu merancang dan membuat query pada basis data relasional. (2025)', 'desc_cpmk_en' => 'Able to design and create queries on a relational database. (2025)'],
            ['id_cpmk' => 80, 'id_kurikulum' => 16, 'id_ps' => 7, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu menerapkan siklus hidup pengembangan perangkat lunak. (2025)', 'desc_cpmk_en' => 'Able to apply the software development life cycle. (2025)'],
            ['id_cpmk' => 81, 'id_kurikulum' => 16, 'id_ps' => 7, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu menerapkan algoritma dasar kecerdasan buatan. (2025)', 'desc_cpmk_en' => 'Able to implement basic artificial intelligence algorithms. (2025)'],

            // Teknik Elektro (id_ps = 8)
            ['id_cpmk' => 82, 'id_kurikulum' => 17, 'id_ps' => 8, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu menganalisis rangkaian listrik arus searah (DC) dan bolak-balik (AC). (2025)', 'desc_cpmk_en' => 'Able to analyze direct current (DC) and alternating current (AC) electrical circuits. (2025)'],
            ['id_cpmk' => 83, 'id_kurikulum' => 17, 'id_ps' => 8, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu merancang rangkaian elektronika analog sederhana. (2025)', 'desc_cpmk_en' => 'Able to design simple analog electronics circuits. (2025)'],
            ['id_cpmk' => 84, 'id_kurikulum' => 17, 'id_ps' => 8, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu merancang rangkaian logika kombinasional dan sekuensial. (2025)', 'desc_cpmk_en' => 'Able to design combinational and sequential logic circuits. (2025)'],
            ['id_cpmk' => 85, 'id_kurikulum' => 17, 'id_ps' => 8, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu memprogram mikrokontroler untuk aplikasi sistem tertanam. (2025)', 'desc_cpmk_en' => 'Able to program microcontrollers for embedded system applications. (2025)'],
            ['id_cpmk' => 86, 'id_kurikulum' => 17, 'id_ps' => 8, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu menganalisis respon sistem kendali. (2025)', 'desc_cpmk_en' => 'Able to analyze the response of control systems. (2025)'],

            // Teknik Geologi (id_ps = 9)
            ['id_cpmk' => 87, 'id_kurikulum' => 18, 'id_ps' => 9, 'nama_kode_cpmk' => '(2025)CPMK-1',  'desc_cpmk_id' => 'Mampu menjelaskan proses-proses yang membentuk bentang alam. (2025)', 'desc_cpmk_en' => 'Able to explain the processes that form landscapes. (2025)'],
            ['id_cpmk' => 88, 'id_kurikulum' => 18, 'id_ps' => 9, 'nama_kode_cpmk' => '(2025)CPMK-2',  'desc_cpmk_id' => 'Mampu mengidentifikasi mineral pembentuk batuan. (2025)', 'desc_cpmk_en' => 'Able to identify rock-forming minerals. (2025)'],
            ['id_cpmk' => 89, 'id_kurikulum' => 18, 'id_ps' => 9, 'nama_kode_cpmk' => '(2025)CPMK-3',  'desc_cpmk_id' => 'Mampu mengklasifikasikan jenis-jenis batuan beku, sedimen, dan metamorf. (2025)', 'desc_cpmk_en' => 'Able to classify types of igneous, sedimentary, and metamorphic rocks. (2025)'],
            ['id_cpmk' => 90, 'id_kurikulum' => 18, 'id_ps' => 9, 'nama_kode_cpmk' => '(2025)CPMK-4',  'desc_cpmk_id' => 'Mampu menginterpretasikan struktur lipatan dan sesar pada peta geologi. (2025)', 'desc_cpmk_en' => 'Able to interpret fold and fault structures on a geological map. (2025)'],
            ['id_cpmk' => 91, 'id_kurikulum' => 18, 'id_ps' => 9, 'nama_kode_cpmk' => '(2025)CPMK-5',  'desc_cpmk_id' => 'Mampu menilai stabilitas lereng dan pondasi dari sudut pandang geologi. (2025)', 'desc_cpmk_en' => 'Able to assess slope and foundation stability from a geological perspective. (2025)'],

        ]);
    }
}