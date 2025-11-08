<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AktivitasBentukPenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aktivitas_bentuk_penugasan')->insert([
            ['id_aktivitas_pembelajaran' => 1, 'id_bentuk_penugasan' => 1],
            ['id_aktivitas_pembelajaran' => 2, 'id_bentuk_penugasan' => 2],
            ['id_aktivitas_pembelajaran' => 3, 'id_bentuk_penugasan' => 3],
            ['id_aktivitas_pembelajaran' => 4, 'id_bentuk_penugasan' => 4],
            ['id_aktivitas_pembelajaran' => 5, 'id_bentuk_penugasan' => 5],
            ['id_aktivitas_pembelajaran' => 5, 'id_bentuk_penugasan' => 3], // Tambahan kelipatan 5
            ['id_aktivitas_pembelajaran' => 6, 'id_bentuk_penugasan' => 1],
            ['id_aktivitas_pembelajaran' => 7, 'id_bentuk_penugasan' => 2],
            ['id_aktivitas_pembelajaran' => 8, 'id_bentuk_penugasan' => 3],
            ['id_aktivitas_pembelajaran' => 9, 'id_bentuk_penugasan' => 4],
            ['id_aktivitas_pembelajaran' => 10, 'id_bentuk_penugasan' => 5],
            ['id_aktivitas_pembelajaran' => 10, 'id_bentuk_penugasan' => 3], // Tambahan kelipatan 5
            ['id_aktivitas_pembelajaran' => 10, 'id_bentuk_penugasan' => 4], // Tambahan kelipatan 10
            ['id_aktivitas_pembelajaran' => 11, 'id_bentuk_penugasan' => 1],
            ['id_aktivitas_pembelajaran' => 12, 'id_bentuk_penugasan' => 2],
            ['id_aktivitas_pembelajaran' => 13, 'id_bentuk_penugasan' => 3],
            ['id_aktivitas_pembelajaran' => 14, 'id_bentuk_penugasan' => 4],
            ['id_aktivitas_pembelajaran' => 15, 'id_bentuk_penugasan' => 5],
            ['id_aktivitas_pembelajaran' => 15, 'id_bentuk_penugasan' => 3], // Tambahan kelipatan 5
            ['id_aktivitas_pembelajaran' => 16, 'id_bentuk_penugasan' => 1],
            ['id_aktivitas_pembelajaran' => 17, 'id_bentuk_penugasan' => 2],
            ['id_aktivitas_pembelajaran' => 18, 'id_bentuk_penugasan' => 3],
            ['id_aktivitas_pembelajaran' => 19, 'id_bentuk_penugasan' => 4],
            ['id_aktivitas_pembelajaran' => 20, 'id_bentuk_penugasan' => 5],
            ['id_aktivitas_pembelajaran' => 20, 'id_bentuk_penugasan' => 3], // Tambahan kelipatan 5
            ['id_aktivitas_pembelajaran' => 20, 'id_bentuk_penugasan' => 4], // Tambahan kelipatan 10
            ['id_aktivitas_pembelajaran' => 21, 'id_bentuk_penugasan' => 1],
            ['id_aktivitas_pembelajaran' => 22, 'id_bentuk_penugasan' => 2],
            ['id_aktivitas_pembelajaran' => 23, 'id_bentuk_penugasan' => 3],
            ['id_aktivitas_pembelajaran' => 24, 'id_bentuk_penugasan' => 4],
            ['id_aktivitas_pembelajaran' => 25, 'id_bentuk_penugasan' => 5],
            ['id_aktivitas_pembelajaran' => 25, 'id_bentuk_penugasan' => 3], // Tambahan kelipatan 5
            ['id_aktivitas_pembelajaran' => 26, 'id_bentuk_penugasan' => 1],
            ['id_aktivitas_pembelajaran' => 27, 'id_bentuk_penugasan' => 2],
            ['id_aktivitas_pembelajaran' => 28, 'id_bentuk_penugasan' => 3],
            ['id_aktivitas_pembelajaran' => 29, 'id_bentuk_penugasan' => 4],
            ['id_aktivitas_pembelajaran' => 30, 'id_bentuk_penugasan' => 5],
            ['id_aktivitas_pembelajaran' => 30, 'id_bentuk_penugasan' => 3], // Tambahan kelipatan 5
            ['id_aktivitas_pembelajaran' => 30, 'id_bentuk_penugasan' => 4], // Tambahan kelipatan 10
            ['id_aktivitas_pembelajaran' => 31, 'id_bentuk_penugasan' => 1],
            ['id_aktivitas_pembelajaran' => 32, 'id_bentuk_penugasan' => 2],
            ['id_aktivitas_pembelajaran' => 33, 'id_bentuk_penugasan' => 3],
        ]);        
    }
}
