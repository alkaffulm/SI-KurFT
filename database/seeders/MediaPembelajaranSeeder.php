<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MediaPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('media_pembelajaran')->insert([
          ['nama_media_pembelajaran' => 'E-learning ULM', 'tipe' => 'perangkat_lunak'],  
          ['nama_media_pembelajaran' => 'PPT Materi', 'tipe' => 'perangkat_lunak'],  
          ['nama_media_pembelajaran' => 'E-Book', 'tipe' => 'perangkat_lunak'],  
          ['nama_media_pembelajaran' => 'Jurnal', 'tipe' => 'perangkat_lunak'],  
          ['nama_media_pembelajaran' => 'Komputer', 'tipe' => 'perangkat_keras'],  
          ['nama_media_pembelajaran' => 'Laptop', 'tipe' => 'perangkat_keras'],  
          ['nama_media_pembelajaran' => 'Smartphone', 'tipe' => 'perangkat_keras'], 
          ['nama_media_pembelajaran' => 'Proyektor', 'tipe' => 'perangkat_keras'],   
        ]);
    }
}
