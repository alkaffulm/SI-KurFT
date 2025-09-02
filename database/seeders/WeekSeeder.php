<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('weeks')->insert([
            ['id_week' => 1, 'week' => 1],
            ['id_week' => 2, 'week' => 2],
            ['id_week' => 3, 'week' => 3],
            ['id_week' => 4, 'week' => 4],
            ['id_week' => 5, 'week' => 5],
            ['id_week' => 6, 'week' => 6],
            ['id_week' => 7, 'week' => 7],
            ['id_week' => 8, 'week' => 8],
            ['id_week' => 9, 'week' => 9],
            ['id_week' => 10, 'week' => 10],
            ['id_week' => 11, 'week' => 11],
            ['id_week' => 12, 'week' => 12],
            ['id_week' => 13, 'week' => 13],
            ['id_week' => 14, 'week' => 14],
            ['id_week' => 15, 'week' => 15],
            ['id_week' => 16, 'week' => 16],

        ]);
    }
}
