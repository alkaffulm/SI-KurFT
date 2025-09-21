<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RencanaAsesmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rencana_asesmen')->insert([
            // untuk Matkul IMK Kurikulum 2020
            ['id_rencana_asesmen' => 1, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_mk' => 34, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 1],
            ['id_rencana_asesmen' => 2, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_mk' => 34, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 2],
            ['id_rencana_asesmen' => 3, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_mk' => 34, 'tipe_komponen' => 'uts', 'nomor_komponen' => null],
            ['id_rencana_asesmen' => 4, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_mk' => 34, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 3],
            ['id_rencana_asesmen' => 5, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_mk' => 34, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 4],
            ['id_rencana_asesmen' => 6, 'id_ps' => 7, 'id_kurikulum' => 7, 'id_mk' => 34, 'tipe_komponen' => 'uas', 'nomor_komponen' => null],

            // untuk Matkul IMK Kurikulum 2025
            ['id_rencana_asesmen' => 7, 'id_ps' => 7, 'id_kurikulum' => 16, 'id_mk' => 80, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 1],
            ['id_rencana_asesmen' => 8, 'id_ps' => 7, 'id_kurikulum' => 16, 'id_mk' => 80, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 2],
            ['id_rencana_asesmen' => 9, 'id_ps' => 7, 'id_kurikulum' => 16, 'id_mk' => 80, 'tipe_komponen' => 'uts', 'nomor_komponen' => null],
            ['id_rencana_asesmen' => 10, 'id_ps' => 7, 'id_kurikulum' => 16, 'id_mk' => 80, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 3],
            ['id_rencana_asesmen' => 11, 'id_ps' => 7, 'id_kurikulum' => 16, 'id_mk' => 80, 'tipe_komponen' => 'tugas', 'nomor_komponen' => 4],
            ['id_rencana_asesmen' => 12, 'id_ps' => 7, 'id_kurikulum' => 16, 'id_mk' => 80, 'tipe_komponen' => 'uas', 'nomor_komponen' => null],
        ]);        
    }
}
