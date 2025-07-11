<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserMataKuliahMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_mata_kuliah_map')->insert([
            ['id_user' => 1, 'id_mk' => 1],
            ['id_user' => 1, 'id_mk' => 2],
            ['id_user' => 2, 'id_mk' => 3],
        ]);
    }
}
