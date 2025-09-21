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
            // id_ps = 1
            ['id_ps'=>'1' ,'id_model_pembelajaran' => 1, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'1' ,'id_model_pembelajaran' => 2, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 2
            ['id_ps'=>'2' ,'id_model_pembelajaran' => 3, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'2' ,'id_model_pembelajaran' => 4, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 3
            ['id_ps'=>'3' ,'id_model_pembelajaran' => 5, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'3' ,'id_model_pembelajaran' => 6, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 4
            ['id_ps'=>'4' ,'id_model_pembelajaran' => 7, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'4' ,'id_model_pembelajaran' => 8, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 5
            ['id_ps'=>'5' ,'id_model_pembelajaran' => 9, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'5' ,'id_model_pembelajaran' => 10, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 6
            ['id_ps'=>'6' ,'id_model_pembelajaran' => 11, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'6' ,'id_model_pembelajaran' => 12, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 7
            ['id_ps'=>'7' ,'id_model_pembelajaran' => 13, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'7' ,'id_model_pembelajaran' => 14, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 8
            ['id_ps'=>'8' ,'id_model_pembelajaran' => 15, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'8' ,'id_model_pembelajaran' => 16, 'nama_model_pembelajaran' => 'Project Based Learning'],

            // id_ps = 9
            ['id_ps'=>'9' ,'id_model_pembelajaran' => 17, 'nama_model_pembelajaran' => 'Case Based Learning'],
            ['id_ps'=>'9' ,'id_model_pembelajaran' => 18, 'nama_model_pembelajaran' => 'Project Based Learning'],



        ]);
    }
}
