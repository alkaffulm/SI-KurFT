<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        $nims_yang_dapat_semua_kelas = [
            '2310817110011',
            '2310817310002',
            '2310817110006',
            '2310817120005',
        ];

                // $nims_random = [
        // '2310817210020', '2310817210009', '2310817210017', '2310817310005',
        // '2310817210026', '2310817110008', '2310817310008', '2310817210021',
        // '2310817110013', '2310817220002', '2310817210007', '2310817220011',
        // '2310817210023', '2310817210012', '2310817220028', '2310817120002',
        // '2310817320007', '2310817320013', '2310817120014', '2310817310001',
        // '2310817120001', '2310817120003', '2310817120010'
        // ];

        $kelas_tersedia = DB::table('kelas')->pluck('id_kelas')->toArray();

        if (empty($kelas_tersedia)) {
            $this->command->error('Tidak ada data di tabel kelas! Jalankan KelasSeeder terlebih dahulu.');
            return;
        }

        foreach ($kelas_tersedia as $id_kelas) {
            foreach ($nims_yang_dapat_semua_kelas as $nim) {
                $data[] = [
                    'id_kelas' => $id_kelas,
                    'nim' => $nim,
                ];
            }

            DB::table('kelas')
                ->where('id_kelas', $id_kelas)
                ->update(['jumlah_mhs' => count($nims_yang_dapat_semua_kelas)]);
        }

        DB::table('kelas_mahasiswa')->insert($data);

        $this->command->info('Semua kelas berhasil diisi 4 mahasiswa tetap!');
    }
}
