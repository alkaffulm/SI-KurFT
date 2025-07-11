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
            ['id_bk' => 1, 'nama_bk' => 'Virtual Systems and Services ', 'kategori' => 'Inti', 'desc' => 'Dasar-dasar algoritma dan pemrograman'],
            ['id_bk' => 2, 'nama_bk' => 'Internet of Things ', 'kategori' => 'Inti', 'desc' => 'Konsep struktur data dan implementasinya'],
            ['id_bk' => 3, 'nama_bk' => 'Jaringan Komputer', 'kategori' => 'Inti', 'desc' => 'Konsep dan implementasi basis data'],
            ['id_bk' => 4, 'nama_bk' => 'Teknologi Sistem Terintegrasi', 'kategori' => 'Inti', 'desc' => 'Metodologi pengembangan perangkat lunak'],
            ['id_bk' => 5, 'nama_bk' => 'Teknologi Platform ', 'kategori' => 'Inti', 'desc' => 'Konsep dan implementasi jaringan komputer'],
            ['id_bk' => 6, 'nama_bk' => 'Pengembangan Aplikasi Berbasis Platform', 'kategori' => 'Inti', 'desc' => 'Dasar-dasar algoritma dan pemrograman'],
            ['id_bk' => 7, 'nama_bk' => 'Prinsip-prinsip Keamanan Siber ', 'kategori' => 'Inti', 'desc' => 'Konsep struktur data dan implementasinya'],
            ['id_bk' => 8, 'nama_bk' => 'Praktek Profesional Global ', 'kategori' => 'Inti', 'desc' => 'Konsep dan implementasi basis data'],
            ['id_bk' => 9, 'nama_bk' => 'Manajemen Data dan Informasi ', 'kategori' => 'Inti', 'desc' => 'Metodologi pengembangan perangkat lunak'],
            ['id_bk' => 10, 'nama_bk' => 'Fundamental Perangkat Lunak ', 'kategori' => 'Inti', 'desc' => 'Konsep dan implementasi jaringan komputer'],
            ['id_bk' => 11, 'nama_bk' => 'Desain User Experience ', 'kategori' => 'Inti', 'desc' => 'Dasar-dasar algoritma dan pemrograman']
        ]);
    }
}
