<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AktivitasMetodePembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aktivitas_metode_pembelajaran')->insert([
            // untuk matkul IMK kurikulum 2020
            ['id_aktivitas_pembelajaran' => 1, 'id_metode_pembelajaran' => 1],
            ['id_aktivitas_pembelajaran' => 1, 'id_metode_pembelajaran' => 2],
            ['id_aktivitas_pembelajaran' => 1, 'id_metode_pembelajaran' => 3],
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 3],
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 4],
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 5],
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 6],
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 7],
            ['id_aktivitas_pembelajaran' => 5, 'id_metode_pembelajaran' => 8],
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 1],
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 2],
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 3],
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 9],
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 10],
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 3],
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 4],
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 5],
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 7],
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 11],
            ['id_aktivitas_pembelajaran' => 11, 'id_metode_pembelajaran' => 8],
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 1],
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 2],
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 11],
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 12],
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 13],
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 1],
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 11],
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 12],
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 13],
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 1],
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 2],
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 10],
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 11],
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 12],
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 13],
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 2],
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 3],
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 4],
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 11],
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 12],
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 13],
            ['id_aktivitas_pembelajaran' => 28, 'id_metode_pembelajaran' => 1],
            ['id_aktivitas_pembelajaran' => 28, 'id_metode_pembelajaran' => 2],
            ['id_aktivitas_pembelajaran' => 28, 'id_metode_pembelajaran' => 3],
        ]);        
    }
}
