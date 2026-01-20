<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BkMkMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bk_mk_map')->insert([
            // ['id_bk' => 1, 'id_mk' => 1],
            // ['id_bk' => 1, 'id_mk' => 2],
            // ['id_bk' => 2, 'id_mk' => 3],
            // ['id_bk' => 2, 'id_mk' => 4],
            // ['id_bk' => 3, 'id_mk' => 5],
            // ['id_bk' => 3, 'id_mk' => 6],
            // ['id_bk' => 4, 'id_mk' => 7],
            // ['id_bk' => 4, 'id_mk' => 8],
            // ['id_bk' => 5, 'id_mk' => 9],
            // ['id_bk' => 5, 'id_mk' => 10],
            // ['id_bk' => 6, 'id_mk' => 11],
            // ['id_bk' => 6, 'id_mk' => 12],
            // ['id_bk' => 7, 'id_mk' => 13],
            // ['id_bk' => 7, 'id_mk' => 14],
            // ['id_bk' => 8, 'id_mk' => 15],
            // ['id_bk' => 8, 'id_mk' => 8],
            // ['id_bk' => 9, 'id_mk' => 9],
            // ['id_bk' => 9, 'id_mk' => 10],
            // ['id_bk' => 10, 'id_mk' => 11],
            // ['id_bk' => 10, 'id_mk' => 12],
            // ['id_bk' => 11, 'id_mk' => 13],
            // ['id_bk' => 11, 'id_mk' => 14],

            // ['id_bk' => 11, 'id_mk' => 1],
            // ['id_bk' => 11, 'id_mk' => 2],
            // ['id_bk' => 1, 'id_mk' => 3],
            // ['id_bk' => 2, 'id_mk' => 4],
            // ['id_bk' => 3, 'id_mk' => 5],
            // ['id_bk' => 11, 'id_mk' => 6],
            // ['id_bk' => 11, 'id_mk' => 7],
            // ['id_bk' => 11, 'id_mk' => 8],
            // ['id_bk' => 11, 'id_mk' => 9],
            // ['id_bk' => 11, 'id_mk' => 10],
            // ['id_bk' => 11, 'id_mk' => 11],
            // ['id_bk' => 11, 'id_mk' => 12],
            // ['id_bk' => 11, 'id_mk' => 13],
            // ['id_bk' => 11, 'id_mk' => 14],
            // ['id_bk' => 8, 'id_mk' => 15],
            // ['id_bk' => 8, 'id_mk' => 8],
            // ['id_bk' => 9, 'id_mk' => 9],
            // ['id_bk' => 9, 'id_mk' => 10],
            // ['id_bk' => 10, 'id_mk' => 11],
            // ['id_bk' => 10, 'id_mk' => 12],
            // ['id_bk' => 11, 'id_mk' => 13],
            // ['id_bk' => 11, 'id_mk' => 14],

            // ['id_bk' => 1, 'id_mk' => 13],
            // ['id_bk' => 1, 'id_mk' => 13],
            // ['id_bk' => 2, 'id_mk' => 14],
            // ['id_bk' => 2, 'id_mk' => 14],
            // ['id_bk' => 3, 'id_mk' => 15],
            // ['id_bk' => 3, 'id_mk' => 15],
            // ['id_bk' => 4, 'id_mk' => 16],
            // ['id_bk' => 4, 'id_mk' => 16],
            // ['id_bk' => 5, 'id_mk' => 17],
            // ['id_bk' => 5, 'id_mk' => 17],
            // ['id_bk' => 6, 'id_mk' => 18],
            // ['id_bk' => 6, 'id_mk' => 18],
            // ['id_bk' => 7, 'id_mk' => 19],
            // ['id_bk' => 7, 'id_mk' => 19],
            // ['id_bk' => 8, 'id_mk' => 20],
            // ['id_bk' => 8, 'id_mk' => 20],
            // ['id_bk' => 9, 'id_mk' => 21],
            // ['id_bk' => 9, 'id_mk' => 21],
            // ['id_bk' => 10, 'id_mk' => 22],
            // ['id_bk' => 10, 'id_mk' => 22],
            // ['id_bk' => 11, 'id_mk' => 23],
            // ['id_bk' => 11, 'id_mk' => 23],

            // ['id_bk' => 1, 'id_mk' => 24],
            // ['id_bk' => 2, 'id_mk' => 24],
            // ['id_bk' => 3, 'id_mk' => 25],
            // ['id_bk' => 4, 'id_mk' => 25],
            // ['id_bk' => 5, 'id_mk' => 26],
            // ['id_bk' => 6, 'id_mk' => 26],
            // ['id_bk' => 7, 'id_mk' => 27],
            // ['id_bk' => 8, 'id_mk' => 27],

            // Bahasa Inggris I
            ['id_bk'=>31,'id_mk'=>31],

            // Pengantar Lingkungan Lahan Basah
            ['id_bk'=>33,'id_mk'=>32],

            // Aljabar Linier
            ['id_bk'=>19,'id_mk'=>33],
            ['id_bk'=>28,'id_mk'=>33],

            // Kalkulus
            ['id_bk'=>19,'id_mk'=>34],
            ['id_bk'=>28,'id_mk'=>34],

            // Berpikir Komputasional
            ['id_bk'=>20,'id_mk'=>35],
            ['id_bk'=>21,'id_mk'=>35],

            // Arsitektur & Organisasi Komputer
            ['id_bk'=>22,'id_mk'=>36],
            ['id_bk'=>23,'id_mk'=>36],

            // Pemrograman I
            ['id_bk'=>21,'id_mk'=>37],

            // Praktikum Pemrograman I
            ['id_bk'=>21,'id_mk'=>38],

            // Bahasa Inggris II
            ['id_bk'=>31,'id_mk'=>39],

            // Matematika Diskrit
            ['id_bk'=>20,'id_mk'=>40],

            // Etika Profesi TI
            ['id_bk'=>29,'id_mk'=>41],

            // Sistem Operasi
            ['id_bk'=>22,'id_mk'=>42],

            // Basis Data I
            ['id_bk'=>28,'id_mk'=>43],

            // Praktikum Basis Data I
            ['id_bk'=>28,'id_mk'=>44],

            // Pemrograman Web I
            ['id_bk'=>21,'id_mk'=>45],

            // Praktikum Pemrograman Web I
            ['id_bk'=>21,'id_mk'=>46],

            // Algoritma & Struktur Data
            ['id_bk'=>20,'id_mk'=>47],
            ['id_bk'=>21,'id_mk'=>47],

            // Praktikum Algoritma & Struktur Data
            ['id_bk'=>20,'id_mk'=>48],
            ['id_bk'=>21,'id_mk'=>48],

            // Statistika & Probabilitas
            ['id_bk'=>20,'id_mk'=>49],

            // Interaksi Manusia Komputer
            ['id_bk'=>26,'id_mk'=>50],

            // Geoinformatika
            ['id_bk'=>32,'id_mk'=>51],

            // Analisis & Perancangan Sistem
            ['id_bk'=>26,'id_mk'=>52], 

            // Jaringan Komputer & Komunikasi Data
            ['id_bk'=>22,'id_mk'=>53],

            // Praktikum Jaringan Komputer
            ['id_bk'=>22,'id_mk'=>54],

            // Pemrograman II
            ['id_bk'=>21,'id_mk'=>55],

            // Praktikum Pemrograman II
            ['id_bk'=>21,'id_mk'=>56],

            // Basis Data II
            ['id_bk'=>28,'id_mk'=>57],

            // Praktikum Basis Data II
            ['id_bk'=>28,'id_mk'=>58],

            // Kewirausahaan
            ['id_bk'=>29,'id_mk'=>59],

            // Keterampilan Berkomunikasi
            ['id_bk'=>32,'id_mk'=>60],

            // Administrasi Sistem & Jaringan
            ['id_bk'=>24,'id_mk'=>61],

            // Keamanan Siber
            ['id_bk'=>32,'id_mk'=>62],

            // Rekayasa Perangkat Lunak
            ['id_bk'=>26,'id_mk'=>63],

            // Pemrograman Mobile
            ['id_bk'=>21,'id_mk'=>64],

            // Praktikum Pemrograman Mobile
            ['id_bk'=>21,'id_mk'=>65],

            // Pemrograman Web II
            ['id_bk'=>21,'id_mk'=>66],

            // Praktikum Pemrograman Web II
            ['id_bk'=>21,'id_mk'=>67],

            // Pancasila
            ['id_bk'=>29,'id_mk'=>68],

            // Layanan & Sistem Virtual
            ['id_bk'=>24,'id_mk'=>69],

            // Kecerdasan Bisnis
            ['id_bk'=>31,'id_mk'=>70],

            // Manajemen Proyek TI
            ['id_bk'=>29,'id_mk'=>71],

            // Metodologi Penelitian
            ['id_bk'=>29,'id_mk'=>72],

            // Bahasa Indonesia
            ['id_bk'=>32,'id_mk'=>73],

            // Kewarganegaraan
            ['id_bk'=>29,'id_mk'=>74],

            // Komputasi Awan
            ['id_bk'=>24,'id_mk'=>75],

            // Integrasi Sistem
            ['id_bk'=>30,'id_mk'=>76],

            // Pengujian & Penjaminan Kualitas PL
            ['id_bk'=>26,'id_mk'=>77],

            // Desain Pengalaman Pengguna
            ['id_bk'=>26,'id_mk'=>78],

            // Agama
            ['id_bk'=>29,'id_mk'=>79],

            // Praktek Kerja Lapangan
            ['id_bk'=>32,'id_mk'=>80],

            // Pra Skripsi
            ['id_bk'=>32,'id_mk'=>81],

            // Skripsi
            ['id_bk'=>32,'id_mk'=>82],

            // Manajemen Layanan TI
            ['id_bk'=>24,'id_mk'=>83],

            // Manajemen Risiko TI
            ['id_bk'=>24,'id_mk'=>84],

            // Arsitektur Enterprise
            ['id_bk'=>30,'id_mk'=>85],

            // Manajemen Keamanan Informasi
            ['id_bk'=>30,'id_mk'=>86],

            // Audit TI
            ['id_bk'=>30,'id_mk'=>87],

            // Data Analitik
            ['id_bk'=>31,'id_mk'=>88],

            // Visualisasi Data
            ['id_bk'=>31,'id_mk'=>89],

            // Pembelajaran Mesin I
            ['id_bk'=>31,'id_mk'=>90],

            // Internet of Things
            ['id_bk'=>22,'id_mk'=>91],

            // Pembelajaran Mesin II
            ['id_bk'=>31,'id_mk'=>92],

            // Jaringan Nirkabel
            ['id_bk'=>22,'id_mk'=>93],

            // Pengembangan Aplikasi Game
            ['id_bk'=>26,'id_mk'=>94],

            // Pengolahan Citra Digital
            ['id_bk'=>31,'id_mk'=>95],

            // Blockchain
            ['id_bk'=>30,'id_mk'=>96],

            // Augmented & Virtual Reality
            ['id_bk'=>26,'id_mk'=>97],

            // Sistem Tertanam
            ['id_bk'=>31,'id_mk'=>98],



            // // untuk matkul IMK kurikulum 2025
            // ['id_bk' => 57, 'id_mk' => 80],
        ]);
    }
}
