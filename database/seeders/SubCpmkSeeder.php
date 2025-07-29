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
        $kurikulumByPs = [
            1 => [1, 10],   // PS 1 → kurikulum 1 (2020) dan 10 (2025)
            2 => [2, 11],   // PS 2 → kurikulum 2 (2020) dan 11 (2025)
            3 => [3, 12],   // PS 3 → kurikulum 3 (2020) dan 12 (2025)
            4 => [4, 13],   // PS 4 → kurikulum 4 (2020) dan 13 (2025)
            5 => [5, 14],   // PS 5 → kurikulum 5 (2020) dan 14 (2025)
            6 => [6, 15],   // PS 6 → kurikulum 6 (2020) dan 15 (2025)
            7 => [7, 16],   // PS 7 → kurikulum 7 (2020) dan 16 (2025)
            8 => [8, 17],   // PS 8 → kurikulum 8 (2020) dan 17 (2025)
            9 => [9, 18],   // PS 9 → kurikulum 9 (2020) dan 18 (2025)
        ];

        $subCpmk = [];
        $id = 1;

        for ($i = 1; $i <= 45; $i++) {

            $id_ps = floor(($i - 1) / 5) + 1;
            $i_local = ($i - 1) % 5 + 1;
            $kurikulumList = $kurikulumByPs[$id_ps];
            foreach ($kurikulumList as $id_kurikulum) {
                $tahun = $id_kurikulum <= 9 ? 2020 : 2025;
                
                for ($j = 1; $j <= 3; $j++) {
                    $subCpmk[] = [
                        'id_sub_cpmk' => $id++,
                        'id_cpmk' => $i,
                        'id_ps' => $id_ps,
                        'id_kurikulum' => $id_kurikulum,
                        'nama_kode_sub_cpmk' => "SubCPMK-$i_local.$j",
                        'desc_sub_cpmk_id' => "Deskripsi untuk SubCPMK-$i_local.$j (Kurikulum $tahun)",
                        'desc_sub_cpmk_en' => "Description for SubCPMK-$i_local.$j (Curriculum $tahun)",
                    ];
                }
            }
        }

        DB::table('sub_cpmk')->insert($subCpmk);
    }
}