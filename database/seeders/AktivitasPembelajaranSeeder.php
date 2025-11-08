<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AktivitasPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aktivitas_pembelajaran')->insert([
            // ['id_aktivitas_pembelajaran' => 1, 'id_topic' => 1, 'tipe' => 'TM', 'id_bentuk_pembelajaran' => 1, 'penugasan_mahasiswa' => ''],
            // ['id_aktivitas_pembelajaran' => 2, 'id_topic' => 1, 'tipe' => 'BM', 'id_bentuk_pembelajaran' => 2, 'penugasan_mahasiswa' => ''],
            // ['id_aktivitas_pembelajaran' => 3, 'id_topic' => 1, 'tipe' => 'BT', 'id_bentuk_pembelajaran' => 3, 'penugasan_mahasiswa' => ''],
            // id_topic 1
            ['id_aktivitas_pembelajaran' => 1, 'id_topic' => 1, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 2, 'id_topic' => 1, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 3, 'id_topic' => 1, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 2
            ['id_aktivitas_pembelajaran' => 4, 'id_topic' => 2, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 5, 'id_topic' => 2, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 6, 'id_topic' => 2, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 3
            ['id_aktivitas_pembelajaran' => 7, 'id_topic' => 3, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 8, 'id_topic' => 3, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 9, 'id_topic' => 3, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 4
            ['id_aktivitas_pembelajaran' => 10, 'id_topic' => 4, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 11, 'id_topic' => 4, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 12, 'id_topic' => 4, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 5
            ['id_aktivitas_pembelajaran' => 13, 'id_topic' => 5, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 14, 'id_topic' => 5, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 15, 'id_topic' => 5, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 6
            ['id_aktivitas_pembelajaran' => 16, 'id_topic' => 6, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 17, 'id_topic' => 6, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 18, 'id_topic' => 6, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 7
            ['id_aktivitas_pembelajaran' => 19, 'id_topic' => 7, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 20, 'id_topic' => 7, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 21, 'id_topic' => 7, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 8
            ['id_aktivitas_pembelajaran' => 22, 'id_topic' => 8, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 23, 'id_topic' => 8, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 24, 'id_topic' => 8, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 9
            ['id_aktivitas_pembelajaran' => 25, 'id_topic' => 9, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 26, 'id_topic' => 9, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 27, 'id_topic' => 9, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 10
            ['id_aktivitas_pembelajaran' => 28, 'id_topic' => 10, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 29, 'id_topic' => 10, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 30, 'id_topic' => 10, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
            // id_topic 11
            ['id_aktivitas_pembelajaran' => 31, 'id_topic' => 11, 'tipe' => 'TM', 'jumlah_pertemuan' => '1', 'jumlah_sks' => '1x50'],
            ['id_aktivitas_pembelajaran' => 32, 'id_topic' => 11, 'tipe' => 'BM', 'jumlah_pertemuan' => '2', 'jumlah_sks' => '2x50'],
            ['id_aktivitas_pembelajaran' => 33, 'id_topic' => 11, 'tipe' => 'BT', 'jumlah_pertemuan' => '3', 'jumlah_sks' => '3x50'],
        ]);
    }
}
