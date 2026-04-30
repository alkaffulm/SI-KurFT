<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKCPMKBobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mk_cpmk_bobot')->insert([
            // ===== Tahun 1 =====
            // Aljabar Linear (2 CPMK → 50-50)
            ['id_mk_cpmk_cpl'=>1, 'bobot'=>50],
            ['id_mk_cpmk_cpl'=>2, 'bobot'=>50],

            // Pemrograman I (2 CPMK)
            ['id_mk_cpmk_cpl'=>3, 'bobot'=>50],
            ['id_mk_cpmk_cpl'=>4, 'bobot'=>50],

            // Sistem Operasi (2 CPMK)
            ['id_mk_cpmk_cpl'=>5, 'bobot'=>50],
            ['id_mk_cpmk_cpl'=>6, 'bobot'=>50],

            // Keamanan Siber (1 CPMK)
            ['id_mk_cpmk_cpl'=>7, 'bobot'=>100],

            // ===== Tahun 2 =====
            // Manajemen Proyek TI (2 CPMK)
            ['id_mk_cpmk_cpl'=>8, 'bobot'=>50],
            ['id_mk_cpmk_cpl'=>9, 'bobot'=>50],

            // Kecerdasan Bisnis (1 CPMK)
            ['id_mk_cpmk_cpl'=>10, 'bobot'=>100],

            // Pemrograman Web I (2 CPMK)
            ['id_mk_cpmk_cpl'=>11, 'bobot'=>50],
            ['id_mk_cpmk_cpl'=>12, 'bobot'=>50],

            // Algoritma & Struktur Data (3 CPMK)
            ['id_mk_cpmk_cpl'=>13, 'bobot'=>33],
            ['id_mk_cpmk_cpl'=>14, 'bobot'=>33],
            ['id_mk_cpmk_cpl'=>15, 'bobot'=>34],

            // ===== Tahun 3 =====
            // IMK (1 CPMK)
            ['id_mk_cpmk_cpl'=>16, 'bobot'=>100],

            // Bahasa Inggris I (1 CPMK)
            ['id_mk_cpmk_cpl'=>17, 'bobot'=>100],

            // Etika Profesi (2 CPMK)
            ['id_mk_cpmk_cpl'=>18, 'bobot'=>50],
            ['id_mk_cpmk_cpl'=>19, 'bobot'=>50],

            // Basis Data I (2 CPMK)
            ['id_mk_cpmk_cpl'=>20, 'bobot'=>50],
            ['id_mk_cpmk_cpl'=>21, 'bobot'=>50],

            // ===== Tahun 4 =====
            // Jarkomdat (1 CPMK)
            ['id_mk_cpmk_cpl'=>22, 'bobot'=>100],

            // Sistem Tertanam (1 CPMK)
            ['id_mk_cpmk_cpl'=>23, 'bobot'=>100],

        ]);
    }
}

// ['id_mk_cpmk_bobot' => 1, 'id_mk_cpmk_cpl' => 20, 'bobot' => 50],
// ['id_mk_cpmk_bobot' => 2, 'id_mk_cpmk_cpl' => 21, 'bobot' => 50],