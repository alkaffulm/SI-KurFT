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
            ['id_pl' => 1, 'id_kurikulum' => 1, 'id_ps' => 1, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Ahli Struktur', 'desc' => 'Mampu merancang struktur bangunan sipil'],
            ['id_pl' => 2, 'id_kurikulum' => 1, 'id_ps' => 1, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Manajer Proyek Konstruksi', 'desc' => 'Mampu mengelola proyek konstruksi secara profesional'],

            ['id_pl' => 3, 'id_kurikulum' => 2, 'id_ps' => 2, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Engineer Tambang', 'desc' => 'Mampu merancang dan mengoperasikan sistem tambang'],
            ['id_pl' => 4, 'id_kurikulum' => 2, 'id_ps' => 2, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Pengawas Tambang', 'desc' => 'Mampu mengawasi kegiatan operasional pertambangan'],

            ['id_pl' => 5, 'id_kurikulum' => 3, 'id_ps' => 3, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Engineer Mekanik', 'desc' => 'Mampu merancang dan memelihara sistem mekanik'],
            ['id_pl' => 6, 'id_kurikulum' => 3, 'id_ps' => 3, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Teknisi Industri', 'desc' => 'Mampu mengoperasikan peralatan teknik mesin industri'],

            ['id_pl' => 7, 'id_kurikulum' => 4, 'id_ps' => 4, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Ahli Pengelolaan Limbah', 'desc' => 'Mampu merancang dan mengelola sistem pengolahan limbah'],
            ['id_pl' => 8, 'id_kurikulum' => 4, 'id_ps' => 4, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Konsultan Lingkungan', 'desc' => 'Mampu memberikan solusi lingkungan berbasis teknologi'],

            ['id_pl' => 9, 'id_kurikulum' => 5, 'id_ps' => 5, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Arsitek', 'desc' => 'Mampu merancang bangunan sesuai aspek teknis dan estetis'],
            ['id_pl' => 10, 'id_kurikulum' => 5, 'id_ps' => 5, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Urban Planner', 'desc' => 'Mampu merancang tata ruang perkotaan yang berkelanjutan'],

            ['id_pl' => 11, 'id_kurikulum' => 6, 'id_ps' => 6, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Insinyur Proses Kimia', 'desc' => 'Mampu merancang dan mengontrol proses industri kimia'],
            ['id_pl' => 12, 'id_kurikulum' => 6, 'id_ps' => 6, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Ahli Keselamatan Industri', 'desc' => 'Mampu mengelola aspek keselamatan di industri kimia'],

            ['id_pl' => 13, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Software Developer', 'desc' => 'Mampu mengembangkan aplikasi perangkat lunak'],
            ['id_pl' => 14, 'id_kurikulum' => 7, 'id_ps' => 7, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'System Analyst', 'desc' => 'Mampu menganalisis sistem informasi'],

            ['id_pl' => 15, 'id_kurikulum' => 8, 'id_ps' => 8, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Engineer Elektro', 'desc' => 'Mampu merancang sistem dan perangkat elektronik'],
            ['id_pl' => 16, 'id_kurikulum' => 8, 'id_ps' => 8, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Teknisi Instrumentasi', 'desc' => 'Mampu mengoperasikan dan memelihara perangkat kontrol'],

            ['id_pl' => 17, 'id_kurikulum' => 9, 'id_ps' => 9, 'kode_pl' => 'PL-1', 'profil_lulusan' => 'Geologist', 'desc' => 'Mampu melakukan eksplorasi dan analisis geologi'],
            ['id_pl' => 18, 'id_kurikulum' => 9, 'id_ps' => 9, 'kode_pl' => 'PL-2', 'profil_lulusan' => 'Ahli Geoteknik', 'desc' => 'Mampu menganalisis kondisi tanah dan batuan untuk konstruksi'],
        

            // kurikulum 2025
            ['id_pl' => 19, 'id_kurikulum' => 10, 'id_ps' => 1, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Ahli Struktur', 'desc' => '(2025)Mampu merancang struktur bangunan sipil'],
            ['id_pl' => 20, 'id_kurikulum' => 10, 'id_ps' => 1, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Manajer Proyek Konstruksi', 'desc' => '(2025)Mampu mengelola proyek konstruksi secara profesional'],

            ['id_pl' => 21, 'id_kurikulum' => 11, 'id_ps' => 2, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Engineer Tambang', 'desc' => '(2025)Mampu merancang dan mengoperasikan sistem tambang'],
            ['id_pl' => 22, 'id_kurikulum' => 11, 'id_ps' => 2, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Pengawas Tambang', 'desc' => '(2025)Mampu mengawasi kegiatan operasional pertambangan'],

            ['id_pl' => 23, 'id_kurikulum' => 12, 'id_ps' => 3, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Engineer Mekanik', 'desc' => '(2025)Mampu merancang dan memelihara sistem mekanik'],
            ['id_pl' => 24, 'id_kurikulum' => 12, 'id_ps' => 3, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Teknisi Industri', 'desc' => '(2025)Mampu mengoperasikan peralatan teknik mesin industri'],

            ['id_pl' => 25, 'id_kurikulum' => 13, 'id_ps' => 4, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Ahli Pengelolaan Limbah', 'desc' => '(2025)Mampu merancang dan mengelola sistem pengolahan limbah'],
            ['id_pl' => 26, 'id_kurikulum' => 13, 'id_ps' => 4, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Konsultan Lingkungan', 'desc' => '(2025)Mampu memberikan solusi lingkungan berbasis teknologi'],

            ['id_pl' => 27, 'id_kurikulum' => 14, 'id_ps' => 5, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Arsitek', 'desc' => '(2025)Mampu merancang bangunan sesuai aspek teknis dan estetis'],
            ['id_pl' => 28, 'id_kurikulum' => 14, 'id_ps' => 5, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Urban Planner', 'desc' => '(2025)Mampu merancang tata ruang perkotaan yang berkelanjutan'],

            ['id_pl' => 29, 'id_kurikulum' => 15, 'id_ps' => 6, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Insinyur Proses Kimia', 'desc' => '(2025)Mampu merancang dan mengontrol proses industri kimia'],
            ['id_pl' => 30, 'id_kurikulum' => 15, 'id_ps' => 6, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Ahli Keselamatan Industri', 'desc' => '(2025)Mampu mengelola aspek keselamatan di industri kimia'],

            ['id_pl' => 31, 'id_kurikulum' => 16, 'id_ps' => 7, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Software Developer', 'desc' => '(2025)Mampu mengembangkan aplikasi perangkat lunak'],
            ['id_pl' => 32, 'id_kurikulum' => 16, 'id_ps' => 7, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)System Analyst', 'desc' => '(2025)Mampu menganalisis sistem informasi'],

            ['id_pl' => 33, 'id_kurikulum' => 17, 'id_ps' => 8, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Engineer Elektro', 'desc' => '(2025)Mampu merancang sistem dan perangkat elektronik'],
            ['id_pl' => 34, 'id_kurikulum' => 17, 'id_ps' => 8, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Teknisi Instrumentasi', 'desc' => '(2025)Mampu mengoperasikan dan memelihara perangkat kontrol'],

            ['id_pl' => 35, 'id_kurikulum' => 18, 'id_ps' => 9, 'kode_pl' => '(2025)PL-1', 'profil_lulusan' => '(2025)Geologist', 'desc' => '(2025)Mampu melakukan eksplorasi dan analisis geologi'],
            ['id_pl' => 36, 'id_kurikulum' => 18, 'id_ps' => 9, 'kode_pl' => '(2025)PL-2', 'profil_lulusan' => '(2025)Ahli Geoteknik', 'desc' => '(2025)Mampu menganalisis kondisi tanah dan batuan untuk konstruksi'],
        
        
        ]);
    }
}
