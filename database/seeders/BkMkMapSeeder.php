<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BkMkMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bk_mk_map')->insert([
            ['id_bk' => 1, 'id_mk' => 1],
            ['id_bk' => 1, 'id_mk' => 2],
            ['id_bk' => 2, 'id_mk' => 1],
        ]);
    }
}
