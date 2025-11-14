<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianMahasiswaPerCPMKSeeder extends Seeder
{
    public function run(): void
    {
        $combinations = DB::table('penilaian_mahasiswa')
            ->select('nim', 'id_kelas', 'id_cpmk')
            ->distinct()
            ->get();

        foreach ($combinations as $combo) {

            $nilaiRata = DB::table('penilaian_mahasiswa')
                ->where('nim', $combo->nim)
                ->where('id_kelas', $combo->id_kelas)
                ->where('id_cpmk', $combo->id_cpmk)
                ->sum('nilai');

            DB::table('penilaian_mahasiswa_cpmk')->insert([
                'nim' => $combo->nim,
                'id_kelas' => $combo->id_kelas,
                'id_cpmk' => $combo->id_cpmk,
                'nilai_rata' => $nilaiRata, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
