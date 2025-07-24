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
        DB::table('mahasiswa')->insert([
            ['id_mhs' => 1, 'id_ps' => 1, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210001', 'angkatan' => '2021'],
            ['id_mhs' => 2, 'id_ps' => 1, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210002', 'angkatan' => '2021'],
            ['id_mhs' => 3, 'id_ps' => 1, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220001', 'angkatan' => '2022'],
            ['id_mhs' => 4, 'id_ps' => 1, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220002', 'angkatan' => '2022'],
            ['id_mhs' => 5, 'id_ps' => 1, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230001', 'angkatan' => '2023'],

            ['id_mhs' => 6, 'id_ps' => 2, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210011', 'angkatan' => '2021'],
            ['id_mhs' => 7, 'id_ps' => 2, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210012', 'angkatan' => '2021'],
            ['id_mhs' => 8, 'id_ps' => 2, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220011', 'angkatan' => '2022'],
            ['id_mhs' => 9, 'id_ps' => 2, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220012', 'angkatan' => '2022'],
            ['id_mhs' => 10, 'id_ps' => 2, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230011', 'angkatan' => '2023'],

            ['id_mhs' => 11, 'id_ps' => 3, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210021', 'angkatan' => '2021'],
            ['id_mhs' => 12, 'id_ps' => 3, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210022', 'angkatan' => '2021'],
            ['id_mhs' => 13, 'id_ps' => 3, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220021', 'angkatan' => '2022'],
            ['id_mhs' => 14, 'id_ps' => 3, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220022', 'angkatan' => '2022'],
            ['id_mhs' => 15, 'id_ps' => 3, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230021', 'angkatan' => '2023'],

            ['id_mhs' => 16, 'id_ps' => 4, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210031', 'angkatan' => '2021'],
            ['id_mhs' => 17, 'id_ps' => 4, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210032', 'angkatan' => '2021'],
            ['id_mhs' => 18, 'id_ps' => 4, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220031', 'angkatan' => '2022'],
            ['id_mhs' => 19, 'id_ps' => 4, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220032', 'angkatan' => '2022'],
            ['id_mhs' => 20, 'id_ps' => 4, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230031', 'angkatan' => '2023'],

            ['id_mhs' => 21, 'id_ps' => 5, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210041', 'angkatan' => '2021'],
            ['id_mhs' => 22, 'id_ps' => 5, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210042', 'angkatan' => '2021'],
            ['id_mhs' => 23, 'id_ps' => 5, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220041', 'angkatan' => '2022'],
            ['id_mhs' => 24, 'id_ps' => 5, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220042', 'angkatan' => '2022'],
            ['id_mhs' => 25, 'id_ps' => 5, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230041', 'angkatan' => '2023'],

            ['id_mhs' => 26, 'id_ps' => 6, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210051', 'angkatan' => '2021'],
            ['id_mhs' => 27, 'id_ps' => 6, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210052', 'angkatan' => '2021'],
            ['id_mhs' => 28, 'id_ps' => 6, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220051', 'angkatan' => '2022'],
            ['id_mhs' => 29, 'id_ps' => 6, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220052', 'angkatan' => '2022'],
            ['id_mhs' => 30, 'id_ps' => 6, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230051', 'angkatan' => '2023'],

            ['id_mhs' => 31, 'id_ps' => 7, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210061', 'angkatan' => '2021'],
            ['id_mhs' => 32, 'id_ps' => 7, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210062', 'angkatan' => '2021'],
            ['id_mhs' => 33, 'id_ps' => 7, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220061', 'angkatan' => '2022'],
            ['id_mhs' => 34, 'id_ps' => 7, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220062', 'angkatan' => '2022'],
            ['id_mhs' => 35, 'id_ps' => 7, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230061', 'angkatan' => '2023'],

            ['id_mhs' => 36, 'id_ps' => 8, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210071', 'angkatan' => '2021'],
            ['id_mhs' => 37, 'id_ps' => 8, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210072', 'angkatan' => '2021'],
            ['id_mhs' => 38, 'id_ps' => 8, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220071', 'angkatan' => '2022'],
            ['id_mhs' => 39, 'id_ps' => 8, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220072', 'angkatan' => '2022'],
            ['id_mhs' => 40, 'id_ps' => 8, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230071', 'angkatan' => '2023'],

            ['id_mhs' => 41, 'id_ps' => 9, 'nama_lengkap'=>'mahasiswa-1' ,'nim' => '20210081', 'angkatan' => '2021'],
            ['id_mhs' => 42, 'id_ps' => 9, 'nama_lengkap'=>'mahasiswa-2' ,'nim' => '20210082', 'angkatan' => '2021'],
            ['id_mhs' => 43, 'id_ps' => 9, 'nama_lengkap'=>'mahasiswa-3' ,'nim' => '20220081', 'angkatan' => '2022'],
            ['id_mhs' => 44, 'id_ps' => 9, 'nama_lengkap'=>'mahasiswa-4' ,'nim' => '20220082', 'angkatan' => '2022'],
            ['id_mhs' => 45, 'id_ps' => 9, 'nama_lengkap'=>'mahasiswa-5' ,'nim' => '20230081', 'angkatan' => '2023'],
        ]);

    }
}
