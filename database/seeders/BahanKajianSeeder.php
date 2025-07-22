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
            [
                'id_bk' => 1,
                'nama_bk' => 'Virtual Systems and Services',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Dasar-dasar algoritma dan pemrograman.',
                'desc_bk_en' => 'Fundamentals of algorithms and programming.'
            ],
            [
                'id_bk' => 2,
                'nama_bk' => 'Internet of Things',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Konsep struktur data dan implementasinya.',
                'desc_bk_en' => 'Concepts of data structures and their implementation.'
            ],
            [
                'id_bk' => 3,
                'nama_bk' => 'Jaringan Komputer',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Konsep dan implementasi basis data.',
                'desc_bk_en' => 'Concepts and implementation of databases.'
            ],
            [
                'id_bk' => 4,
                'nama_bk' => 'Teknologi Sistem Terintegrasi',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Metodologi pengembangan perangkat lunak.',
                'desc_bk_en' => 'Software development methodologies.'
            ],
            [
                'id_bk' => 5,
                'nama_bk' => 'Teknologi Platform',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Konsep dan implementasi jaringan komputer.',
                'desc_bk_en' => 'Concepts and implementation of computer networks.'
            ],
            [
                'id_bk' => 6,
                'nama_bk' => 'Pengembangan Aplikasi Berbasis Platform',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Dasar-dasar algoritma dan pemrograman.',
                'desc_bk_en' => 'Fundamentals of algorithms and programming.'
            ],
            [
                'id_bk' => 7,
                'nama_bk' => 'Prinsip-prinsip Keamanan Siber',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Konsep struktur data dan implementasinya.',
                'desc_bk_en' => 'Concepts of data structures and their implementation.'
            ],
            [
                'id_bk' => 8,
                'nama_bk' => 'Praktek Profesional Global',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Konsep dan implementasi basis data.',
                'desc_bk_en' => 'Concepts and implementation of databases.'
            ],
            [
                'id_bk' => 9,
                'nama_bk' => 'Manajemen Data dan Informasi',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Metodologi pengembangan perangkat lunak.',
                'desc_bk_en' => 'Software development methodologies.'
            ],
            [
                'id_bk' => 10,
                'nama_bk' => 'Fundamental Perangkat Lunak',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Konsep dan implementasi jaringan komputer.',
                'desc_bk_en' => 'Concepts and implementation of computer networks.'
            ],
            [
                'id_bk' => 11,
                'nama_bk' => 'Desain User Experience',
                'kategori' => 'Inti',
                'desc_bk_id' => 'Dasar-dasar algoritma dan pemrograman.',
                'desc_bk_en' => 'Fundamentals of algorithms and programming.'
            ]
        ]);
    }
}
