<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CPMKTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cpmk')->insert([
            ['id_mk' => 1, 'kode_cpmk' => 1, 'desc' => 'Mahasiswa mampu memahami konsep algoritma dan logika pemrograman'],
            ['id_mk' => 1, 'kode_cpmk' => 2, 'desc' => 'Mahasiswa mampu mengimplementasikan algoritma dalam bahasa pemrograman'],
            ['id_mk' => 2, 'kode_cpmk' => 1, 'desc' => 'Mahasiswa mampu memahami konsep struktur data linear dan non-linear'],
            ['id_mk' => 2, 'kode_cpmk' => 2, 'desc' => 'Mahasiswa mampu mengimplementasikan struktur data dalam pemrograman'],
            ['id_mk' => 3, 'kode_cpmk' => 1, 'desc' => 'Mahasiswa mampu memahami konsep basis data relasional'],
            ['id_mk' => 3, 'kode_cpmk' => 2, 'desc' => 'Mahasiswa mampu merancang dan mengimplementasikan basis data'],
            ['id_mk' => 4, 'kode_cpmk' => 1, 'desc' => 'Mahasiswa mampu memahami teknologi web dan client-server'],
            ['id_mk' => 4, 'kode_cpmk' => 2, 'desc' => 'Mahasiswa mampu mengembangkan aplikasi web dinamis'],
            ['id_mk' => 5, 'kode_cpmk' => 1, 'desc' => 'Mahasiswa mampu memahami konsep jaringan komputer dan protokol'],
        ]);
    }
}
