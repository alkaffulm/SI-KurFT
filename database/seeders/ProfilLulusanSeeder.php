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
            ['id_pl' => 1, 'id_ps' => 1, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Ahli Struktur', 'nama_pl_en' => 'Structural Expert', 'desc_pl_id' => 'Mampu merancang struktur bangunan sipil', 'desc_pl_en' => 'Able to design civil building structures'],
            ['id_pl' => 2, 'id_ps' => 1, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Manajer Proyek Konstruksi', 'nama_pl_en' => 'Construction Project Manager', 'desc_pl_id' => 'Mampu mengelola proyek konstruksi secara profesional', 'desc_pl_en' => 'Able to manage construction projects professionally'],

            ['id_pl' => 3, 'id_ps' => 2, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Engineer Tambang', 'nama_pl_en' => 'Mining Engineer', 'desc_pl_id' => 'Mampu merancang dan mengoperasikan sistem tambang', 'desc_pl_en' => 'Able to design and operate mining systems'],
            ['id_pl' => 4, 'id_ps' => 2, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Pengawas Tambang', 'nama_pl_en' => 'Mine Supervisor', 'desc_pl_id' => 'Mampu mengawasi kegiatan operasional pertambangan', 'desc_pl_en' => 'Able to supervise mining operational activities'],

            ['id_pl' => 5, 'id_ps' => 3, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Engineer Mekanik', 'nama_pl_en' => 'Mechanical Engineer', 'desc_pl_id' => 'Mampu merancang dan memelihara sistem mekanik', 'desc_pl_en' => 'Able to design and maintain mechanical systems'],
            ['id_pl' => 6, 'id_ps' => 3, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Teknisi Industri', 'nama_pl_en' => 'Industrial Technician', 'desc_pl_id' => 'Mampu mengoperasikan peralatan teknik mesin industri', 'desc_pl_en' => 'Able to operate industrial mechanical engineering equipment'],

            ['id_pl' => 7, 'id_ps' => 4, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Ahli Pengelolaan Limbah', 'nama_pl_en' => 'Waste Management Expert', 'desc_pl_id' => 'Mampu merancang dan mengelola sistem pengolahan limbah', 'desc_pl_en' => 'Able to design and manage waste treatment systems'],
            ['id_pl' => 8, 'id_ps' => 4, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Konsultan Lingkungan', 'nama_pl_en' => 'Environmental Consultant', 'desc_pl_id' => 'Mampu memberikan solusi lingkungan berbasis teknologi', 'desc_pl_en' => 'Able to provide technology-based environmental solutions'],

            ['id_pl' => 9, 'id_ps' => 5, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Arsitek', 'nama_pl_en' => 'Architect', 'desc_pl_id' => 'Mampu merancang bangunan sesuai aspek teknis dan estetis', 'desc_pl_en' => 'Able to design buildings according to technical and aesthetic aspects'],
            ['id_pl' => 10, 'id_ps' => 5, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Urban Planner', 'nama_pl_en' => 'Urban Planner', 'desc_pl_id' => 'Mampu merancang tata ruang perkotaan yang berkelanjutan', 'desc_pl_en' => 'Able to design sustainable urban spatial planning'],

            ['id_pl' => 11, 'id_ps' => 6, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Insinyur Proses Kimia', 'nama_pl_en' => 'Chemical Process Engineer', 'desc_pl_id' => 'Mampu merancang dan mengontrol proses industri kimia', 'desc_pl_en' => 'Able to design and control chemical industry processes'],
            ['id_pl' => 12, 'id_ps' => 6, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Ahli Keselamatan Industri', 'nama_pl_en' => 'Industrial Safety Expert', 'desc_pl_id' => 'Mampu mengelola aspek keselamatan di industri kimia', 'desc_pl_en' => 'Able to manage safety aspects in the chemical industry'],

            ['id_pl' => 13, 'id_ps' => 7, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Software Developer', 'nama_pl_en' => 'Software Developer', 'desc_pl_id' => 'Mampu mengembangkan aplikasi perangkat lunak', 'desc_pl_en' => 'Able to develop software applications'],
            ['id_pl' => 14, 'id_ps' => 7, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'System Analyst', 'nama_pl_en' => 'System Analyst', 'desc_pl_id' => 'Mampu menganalisis sistem informasi', 'desc_pl_en' => 'Able to analyze information systems'],
            ['id_pl' => 15, 'id_ps' => 7, 'kode_pl' => 'PL-3', 'nama_pl_id' => 'Software Developer', 'nama_pl_en' => 'Software Developer', 'desc_pl_id' => 'Mampu mengembangkan aplikasi perangkat lunak', 'desc_pl_en' => 'Able to develop software applications'],
            ['id_pl' => 16, 'id_ps' => 7, 'kode_pl' => 'PL-4', 'nama_pl_id' => 'System Analyst', 'nama_pl_en' => 'System Analyst', 'desc_pl_id' => 'Mampu menganalisis sistem informasi', 'desc_pl_en' => 'Able to analyze information systems'],
            ['id_pl' => 17, 'id_ps' => 7, 'kode_pl' => 'PL-5', 'nama_pl_id' => 'Software Developer', 'nama_pl_en' => 'Software Developer', 'desc_pl_id' => 'Mampu mengembangkan aplikasi perangkat lunak', 'desc_pl_en' => 'Able to develop software applications'],
            ['id_pl' => 18, 'id_ps' => 7, 'kode_pl' => 'PL-6', 'nama_pl_id' => 'System Analyst', 'nama_pl_en' => 'System Analyst', 'desc_pl_id' => 'Mampu menganalisis sistem informasi', 'desc_pl_en' => 'Able to analyze information systems'],

            ['id_pl' => 19, 'id_ps' => 8, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Engineer Elektro', 'nama_pl_en' => 'Electrical Engineer', 'desc_pl_id' => 'Mampu merancang sistem dan perangkat elektronik', 'desc_pl_en' => 'Able to design electronic systems and devices'],
            ['id_pl' => 20, 'id_ps' => 8, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Teknisi Instrumentasi', 'nama_pl_en' => 'Instrumentation Technician', 'desc_pl_id' => 'Mampu mengoperasikan dan memelihara perangkat kontrol', 'desc_pl_en' => 'Able to operate and maintain control devices'],

            ['id_pl' => 21, 'id_ps' => 9, 'kode_pl' => 'PL-1', 'nama_pl_id' => 'Geologist', 'nama_pl_en' => 'Geologist', 'desc_pl_id' => 'Mampu melakukan eksplorasi dan analisis geologi', 'desc_pl_en' => 'Able to conduct geological exploration and analysis'],
            ['id_pl' => 22, 'id_ps' => 9, 'kode_pl' => 'PL-2', 'nama_pl_id' => 'Ahli Geoteknik', 'nama_pl_en' => 'Geotechnical Expert', 'desc_pl_id' => 'Mampu menganalisis kondisi tanah dan batuan untuk konstruksi', 'desc_pl_en' => 'Able to analyze soil and rock conditions for construction'],
        ]);
    }
}