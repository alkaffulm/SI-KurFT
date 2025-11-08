<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasMahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];

        // daftar nim mahasiswa yang mau dipakai
        $nims = [
            '2310817110011', '2310817310001', '2310817110013', '2310817120014',
            '2310817210020', '2310817210009', '2310817210017', '2310817310005',
            '2310817210026', '2310817110008', '2310817310008', '2310817210021',
            '2310817110013', '2310817220002', '2310817210007', '2310817220011',
            '2310817210023', '2310817210012', '2310817220028', '2310817120002',
            '2310817320007', '2310817320013', '2310817120014', '2310817310001',
            '2310817120001', '2310817120003', '2310817120010'
        ];

        // Ambil ID kelas yang BENAR-BENAR ADA di database
        $kelas_tersedia = DB::table('kelas')
            ->pluck('id_kelas')
            ->toArray();

        if (empty($kelas_tersedia)) {
            $this->command->error('❌ Tidak ada data di tabel kelas! Jalankan KelasSeeder terlebih dahulu.');
            return;
        }

        $this->command->info('✓ Ditemukan ' . count($kelas_tersedia) . ' kelas di database.');

        foreach ($kelas_tersedia as $id_kelas) {
            // tentukan berapa mahasiswa yang masuk ke kelas ini (unik per kelas)
            // sesuaikan min/max sesuai kebutuhan
            $minPerKelas = 5;
            $maxPerKelas = min(25, count($nims)); // jangan lebih banyak dari jumlah nim unik
            $jumlah_mhs = rand($minPerKelas, $maxPerKelas);

            // ambil sampel unik: shuffle lalu slice
            $shuffled = $nims;
            shuffle($shuffled);
            $selected = array_slice($shuffled, 0, $jumlah_mhs);

            foreach ($selected as $nim) {
                $data[] = [
                    'id_kelas' => $id_kelas,
                    'nim' => $nim,
                ];
            }
        }

        // insert (jika banyak baris, MySQL akan menangani; jika sangat besar, bisa chunked insert)
        DB::table('kelas_mahasiswa')->insert($data);

        $this->command->info('✓ Berhasil seed ' . count($data) . ' baris ke tabel kelas_mahasiswa');
    }
}
