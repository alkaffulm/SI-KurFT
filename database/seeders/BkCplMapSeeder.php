<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BkCplMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bk_cpl_map')->insert([
            ['id_bk' => 1, 'id_cpl' => 1],
            ['id_bk' => 2, 'id_cpl' => 1],
            ['id_bk' => 2, 'id_cpl' => 2],
        ]);
    }
}
