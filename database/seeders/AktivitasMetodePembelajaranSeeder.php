<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AktivitasMetodePembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aktivitas_metode_pembelajaran')->insert([
            // untuk matkul IMK kurikulum 2020
            ['id_aktivitas_pembelajaran' => 1, 'id_metode_pembelajaran' => 79], 
            ['id_aktivitas_pembelajaran' => 1, 'id_metode_pembelajaran' => 80], 
            ['id_aktivitas_pembelajaran' => 1, 'id_metode_pembelajaran' => 81], 
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 81], 
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 82], 
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 83], 
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 84], 
            ['id_aktivitas_pembelajaran' => 4, 'id_metode_pembelajaran' => 85], 
            ['id_aktivitas_pembelajaran' => 5, 'id_metode_pembelajaran' => 86], 
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 79], 
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 80], 
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 81], 
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 87], 
            ['id_aktivitas_pembelajaran' => 7, 'id_metode_pembelajaran' => 88], 
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 81], 
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 82], 
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 83], 
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 85], 
            ['id_aktivitas_pembelajaran' => 10, 'id_metode_pembelajaran' => 89], 
            ['id_aktivitas_pembelajaran' => 11, 'id_metode_pembelajaran' => 86], 
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 79], 
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 80], 
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 89], 
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 90], 
            ['id_aktivitas_pembelajaran' => 13, 'id_metode_pembelajaran' => 91], 
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 79], 
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 89], 
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 90], 
            ['id_aktivitas_pembelajaran' => 16, 'id_metode_pembelajaran' => 91], 
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 79], 
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 80], 
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 88], 
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 89], 
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 90], 
            ['id_aktivitas_pembelajaran' => 22, 'id_metode_pembelajaran' => 91], 
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 80], 
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 81], 
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 82], 
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 89], 
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 90], 
            ['id_aktivitas_pembelajaran' => 25, 'id_metode_pembelajaran' => 91], 
            ['id_aktivitas_pembelajaran' => 28, 'id_metode_pembelajaran' => 79], 
            ['id_aktivitas_pembelajaran' => 28, 'id_metode_pembelajaran' => 80], 
            ['id_aktivitas_pembelajaran' => 28, 'id_metode_pembelajaran' => 81], 
        ]);        
    }
}
