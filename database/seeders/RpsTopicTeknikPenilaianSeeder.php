<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsTopicTeknikPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps_topic_teknik_penilaian')->insert([
            // untuk matkul IMK kurikulum 2020
            ['id_topic' => 1, 'id_teknik_penilaian' => 31], 
            ['id_topic' => 2, 'id_teknik_penilaian' => 32], 
            ['id_topic' => 3, 'id_teknik_penilaian' => 34], 
            ['id_topic' => 4, 'id_teknik_penilaian' => 32], 
            ['id_topic' => 4, 'id_teknik_penilaian' => 33], 
            ['id_topic' => 5, 'id_teknik_penilaian' => 34], 
            ['id_topic' => 5, 'id_teknik_penilaian' => 35], 
            ['id_topic' => 6, 'id_teknik_penilaian' => 33], 
            ['id_topic' => 6, 'id_teknik_penilaian' => 34], 
            ['id_topic' => 8, 'id_teknik_penilaian' => 34], 
            ['id_topic' => 8, 'id_teknik_penilaian' => 35], 
            ['id_topic' => 9, 'id_teknik_penilaian' => 34], 
            ['id_topic' => 9, 'id_teknik_penilaian' => 35], 
            ['id_topic' => 10, 'id_teknik_penilaian' => 31], 

            // // untuk matkul IMK kurikulum 2025
            // ['id_topic' => 1, 'id_teknik_penilaian' => 31], 
            // ['id_topic' => 2, 'id_teknik_penilaian' => 32], 
            // ['id_topic' => 3, 'id_teknik_penilaian' => 34], 
            // ['id_topic' => 4, 'id_teknik_penilaian' => 32], 
            // ['id_topic' => 4, 'id_teknik_penilaian' => 33], 
            // ['id_topic' => 5, 'id_teknik_penilaian' => 34], 
            // ['id_topic' => 5, 'id_teknik_penilaian' => 35], 
            // ['id_topic' => 6, 'id_teknik_penilaian' => 33], 
            // ['id_topic' => 6, 'id_teknik_penilaian' => 34], 
            // ['id_topic' => 8, 'id_teknik_penilaian' => 34], 
            // ['id_topic' => 8, 'id_teknik_penilaian' => 35], 
            // ['id_topic' => 9, 'id_teknik_penilaian' => 34], 
            // ['id_topic' => 9, 'id_teknik_penilaian' => 35], 
            // ['id_topic' => 10, 'id_teknik_penilaian' => 31], 
        ]);
    }
}
