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
            // Teknik Sipil
            ['id_cpmk' => 1, 'id_mk' => 1, 'nama_kode_cpmk' => 'CPMK-1', 'kode_cpmk' => 1, 'desc_cpmk_id' => 'Mampu menganalisis gaya dan keseimbangan pada struktur statis.', 'desc_cpmk_en' => 'Able to analyze forces and equilibrium in static structures.'],
            ['id_cpmk' => 2, 'id_mk' => 2, 'nama_kode_cpmk' => 'CPMK-2', 'kode_cpmk' => 2, 'desc_cpmk_id' => 'Mampu merancang komponen dasar struktur beton bertulang sesuai standar.', 'desc_cpmk_en' => 'Able to design basic reinforced concrete structural components according to standards.'],
            ['id_cpmk' => 3, 'id_mk' => 3, 'nama_kode_cpmk' => 'CPMK-3', 'kode_cpmk' => 3, 'desc_cpmk_id' => 'Mampu menyelesaikan permasalahan aliran fluida dalam saluran terbuka dan tertutup.', 'desc_cpmk_en' => 'Able to solve fluid flow problems in open and closed channels.'],
            ['id_cpmk' => 4, 'id_mk' => 4, 'nama_kode_cpmk' => 'CPMK-4', 'kode_cpmk' => 4, 'desc_cpmk_id' => 'Mampu menerapkan prinsip manajemen untuk proyek konstruksi.', 'desc_cpmk_en' => 'Able to apply management principles for construction projects.'],
            ['id_cpmk' => 5, 'id_mk' => 5, 'nama_kode_cpmk' => 'CPMK-5', 'kode_cpmk' => 5, 'desc_cpmk_id' => 'Mampu mengidentifikasi sifat-sifat tanah untuk keperluan rekayasa pondasi.', 'desc_cpmk_en' => 'Able to identify soil properties for foundation engineering purposes.'],

            // Teknik Pertambangan
            ['id_cpmk' => 6, 'id_mk' => 6, 'nama_kode_cpmk' => 'CPMK-6', 'kode_cpmk' => 6, 'desc_cpmk_id' => 'Mampu menjelaskan proses-proses geologi dasar dan formasi batuan.', 'desc_cpmk_en' => 'Able to explain basic geological processes and rock formations.'],
            ['id_cpmk' => 7, 'id_mk' => 7, 'nama_kode_cpmk' => 'CPMK-7', 'kode_cpmk' => 7, 'desc_cpmk_id' => 'Mampu menerapkan metode survei untuk eksplorasi deposit mineral.', 'desc_cpmk_en' => 'Able to apply survey methods for mineral deposit exploration.'],
            ['id_cpmk' => 8, 'id_mk' => 8, 'nama_kode_cpmk' => 'CPMK-8', 'kode_cpmk' => 8, 'desc_cpmk_id' => 'Mampu merencanakan operasi penambangan di permukaan.', 'desc_cpmk_en' => 'Able to plan surface mining operations.'],
            ['id_cpmk' => 9, 'id_mk' => 9, 'nama_kode_cpmk' => 'CPMK-9', 'kode_cpmk' => 9, 'desc_cpmk_id' => 'Mampu merancang sistem ventilasi untuk tambang bawah tanah.', 'desc_cpmk_en' => 'Able to design ventilation systems for underground mines.'],
            ['id_cpmk' => 10, 'id_mk' => 10, 'nama_kode_cpmk' => 'CPMK-10', 'kode_cpmk' => 10, 'desc_cpmk_id' => 'Mampu menghitung dan mengevaluasi kelayakan cadangan mineral.', 'desc_cpmk_en' => 'Able to calculate and evaluate the feasibility of mineral reserves.'],

            // Teknik Mesin
            ['id_cpmk' => 11, 'id_mk' => 11, 'nama_kode_cpmk' => 'CPMK-11', 'kode_cpmk' => 11, 'desc_cpmk_id' => 'Mampu menerapkan hukum-hukum termodinamika pada sistem energi.', 'desc_cpmk_en' => 'Able to apply the laws of thermodynamics to energy systems.'],
            ['id_cpmk' => 12, 'id_mk' => 12, 'nama_kode_cpmk' => 'CPMK-12', 'kode_cpmk' => 12, 'desc_cpmk_id' => 'Mampu menganalisis aliran fluida dalam perpipaan dan permesinan.', 'desc_cpmk_en' => 'Able to analyze fluid flow in piping and machinery.'],
            ['id_cpmk' => 13, 'id_mk' => 13, 'nama_kode_cpmk' => 'CPMK-13', 'kode_cpmk' => 13, 'desc_cpmk_id' => 'Mampu menganalisis efisiensi pada sistem konversi energi.', 'desc_cpmk_en' => 'Able to analyze efficiency in energy conversion systems.'],
            ['id_cpmk' => 14, 'id_mk' => 14, 'nama_kode_cpmk' => 'CPMK-14', 'kode_cpmk' => 14, 'desc_cpmk_id' => 'Mampu menghitung laju perpindahan panas secara konduksi, konveksi, dan radiasi.', 'desc_cpmk_en' => 'Able to calculate heat transfer rates by conduction, convection, and radiation.'],
            ['id_cpmk' => 15, 'id_mk' => 15, 'nama_kode_cpmk' => 'CPMK-15', 'kode_cpmk' => 15, 'desc_cpmk_id' => 'Mampu merancang komponen mesin dasar dengan mempertimbangkan kekuatan material.', 'desc_cpmk_en' => 'Able to design basic machine components considering material strength.'],

            // Teknik Lingkungan
            ['id_cpmk' => 16, 'id_mk' => 16, 'nama_kode_cpmk' => 'CPMK-16', 'kode_cpmk' => 16, 'desc_cpmk_id' => 'Mampu mengidentifikasi polutan kimia di lingkungan.', 'desc_cpmk_en' => 'Able to identify chemical pollutants in the environment.'],
            ['id_cpmk' => 17, 'id_mk' => 17, 'nama_kode_cpmk' => 'CPMK-17', 'kode_cpmk' => 17, 'desc_cpmk_id' => 'Mampu merancang unit pengolahan air bersih skala sederhana.', 'desc_cpmk_en' => 'Able to design a simple-scale clean water treatment unit.'],
            ['id_cpmk' => 18, 'id_mk' => 18, 'nama_kode_cpmk' => 'CPMK-18', 'kode_cpmk' => 18, 'desc_cpmk_id' => 'Mampu memilih teknologi yang tepat untuk pengelolaan limbah.', 'desc_cpmk_en' => 'Able to select appropriate technology for waste management.'],
            ['id_cpmk' => 19, 'id_mk' => 19, 'nama_kode_cpmk' => 'CPMK-19', 'kode_cpmk' => 19, 'desc_cpmk_id' => 'Mampu menyusun dokumen analisis dampak lingkungan.', 'desc_cpmk_en' => 'Able to compile environmental impact analysis documents.'],
            ['id_cpmk' => 20, 'id_mk' => 20, 'nama_kode_cpmk' => 'CPMK-20', 'kode_cpmk' => 20, 'desc_cpmk_id' => 'Mampu menerapkan prinsip rekayasa untuk solusi masalah lingkungan.', 'desc_cpmk_en' => 'Able to apply engineering principles for environmental problem-solving.'],
            
            // Arsitektur
            ['id_cpmk' => 21, 'id_mk' => 21, 'nama_kode_cpmk' => 'CPMK-21', 'kode_cpmk' => 21, 'desc_cpmk_id' => 'Mampu membuat komposisi dasar bentuk dan ruang arsitektur.', 'desc_cpmk_en' => 'Able to create basic compositions of architectural form and space.'],
            ['id_cpmk' => 22, 'id_mk' => 22, 'nama_kode_cpmk' => 'CPMK-22', 'kode_cpmk' => 22, 'desc_cpmk_id' => 'Mampu mengidentifikasi karakteristik arsitektur berbasis kearifan lokal.', 'desc_cpmk_en' => 'Able to identify the characteristics of architecture based on local wisdom.'],
            ['id_cpmk' => 23, 'id_mk' => 23, 'nama_kode_cpmk' => 'CPMK-23', 'kode_cpmk' => 23, 'desc_cpmk_id' => 'Mampu memilih sistem struktur dan material yang sesuai untuk bangunan.', 'desc_cpmk_en' => 'Able to select appropriate structural systems and materials for buildings.'],
            ['id_cpmk' => 24, 'id_mk' => 24, 'nama_kode_cpmk' => 'CPMK-24', 'kode_cpmk' => 24, 'desc_cpmk_id' => 'Mampu menganalisis elemen-elemen perancangan dalam skala kota.', 'desc_cpmk_en' => 'Able to analyze design elements on an urban scale.'],
            ['id_cpmk' => 25, 'id_mk' => 25, 'nama_kode_cpmk' => 'CPMK-25', 'kode_cpmk' => 25, 'desc_cpmk_id' => 'Mampu menyusun jadwal dan estimasi biaya untuk proyek arsitektur.', 'desc_cpmk_en' => 'Able to create schedules and cost estimates for architectural projects.'],

            // Teknik Kimia
            ['id_cpmk' => 26, 'id_mk' => 26, 'nama_kode_cpmk' => 'CPMK-26', 'kode_cpmk' => 26, 'desc_cpmk_id' => 'Mampu menyelesaikan perhitungan stoikiometri dalam reaksi kimia.', 'desc_cpmk_en' => 'Able to solve stoichiometric calculations in chemical reactions.'],
            ['id_cpmk' => 27, 'id_mk' => 27, 'nama_kode_cpmk' => 'CPMK-27', 'kode_cpmk' => 27, 'desc_cpmk_id' => 'Mampu menganalisis proses pemisahan campuran kimia.', 'desc_cpmk_en' => 'Able to analyze chemical mixture separation processes.'],
            ['id_cpmk' => 28, 'id_mk' => 28, 'nama_kode_cpmk' => 'CPMK-28', 'kode_cpmk' => 28, 'desc_cpmk_id' => 'Mampu merancang reaktor kimia sederhana.', 'desc_cpmk_en' => 'Able to design a simple chemical reactor.'],
            ['id_cpmk' => 29, 'id_mk' => 29, 'nama_kode_cpmk' => 'CPMK-29', 'kode_cpmk' => 29, 'desc_cpmk_id' => 'Mampu memilih instrumen yang tepat untuk pengukuran proses industri.', 'desc_cpmk_en' => 'Able to select the right instruments for industrial process measurement.'],
            ['id_cpmk' => 30, 'id_mk' => 30, 'nama_kode_cpmk' => 'CPMK-30', 'kode_cpmk' => 30, 'desc_cpmk_id' => 'Mampu menjelaskan aspek ekonomi dan keselamatan dalam industri kimia.', 'desc_cpmk_en' => 'Able to explain the economic and safety aspects of the chemical industry.'],

            // Teknologi Informasi
            ['id_cpmk' => 31, 'id_mk' => 31, 'nama_kode_cpmk' => 'CPMK-31', 'kode_cpmk' => 31, 'desc_cpmk_id' => 'Mampu merancang dan mengimplementasikan algoritma untuk menyelesaikan masalah.', 'desc_cpmk_en' => 'Able to design and implement algorithms to solve problems.'],
            ['id_cpmk' => 32, 'id_mk' => 32, 'nama_kode_cpmk' => 'CPMK-32', 'kode_cpmk' => 32, 'desc_cpmk_id' => 'Mampu memilih dan menerapkan struktur data yang efisien.', 'desc_cpmk_en' => 'Able to choose and implement efficient data structures.'],
            ['id_cpmk' => 33, 'id_mk' => 33, 'nama_kode_cpmk' => 'CPMK-33', 'kode_cpmk' => 33, 'desc_cpmk_id' => 'Mampu merancang dan membuat query pada basis data relasional.', 'desc_cpmk_en' => 'Able to design and create queries on a relational database.'],
            ['id_cpmk' => 34, 'id_mk' => 34, 'nama_kode_cpmk' => 'CPMK-34', 'kode_cpmk' => 34, 'desc_cpmk_id' => 'Mampu menerapkan siklus hidup pengembangan perangkat lunak.', 'desc_cpmk_en' => 'Able to apply the software development life cycle.'],
            ['id_cpmk' => 35, 'id_mk' => 35, 'nama_kode_cpmk' => 'CPMK-35', 'kode_cpmk' => 35, 'desc_cpmk_id' => 'Mampu menerapkan algoritma dasar kecerdasan buatan.', 'desc_cpmk_en' => 'Able to implement basic artificial intelligence algorithms.'],
            
            // Teknik Elektro
            ['id_cpmk' => 36, 'id_mk' => 36, 'nama_kode_cpmk' => 'CPMK-36', 'kode_cpmk' => 36, 'desc_cpmk_id' => 'Mampu menganalisis rangkaian listrik arus searah (DC) dan bolak-balik (AC).', 'desc_cpmk_en' => 'Able to analyze direct current (DC) and alternating current (AC) electrical circuits.'],
            ['id_cpmk' => 37, 'id_mk' => 37, 'nama_kode_cpmk' => 'CPMK-37', 'kode_cpmk' => 37, 'desc_cpmk_id' => 'Mampu merancang rangkaian elektronika analog sederhana.', 'desc_cpmk_en' => 'Able to design simple analog electronics circuits.'],
            ['id_cpmk' => 38, 'id_mk' => 38, 'nama_kode_cpmk' => 'CPMK-38', 'kode_cpmk' => 38, 'desc_cpmk_id' => 'Mampu merancang rangkaian logika kombinasional dan sekuensial.', 'desc_cpmk_en' => 'Able to design combinational and sequential logic circuits.'],
            ['id_cpmk' => 39, 'id_mk' => 39, 'nama_kode_cpmk' => 'CPMK-39', 'kode_cpmk' => 39, 'desc_cpmk_id' => 'Mampu memprogram mikrokontroler untuk aplikasi sistem tertanam.', 'desc_cpmk_en' => 'Able to program microcontrollers for embedded system applications.'],
            ['id_cpmk' => 40, 'id_mk' => 40, 'nama_kode_cpmk' => 'CPMK-40', 'kode_cpmk' => 40, 'desc_cpmk_id' => 'Mampu menganalisis respon sistem kendali.', 'desc_cpmk_en' => 'Able to analyze the response of control systems.'],

            // Teknik Geologi
            ['id_cpmk' => 41, 'id_mk' => 41, 'nama_kode_cpmk' => 'CPMK-41', 'kode_cpmk' => 41, 'desc_cpmk_id' => 'Mampu menjelaskan proses-proses yang membentuk bentang alam.', 'desc_cpmk_en' => 'Able to explain the processes that form landscapes.'],
            ['id_cpmk' => 42, 'id_mk' => 42, 'nama_kode_cpmk' => 'CPMK-42', 'kode_cpmk' => 42, 'desc_cpmk_id' => 'Mampu mengidentifikasi mineral pembentuk batuan.', 'desc_cpmk_en' => 'Able to identify rock-forming minerals.'],
            ['id_cpmk' => 43, 'id_mk' => 43, 'nama_kode_cpmk' => 'CPMK-43', 'kode_cpmk' => 43, 'desc_cpmk_id' => 'Mampu mengklasifikasikan jenis-jenis batuan beku, sedimen, dan metamorf.', 'desc_cpmk_en' => 'Able to classify types of igneous, sedimentary, and metamorphic rocks.'],
            ['id_cpmk' => 44, 'id_mk' => 44, 'nama_kode_cpmk' => 'CPMK-44', 'kode_cpmk' => 44, 'desc_cpmk_id' => 'Mampu menginterpretasikan struktur lipatan dan sesar pada peta geologi.', 'desc_cpmk_en' => 'Able to interpret fold and fault structures on a geological map.'],
            ['id_cpmk' => 45, 'id_mk' => 45, 'nama_kode_cpmk' => 'CPMK-45', 'kode_cpmk' => 45, 'desc_cpmk_id' => 'Mampu menilai stabilitas lereng dan pondasi dari sudut pandang geologi.', 'desc_cpmk_en' => 'Able to assess slope and foundation stability from a geological perspective.'],
        ]);
    }
}
