<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilLulusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profil_lulusan')->insert([
            // kurikulum 2020
            ['id_pl' => 1, 'id_kurikulum' => 1, 'id_ps' => 1, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Ahli Struktur', 'nama_pl_en' => 'Structural Expert', 'desc_pl_id' => 'Mampu merancang struktur bangunan sipil', 'desc_pl_en' => 'Able to design civil building structures'],
            ['id_pl' => 2, 'id_kurikulum' => 1, 'id_ps' => 1, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Manajer Proyek Konstruksi', 'nama_pl_en' => 'Construction Project Manager', 'desc_pl_id' => 'Mampu mengelola proyek konstruksi secara profesional', 'desc_pl_en' => 'Able to manage construction projects professionally'],

            ['id_pl' => 3, 'id_kurikulum' => 2, 'id_ps' => 2, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Engineer Tambang', 'nama_pl_en' => 'Mining Engineer', 'desc_pl_id' => 'Mampu merancang dan mengoperasikan sistem tambang', 'desc_pl_en' => 'Able to design and operate mining systems'],
            ['id_pl' => 4, 'id_kurikulum' => 2, 'id_ps' => 2, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Pengawas Tambang', 'nama_pl_en' => 'Mine Supervisor', 'desc_pl_id' => 'Mampu mengawasi kegiatan operasional pertambangan', 'desc_pl_en' => 'Able to supervise mining operational activities'],

            ['id_pl' => 5, 'id_kurikulum' => 3, 'id_ps' => 3, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Engineer Mekanik', 'nama_pl_en' => 'Mechanical Engineer', 'desc_pl_id' => 'Mampu merancang dan memelihara sistem mekanik', 'desc_pl_en' => 'Able to design and maintain mechanical systems'],
            ['id_pl' => 6, 'id_kurikulum' => 3, 'id_ps' => 3, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Teknisi Industri', 'nama_pl_en' => 'Industrial Technician', 'desc_pl_id' => 'Mampu mengoperasikan peralatan teknik mesin industri', 'desc_pl_en' => 'Able to operate industrial mechanical engineering equipment'],

            ['id_pl' => 7, 'id_kurikulum' => 4, 'id_ps' => 4, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Ahli Pengelolaan Limbah', 'nama_pl_en' => 'Waste Management Expert', 'desc_pl_id' => 'Mampu merancang dan mengelola sistem pengolahan limbah', 'desc_pl_en' => 'Able to design and manage waste treatment systems'],
            ['id_pl' => 8, 'id_kurikulum' => 4, 'id_ps' => 4, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Konsultan Lingkungan', 'nama_pl_en' => 'Environmental Consultant', 'desc_pl_id' => 'Mampu memberikan solusi lingkungan berbasis teknologi', 'desc_pl_en' => 'Able to provide technology-based environmental solutions'],

            ['id_pl' => 9, 'id_kurikulum' => 5, 'id_ps' => 5, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Arsitek', 'nama_pl_en' => 'Architect', 'desc_pl_id' => 'Mampu merancang bangunan sesuai aspek teknis dan estetis', 'desc_pl_en' => 'Able to design buildings according to technical and aesthetic aspects'],
            ['id_pl' => 10, 'id_kurikulum' => 5, 'id_ps' => 5, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Urban Planner', 'nama_pl_en' => 'Urban Planner', 'desc_pl_id' => 'Mampu merancang tata ruang perkotaan yang berkelanjutan', 'desc_pl_en' => 'Able to design sustainable urban spatial planning'],

            ['id_pl' => 11, 'id_kurikulum' => 6, 'id_ps' => 6, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Insinyur Proses Kimia', 'nama_pl_en' => 'Chemical Process Engineer', 'desc_pl_id' => 'Mampu merancang dan mengontrol proses industri kimia', 'desc_pl_en' => 'Able to design and control chemical industry processes'],
            ['id_pl' => 12, 'id_kurikulum' => 6, 'id_ps' => 6, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Ahli Keselamatan Industri', 'nama_pl_en' => 'Industrial Safety Expert', 'desc_pl_id' => 'Mampu mengelola aspek keselamatan di industri kimia', 'desc_pl_en' => 'Able to manage safety aspects in the chemical industry'],

            ['id_pl' => 13, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Software Developer', 'nama_pl_en' => 'Software Developer', 'desc_pl_id' => 'Mampu mengembangkan aplikasi perangkat lunak', 'desc_pl_en' => 'Able to develop software applications'],
            ['id_pl' => 14, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'System Analyst', 'nama_pl_en' => 'System Analyst', 'desc_pl_id' => 'Mampu menganalisis sistem informasi', 'desc_pl_en' => 'Able to analyze information systems'],
            ['id_pl' => 15, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-3', 'nama_pl_id' => 'Software Developer', 'nama_pl_en' => 'Software Developer', 'desc_pl_id' => 'Mampu mengembangkan aplikasi perangkat lunak', 'desc_pl_en' => 'Able to develop software applications'],
            ['id_pl' => 16, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-4', 'nama_pl_id' => 'System Analyst', 'nama_pl_en' => 'System Analyst', 'desc_pl_id' => 'Mampu menganalisis sistem informasi', 'desc_pl_en' => 'Able to analyze information systems'],
            ['id_pl' => 17, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-5', 'nama_pl_id' => 'Software Developer', 'nama_pl_en' => 'Software Developer', 'desc_pl_id' => 'Mampu mengembangkan aplikasi perangkat lunak', 'desc_pl_en' => 'Able to develop software applications'],
            ['id_pl' => 18, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-6', 'nama_pl_id' => 'System Analyst', 'nama_pl_en' => 'System Analyst', 'desc_pl_id' => 'Mampu menganalisis sistem informasi', 'desc_pl_en' => 'Able to analyze information systems'],

            ['id_pl' => 19, 'id_kurikulum' => 8, 'id_ps' => 8, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Engineer Elektro', 'nama_pl_en' => 'Electrical Engineer', 'desc_pl_id' => 'Mampu merancang sistem dan perangkat elektronik', 'desc_pl_en' => 'Able to design electronic systems and devices'],
            ['id_pl' => 20, 'id_kurikulum' => 8, 'id_ps' => 8, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Teknisi Instrumentasi', 'nama_pl_en' => 'Instrumentation Technician', 'desc_pl_id' => 'Mampu mengoperasikan dan memelihara perangkat kontrol', 'desc_pl_en' => 'Able to operate and maintain control devices'],

            ['id_pl' => 21, 'id_kurikulum' => 9, 'id_ps' => 9, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Geologist', 'nama_pl_en' => 'Geologist', 'desc_pl_id' => 'Mampu melakukan eksplorasi dan analisis geologi', 'desc_pl_en' => 'Able to conduct geological exploration and analysis'],
            ['id_pl' => 22, 'id_kurikulum' => 9, 'id_ps' => 9, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Ahli Geoteknik', 'nama_pl_en' => 'Geotechnical Expert', 'desc_pl_id' => 'Mampu menganalisis kondisi tanah dan batuan untuk konstruksi', 'desc_pl_en' => 'Able to analyze soil and rock conditions for construction'],

            // kurikulum 2025
            ['id_pl' => 23, 'id_kurikulum' => 10, 'id_ps' => 1, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Ahli Struktur', 'nama_pl_en' => '(2025)Structural Expert', 'desc_pl_id' => '(2025)Mampu merancang struktur bangunan sipil', 'desc_pl_en' => '(2025)Able to design civil building structures'],
            ['id_pl' => 24, 'id_kurikulum' => 10, 'id_ps' => 1, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Manajer Proyek Konstruksi', 'nama_pl_en' => '(2025)Construction Project Manager', 'desc_pl_id' => '(2025)Mampu mengelola proyek konstruksi secara profesional', 'desc_pl_en' => '(2025)Able to manage construction projects professionally'],

            ['id_pl' => 25, 'id_kurikulum' => 11, 'id_ps' => 2, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Engineer Tambang', 'nama_pl_en' => '(2025)Mining Engineer', 'desc_pl_id' => '(2025)Mampu merancang dan mengoperasikan sistem tambang', 'desc_pl_en' => '(2025)Able to design and operate mining systems'],
            ['id_pl' => 26, 'id_kurikulum' => 11, 'id_ps' => 2, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Pengawas Tambang', 'nama_pl_en' => '(2025)Mine Supervisor', 'desc_pl_id' => '(2025)Mampu mengawasi kegiatan operasional pertambangan', 'desc_pl_en' => '(2025)Able to supervise mining operational activities'],

            ['id_pl' => 27, 'id_kurikulum' => 12, 'id_ps' => 3, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Engineer Mekanik', 'nama_pl_en' => '(2025)Mechanical Engineer', 'desc_pl_id' => '(2025)Mampu merancang dan memelihara sistem mekanik', 'desc_pl_en' => '(2025)Able to design and maintain mechanical systems'],
            ['id_pl' => 28, 'id_kurikulum' => 12, 'id_ps' => 3, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Teknisi Industri', 'nama_pl_en' => '(2025)Industrial Technician', 'desc_pl_id' => '(2025)Mampu mengoperasikan peralatan teknik mesin industri', 'desc_pl_en' => '(2025)Able to operate industrial mechanical engineering equipment'],

            ['id_pl' => 29, 'id_kurikulum' => 13, 'id_ps' => 4, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Ahli Pengelolaan Limbah', 'nama_pl_en' => '(2025)Waste Management Expert', 'desc_pl_id' => '(2025)Mampu merancang dan mengelola sistem pengolahan limbah', 'desc_pl_en' => '(2025)Able to design and manage waste treatment systems'],
            ['id_pl' => 30, 'id_kurikulum' => 13, 'id_ps' => 4, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Konsultan Lingkungan', 'nama_pl_en' => '(2025)Environmental Consultant', 'desc_pl_id' => '(2025)Mampu memberikan solusi lingkungan berbasis teknologi', 'desc_pl_en' => '(2025)Able to provide technology-based environmental solutions'],

            ['id_pl' => 31, 'id_kurikulum' => 14, 'id_ps' => 5, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Arsitek', 'nama_pl_en' => '(2025)Architect', 'desc_pl_id' => '(2025)Mampu merancang bangunan sesuai aspek teknis dan estetis', 'desc_pl_en' => '(2025)Able to design buildings according to technical and aesthetic aspects'],
            ['id_pl' => 32, 'id_kurikulum' => 14, 'id_ps' => 5, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Urban Planner', 'nama_pl_en' => '(2025)Urban Planner', 'desc_pl_id' => '(2025)Mampu merancang tata ruang perkotaan yang berkelanjutan', 'desc_pl_en' => '(2025)Able to design sustainable urban spatial planning'],

            ['id_pl' => 33, 'id_kurikulum' => 15, 'id_ps' => 6, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Insinyur Proses Kimia', 'nama_pl_en' => '(2025)Chemical Process Engineer', 'desc_pl_id' => '(2025)Mampu merancang dan mengontrol proses industri kimia', 'desc_pl_en' => '(2025)Able to design and control chemical industry processes'],
            ['id_pl' => 34, 'id_kurikulum' => 15, 'id_ps' => 6, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Ahli Keselamatan Industri', 'nama_pl_en' => '(2025)Industrial Safety Expert', 'desc_pl_id' => '(2025)Mampu mengelola aspek keselamatan di industri kimia', 'desc_pl_en' => '(2025)Able to manage safety aspects in the chemical industry'],

            ['id_pl' => 35, 'id_kurikulum' => 16, 'id_ps' => 7, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Software Developer', 'nama_pl_en' => '(2025)Software Developer', 'desc_pl_id' => '(2025)Mampu mengembangkan aplikasi perangkat lunak', 'desc_pl_en' => '(2025)Able to develop software applications'],
            ['id_pl' => 36, 'id_kurikulum' => 16, 'id_ps' => 7, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)System Analyst', 'nama_pl_en' => '(2025)System Analyst', 'desc_pl_id' => '(2025)Mampu menganalisis sistem informasi', 'desc_pl_en' => '(2025)Able to analyze information systems'],

            ['id_pl' => 37, 'id_kurikulum' => 17, 'id_ps' => 8, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Engineer Elektro', 'nama_pl_en' => '(2025)Electrical Engineer', 'desc_pl_id' => '(2025)Mampu merancang sistem dan perangkat elektronik', 'desc_pl_en' => '(2025)Able to design electronic systems and devices'],
            ['id_pl' => 38, 'id_kurikulum' => 17, 'id_ps' => 8, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Teknisi Instrumentasi', 'nama_pl_en' => '(2025)Instrumentation Technician', 'desc_pl_id' => '(2025)Mampu mengoperasikan dan memelihara perangkat kontrol', 'desc_pl_en' => '(2025)Able to operate and maintain control devices'],

            ['id_pl' => 39, 'id_kurikulum' => 18, 'id_ps' => 9, 'kode_pl' => '(2025)PL-1', 'nama_pl_id' => '(2025)Geologist', 'nama_pl_en' => '(2025)Geologist', 'desc_pl_id' => '(2025)Mampu melakukan eksplorasi dan analisis geologi', 'desc_pl_en' => '(2025)Able to conduct geological exploration and analysis'],
            ['id_pl' => 40, 'id_kurikulum' => 18, 'id_ps' => 9, 'kode_pl' => '(2025)PL-2', 'nama_pl_id' => '(2025)Ahli Geoteknik', 'nama_pl_en' => '(2025)Geotechnical Expert', 'desc_pl_id' => '(2025)Mampu menganalisis kondisi tanah dan batuan untuk konstruksi', 'desc_pl_en' => '(2025)Able to analyze soil and rock conditions for construction'],
        ]);
    }
}