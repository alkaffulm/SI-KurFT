<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RpsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rps')->insert([
            ['id_rps' => 1, 'id_user' => 4, 'id_mk' => 1, 'tahun' => 2023, 'file_path' => 'rps/rps_1.pdf'],
            ['id_rps' => 2, 'id_user' => 4, 'id_mk' => 2, 'tahun' => 2024, 'file_path' => 'rps/rps_2.pdf'],
            ['id_rps' => 3, 'id_user' => 4, 'id_mk' => 3, 'tahun' => 2023, 'file_path' => 'rps/rps_3.pdf'],
            ['id_rps' => 4, 'id_user' => 4, 'id_mk' => 4, 'tahun' => 2025, 'file_path' => 'rps/rps_4.pdf'],
            ['id_rps' => 5, 'id_user' => 4, 'id_mk' => 5, 'tahun' => 2024, 'file_path' => 'rps/rps_5.pdf'],
            
            ['id_rps' => 6, 'id_user' => 10, 'id_mk' => 6, 'tahun' => 2023, 'file_path' => 'rps/rps_6.pdf'],
            ['id_rps' => 7, 'id_user' => 10, 'id_mk' => 7, 'tahun' => 2025, 'file_path' => 'rps/rps_7.pdf'],
            ['id_rps' => 8, 'id_user' => 10, 'id_mk' => 8, 'tahun' => 2023, 'file_path' => 'rps/rps_8.pdf'],
            ['id_rps' => 9, 'id_user' => 10, 'id_mk' => 9, 'tahun' => 2024, 'file_path' => 'rps/rps_9.pdf'],
            ['id_rps' => 10, 'id_user' => 10, 'id_mk' => 10, 'tahun' => 2023, 'file_path' => 'rps/rps_10.pdf'],
            
            ['id_rps' => 11, 'id_user' => 16, 'id_mk' => 11, 'tahun' => 2025, 'file_path' => 'rps/rps_11.pdf'],
            ['id_rps' => 12, 'id_user' => 16, 'id_mk' => 12, 'tahun' => 2024, 'file_path' => 'rps/rps_12.pdf'],
            ['id_rps' => 13, 'id_user' => 16, 'id_mk' => 13, 'tahun' => 2023, 'file_path' => 'rps/rps_13.pdf'],
            ['id_rps' => 14, 'id_user' => 16, 'id_mk' => 14, 'tahun' => 2025, 'file_path' => 'rps/rps_14.pdf'],
            ['id_rps' => 15, 'id_user' => 16, 'id_mk' => 15, 'tahun' => 2023, 'file_path' => 'rps/rps_15.pdf'],
            
            ['id_rps' => 16, 'id_user' => 22, 'id_mk' => 16, 'tahun' => 2024, 'file_path' => 'rps/rps_16.pdf'],
            ['id_rps' => 17, 'id_user' => 22, 'id_mk' => 17, 'tahun' => 2023, 'file_path' => 'rps/rps_17.pdf'],
            ['id_rps' => 18, 'id_user' => 22, 'id_mk' => 18, 'tahun' => 2025, 'file_path' => 'rps/rps_18.pdf'],
            ['id_rps' => 19, 'id_user' => 22, 'id_mk' => 19, 'tahun' => 2023, 'file_path' => 'rps/rps_19.pdf'],
            ['id_rps' => 20, 'id_user' => 22, 'id_mk' => 20, 'tahun' => 2024, 'file_path' => 'rps/rps_20.pdf'],
            
            ['id_rps' => 21, 'id_user' => 28, 'id_mk' => 21, 'tahun' => 2023, 'file_path' => 'rps/rps_21.pdf'],
            ['id_rps' => 22, 'id_user' => 28, 'id_mk' => 22, 'tahun' => 2025, 'file_path' => 'rps/rps_22.pdf'],
            ['id_rps' => 23, 'id_user' => 28, 'id_mk' => 23, 'tahun' => 2024, 'file_path' => 'rps/rps_23.pdf'],
            ['id_rps' => 24, 'id_user' => 28, 'id_mk' => 24, 'tahun' => 2023, 'file_path' => 'rps/rps_24.pdf'],
            ['id_rps' => 25, 'id_user' => 28, 'id_mk' => 25, 'tahun' => 2025, 'file_path' => 'rps/rps_25.pdf'],
            
            ['id_rps' => 26, 'id_user' => 34, 'id_mk' => 26, 'tahun' => 2023, 'file_path' => 'rps/rps_26.pdf'],
            ['id_rps' => 27, 'id_user' => 34, 'id_mk' => 27, 'tahun' => 2024, 'file_path' => 'rps/rps_27.pdf'],
            ['id_rps' => 28, 'id_user' => 34, 'id_mk' => 28, 'tahun' => 2023, 'file_path' => 'rps/rps_28.pdf'],
            ['id_rps' => 29, 'id_user' => 34, 'id_mk' => 29, 'tahun' => 2025, 'file_path' => 'rps/rps_29.pdf'],
            ['id_rps' => 30, 'id_user' => 34, 'id_mk' => 30, 'tahun' => 2023, 'file_path' => 'rps/rps_30.pdf'],
            
            ['id_rps' => 31, 'id_user' => 40, 'id_mk' => 31, 'tahun' => 2024, 'file_path' => 'rps/rps_31.pdf'],
            ['id_rps' => 32, 'id_user' => 40, 'id_mk' => 32, 'tahun' => 2023, 'file_path' => 'rps/rps_32.pdf'],
            ['id_rps' => 33, 'id_user' => 40, 'id_mk' => 33, 'tahun' => 2025, 'file_path' => 'rps/rps_33.pdf'],
            ['id_rps' => 34, 'id_user' => 40, 'id_mk' => 34, 'tahun' => 2023, 'file_path' => 'rps/rps_34.pdf'],
            ['id_rps' => 35, 'id_user' => 40, 'id_mk' => 35, 'tahun' => 2024, 'file_path' => 'rps/rps_35.pdf'],
            
            ['id_rps' => 36, 'id_user' => 46, 'id_mk' => 36, 'tahun' => 2023, 'file_path' => 'rps/rps_36.pdf'],
            ['id_rps' => 37, 'id_user' => 46, 'id_mk' => 37, 'tahun' => 2025, 'file_path' => 'rps/rps_37.pdf'],
            ['id_rps' => 38, 'id_user' => 46, 'id_mk' => 38, 'tahun' => 2023, 'file_path' => 'rps/rps_38.pdf'],
            ['id_rps' => 39, 'id_user' => 46, 'id_mk' => 39, 'tahun' => 2024, 'file_path' => 'rps/rps_39.pdf'],
            ['id_rps' => 40, 'id_user' => 46, 'id_mk' => 40, 'tahun' => 2023, 'file_path' => 'rps/rps_40.pdf'],
            
            ['id_rps' => 41, 'id_user' => 52, 'id_mk' => 41, 'tahun' => 2025, 'file_path' => 'rps/rps_41.pdf'],
            ['id_rps' => 42, 'id_user' => 52, 'id_mk' => 42, 'tahun' => 2023, 'file_path' => 'rps/rps_42.pdf'],
            ['id_rps' => 43, 'id_user' => 52, 'id_mk' => 43, 'tahun' => 2024, 'file_path' => 'rps/rps_43.pdf'],
            ['id_rps' => 44, 'id_user' => 52, 'id_mk' => 44, 'tahun' => 2023, 'file_path' => 'rps/rps_44.pdf'],
            ['id_rps' => 45, 'id_user' => 52, 'id_mk' => 45, 'tahun' => 2025, 'file_path' => 'rps/rps_45.pdf'],
        ]);

    }
}
