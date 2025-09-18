<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RpsMediaPembelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps_media_pembelajaran')->insert([
            ['id_rps' => 1, 'id_media_pembelajaran' => 1],
            ['id_rps' => 1, 'id_media_pembelajaran' => 2],
            ['id_rps' => 1, 'id_media_pembelajaran' => 3],
            ['id_rps' => 1, 'id_media_pembelajaran' => 4],
            ['id_rps' => 1, 'id_media_pembelajaran' => 5],
            ['id_rps' => 1, 'id_media_pembelajaran' => 6],
            ['id_rps' => 1, 'id_media_pembelajaran' => 7],
            ['id_rps' => 1, 'id_media_pembelajaran' => 8],
        ]);
    }
}
