<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            ['id_mk' => 1, 'id_ps' => 1, 'nama_matkul' => 'Mekanika Teknik', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 2, 'id_ps' => 1, 'nama_matkul' => 'Struktur Beton', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 3, 'id_ps' => 1, 'nama_matkul' => 'Hidrolika', 'jumlah_sks' => 2, 'semester' => 3],
            ['id_mk' => 4, 'id_ps' => 1, 'nama_matkul' => 'Manajemen Konstruksi', 'jumlah_sks' => 3, 'semester' => 4],
            ['id_mk' => 5, 'id_ps' => 1, 'nama_matkul' => 'Geoteknik', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 6, 'id_ps' => 2, 'nama_matkul' => 'Geologi Dasar', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 7, 'id_ps' => 2, 'nama_matkul' => 'Eksplorasi Tambang', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 8, 'id_ps' => 2, 'nama_matkul' => 'Penambangan Permukaan', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 9, 'id_ps' => 2, 'nama_matkul' => 'Ventilasi Tambang', 'jumlah_sks' => 2, 'semester' => 4],
            ['id_mk' => 10, 'id_ps' => 2, 'nama_matkul' => 'Evaluasi Cadangan', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 11, 'id_ps' => 3, 'nama_matkul' => 'Termodinamika', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 12, 'id_ps' => 3, 'nama_matkul' => 'Mekanika Fluida', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 13, 'id_ps' => 3, 'nama_matkul' => 'Konversi Energi', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 14, 'id_ps' => 3, 'nama_matkul' => 'Perpindahan Panas', 'jumlah_sks' => 2, 'semester' => 4],
            ['id_mk' => 15, 'id_ps' => 3, 'nama_matkul' => 'Desain Mesin', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 16, 'id_ps' => 4, 'nama_matkul' => 'Kimia Lingkungan', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 17, 'id_ps' => 4, 'nama_matkul' => 'Teknologi Air Bersih', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 18, 'id_ps' => 4, 'nama_matkul' => 'Pengelolaan Limbah', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 19, 'id_ps' => 4, 'nama_matkul' => 'EKL dan AMDAL', 'jumlah_sks' => 2, 'semester' => 4],
            ['id_mk' => 20, 'id_ps' => 4, 'nama_matkul' => 'Teknologi Lingkungan', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 21, 'id_ps' => 5, 'nama_matkul' => 'Dasar Desain Arsitektur', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 22, 'id_ps' => 5, 'nama_matkul' => 'Arsitektur Vernakular', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 23, 'id_ps' => 5, 'nama_matkul' => 'Teknologi Bangunan', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 24, 'id_ps' => 5, 'nama_matkul' => 'Perancangan Kota', 'jumlah_sks' => 2, 'semester' => 4],
            ['id_mk' => 25, 'id_ps' => 5, 'nama_matkul' => 'Manajemen Proyek Arsitektur', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 26, 'id_ps' => 6, 'nama_matkul' => 'Kimia Dasar', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 27, 'id_ps' => 6, 'nama_matkul' => 'Perpindahan Massa', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 28, 'id_ps' => 6, 'nama_matkul' => 'Rekayasa Reaksi Kimia', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 29, 'id_ps' => 6, 'nama_matkul' => 'Instrumentasi Proses', 'jumlah_sks' => 2, 'semester' => 4],
            ['id_mk' => 30, 'id_ps' => 6, 'nama_matkul' => 'Manajemen Industri Kimia', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 31, 'id_ps' => 7, 'nama_matkul' => 'Algoritma dan Pemrograman', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 32, 'id_ps' => 7, 'nama_matkul' => 'Struktur Data', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 33, 'id_ps' => 7, 'nama_matkul' => 'Basis Data', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 34, 'id_ps' => 7, 'nama_matkul' => 'Rekayasa Perangkat Lunak', 'jumlah_sks' => 3, 'semester' => 4],
            ['id_mk' => 35, 'id_ps' => 7, 'nama_matkul' => 'Kecerdasan Buatan', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 36, 'id_ps' => 8, 'nama_matkul' => 'Dasar-Dasar Listrik', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 37, 'id_ps' => 8, 'nama_matkul' => 'Elektronika Dasar', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 38, 'id_ps' => 8, 'nama_matkul' => 'Sistem Digital', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 39, 'id_ps' => 8, 'nama_matkul' => 'Mikrokontroler', 'jumlah_sks' => 2, 'semester' => 4],
            ['id_mk' => 40, 'id_ps' => 8, 'nama_matkul' => 'Sistem Kendali', 'jumlah_sks' => 3, 'semester' => 5],

            ['id_mk' => 41, 'id_ps' => 9, 'nama_matkul' => 'Geologi Fisik', 'jumlah_sks' => 3, 'semester' => 1],
            ['id_mk' => 42, 'id_ps' => 9, 'nama_matkul' => 'Mineralogi', 'jumlah_sks' => 3, 'semester' => 2],
            ['id_mk' => 43, 'id_ps' => 9, 'nama_matkul' => 'Petrologi', 'jumlah_sks' => 3, 'semester' => 3],
            ['id_mk' => 44, 'id_ps' => 9, 'nama_matkul' => 'Struktur Geologi', 'jumlah_sks' => 2, 'semester' => 4],
            ['id_mk' => 45, 'id_ps' => 9, 'nama_matkul' => 'Geologi Teknik', 'jumlah_sks' => 3, 'semester' => 5],
        ]);
    }
}
