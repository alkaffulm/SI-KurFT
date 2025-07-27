<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCpmkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    $subCpmk = [];
    $id = 1;

    for ($i = 1; $i <= 45; $i++) {
        // CPMK 1–5 → PS 1, CPMK 6–10 → PS 2, dst.
        $id_ps = floor(($i - 1) / 5) + 1;

        // CPMK lokal: 1–5 (di-reset tiap PS)
        $i_local = ($i - 1) % 5 + 1;

        for ($j = 1; $j <= 3; $j++) {
            $subCpmk[] = [
                'id_sub_cpmk' => $id++,
                'id_cpmk' => $i,
                'id_ps' => $id_ps, 
                'nama_kode_sub_cpmk' => "SC-$i_local.$j",
                // 'kode_sub_cpmk' => $j,
                'desc_sub_cpmk_id' => "Deskripsi untuk SC-$i_local.$j",
                'desc_sub_cpmk_en' => "Description for SC-$i_local.$j",
            ];
        }
    }

    DB::table('sub_cpmk')->insert($subCpmk);
}

}