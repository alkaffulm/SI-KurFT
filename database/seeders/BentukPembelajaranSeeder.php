<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BentukPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bentuk_pembelajaran')->insert([
            ['nama_bentuk_pembelajaran' => 'Kuliah'],
            ['nama_bentuk_pembelajaran' => 'Belajar Mandiri'],
            ['nama_bentuk_pembelajaran' => 'Penugasan Terstruktur'],
        ]);
    }
}
