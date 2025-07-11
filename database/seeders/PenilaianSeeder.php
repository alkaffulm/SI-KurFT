<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penilaianData = [];
        $id = 1;

        for ($id_rps_detail = 1; $id_rps_detail <= 135; $id_rps_detail++) {
            $penilaianData[] = [
                'id_penilaian' => $id++,
                'id_rps_detail' => $id_rps_detail,
                'jenis_penilaian' => 'Tugas',
                'bobot' => number_format(rand(10, 30) / 10, 1), // contoh: 1.0 - 3.0
            ];

            $penilaianData[] = [
                'id_penilaian' => $id++,
                'id_rps_detail' => $id_rps_detail,
                'jenis_penilaian' => 'Kuis',
                'bobot' => number_format(rand(10, 30) / 10, 1),
            ];
        }

        DB::table('penilaian')->insert($penilaianData);
    }
}
