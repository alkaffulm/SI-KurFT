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
            // kurikulum 2020
            // ['id_rps' => 1, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 1, 'tahun' => 2023, 'file_path' => 'rps/rps_1.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 2, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 2, 'tahun' => 2024, 'file_path' => 'rps/rps_2.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 3, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 3, 'tahun' => 2023, 'file_path' => 'rps/rps_3.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 4, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 4, 'tahun' => 2025, 'file_path' => 'rps/rps_4.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 5, 'id_kurikulum' => 1, 'id_user' => 4, 'id_mk' => 5, 'tahun' => 2024, 'file_path' => 'rps/rps_5.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 6, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 6, 'tahun' => 2023, 'file_path' => 'rps/rps_6.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 7, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 7, 'tahun' => 2025, 'file_path' => 'rps/rps_7.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 8, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 8, 'tahun' => 2023, 'file_path' => 'rps/rps_8.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 9, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 9, 'tahun' => 2024, 'file_path' => 'rps/rps_9.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 10, 'id_kurikulum' => 2, 'id_user' => 10, 'id_mk' => 10, 'tahun' => 2023, 'file_path' => 'rps/rps_10.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 11, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 11, 'tahun' => 2025, 'file_path' => 'rps/rps_11.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 12, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 12, 'tahun' => 2024, 'file_path' => 'rps/rps_12.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 13, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 13, 'tahun' => 2023, 'file_path' => 'rps/rps_13.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 14, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 14, 'tahun' => 2025, 'file_path' => 'rps/rps_14.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 15, 'id_kurikulum' => 3, 'id_user' => 16, 'id_mk' => 15, 'tahun' => 2023, 'file_path' => 'rps/rps_15.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 16, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 16, 'tahun' => 2024, 'file_path' => 'rps/rps_16.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 17, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 17, 'tahun' => 2023, 'file_path' => 'rps/rps_17.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 18, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 18, 'tahun' => 2025, 'file_path' => 'rps/rps_18.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 19, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 19, 'tahun' => 2023, 'file_path' => 'rps/rps_19.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 20, 'id_kurikulum' => 4, 'id_user' => 22, 'id_mk' => 20, 'tahun' => 2024, 'file_path' => 'rps/rps_20.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 21, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 21, 'tahun' => 2023, 'file_path' => 'rps/rps_21.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 22, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 22, 'tahun' => 2025, 'file_path' => 'rps/rps_22.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 23, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 23, 'tahun' => 2024, 'file_path' => 'rps/rps_23.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 24, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 24, 'tahun' => 2023, 'file_path' => 'rps/rps_24.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 25, 'id_kurikulum' => 5, 'id_user' => 28, 'id_mk' => 25, 'tahun' => 2025, 'file_path' => 'rps/rps_25.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 26, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 26, 'tahun' => 2023, 'file_path' => 'rps/rps_26.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 27, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 27, 'tahun' => 2024, 'file_path' => 'rps/rps_27.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 28, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 28, 'tahun' => 2023, 'file_path' => 'rps/rps_28.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 29, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 29, 'tahun' => 2025, 'file_path' => 'rps/rps_29.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 30, 'id_kurikulum' => 6, 'id_user' => 34, 'id_mk' => 30, 'tahun' => 2023, 'file_path' => 'rps/rps_30.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            ['id_rps' => 1, 'id_kaprodi' => 117, 'id_kurikulum' => 7, 'id_model_pembelajaran' => 2, 'id_mk' => 34, 'id_ps' => 7, 'materi_pembelajaran' => 'Desain User Experience dengan pokok bahasan: 
1. Pengantar dan Konsep Interaksi Manusia Komputer 
2. Prinsip Dasar IMK dan User Centered Design 
3. Aspek Psikologis dan Kognitif Pengguna 
4. Model Mental dalam Interaksi 
5. Teknik Pengumpulan Data 
6. Persona dan Skenario dalam UCD 
7. Wireframe dan Prototype Low-Fidelity 
8. Evaluasi Awal Desain dan Prinsip Usability 
9. Prinsip Usability dan User Experience dalam desain user interface 
10. Mockup dan High-Fidelity Prototype 
11. Pengujian usability 
12. Tren Teknologi dalam IMK 
13. Isu Etika dan Tanggung Jawab Desain Modern', 'pustaka_utama' => '[1] Dix, Alan et.al, HUMAN-COMPUTER INTERACTION, 2nd Edition, Prentice Hall, Europe, 1998. 
[2] Galitz, W. O, The Essential Guide to User Inteface Design : An Introduction to GUI Design Principles and Techniques, John Wiley & 
Sons, Canada, 1996. 
[3] Johnson, P., HUMAN-COMPUTER INTERACTION : Psychology, Task Analysis and Software Engineering, McGraw-Hill, England 
UK, 1992. 
[4] Newman, W. M and Lamming, M. G, Interactive System Design, Addison Wesley, Cambrigde, Great Britain, 1995. 
[5] P. Insap Santoso, Interaksi Manusia dan Komputer : Teori dan Praktek, Andi Offset, Yogyakarta, 2004. 
[6] Raskin, J, The Human Interface, Addison Wesley, 2000 
[7] Shneiderman, B, Designing The User Interface, 3rd Edition, Addison Wesley, 1998 
Sutcliffe, A. G., HUMAN-COMPUTER INTERFACE DESIGN, 2ND Edition, MacMillan, London, 1995.', 'pustaka_pendukung' => '[9] B Hewett, Baecker, et.al, ACM SIGCHI Curricula for Human-Computer Interaction (folder : IMK-ACM.rar) 
[10] Folder: IMK-cc-Gatech-edu.rar','jumlah_revisi' => 0, 'isRevisi' => false, 'tanggal_revisi' => null, 'tanggal_disusun' => now()],
            // ['id_rps' => 32, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 32, 'tahun' => 2023, 'file_path' => 'rps/rps_32.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 33, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 33, 'tahun' => 2025, 'file_path' => 'rps/rps_33.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 34, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 34, 'tahun' => 2023, 'file_path' => 'rps/rps_34.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 35, 'id_kurikulum' => 7, 'id_user' => 40, 'id_mk' => 35, 'tahun' => 2024, 'file_path' => 'rps/rps_35.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 36, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 36, 'tahun' => 2023, 'file_path' => 'rps/rps_36.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 37, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 37, 'tahun' => 2025, 'file_path' => 'rps/rps_37.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 38, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 38, 'tahun' => 2023, 'file_path' => 'rps/rps_38.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 39, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 39, 'tahun' => 2024, 'file_path' => 'rps/rps_39.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 40, 'id_kurikulum' => 8, 'id_user' => 46, 'id_mk' => 40, 'tahun' => 2023, 'file_path' => 'rps/rps_40.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            
            // ['id_rps' => 41, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 41, 'tahun' => 2025, 'file_path' => 'rps/rps_41.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 42, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 42, 'tahun' => 2023, 'file_path' => 'rps/rps_42.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 43, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 43, 'tahun' => 2024, 'file_path' => 'rps/rps_43.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 44, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 44, 'tahun' => 2023, 'file_path' => 'rps/rps_44.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 45, 'id_kurikulum' => 9, 'id_user' => 52, 'id_mk' => 45, 'tahun' => 2025, 'file_path' => 'rps/rps_45.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Lanjutan untuk kurikulum 2025
            // // Teknik Sipil (id_ps = 1)
            // ['id_rps' => 46, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 46, 'tahun' => 2025, 'file_path' => 'rps/rps_46.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 47, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 47, 'tahun' => 2025, 'file_path' => 'rps/rps_47.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 48, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 48, 'tahun' => 2025, 'file_path' => 'rps/rps_48.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 49, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 49, 'tahun' => 2025, 'file_path' => 'rps/rps_49.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 50, 'id_kurikulum' => 10, 'id_user' => 4, 'id_mk' => 50, 'tahun' => 2025, 'file_path' => 'rps/rps_50.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Pertambangan (id_ps = 2)
            // ['id_rps' => 51, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 51, 'tahun' => 2025, 'file_path' => 'rps/rps_51.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 52, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 52, 'tahun' => 2025, 'file_path' => 'rps/rps_52.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 53, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 53, 'tahun' => 2025, 'file_path' => 'rps/rps_53.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 54, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 54, 'tahun' => 2025, 'file_path' => 'rps/rps_54.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 55, 'id_kurikulum' => 11, 'id_user' => 10, 'id_mk' => 55, 'tahun' => 2025, 'file_path' => 'rps/rps_55.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Mesin (id_ps = 3)
            // ['id_rps' => 56, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 56, 'tahun' => 2025, 'file_path' => 'rps/rps_56.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 57, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 57, 'tahun' => 2025, 'file_path' => 'rps/rps_57.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 58, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 58, 'tahun' => 2025, 'file_path' => 'rps/rps_58.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 59, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 59, 'tahun' => 2025, 'file_path' => 'rps/rps_59.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 60, 'id_kurikulum' => 12, 'id_user' => 16, 'id_mk' => 60, 'tahun' => 2025, 'file_path' => 'rps/rps_60.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Lingkungan (id_ps = 4)
            // ['id_rps' => 61, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 61, 'tahun' => 2025, 'file_path' => 'rps/rps_61.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 62, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 62, 'tahun' => 2025, 'file_path' => 'rps/rps_62.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 63, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 63, 'tahun' => 2025, 'file_path' => 'rps/rps_63.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 64, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 64, 'tahun' => 2025, 'file_path' => 'rps/rps_64.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 65, 'id_kurikulum' => 13, 'id_user' => 22, 'id_mk' => 65, 'tahun' => 2025, 'file_path' => 'rps/rps_65.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Arsitektur (id_ps = 5)
            // ['id_rps' => 66, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 66, 'tahun' => 2025, 'file_path' => 'rps/rps_66.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 67, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 67, 'tahun' => 2025, 'file_path' => 'rps/rps_67.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 68, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 68, 'tahun' => 2025, 'file_path' => 'rps/rps_68.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 69, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 69, 'tahun' => 2025, 'file_path' => 'rps/rps_69.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 70, 'id_kurikulum' => 14, 'id_user' => 28, 'id_mk' => 70, 'tahun' => 2025, 'file_path' => 'rps/rps_70.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Kimia (id_ps = 6)
            // ['id_rps' => 71, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 71, 'tahun' => 2025, 'file_path' => 'rps/rps_71.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 72, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 72, 'tahun' => 2025, 'file_path' => 'rps/rps_72.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 73, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 73, 'tahun' => 2025, 'file_path' => 'rps/rps_73.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 74, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 74, 'tahun' => 2025, 'file_path' => 'rps/rps_74.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 75, 'id_kurikulum' => 15, 'id_user' => 34, 'id_mk' => 75, 'tahun' => 2025, 'file_path' => 'rps/rps_75.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknologi Informasi (id_ps = 7)
            ['id_rps' => 2, 'id_kaprodi' => 40, 'id_kurikulum' => 16, 'id_mk' => 80, 'id_model_pembelajaran' => 2, 'id_ps' => 7, 'materi_pembelajaran' => 'Desain User Experience dengan pokok bahasan: 
1. Pengantar dan Konsep Interaksi Manusia Komputer 
2. Prinsip Dasar IMK dan User Centered Design 
3. Aspek Psikologis dan Kognitif Pengguna 
4. Model Mental dalam Interaksi 
5. Teknik Pengumpulan Data 
6. Persona dan Skenario dalam UCD 
7. Wireframe dan Prototype Low-Fidelity 
8. Evaluasi Awal Desain dan Prinsip Usability 
9. Prinsip Usability dan User Experience dalam desain user interface 
10. Mockup dan High-Fidelity Prototype 
11. Pengujian usability 
12. Tren Teknologi dalam IMK 
13. Isu Etika dan Tanggung Jawab Desain Modern', 'pustaka_utama' => '[1] Dix, Alan et.al, HUMAN-COMPUTER INTERACTION, 2nd Edition, Prentice Hall, Europe, 1998. 
[2] Galitz, W. O, The Essential Guide to User Inteface Design : An Introduction to GUI Design Principles and Techniques, John Wiley & 
Sons, Canada, 1996. 
[3] Johnson, P., HUMAN-COMPUTER INTERACTION : Psychology, Task Analysis and Software Engineering, McGraw-Hill, England 
UK, 1992. 
[4] Newman, W. M and Lamming, M. G, Interactive System Design, Addison Wesley, Cambrigde, Great Britain, 1995. 
[5] P. Insap Santoso, Interaksi Manusia dan Komputer : Teori dan Praktek, Andi Offset, Yogyakarta, 2004. 
[6] Raskin, J, The Human Interface, Addison Wesley, 2000 
[7] Shneiderman, B, Designing The User Interface, 3rd Edition, Addison Wesley, 1998 
Sutcliffe, A. G., HUMAN-COMPUTER INTERFACE DESIGN, 2ND Edition, MacMillan, London, 1995.', 'pustaka_pendukung' => '[9] B Hewett, Baecker, et.al, ACM SIGCHI Curricula for Human-Computer Interaction (folder : IMK-ACM.rar) 
[10] Folder: IMK-cc-Gatech-edu.rar','jumlah_revisi' => 0, 'isRevisi' => false, 'tanggal_revisi' => null, 'tanggal_disusun' => now()],
            // ['id_rps' => 77, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 77, 'tahun' => 2025, 'file_path' => 'rps/rps_77.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 78, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 78, 'tahun' => 2025, 'file_path' => 'rps/rps_78.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 79, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 79, 'tahun' => 2025, 'file_path' => 'rps/rps_79.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 80, 'id_kurikulum' => 16, 'id_user' => 40, 'id_mk' => 80, 'tahun' => 2025, 'file_path' => 'rps/rps_80.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Elektro (id_ps = 8)
            // ['id_rps' => 81, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 81, 'tahun' => 2025, 'file_path' => 'rps/rps_81.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 82, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 82, 'tahun' => 2025, 'file_path' => 'rps/rps_82.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 83, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 83, 'tahun' => 2025, 'file_path' => 'rps/rps_83.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 84, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 84, 'tahun' => 2025, 'file_path' => 'rps/rps_84.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 85, 'id_kurikulum' => 17, 'id_user' => 46, 'id_mk' => 85, 'tahun' => 2025, 'file_path' => 'rps/rps_85.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

            // // Teknik Geologi (id_ps = 9)
            // ['id_rps' => 86, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 86, 'tahun' => 2025, 'file_path' => 'rps/rps_86.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 87, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 87, 'tahun' => 2025, 'file_path' => 'rps/rps_87.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 88, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 88, 'tahun' => 2025, 'file_path' => 'rps/rps_88.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 89, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 89, 'tahun' => 2025, 'file_path' => 'rps/rps_89.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],
            // ['id_rps' => 90, 'id_kurikulum' => 18, 'id_user' => 52, 'id_mk' => 90, 'tahun' => 2025, 'file_path' => 'rps/rps_90.pdf', 'minggu' => 1, 'penilaian' => 50, 'bobot' => 4.0],

        ]);

    }
}
