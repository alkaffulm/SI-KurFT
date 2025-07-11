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
            ['id_pl' => 1, 'id_ps' => 1, 'profil_lulusan' => 'Ahli Struktur', 'desc' => 'Mampu merancang struktur bangunan sipil'],
            ['id_pl' => 2, 'id_ps' => 1, 'profil_lulusan' => 'Manajer Proyek Konstruksi', 'desc' => 'Mampu mengelola proyek konstruksi secara profesional'],

            ['id_pl' => 3, 'id_ps' => 2, 'profil_lulusan' => 'Engineer Tambang', 'desc' => 'Mampu merancang dan mengoperasikan sistem tambang'],
            ['id_pl' => 4, 'id_ps' => 2, 'profil_lulusan' => 'Pengawas Tambang', 'desc' => 'Mampu mengawasi kegiatan operasional pertambangan'],

            ['id_pl' => 5, 'id_ps' => 3, 'profil_lulusan' => 'Engineer Mekanik', 'desc' => 'Mampu merancang dan memelihara sistem mekanik'],
            ['id_pl' => 6, 'id_ps' => 3, 'profil_lulusan' => 'Teknisi Industri', 'desc' => 'Mampu mengoperasikan peralatan teknik mesin industri'],

            ['id_pl' => 7, 'id_ps' => 4, 'profil_lulusan' => 'Ahli Pengelolaan Limbah', 'desc' => 'Mampu merancang dan mengelola sistem pengolahan limbah'],
            ['id_pl' => 8, 'id_ps' => 4, 'profil_lulusan' => 'Konsultan Lingkungan', 'desc' => 'Mampu memberikan solusi lingkungan berbasis teknologi'],

            ['id_pl' => 9, 'id_ps' => 5, 'profil_lulusan' => 'Arsitek', 'desc' => 'Mampu merancang bangunan sesuai aspek teknis dan estetis'],
            ['id_pl' => 10, 'id_ps' => 5, 'profil_lulusan' => 'Urban Planner', 'desc' => 'Mampu merancang tata ruang perkotaan yang berkelanjutan'],

            ['id_pl' => 11, 'id_ps' => 6, 'profil_lulusan' => 'Insinyur Proses Kimia', 'desc' => 'Mampu merancang dan mengontrol proses industri kimia'],
            ['id_pl' => 12, 'id_ps' => 6, 'profil_lulusan' => 'Ahli Keselamatan Industri', 'desc' => 'Mampu mengelola aspek keselamatan di industri kimia'],

            ['id_pl' => 13, 'id_ps' => 7, 'profil_lulusan' => 'Software Developer', 'desc' => 'Mampu mengembangkan aplikasi perangkat lunak'],
            ['id_pl' => 14, 'id_ps' => 7, 'profil_lulusan' => 'System Analyst', 'desc' => 'Mampu menganalisis sistem informasi'],

            ['id_pl' => 15, 'id_ps' => 8, 'profil_lulusan' => 'Engineer Elektro', 'desc' => 'Mampu merancang sistem dan perangkat elektronik'],
            ['id_pl' => 16, 'id_ps' => 8, 'profil_lulusan' => 'Teknisi Instrumentasi', 'desc' => 'Mampu mengoperasikan dan memelihara perangkat kontrol'],

            ['id_pl' => 17, 'id_ps' => 9, 'profil_lulusan' => 'Geologist', 'desc' => 'Mampu melakukan eksplorasi dan analisis geologi'],
            ['id_pl' => 18, 'id_ps' => 9, 'profil_lulusan' => 'Ahli Geoteknik', 'desc' => 'Mampu menganalisis kondisi tanah dan batuan untuk konstruksi'],
        ]);
    }
}
