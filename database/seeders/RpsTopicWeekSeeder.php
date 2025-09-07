<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsTopicWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps_topic_week')->insert([
            // untuk matkul IMK kurikulum 2020
            ['id_topic' => 1, 'id_week' => 1],
            ['id_topic' => 2, 'id_week' => 2],
            ['id_topic' => 3, 'id_week' => 3],
            ['id_topic' => 4, 'id_week' => 4],
            ['id_topic' => 5, 'id_week' => 5],
            ['id_topic' => 6, 'id_week' => 6],
            ['id_topic' => 6, 'id_week' => 7],
            ['id_topic' => 7, 'id_week' => 8],
            ['id_topic' => 8, 'id_week' => 9],
            ['id_topic' => 8, 'id_week' => 10],
            ['id_topic' => 8, 'id_week' => 11],
            ['id_topic' => 9, 'id_week' => 12],
            ['id_topic' => 9, 'id_week' => 13],
            ['id_topic' => 9, 'id_week' => 14],
            ['id_topic' => 10, 'id_week' => 15],
            ['id_topic' => 11, 'id_week' => 16],

            // untuk matkul IMK kurikulum 2025
            // ['id_topic' => 12, 'id_week' => 1],
            // ['id_topic' => 13, 'id_week' => 2],
            // ['id_topic' => 14, 'id_week' => 3],
            // ['id_topic' => 15, 'id_week' => 4],
            // ['id_topic' => 16, 'id_week' => 5],
            // ['id_topic' => 17, 'id_week' => 6],
            // ['id_topic' => 17, 'id_week' => 7],
            // ['id_topic' => 18, 'id_week' => 8],
            // ['id_topic' => 19, 'id_week' => 9],
            // ['id_topic' => 19, 'id_week' => 10],
            // ['id_topic' => 19, 'id_week' => 11],
            // ['id_topic' => 20, 'id_week' => 12],
            // ['id_topic' => 20, 'id_week' => 13],
            // ['id_topic' => 20, 'id_week' => 14],
            // ['id_topic' => 21, 'id_week' => 15],
            // ['id_topic' => 22, 'id_week' => 16],

        ]);
    }
}
