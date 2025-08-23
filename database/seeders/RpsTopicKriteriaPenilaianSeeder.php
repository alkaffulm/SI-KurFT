<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsTopicKriteriaPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps_topic_kriteria_penilaian')->insert([
            ['id_topic' => 1, 'id_kriteria_penilaian' => 1],
            ['id_topic' => 2, 'id_kriteria_penilaian' => 2],
            ['id_topic' => 3, 'id_kriteria_penilaian' => 3],
            ['id_topic' => 4, 'id_kriteria_penilaian' => 2],
            ['id_topic' => 5, 'id_kriteria_penilaian' => 3],
            ['id_topic' => 5, 'id_kriteria_penilaian' => 4],
            ['id_topic' => 6, 'id_kriteria_penilaian' => 3],
            ['id_topic' => 6, 'id_kriteria_penilaian' => 4],
            ['id_topic' => 8, 'id_kriteria_penilaian' => 3],
            ['id_topic' => 8, 'id_kriteria_penilaian' => 4],
            ['id_topic' => 9, 'id_kriteria_penilaian' => 3],
            ['id_topic' => 9, 'id_kriteria_penilaian' => 4],
            ['id_topic' => 10, 'id_kriteria_penilaian' => 1],
        ]);
    }
}
