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
        // $subCpmks = [];
        // $id_cpmk = 1;

        // for ($id_kurikulum = 1; $id_kurikulum <= 18; $id_kurikulum++) {
        //     $id_ps = ($id_kurikulum <= 9) ? $id_kurikulum : $id_kurikulum - 9;

        //     for ($nomor_cpmk = 1; $nomor_cpmk <= 5; $nomor_cpmk++) {
        //         for ($i = 1; $i <= 3; $i++) {
        //             $prefix = ($id_kurikulum >= 10) ? '(2025) ' : '';

        //             $subCpmks[] = [
        //                 'id_ps' => $id_ps,
        //                 'id_kurikulum' => $id_kurikulum,
        //                 'id_cpmk' => $id_cpmk,
        //                 'nama_kode_sub_cpmk' => "{$prefix}SubCPMK-{$nomor_cpmk}.{$i}",
        //                 'desc_sub_cpmk_id' => "{$prefix}Deskripsi untuk SubCPMK-{$nomor_cpmk}.{$i}.",
        //                 'desc_sub_cpmk_en' => "{$prefix}Description For SubCPMK-{$nomor_cpmk}.{$i}.",
        //             ];
        //         }
        //         $id_cpmk++;
        //     }
        // }

        // DB::table('sub_cpmk')->insert($subCpmks);

        DB::table('sub_cpmk')->insert([
            [
                'id_ps' => 7,
                'id_kurikulum' => 7,
                'id_cpmk' => 54,
                'nama_kode_sub_cpmk' => 'sc 7.1',
                'desc_sub_cpmk_id' => 'Mampu merancang desain User Experience (UX) pada aplikasi mobile dan web dengan mempertimbangkan aspek kegunaan, aksesibilitas, dan estetika.',
                'desc_sub_cpmk_en' => 'Able to design User Experience (UX) in mobile and web applications considering usability, accessibility, and aesthetics aspects.',
            ],
            [
                'id_ps' => 7,
                'id_kurikulum' => 7,
                'id_cpmk' => 54,
                'nama_kode_sub_cpmk' => 'sc 7.2',
                'desc_sub_cpmk_id' => 'Mampu melakukan evaluasi terhadap desain User Experience (UX) yang telah dibuat menggunakan metode pengujian yang sesuai.',
                'desc_sub_cpmk_en' => 'Able to evaluate the designed User Experience (UX) using appropriate testing methods.',
            ],
            [
                'id_ps' => 7,
                'id_kurikulum' => 7,
                'id_cpmk' => 56,
                'nama_kode_sub_cpmk' => 'sc 8.1',
                'desc_sub_cpmk_id' => 'Mampu mengaplikasikan prinsip-prinsip desain User Experience (UX) dalam pengembangan aplikasi mobile dan web.',
                'desc_sub_cpmk_en' => 'Able to apply User Experience (UX) design principles in the development of mobile and web applications.',
            ],
        ]);
        
    }

}
