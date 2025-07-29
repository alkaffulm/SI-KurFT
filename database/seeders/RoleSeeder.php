<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['id_role' => 1, 'role' => 'Admin'],
            ['id_role' => 2, 'role' => 'Dosen'],
            ['id_role' => 3, 'role' => 'Kaprodi'],
            ['id_role' => 4, 'role' => 'PimpinanFT'],
            ['id_role' => 5, 'role' => 'UPM'],
            ['id_role' => 6, 'role' => 'Developer'],
        ]);

    }
}
