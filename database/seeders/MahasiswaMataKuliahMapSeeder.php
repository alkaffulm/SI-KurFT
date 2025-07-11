<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaMataKuliahMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa_mata_kuliah_map')->insert([
            ['id_mhs' => 1, 'id_mk' => 1],
            ['id_mhs' => 1, 'id_mk' => 2],
            ['id_mhs' => 2, 'id_mk' => 1],
        ]);
    }
}
