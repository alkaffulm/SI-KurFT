<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleMapTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_role_map')->insert([
            ['id_role' => 1, 'id_user' => 1],
            ['id_role' => 1, 'id_user' => 2],
            ['id_role' => 2, 'id_user' => 7],
            ['id_role' => 3, 'id_user' => 3],
            ['id_role' => 3, 'id_user' => 4],
            ['id_role' => 3, 'id_user' => 5],
            ['id_role' => 3, 'id_user' => 6],
            ['id_role' => 4, 'id_user' => 8],
            ['id_role' => 4, 'id_user' => 9],
        ]);
    }
}
