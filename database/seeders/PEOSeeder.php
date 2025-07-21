<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peo')->insert([
            ['id_peo' => 1, 'kode_peo' => 'PEO-1', 'desc_peo' => 'Ini Deskripsi PEO-1'],
            ['id_peo' => 2, 'kode_peo' => 'PEO-2', 'desc_peo' => 'Ini Deskripsi PEO-2'],
            ['id_peo' => 3, 'kode_peo' => 'PEO-3', 'desc_peo' => 'Ini Deskripsi PEO-3'],
            ['id_peo' => 4, 'kode_peo' => 'PEO-4', 'desc_peo' => 'Ini Deskripsi PEO-4'],
            ['id_peo' => 5, 'kode_peo' => 'PEO-5', 'desc_peo' => 'Ini Deskripsi PEO-5'],
            ['id_peo' => 6, 'kode_peo' => 'PEO-6', 'desc_peo' => 'Ini Deskripsi PEO-6'],
            ['id_peo' => 7, 'kode_peo' => 'PEO-7', 'desc_peo' => 'Ini Deskripsi PEO-7'],
            ['id_peo' => 8, 'kode_peo' => 'PEO-8', 'desc_peo' => 'Ini Deskripsi PEO-8'],
            ['id_peo' => 9, 'kode_peo' => 'PEO-9', 'desc_peo' => 'Ini Deskripsi PEO-9'],

        ]);
    }
}
