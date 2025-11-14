<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianMahasiswaSeeder extends Seeder
{
    // public function run(): void
    // {
    //     $kelasList = DB::table('kelas')->get();

    //     foreach ($kelasList as $kelas) {

    //         $nimList = DB::table('kelas_mahasiswa')
    //             ->where('id_kelas', $kelas->id_kelas)
    //             ->pluck('nim');

    //         $mahasiswaList = DB::table('mahasiswa')
    //             ->whereIn('nim', $nimList)
    //             ->pluck('id_mhs');


    //         if ($mahasiswaList->isEmpty()) continue;

    //         $rencanaAsesmenList = DB::table('rencana_asesmen')
    //             ->where('id_mk', $kelas->id_mk)
    //             ->get();

    //         foreach ($rencanaAsesmenList as $rencana) {

    //             $bobotList = DB::table('rencana_asesmen_cpmk_bobot')
    //                 ->where('id_rencana_asesmen', $rencana->id_rencana_asesmen)
    //                 ->get();

    //             foreach ($mahasiswaList as $id_mhs) {
    //                 foreach ($bobotList as $bobotItem) {
    //                     $bobot = (float) $bobotItem->bobot;

    //                     $nilai = rand(
    //                         (int) ceil($bobot * 0.4),
    //                         (int) $bobot
    //                     );

    //                     DB::table('penilaian_mahasiswa')->insert([
    //                         'id_kelas' => $kelas->id_kelas,
    //                         'id_mhs' => $id_mhs,
    //                         'id_rencana_asesmen' => $rencana->id_rencana_asesmen,
    //                         'id_cpmk' => $bobotItem->id_cpmk,
    //                         'nilai' => $nilai,
    //                     ]);
    //                 }
    //             }
    //         }
    //     }
    // }

   public function run(): void
    {
        $kelasList = DB::table('kelas')->get();

        foreach ($kelasList as $kelas) {

            $nimList = DB::table('kelas_mahasiswa')
                ->where('id_kelas', $kelas->id_kelas)
                ->pluck('nim');

            if ($nimList->isEmpty()) continue;

            $rencanaAsesmenList = DB::table('rencana_asesmen')
                ->where('id_mk', $kelas->id_mk)
                ->get();

            foreach ($rencanaAsesmenList as $rencana) {

                $bobotList = DB::table('rencana_asesmen_cpmk_bobot')
                    ->where('id_rencana_asesmen', $rencana->id_rencana_asesmen)
                    ->get();

                foreach ($nimList as $nim) {
                    foreach ($bobotList as $bobotItem) {
                        $bobot = (float) $bobotItem->bobot;

                        $nilai = rand(
                            (int) ceil($bobot * 0.4),
                            (int) $bobot
                        );

                        DB::table('penilaian_mahasiswa')->insert([
                            'id_kelas' => $kelas->id_kelas,
                            'nim' => $nim, 
                            'id_rencana_asesmen' => $rencana->id_rencana_asesmen,
                            'id_cpmk' => $bobotItem->id_cpmk,
                            'nilai' => $nilai,
                        ]);
                    }
                }
            }
        }
    }
}