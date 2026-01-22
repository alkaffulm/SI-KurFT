<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. MAPING ROLE SPESIAL BERDASARKAN NIP
        $roleMap = [
            // --- LEVEL PIMPINAN ---
            '197309031997021001' => [2, 4], // Pak Iphan (Dosen & Dekan)
            '197306152000031002' => [2, 4], // Nurhakim (Dosen & WD I Bidang Keuangan dan Kepegawaian)
            '197401071998021001' => [2, 4], // Mahmud (Dosen & WD II Bidang Akademik)
            '197007171998021001' => [2, 4], // Abdul Ghofur (Dosen & WD III Bidang Kemahasiswaan dan Alumni)

            // --- KOORDINATOR (Dosen & Kaprodi) ---
            '197208261998021001' => [2, 3], // M. Arsyad (Koord PSTS)
            '198008032006041001' => [2, 3], // Agus Triantoro (Koord PSTP)
            '197310132003121001' => [2, 3], // Uyu Saismana (Koord PSRG)
            '199412142022031013' => [2, 3], // Akhmad Ghiffary Budianto (Koord PSRE)
            '199002212018031001' => [2, 3], // Herry Irawansyah (Koord PSTM)
            '198708282012122001' => [2, 3], // Rizqi Puteri Mahyudin (Koord PSTL)
            '198102102005011012' => [2, 3], // Akbar Rahman (Koord PSA)
            '198101122003121001' => [2, 3], // Doni Rahmat Wicakso (Koord PSTK)
            '199307032019031011' => [2, 3], // Andreyan Rizky Baskara (Koord PSTI)
            
            '196906081997022002' => [2, 3], // Isnasyaurqiah (Koord PS S3)
            '197608192003121001' => [2, 3], // Agus Mirwan (Koord PSMTK)
            '196911101993032001' => [2, 3], // Ida Barkiah (Koord PSPPI)
            '197907232005012005' => [2, 3], // Nursiah C. (Koord PSMTS)

            // --- ADMIN PRODI (Admin) ---
            'ADMPSTS1' => [1],
            'ADMPSTS2' => [1],
            'ADMPSTP1' => [1],
            'ADMPSTP2' => [1],
            'ADMPSTM1' => [1],
            'ADMPSTM2' => [1],
            'ADMPSTL1' => [1],
            'ADMPSTL2' => [1],
            'ADMPSA1' => [1],
            'ADMPSA2' => [1],
            'ADMPSTK1' => [1],
            'ADMPSTK2' => [1],
            'ADMPSTI1' => [1],
            'ADMPSTI2' => [1],
            'ADMPSRE1' => [1],
            'ADMPSRE2' => [1],
            'ADMPSRG1' => [1],
            'ADMPSRG2' => [1],
        ];

        // LOGIKA 1: Masukkan Role Spesial
        foreach ($roleMap as $nip => $roles) {
            // Cari ID user berdasarkan NIP (Bukan hardcode angka!)
            $userId = DB::table('user')->where('NIP', $nip)->value('id_user');

            if ($userId) {
                foreach ($roles as $roleId) {
                    DB::table('user_role_map')->insert([
                        'id_user' => $userId,
                        'id_role' => $roleId,
                    ]);
                }
            }
        }

        // LOGIKA 2: Otomatisasi Sisa Dosen untuk semua prodi (Bulk Insert)
        $usersTanpaRole = DB::table('user')
            ->whereNotNull('id_ps')
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('user_role_map')
                    ->whereRaw('user_role_map.id_user = user.id_user');
            })
            ->get();

        // Loop dan beri mereka role DOSEN (2)
        foreach ($usersTanpaRole as $user) {
            DB::table('user_role_map')->insert([
                'id_user' => $user->id_user,
                'id_role' => 2 // Default Role Dosen
            ]);
        }


        // DB::table('user_role_map')->insert([
        //     // Pimpinan Fakultas (id_role = 4)
        //     ['id_role' => 4, 'id_user' => 1], // Dekan
        //     ['id_role' => 4, 'id_user' => 2], 
        //     ['id_role' => 4, 'id_user' => 3], 

        //     // id_ps => 1 (Teknik Sipil)
        //     // --- USER 4: Koordinator PSTS ---
        //     ['id_role' => 3, 'id_user' => 4], // Kaprodi
        //     // --- USER 5 & 6: Admin Prodi Teknik Sipil ---
        //     ['id_role' => 1, 'id_user' => 5], // Admin
        //     ['id_role' => 1, 'id_user' => 6], // Admin

        //     // --- USER 7: Koordinator PSPPI ---
        //     ['id_role' => 3, 'id_user' => 7], // Kaprodi

        //     // --- USER 8: Koordinator PSMTS ---
        //     ['id_role' => 3, 'id_user' => 8], // Kaprodi

        //     // --- USER 9 - 47: Dosen Biasa (Hanya Role 2) ---
        //     ['id_role' => 2, 'id_user' => 1], 
        //     ['id_role' => 2, 'id_user' => 4], 
        //     ['id_role' => 2, 'id_user' => 7], 
        //     ['id_role' => 2, 'id_user' => 8], 
        //     ['id_role' => 2, 'id_user' => 9],
        //     ['id_role' => 2, 'id_user' => 10],
        //     ['id_role' => 2, 'id_user' => 11],
        //     ['id_role' => 2, 'id_user' => 12],
        //     ['id_role' => 2, 'id_user' => 13],
        //     ['id_role' => 2, 'id_user' => 14],
        //     ['id_role' => 2, 'id_user' => 15],
        //     ['id_role' => 2, 'id_user' => 16],
        //     ['id_role' => 2, 'id_user' => 17],
        //     ['id_role' => 2, 'id_user' => 18],
        //     ['id_role' => 2, 'id_user' => 19],
        //     ['id_role' => 2, 'id_user' => 20],
        //     ['id_role' => 2, 'id_user' => 21],
        //     ['id_role' => 2, 'id_user' => 22],
        //     ['id_role' => 2, 'id_user' => 23],
        //     ['id_role' => 2, 'id_user' => 24],
        //     ['id_role' => 2, 'id_user' => 25],
        //     ['id_role' => 2, 'id_user' => 26],
        //     ['id_role' => 2, 'id_user' => 27],
        //     ['id_role' => 2, 'id_user' => 28],
        //     ['id_role' => 2, 'id_user' => 29],
        //     ['id_role' => 2, 'id_user' => 30],
        //     ['id_role' => 2, 'id_user' => 31],
        //     ['id_role' => 2, 'id_user' => 32],
        //     ['id_role' => 2, 'id_user' => 33],
        //     ['id_role' => 2, 'id_user' => 34],
        //     ['id_role' => 2, 'id_user' => 35],
        //     ['id_role' => 2, 'id_user' => 36],
        //     ['id_role' => 2, 'id_user' => 37],
        //     ['id_role' => 2, 'id_user' => 38],
        //     ['id_role' => 2, 'id_user' => 39],
        //     ['id_role' => 2, 'id_user' => 40],
        //     ['id_role' => 2, 'id_user' => 41],
        //     ['id_role' => 2, 'id_user' => 42],
        //     ['id_role' => 2, 'id_user' => 43],
        //     ['id_role' => 2, 'id_user' => 44],
        //     ['id_role' => 2, 'id_user' => 45],
        //     ['id_role' => 2, 'id_user' => 46],
        //     ['id_role' => 2, 'id_user' => 47],

        //     // // id_ps => 2 (Teknik Pertambanan)
        //     // ['id_role' => 3, 'id_user' => 35], // Kaprodi
        //     // ['id_role' => 1, 'id_user' => 36], // Admin
        //     // ['id_role' => 1, 'id_user' => 37], // Admin
        //     // ['id_role' => 2, 'id_user' => 38], // Dosen
        //     // ['id_role' => 2, 'id_user' => 39], // Dosen
        //     // ['id_role' => 2, 'id_user' => 40], // Dosen
        //     // ['id_role' => 2, 'id_user' => 41], // Dosen
        //     // ['id_role' => 2, 'id_user' => 42], // Dosen
        //     // ['id_role' => 2, 'id_user' => 43], // Dosen
        //     // ['id_role' => 2, 'id_user' => 44], // Dosen
        //     // ['id_role' => 2, 'id_user' => 45], // Dosen
        //     // ['id_role' => 2, 'id_user' => 46], // Dosen
        //     // ['id_role' => 2, 'id_user' => 47], // Dosen
        //     // ['id_role' => 2, 'id_user' => 48], // Dosen
        //     // ['id_role' => 2, 'id_user' => 49], // Dosen
        //     // ['id_role' => 2, 'id_user' => 50], // Dosen
        //     // ['id_role' => 2, 'id_user' => 51], // Dosen

        //     // // id_ps => 3 (Teknik Mesin)
        //     // ['id_role' => 3, 'id_user' => 52], // Kaprodi
        //     // ['id_role' => 1, 'id_user' => 53], // Admin
        //     // ['id_role' => 1, 'id_user' => 54], // Admin
        //     // ['id_role' => 2, 'id_user' => 55], // Dosen
        //     // ['id_role' => 2, 'id_user' => 56], // Dosen
        //     // ['id_role' => 2, 'id_user' => 57], // Dosen
        //     // ['id_role' => 2, 'id_user' => 58], // Dosen
        //     // ['id_role' => 2, 'id_user' => 59], // Dosen
        //     // ['id_role' => 2, 'id_user' => 60], // Dosen
        //     // ['id_role' => 2, 'id_user' => 61], // Dosen
        //     // ['id_role' => 2, 'id_user' => 62], // Dosen
        //     // ['id_role' => 2, 'id_user' => 63], // Dosen
        //     // ['id_role' => 2, 'id_user' => 64], // Dosen

        //     // // id_ps => 4 (Teknik Lingkungan)
        //     // ['id_role' => 3, 'id_user' => 65], // Kaprodi
        //     // ['id_role' => 1, 'id_user' => 66], // Admin
        //     // ['id_role' => 1, 'id_user' => 67], // Admin
        //     // ['id_role' => 2, 'id_user' => 68], // Dosen
        //     // ['id_role' => 2, 'id_user' => 69], // Dosen
        //     // ['id_role' => 2, 'id_user' => 70], // Dosen
        //     // ['id_role' => 2, 'id_user' => 71], // Dosen
        //     // ['id_role' => 2, 'id_user' => 72], // Dosen
        //     // ['id_role' => 2, 'id_user' => 73], // Dosen
        //     // ['id_role' => 2, 'id_user' => 74], // Dosen
        //     // ['id_role' => 2, 'id_user' => 75], // Dosen
        //     // ['id_role' => 2, 'id_user' => 76], // Dosen
        //     // ['id_role' => 2, 'id_user' => 77], // Dosen
        //     // ['id_role' => 2, 'id_user' => 78], // Dosen
        //     // ['id_role' => 2, 'id_user' => 79], // Dosen
        //     // ['id_role' => 2, 'id_user' => 80], // Dosen
        //     // ['id_role' => 2, 'id_user' => 81], // Dosen
        //     // ['id_role' => 2, 'id_user' => 82], // Dosen
        //     // ['id_role' => 2, 'id_user' => 83], // Dosen

        //     // // id_ps => 5 (Arsitektur)
        //     // ['id_role' => 3, 'id_user' => 84], // Kaprodi
        //     // ['id_role' => 1, 'id_user' => 85], // Admin
        //     // ['id_role' => 1, 'id_user' => 86], // Admin
        //     // ['id_role' => 2, 'id_user' => 87], // Dosen
        //     // ['id_role' => 2, 'id_user' => 88], // Dosen
        //     // ['id_role' => 2, 'id_user' => 89], // Dosen
        //     // ['id_role' => 2, 'id_user' => 90], // Dosen
        //     // ['id_role' => 2, 'id_user' => 91], // Dosen
        //     // ['id_role' => 2, 'id_user' => 92], // Dosen
        //     // ['id_role' => 2, 'id_user' => 93], // Dosen
        //     // ['id_role' => 2, 'id_user' => 94], // Dosen
        //     // ['id_role' => 2, 'id_user' => 95], // Dosen
        //     // ['id_role' => 2, 'id_user' => 96], // Dosen
        //     // ['id_role' => 2, 'id_user' => 97], // Dosen
        //     // ['id_role' => 2, 'id_user' => 98], // Dosen
        //     // ['id_role' => 2, 'id_user' => 99], // Dosen
        //     // ['id_role' => 2, 'id_user' => 100], // Dosen
        //     // ['id_role' => 2, 'id_user' => 101], // Dosen

        //     // // id_ps => 6 (Teknik Kimia)
        //     // ['id_role' => 3, 'id_user' => 102], // Kaprodi
        //     // ['id_role' => 1, 'id_user' => 103], // Admin
        //     // ['id_role' => 1, 'id_user' => 104], // Admin
        //     // ['id_role' => 2, 'id_user' => 105], // Dosen
        //     // ['id_role' => 2, 'id_user' => 106], // Dosen
        //     // ['id_role' => 2, 'id_user' => 107], // Dosen
        //     // ['id_role' => 2, 'id_user' => 108], // Dosen
        //     // ['id_role' => 2, 'id_user' => 109], // Dosen
        //     // ['id_role' => 2, 'id_user' => 110], // Dosen
        //     // ['id_role' => 2, 'id_user' => 111], // Dosen
        //     // ['id_role' => 2, 'id_user' => 112], // Dosen
        //     // ['id_role' => 2, 'id_user' => 113], // Dosen
        //     // ['id_role' => 2, 'id_user' => 114], // Dosen
        //     // ['id_role' => 2, 'id_user' => 115], // Dosen
        //     // ['id_role' => 2, 'id_user' => 116], // Dosen

        //     // // id_ps => 7 (Teknologi Informasi)
        //     // ['id_role' => 3, 'id_user' => 117], // Kaprodi
        //     // ['id_role' => 2, 'id_user' => 117], // Dosen
        //     // ['id_role' => 1, 'id_user' => 118], // Admin
        //     // ['id_role' => 1, 'id_user' => 119], // Admin
        //     // ['id_role' => 2, 'id_user' => 120], // Dosen
        //     // ['id_role' => 2, 'id_user' => 121], // Dosen
        //     // ['id_role' => 2, 'id_user' => 122], // Dosen
        //     // ['id_role' => 2, 'id_user' => 123], // Dosen
        //     // ['id_role' => 2, 'id_user' => 124], // Dosen
        //     // ['id_role' => 2, 'id_user' => 125], // Dosen
        //     // ['id_role' => 2, 'id_user' => 126], // Dosen
        //     // ['id_role' => 2, 'id_user' => 127], // Dosen
        //     // ['id_role' => 2, 'id_user' => 128], // Dosen
        //     // ['id_role' => 2, 'id_user' => 129], // Dosen
        //     // ['id_role' => 2, 'id_user' => 130], // Dosen

        //     // // id_ps => 8 (Rekaya Elektro)
        //     // ['id_role' => 3, 'id_user' => 131], // Kaprodi
        //     // ['id_role' => 1, 'id_user' => 132], // Admin
        //     // ['id_role' => 1, 'id_user' => 133], // Admin
        //     // ['id_role' => 2, 'id_user' => 134], // Dosen
        //     // ['id_role' => 2, 'id_user' => 135], // Dosen
        //     // ['id_role' => 2, 'id_user' => 136], // Dosen
        //     // ['id_role' => 2, 'id_user' => 137], // Dosen
        //     // ['id_role' => 2, 'id_user' => 138], // Dosen
        //     // ['id_role' => 2, 'id_user' => 139], // Dosen
        //     // ['id_role' => 2, 'id_user' => 140], // Dosen
        //     // ['id_role' => 2, 'id_user' => 141], // Dosen

        //     // // id_ps => 9 (Rekayasa Geologi)
        //     // ['id_role' => 3, 'id_user' => 142], // Kaprodi
        //     // ['id_role' => 1, 'id_user' => 143], // Admin
        //     // ['id_role' => 1, 'id_user' => 144], // Admin
        //     // ['id_role' => 2, 'id_user' => 145], // Dosen
        //     // ['id_role' => 2, 'id_user' => 146], // Dosen
        //     // ['id_role' => 2, 'id_user' => 147], // Dosen
        //     // ['id_role' => 2, 'id_user' => 148], // Dosen
        //     // ['id_role' => 2, 'id_user' => 149], // Dosen
        //     // ['id_role' => 2, 'id_user' => 150], // Dosen

        //     // // Role Tambahan
        //     // // ['id_user_role' => 151, 'id_role' => 5, 'id_user' => 5],
        //     // // ['id_user_role' => 152, 'id_role' => 5, 'id_user' => 36],
        //     // // ['id_user_role' => 153, 'id_role' => 5, 'id_user' => 53],
        //     // // ['id_user_role' => 154, 'id_role' => 5, 'id_user' => 66],
        //     // // ['id_user_role' => 155, 'id_role' => 5, 'id_user' => 85],
        //     // // ['id_user_role' => 156, 'id_role' => 5, 'id_user' => 103],
        //     // // ['id_user_role' => 157, 'id_role' => 5, 'id_user' => 118],
        //     // // ['id_user_role' => 158, 'id_role' => 5, 'id_user' => 134],
        //     // // ['id_user_role' => 159, 'id_role' => 5, 'id_user' => 145],

        //     // // ['id_user_role' => 160, 'id_role' => 6, 'id_user' => 124],
        //     // // ['id_user_role' => 161, 'id_role' => 6, 'id_user' => 131],

        // ]);
    }
}
