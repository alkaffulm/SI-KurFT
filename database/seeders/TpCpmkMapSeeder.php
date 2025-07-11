<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TpCpmkMapSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $id = 1;

        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'id_tp_cpmk' => $id++,
                'id_ra' => rand(1, 3),
                'id_tp' => rand(1, 3),
                'id_cpl' => rand(1, 5),
                'id_cpmk' => $i,
                'id_mk' => $i, 
            ];
        }

        DB::table('tp_cpmk_map')->insert($data);
    }
}
