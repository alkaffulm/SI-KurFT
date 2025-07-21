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
            ['id_peo' => 1, 'kode_peo' => 'PEO-1', 'desc' => 'Mampu menganalisis kebutuhan rekayasa'],
            ['id_peo' => 2, 'kode_peo' => 'PEO-2', 'desc' => 'Mampu mengevaluasi proses pertambangan'],
            ['id_peo' => 3, 'kode_peo' => 'PEO-3', 'desc' => 'Mampu merancang sistem mekanis'],
            ['id_peo' => 4, 'kode_peo' => 'PEO-4', 'desc' => 'Mampu mengelola limbah secara berkelanjutan'],
            ['id_peo' => 5, 'kode_peo' => 'PEO-5', 'desc' => 'Mampu mendesain bangunan yang estetis dan fungsional'],
            ['id_peo' => 6, 'kode_peo' => 'PEO-6', 'desc' => 'Mampu menganalisis proses reaksi kimia'],
            ['id_peo' => 7, 'kode_peo' => 'PEO-7', 'desc' => 'Mampu membangun aplikasi perangkat lunak'],
            ['id_peo' => 8, 'kode_peo' => 'PEO-8', 'desc' => 'Mampu merancang sistem kontrol elektronik'],
            ['id_peo' => 9, 'kode_peo' => 'PEO-9', 'desc' => 'Mampu melakukan pemetaan geologi'],

        ]);
    }
}
