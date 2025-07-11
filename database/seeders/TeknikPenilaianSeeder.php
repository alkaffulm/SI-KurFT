<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeknikPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teknik_penilaian')->insert([
            ['id_tp' => 1, 'tahap_penilaian' => 'Formatif', 'teknik_penilaian' => 'Quiz', 'instrumen' => 'Soal Pilihan Ganda', 'kriteria' => 'Pemahaman Konsep', 'bobot_total' => 20],
            ['id_tp' => 2, 'tahap_penilaian' => 'Sumatif', 'teknik_penilaian' => 'UTS', 'instrumen' => 'Soal Essay', 'kriteria' => 'Analisis dan Sintesis', 'bobot_total' => 30],
            ['id_tp' => 3, 'tahap_penilaian' => 'Sumatif', 'teknik_penilaian' => 'UAS', 'instrumen' => 'Soal Komprehensif', 'kriteria' => 'Evaluasi dan Kreasi', 'bobot_total' => 40],
            ['id_tp' => 4, 'tahap_penilaian' => 'Formatif', 'teknik_penilaian' => 'Tugas', 'instrumen' => 'Project', 'kriteria' => 'Aplikasi dan Implementasi', 'bobot_total' => 10],
        ]);
    }
}
