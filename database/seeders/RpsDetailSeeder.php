<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $id = 1;
        $id_sub_cpmk = 1;

        for ($id_rps = 1; $id_rps <= 45; $id_rps++) {
            for ($i = 0; $i < 3; $i++) {
                $data[] = [
                    'id_rps_detail' => $id++,
                    'id_rps' => $id_rps,
                    'id_sub_cpmk' => $id_sub_cpmk++,
                    'minggu' => rand(1, 16),
                    'penilaian' => number_format(rand(50, 100) / 10, 1),
                    'bobot' => number_format(rand(10, 30) / 10, 1),
                ];
            }
        }

        DB::table('rps_detail')->insert($data);
    }
}
