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
            // Menentukan id_ps berdasarkan id_cpmk ($i)
            // CPMK 1-5 -> PS 1, CPMK 6-10 -> PS 2, dst.
            $id_ps = floor(($i - 1) / 5) + 1;

            for ($j = 1; $j <= 3; $j++) {
                $subCpmk[] = [
                    'id_sub_cpmk' => $id++,
                    'id_cpmk' => $i,
                    'id_ps' => $id_ps, // <-- Kolom id_ps ditambahkan di sini
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