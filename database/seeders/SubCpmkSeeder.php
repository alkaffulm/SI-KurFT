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
            for ($j = 1; $j <= 3; $j++) {
                $subCpmk[] = [
                    'id_sub_cpmk' => $id++,
                    'id_cpmk' => $i,
                    'nama_kode_sub_cpmk' => "SC-$i.$j",
                    'kode_sub_cpmk' => $j,
                    'desc_sub_cpmk_id' => "Deskripsi untuk SC-$i.$j",
                    'desc_sub_cpmk_en' => "Description for SC-$i.$j",
                ];
            }
        }

        DB::table('sub_cpmk')->insert($subCpmk);
    }
}
