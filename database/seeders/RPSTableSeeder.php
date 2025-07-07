<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RPSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps')->insert([
            ['id_user' => 3, 'id_mk' => 1, 'tahun' => 2023, 'file_path' => 'rps/algoritma_2023.pdf'],
            ['id_user' => 3, 'id_mk' => 2, 'tahun' => 2023, 'file_path' => 'rps/struktur_data_2023.pdf'],
            ['id_user' => 4, 'id_mk' => 3, 'tahun' => 2023, 'file_path' => 'rps/basis_data_2023.pdf'],
            ['id_user' => 4, 'id_mk' => 4, 'tahun' => 2023, 'file_path' => 'rps/web_programming_2023.pdf'],
            ['id_user' => 5, 'id_mk' => 5, 'tahun' => 2023, 'file_path' => 'rps/jaringan_2023.pdf'],
            ['id_user' => 5, 'id_mk' => 6, 'tahun' => 2023, 'file_path' => 'rps/sim_2023.pdf'],
            ['id_user' => 6, 'id_mk' => 7, 'tahun' => 2023, 'file_path' => 'rps/analisis_sistem_2023.pdf'],
            ['id_user' => 3, 'id_mk' => 8, 'tahun' => 2023, 'file_path' => 'rps/ai_2023.pdf'],
            ['id_user' => 4, 'id_mk' => 9, 'tahun' => 2023, 'file_path' => 'rps/rpl_2023.pdf'],
        ]);
    }
}
