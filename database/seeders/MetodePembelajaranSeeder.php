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
            ['nama_metode_pembelajaran' => 'Ceramah'],
            ['nama_metode_pembelajaran' => 'Tanya Jawab'],
            ['nama_metode_pembelajaran' => 'Simulasi Visual'],
            ['nama_metode_pembelajaran' => 'Diskusi Kelas'],
            ['nama_metode_pembelajaran' => 'Simulasi Interaktif'],
            ['nama_metode_pembelajaran' => 'Simulasi'],
            ['nama_metode_pembelajaran' => 'Demonstrasi'],
            ['nama_metode_pembelajaran' => 'Simulasi Praktik'],
            ['nama_metode_pembelajaran' => 'Presentasi'],
            ['nama_metode_pembelajaran' => 'Umpan Balik'],

            // ['nama_metode_pembelajaran' => 'Scaffolding'],
            // ['nama_metode_pembelajaran' => 'Student Participation'],
            // ['nama_metode_pembelajaran' => 'Small Group Discussion'],
            // ['nama_metode_pembelajaran' => 'Reading Comprehenion'],
            // ['nama_metode_pembelajaran' => 'Mini Pre-test'],
            // ['nama_metode_pembelajaran' => 'Mini Post-test'],
            // ['nama_metode_pembelajaran' => 'Student Talk'],
            // ['nama_metode_pembelajaran' => 'Collaborative Learning'],
            // ['nama_metode_pembelajaran' => 'Hands-on'],
            // ['nama_metode_pembelajaran' => 'Practice'],
            // ['nama_metode_pembelajaran' => 'Presentasi'],
            // ['nama_metode_pembelajaran' => 'Umpan Balik'],
        ]);
    }
}
