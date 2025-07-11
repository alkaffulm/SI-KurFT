<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaCplMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa_cpl_map')->insert([
            ['id_mhs' => 1, 'id_cpl' => 1],
            ['id_mhs' => 2, 'id_cpl' => 2],
        ]);
    }
}
