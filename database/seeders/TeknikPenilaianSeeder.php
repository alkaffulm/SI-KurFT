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
            ['nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],
        ]);
    }
}
