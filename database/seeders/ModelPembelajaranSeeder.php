<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('model_pembelajaran')->insert([
            ['id_model_pembelajaran' => 1, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_model_pembelajaran' => 2, 'nama_model_pembelajaran' => 'Project Based Learning']

        ]);
    }
}
