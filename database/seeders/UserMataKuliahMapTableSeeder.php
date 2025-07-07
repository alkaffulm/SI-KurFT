<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserMataKuliahMapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_mata_kuliah_map')->insert([
            ['id_user' => 3, 'id_mk' => 1], // dosen TI 1 mengajar Algoritma
            ['id_user' => 3, 'id_mk' => 2], // dosen TI 1 mengajar Struktur Data
            ['id_user' => 4, 'id_mk' => 3], // dosen TI 2 mengajar Basis Data
            ['id_user' => 4, 'id_mk' => 4], // dosen TI 2 mengajar Web Programming
            ['id_user' => 5, 'id_mk' => 5], // dosen SI 1 mengajar Jaringan
            ['id_user' => 5, 'id_mk' => 6], // dosen SI 1 mengajar SIM
            ['id_user' => 6, 'id_mk' => 7], // dosen TK 1 mengajar Analisis Sistem
            ['id_user' => 3, 'id_mk' => 8], // dosen TI 1 mengajar AI
            ['id_user' => 4, 'id_mk' => 9], // dosen TI 2 mengajar RPL
        ]);
    }
}
