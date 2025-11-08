<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('mahasiswa')->insert([
            ['id_mhs' => 1, 'id_ps' => 1, 'id_kurikulum'=>1, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210001', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 2, 'id_ps' => 1,'id_kurikulum'=>1, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210002', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 3, 'id_ps' => 1,'id_kurikulum'=>1, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220001', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 4, 'id_ps' => 1,'id_kurikulum'=>1, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220002', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 5, 'id_ps' => 1,'id_kurikulum'=>1, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230001', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],

            ['id_mhs' => 6, 'id_ps' => 2,'id_kurikulum'=>2, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210011', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 7, 'id_ps' => 2,'id_kurikulum'=>2, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210012', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 8, 'id_ps' => 2,'id_kurikulum'=>2, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220011', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 9, 'id_ps' => 2,'id_kurikulum'=>2, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220012', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 10, 'id_ps' => 2,'id_kurikulum'=>2, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230011', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],

            ['id_mhs' => 11, 'id_ps' => 3, 'id_kurikulum'=>3, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210021', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 12, 'id_ps' => 3, 'id_kurikulum'=>3, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210022', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 13, 'id_ps' => 3, 'id_kurikulum'=>3, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220021', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 14, 'id_ps' => 3, 'id_kurikulum'=>3, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220022', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 15, 'id_ps' => 3, 'id_kurikulum'=>3, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230021', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],

            ['id_mhs' => 16, 'id_ps' => 4, 'id_kurikulum'=>4, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210031', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 17, 'id_ps' => 4, 'id_kurikulum'=>4, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210032', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 18, 'id_ps' => 4, 'id_kurikulum'=>4, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220031', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 19, 'id_ps' => 4, 'id_kurikulum'=>4, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220032', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 20, 'id_ps' => 4, 'id_kurikulum'=>4, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230031', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],

            ['id_mhs' => 21, 'id_ps' => 5, 'id_kurikulum'=>5, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210041', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 22, 'id_ps' => 5,'id_kurikulum'=>5, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210042', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 23, 'id_ps' => 5,'id_kurikulum'=>5, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220041', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 24, 'id_ps' => 5,'id_kurikulum'=>5, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220042', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 25, 'id_ps' => 5,'id_kurikulum'=>5, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230041', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],

            ['id_mhs' => 26, 'id_ps' => 6,'id_kurikulum'=>24, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210051', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 27, 'id_ps' => 6,'id_kurikulum'=>24, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210052', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 28, 'id_ps' => 6,'id_kurikulum'=>24, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220051', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 29, 'id_ps' => 6,'id_kurikulum'=>24, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220052', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 30, 'id_ps' => 6,'id_kurikulum'=>24, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230051', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],

            ['id_mhs' => 36, 'id_ps' => 8, 'id_kurikulum'=>8, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210071', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 37, 'id_ps' => 8, 'id_kurikulum'=>8, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210072', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 38, 'id_ps' => 8, 'id_kurikulum'=>8, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220071', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 39, 'id_ps' => 8, 'id_kurikulum'=>8, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220072', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 40, 'id_ps' => 8, 'id_kurikulum'=>8, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230071', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now

],
            ['id_mhs' => 41, 'id_ps' => 9, 'id_kurikulum'=>9, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210081', 'angkatan' => '2021', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 42, 'id_ps' => 9, 'id_kurikulum'=>9, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210082', 'angkatan' => '2021', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 43, 'id_ps' => 9, 'id_kurikulum'=>9, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220081', 'angkatan' => '2022', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 44, 'id_ps' => 9, 'id_kurikulum'=>9, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220082', 'angkatan' => '2022', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 45, 'id_ps' => 9, 'id_kurikulum'=>9, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230081', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],

            // Data dari tabel gambar
            ['id_mhs' => 46, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Ghani Mudzakir' ,'nim' => '2310817110011', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 47, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Adrian Bintang Saputra' ,'nim' => '2310817310001', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 48, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Jovan Gilbert Natamasindah' ,'nim' => '2310817110013', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 49, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Noviana Nur Aisyah' ,'nim' => '2310817120014', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 50, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Muhammad Hasbiyan Rusyadi' ,'nim' => '2310817210020', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 51, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Muhammad Ibnu Sina' ,'nim' => '2310817210009', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 52, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Muhammad Nurhuda Baihaqi' ,'nim' => '2310817210017', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 53, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Muhammad Nurwahyudi Adhitama' ,'nim' => '2310817310005', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 54, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Muhammad Putra Azky Alfani' ,'nim' => '2310817210026', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 55, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Muhammad Raihan' ,'nim' => '2310817110008', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 56, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Muhammad Rizki Ramadhan' ,'nim' => '2310817310008', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 57, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Rakhmad Fauzhan Ramadhan' ,'nim' => '2310817210021', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 58, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Randy Febrian' ,'nim' => '2310817110013', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 59, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Raudatul Sholehah' ,'nim' => '2310817220002', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 60, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'RAYMOND HARIYONO' ,'nim' => '2310817210007', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 61, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Regina Silva Maharatini' ,'nim' => '2310817220011', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 62, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Rifky Putra Islahudika' ,'nim' => '2310817210023', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 63, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Ririn Citra Lestari' ,'nim' => '2310817210012', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 64, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Sheila Sabina' ,'nim' => '2310817220028', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 65, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'SITI RATNA WINTA SARI' ,'nim' => '2310817120002', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 66, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'Zahra Nabila' ,'nim' => '2310817320007', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 67, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'AIKO ANATASHA WENDIONO' ,'nim' => '2310817320013', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 68, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'ALIYA RAFFA NAURA AYU' ,'nim' => '2310817120014', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 69, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'AVANTIO ARKANA PATRIA' ,'nim' => '2310817310001', 'angkatan' => '2023', 'jenis_kelamin' => 'LAKI-LAKI', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 70, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'DINA IZZATI ELFADHEYA' ,'nim' => '2310817120001', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 71, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'NATALIE GRACE KATIANDAGHO' ,'nim' => '2310817120003', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
            ['id_mhs' => 72, 'id_ps' => 7,'id_kurikulum'=>7, 'nama_lengkap'=>'NUR HIKMAH' ,'nim' => '2310817120010', 'angkatan' => '2023', 'jenis_kelamin' => 'PEREMPUAN', 'status' => 'aktif', 'created_at' => $now, 'updated_at' => $now],
        
        ]);

    }
}