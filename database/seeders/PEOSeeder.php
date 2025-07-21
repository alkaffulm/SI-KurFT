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
            ['kode_peo' => 'PEO-1', 'desc_peo' => 'Ini Deskripsi PEO-1'],
            ['kode_peo' => 'PEO-2', 'desc_peo' => 'Ini Deskripsi PEO-2'],
            ['kode_peo' => 'PEO-3', 'desc_peo' => 'Ini Deskripsi PEO-3'],
            ['kode_peo' => 'PEO-4', 'desc_peo' => 'Ini Deskripsi PEO-4'],
            ['kode_peo' => 'PEO-5', 'desc_peo' => 'Ini Deskripsi PEO-5'],
            ['kode_peo' => 'PEO-6', 'desc_peo' => 'Ini Deskripsi PEO-6'],
            ['kode_peo' => 'PEO-7', 'desc_peo' => 'Ini Deskripsi PEO-7'],
            ['kode_peo' => 'PEO-8', 'desc_peo' => 'Ini Deskripsi PEO-8'],
            ['kode_peo' => 'PEO-9', 'desc_peo' => 'Ini Deskripsi PEO-9'],

        ]);
    }
}
