<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MetodePembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('metode_pembelajaran')->insert([
            ['nama_metode_pembelajaran' => 'Ceramah Interaktif'],
            ['nama_metode_pembelajaran' => 'Diskusi Kelompok'],
            ['nama_metode_pembelajaran' => 'Studi Kasus'],
        ]);
    }
}
