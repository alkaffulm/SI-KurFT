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
        $subCpmks = [];
        $id_cpmk = 1;

        for ($id_kurikulum = 1; $id_kurikulum <= 18; $id_kurikulum++) {
            $id_ps = ($id_kurikulum <= 9) ? $id_kurikulum : $id_kurikulum - 9;

            for ($nomor_cpmk = 1; $nomor_cpmk <= 5; $nomor_cpmk++) {
                for ($i = 1; $i <= 3; $i++) {
                    $subCpmks[] = [
                        'id_ps' => $id_ps,
                        'id_kurikulum' => $id_kurikulum,
                        'id_cpmk' => $id_cpmk,
                        'nama_kode_sub_cpmk' => "SubCPMK-{$nomor_cpmk}.{$i}",
                        'desc_sub_cpmk_id' => "Deskripsi untuk SubCPMK-{$nomor_cpmk}.{$i}.",
                        'desc_sub_cpmk_en' => "Description For SubCPMK-{$nomor_cpmk}.{$i}.",
                    ];
                }
                $id_cpmk++;
            }
        }

        DB::table('sub_cpmk')->insert($subCpmks);
    }
}
