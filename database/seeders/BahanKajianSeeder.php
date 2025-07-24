<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanKajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bahan_kajian')->insert([
            // Teknik Sipil (id_ps = 1)
            ['id_bk' => 1, 'id_ps' => 1, 'nama_kode_bk'=>'BK-1', 'nama_bk' => 'Rekayasa Struktur', 'kategori' => 'Inti', 'desc_bk_id' => 'Analisis dan perancangan struktur bangunan tahan gempa.', 'desc_bk_en' => 'Analysis and design of earthquake-resistant building structures.'],
            ['id_bk' => 2, 'id_ps' => 1, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Rekayasa Geoteknik', 'kategori' => 'Inti', 'desc_bk_id' => 'Studi tentang mekanika tanah dan perancangan pondasi.', 'desc_bk_en' => 'Study of soil mechanics and foundation design.'],
            ['id_bk' => 3, 'id_ps' => 1, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Manajemen Konstruksi', 'kategori' => 'Inti', 'desc_bk_id' => 'Perencanaan, penjadwalan, dan pengendalian proyek konstruksi.', 'desc_bk_en' => 'Planning, scheduling, and controlling construction projects.'],

            // Teknik Pertambangan (id_ps = 2)
            ['id_bk' => 4, 'id_ps' => 2, 'nama_kode_bk'=>'BK-1', 'nama_bk' => 'Eksplorasi dan Geologi Tambang', 'kategori' => 'Inti', 'desc_bk_id' => 'Metode pencarian dan evaluasi deposit bahan galian.', 'desc_bk_en' => 'Methods for searching and evaluating mineral deposits.'],
            ['id_bk' => 5, 'id_ps' => 2, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Teknik Penambangan', 'kategori' => 'Inti', 'desc_bk_id' => 'Studi tentang metode penambangan terbuka dan bawah tanah.', 'desc_bk_en' => 'Study of surface and underground mining methods.'],
            ['id_bk' => 6, 'id_ps' => 2, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Pengolahan Bahan Galian', 'kategori' => 'Inti', 'desc_bk_id' => 'Proses pemisahan mineral berharga dari bijih.', 'desc_bk_en' => 'The process of separating valuable minerals from ore.'],

            // Teknik Mesin (id_ps = 3)
            ['id_bk' => 7, 'id_ps' => 3, 'nama_kode_bk'=>'BK-1', 'nama_bk' => 'Konstruksi dan Perancangan Mesin', 'kategori' => 'Inti', 'desc_bk_id' => 'Desain dan analisis komponen dan sistem mekanik.', 'desc_bk_en' => 'Design and analysis of mechanical components and systems.'],
            ['id_bk' => 8, 'id_ps' => 3, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Konversi Energi', 'kategori' => 'Inti', 'desc_bk_id' => 'Studi tentang mesin termal dan sistem energi terbarukan.', 'desc_bk_en' => 'Study of thermal engines and renewable energy systems.'],
            ['id_bk' => 9, 'id_ps' => 3, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Ilmu Material dan Manufaktur', 'kategori' => 'Inti', 'desc_bk_id' => 'Proses produksi dan sistem manufaktur modern.', 'en' => 'Production processes and modern manufacturing systems.'],

            // Teknik Lingkungan (id_ps = 4)
            ['id_bk' => 10, 'id_ps' => 4, 'nama_kode_bk'=>'BK-1', 'nama_bk' => 'Pengendalian Pencemaran', 'kategori' => 'Inti', 'desc_bk_id' => 'Teknologi untuk mengendalikan pencemaran air, udara, dan tanah.', 'desc_bk_en' => 'Technologies for controlling water, air, and soil pollution.'],
            ['id_bk' => 11, 'id_ps' => 4, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Rekayasa Sumber Daya Air', 'kategori' => 'Inti', 'desc_bk_id' => 'Pengelolaan dan rekayasa sistem sumber daya air.', 'desc_bk_en' => 'Management and engineering of water resource systems.'],
            ['id_bk' => 12, 'id_ps' => 4, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Kesehatan dan Keselamatan Lingkungan', 'kategori' => 'Inti', 'desc_bk_id' => 'Analisis risiko dan manajemen kesehatan lingkungan kerja.', 'desc_bk_en' => 'Risk analysis and occupational environmental health management.'],

            // Arsitektur (id_ps = 5)
            ['id_bk' => 13, 'id_ps' => 5, 'nama_kode_bk'=>'BK-1','nama_bk' => 'Perancangan Arsitektur', 'kategori' => 'Inti', 'desc_bk_id' => 'Proses desain kreatif bangunan dan lingkungan binaan.', 'desc_bk_en' => 'The creative design process for buildings and the built environment.'],
            ['id_bk' => 14, 'id_ps' => 5, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Struktur dan Teknologi Bangunan', 'kategori' => 'Inti', 'desc_bk_id' => 'Studi tentang sistem struktur dan teknologi konstruksi bangunan.', 'desc_bk_en' => 'Study of structural systems and building construction technology.'],
            ['id_bk' => 15, 'id_ps' => 5, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Teori dan Sejarah Arsitektur', 'kategori' => 'Inti', 'desc_bk_id' => 'Kajian teoritis dan sejarah perkembangan arsitektur.', 'desc_bk_en' => 'Theoretical study and history of architectural development.'],

            // Teknik Kimia (id_ps = 6)
            ['id_bk' => 16, 'id_ps' => 6, 'nama_kode_bk'=>'BK-1', 'nama_bk' => 'Operasi Teknik Kimia', 'kategori' => 'Inti', 'desc_bk_id' => 'Studi tentang unit operasi dalam industri proses kimia.', 'desc_bk_en' => 'Study of unit operations in the chemical process industry.'],
            ['id_bk' => 17, 'id_ps' => 6, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Termodinamika Teknik Kimia', 'kategori' => 'Inti', 'desc_bk_id' => 'Aplikasi prinsip termodinamika dalam sistem kimia.', 'desc_bk_en' => 'Application of thermodynamic principles in chemical systems.'],
            ['id_bk' => 18, 'id_ps' => 6, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Rekayasa Reaktor Kimia', 'kategori' => 'Inti', 'desc_bk_id' => 'Perancangan dan analisis reaktor kimia.', 'desc_bk_en' => 'Design and analysis of chemical reactors.'],

            // Teknologi Informasi (id_ps = 7)
            ['id_bk' => 19, 'id_ps' => 7, 'nama_kode_bk'=>'BK-1', 'nama_bk' => 'Rekayasa Perangkat Lunak', 'kategori' => 'Inti', 'desc_bk_id' => 'Metodologi dan siklus hidup pengembangan perangkat lunak.', 'desc_bk_en' => 'Methodologies and lifecycle of software development.'],
            ['id_bk' => 20, 'id_ps' => 7, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Jaringan dan Keamanan Siber', 'kategori' => 'Inti', 'desc_bk_id' => 'Konsep jaringan komputer dan strategi keamanan siber.', 'desc_bk_en' => 'Concepts of computer networks and cybersecurity strategies.'],
            ['id_bk' => 21, 'id_ps' => 7, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Sains Data dan Kecerdasan Buatan', 'kategori' => 'Inti', 'desc_bk_id' => 'Analisis data, pembelajaran mesin, dan implementasi AI.', 'desc_bk_en' => 'Data analysis, machine learning, and AI implementation.'],

            // Teknik Elektro (id_ps = 8)
            ['id_bk' => 22, 'id_ps' => 8, 'nama_kode_bk'=>'BK-1', 'nama_bk' => 'Sistem Tenaga Listrik', 'kategori' => 'Inti', 'desc_bk_id' => 'Pembangkitan, transmisi, dan distribusi tenaga listrik.', 'desc_bk_en' => 'Generation, transmission, and distribution of electric power.'],
            ['id_bk' => 23, 'id_ps' => 8, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Rangkaian Elektronika', 'kategori' => 'Inti', 'desc_bk_id' => 'Analisis dan perancangan rangkaian elektronik analog dan digital.', 'desc_bk_en' => 'Analysis and design of analog and digital electronic circuits.'],
            ['id_bk' => 24, 'id_ps' => 8, 'nama_kode_bk'=>'BK-3', 'nama_bk' => 'Sistem Telekomunikasi', 'kategori' => 'Inti', 'desc_bk_id' => 'Prinsip-prinsip sistem komunikasi nirkabel dan optik.', 'desc_bk_en' => 'Principles of wireless and optical communication systems.'],

            // Teknik Geologi (id_ps = 9)
            ['id_bk' => 25, 'id_ps' => 9, 'nama_kode_bk'=>'BK-1','nama_bk' => 'Geologi Struktur', 'kategori' => 'Inti', 'desc_bk_id' => 'Studi tentang deformasi batuan dan struktur kerak bumi.', 'desc_bk_en' => 'Study of rock deformation and Earth\'s crustal structures.'],
            ['id_bk' => 26, 'id_ps' => 9, 'nama_kode_bk'=>'BK-2', 'nama_bk' => 'Petrologi dan Mineralogi', 'kategori' => 'Inti', 'desc_bk_id' => 'Identifikasi dan analisis batuan dan mineral.', 'desc_bk_en' => 'Identification and analysis of rocks and minerals.'],
            ['id_bk' => 27, 'id_ps' => 9, 'nama_kode_bk'=>'BK-3','nama_bk' => 'Geofisika dan Geokimia', 'kategori' => 'Inti', 'desc_bk_id' => 'Metode survei bawah permukaan dan analisis kimia batuan.', 'desc_bk_en' => 'Subsurface survey methods and chemical analysis of rocks.'],
        ]);
    }
}