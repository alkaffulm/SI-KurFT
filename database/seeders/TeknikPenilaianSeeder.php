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
            // id_ps = 1
            ['id_ps'=>'1', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'1', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'1', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'1', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'1', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],

            // id_ps = 2
            ['id_ps'=>'2', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'2', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'2', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'2', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'2', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],

            // id_ps = 3
            ['id_ps'=>'3', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'3', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'3', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'3', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'3', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],

            // id_ps = 4
            ['id_ps'=>'4', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'4', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'4', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'4', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'4', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],

            // id_ps = 5
            ['id_ps'=>'5', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'5', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'5', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'5', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'5', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],

            // id_ps = 6
            ['id_ps'=>'6', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'6', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'6', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'6', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'6', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],

            // id_ps = 7
            ['id_ps'=>'7', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'7', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'7', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'7', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'7', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],
            ['id_ps'=>'7', 'nama_teknik_penilaian' => 'Tugas kelompok kedua', 'kategori' => 'anjay non-test'],

            // id_ps = 8
            ['id_ps'=>'8', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'8', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'8', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'8', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'8', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],

            // id_ps = 9
            ['id_ps'=>'9', 'nama_teknik_penilaian' => 'Quiz', 'kategori' => 'test'],
            ['id_ps'=>'9', 'nama_teknik_penilaian' => 'Tanya jawab', 'kategori' => 'non-test'],
            ['id_ps'=>'9', 'nama_teknik_penilaian' => 'Observasi', 'kategori' => 'non-test'],
            ['id_ps'=>'9', 'nama_teknik_penilaian' => 'Presentasi', 'kategori' => 'non-test'],
            ['id_ps'=>'9', 'nama_teknik_penilaian' => 'Tugas kelompok', 'kategori' => 'non-test'],


        ]);
    }
}
