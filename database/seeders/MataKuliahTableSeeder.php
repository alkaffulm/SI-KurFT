<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MataKuliahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mata_kuliah')->insert([
            ['id_ps' => 1, 'nama_matkul' => 'Algoritma dan Pemrograman', 'jumlah_sks' => '3'],
            ['id_ps' => 1, 'nama_matkul' => 'Struktur Data', 'jumlah_sks' => '3'],
            ['id_ps' => 1, 'nama_matkul' => 'Basis Data', 'jumlah_sks' => '3'],
            ['id_ps' => 1, 'nama_matkul' => 'Pemrograman Web', 'jumlah_sks' => '3'],
            ['id_ps' => 1, 'nama_matkul' => 'Jaringan Komputer', 'jumlah_sks' => '3'],
            ['id_ps' => 2, 'nama_matkul' => 'Sistem Informasi Manajemen', 'jumlah_sks' => '3'],
            ['id_ps' => 2, 'nama_matkul' => 'Analisis dan Perancangan Sistem', 'jumlah_sks' => '3'],
            ['id_ps' => 1, 'nama_matkul' => 'Kecerdasan Buatan', 'jumlah_sks' => '3'],
            ['id_ps' => 1, 'nama_matkul' => 'Rekayasa Perangkat Lunak', 'jumlah_sks' => '3'],
        ]);
    }
}
