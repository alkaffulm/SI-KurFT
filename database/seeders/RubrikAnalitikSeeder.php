<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubrikAnalitikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rubrik_analitik')->insert([
            ['id_ra' => 1, 'grade' => 'Sangat Kurang', 'skor' => 20, 'kriteria' => 'Rancangan yang disajikan tidak teratur dan tidak menyelesaikan permasalahan '],
            ['id_ra' => 2, 'grade' => 'Kurang', 'skor' => 21, 'kriteria' => 'Rancangan yang disajikan teratur namun kurang menyelesaikan permasalahan.'],
            ['id_ra' => 3, 'grade' => 'Cukup', 'skor' => 41, 'kriteria' => 'Rancangan yang disajikan tersistematis, menyelesaikan masalah, namun kurang dapat diimplementasikan'],
            ['id_ra' => 4, 'grade' => 'Baik', 'skor' => 61, 'kriteria' => 'Rancangan yang disajikan sistematis, menyelesaikan masalah, dapat diimplementasikan, kurang inovatif '],
            ['id_ra' => 5, 'grade' => 'Sangat Baik', 'skor' => 81, 'kriteria' => 'Rancangan yang disajikan sistematis, menyelesaikan masalah dan dapat diimplementasikan dan inovatif']
        ]);
    }
}
