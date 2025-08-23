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
            ['id_topic' => 1, 'minggu_ke' => 1],
            ['id_topic' => 2, 'minggu_ke' => 2],
            ['id_topic' => 3, 'minggu_ke' => 3],
            ['id_topic' => 4, 'minggu_ke' => 4],
            ['id_topic' => 5, 'minggu_ke' => 5],
            ['id_topic' => 6, 'minggu_ke' => 6],
            ['id_topic' => 6, 'minggu_ke' => 7],
            ['id_topic' => 7, 'minggu_ke' => 8],
            ['id_topic' => 8, 'minggu_ke' => 9],
            ['id_topic' => 8, 'minggu_ke' => 10],
            ['id_topic' => 8, 'minggu_ke' => 11],
            ['id_topic' => 9, 'minggu_ke' => 12],
            ['id_topic' => 9, 'minggu_ke' => 13],
            ['id_topic' => 9, 'minggu_ke' => 14],
            ['id_topic' => 10, 'minggu_ke' => 15],
            ['id_topic' => 11, 'minggu_ke' => 16],

        ]);
    }
}
