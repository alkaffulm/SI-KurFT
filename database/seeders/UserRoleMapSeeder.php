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
        // 'NIP' => [ ['role' => ID_ROLE, 'ps' => ID_PS_JABATAN] ]
        $jabatanMap = [
            // --- TINGKAT FAKULTAS ---
            '197309031997021001' => [['role' => 4, 'ps' => 1]], // Pak Iphan (Dekan)
            '197306152000031002' => [['role' => 4, 'ps' => 2]], // Pak Nurhakim (WD I Bidang Umum dan Keuangan)
            '197401071998021001' => [['role' => 4, 'ps' => 4]], // Pak Mahmud (WD II Bidang Akademik)
            '197007171998021001' => [['role' => 4, 'ps' => 3]], // Pak Abdul Ghofur (WD III Bidang Kemahasiswaan dan Alumni)

            // -- UPM FT --
            '197511242005012005' => [['role' => 5, 'ps' => 1]], // Dr. Novitasari, S.T., M.T. (Kepala UPM FT)

            // --- TINGKAT PRODI (KAPRODI) ---
            '197208261998021001' => [['role' => 3, 'ps' => 1]], // M. Arsyad (Koord PSTS)
            '198008032006041001' => [['role' => 3, 'ps' => 2]], // Agus Triantoro (Koord PSTP)
            '197601282008121002' => [['role' => 3, 'ps' => 3]], // Ma'ruf (Koord PSTM)
            '198708282012122001' => [['role' => 3, 'ps' => 4]], // Rizqi Puteri Mahyudin (Koord PSTL)
            '198102102005011012' => [['role' => 3, 'ps' => 5]], // Akbar Rahman (Koord PSA)
            '198005292005012003' => [['role' => 3, 'ps' => 6]], // Hesti Wijayanti (Koord PSTK)
            '199307032019031011' => [['role' => 3, 'ps' => 7]], // Andreyan Rizky Baskara (Koord PSTI)
            '199412142022031013' => [['role' => 3, 'ps' => 8]], // Akhmad Ghiffary Budianto (Koord PSRE)
            '198103062005011001' => [['role' => 3, 'ps' => 9]], // Rudy Hendrawan Noor (Koord PSRG)
            
            // CONTOH KASUS LINTAS PRODI 
            '197907232005012005' => [['role' => 3, 'ps' => 10]], // Nursiah Chairunnisa (Koord PSMTS)
            '197608052008121001' => [['role' => 3, 'ps' => 11]], // Rachmat Subagyo (Koord PSMTM)
            '197204301997031003' => [['role' => 3, 'ps' => 12]], // Bani Noor Muchamad (Koord PSMA)
            '197504042000031002' => [['role' => 3, 'ps' => 13]], // Prof. Chairul Irawan (Koord PSMTK)
            '197507192000031001' => [['role' => 3, 'ps' => 14]], // Prof. Dr.-Ing. Yulian Firmana Arifin (Koord PSTB)

        ];

        foreach ($jabatanMap as $nip => $roles) {
            $userId = DB::table('user')->where('NIP', $nip)->value('id_user');

            if ($userId) {
                foreach ($roles as $r) {
                    DB::table('user_role_map')->insert([
                        'id_user' => $userId,
                        'id_role' => $r['role'],
                        'id_ps'   => $r['ps'],
                    ]);
                }
            }
        }        

        
    }
}
