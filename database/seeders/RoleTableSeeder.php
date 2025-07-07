<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['role' => 'kaprodi'],
            ['role' => 'pimpinan_ft'],
            ['role' => 'dosen'],
            ['role' => 'upm'],
            ['role' => 'admin'],
            ['role' => 'mahasiswa'],
            ['role' => 'koordinator'],
        ]);
    }
}
