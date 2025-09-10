<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            ['id_user' => 1, 'id_ps' => null, 'NIP' => 'PFT1001', 'username' => 'pimpinanft1', 'email' => '-',  'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 2, 'id_ps' => null, 'NIP' => 'PFT1002', 'username' => 'pimpinanft2', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 3, 'id_ps' => null, 'NIP' => 'PFT1003', 'username' => 'pimpinanft3', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 4, 'id_ps' => 1, 'NIP' => '197208261998021001', 'username' => 'Dr. Muhammad Arsyad, S.T., M.T', 'email' => 'emarsyad@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 5, 'id_ps' => 1, 'NIP' => 'ADM1001', 'username' => 'admin11', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 6, 'id_ps' => 1, 'NIP' => 'ADM1002', 'username' => 'admin12', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 7, 'id_ps' => 1, 'NIP' => '196310161992011001', 'username' => 'Markawie, S.T., M.T', 'email' => 'markawie@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 8, 'id_ps' => 1, 'NIP' => '198109152005011001', 'username' => 'Ir. Husnul Khatimi,  S.T., M.T.', 'email' => 'hkhatimi@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 9, 'id_ps' => 1, 'NIP' => '199107082022031005', 'username' => 'Eddy Nasrullah, S.T., M.T', 'email' => 'eddy.nashrullah@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 10, 'id_ps' => 2, 'NIP' => '198008032006041001', 'username' => 'Agus Triantoro, S.T., M.T', 'email' => 'agus@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 11, 'id_ps' => 2, 'NIP' => 'ADM2001', 'username' => 'admin21', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 12, 'id_ps' => 2, 'NIP' => 'ADM2002', 'username' => 'admin22', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 13, 'id_ps' => 2, 'NIP' => '198710182018032001', 'username' => 'Sari Melati, S.T., M.T', 'email' => 'sari@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 14, 'id_ps' => 2, 'NIP' => '199203092024061001', 'username' => 'Satrio Ramadhan, S.T., M.T', 'email' => 'satrio.ramadhan@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 15, 'id_ps' => 2, 'NIP' => '199111222022031006', 'username' => "Ir. Ahmad Ali Syafi'i, S.T., M.T", 'email' => 'ali.syafii@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 16, 'id_ps' => 3, 'NIP' => '199002212018031001', 'username' => 'Herry Irawansyah, S.T., M.Eng', 'email' => 'herryirawansyah@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 17, 'id_ps' => 3, 'NIP' => 'ADM3001', 'username' => 'admin31', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 18, 'id_ps' => 3, 'NIP' => 'ADM3002', 'username' => 'admin32', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 19, 'id_ps' => 3, 'NIP' => '197007171998021001', 'username' => 'Prof. Dr. Abdul Ghofur, S.T., M.T', 'email' => 'ghofur70@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 20, 'id_ps' => 3, 'NIP' => '198808282022031006', 'username' => 'Anwar, S.T., M.T', 'email' => 'anwar.ft@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 21, 'id_ps' => 3, 'NIP' => '197105231999031004', 'username' => 'Akhmad Syarief, S.T., M.T', 'email' => 'akhmad.syarief@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 22, 'id_ps' => 4, 'NIP' => '198708282012122001', 'username' => 'Dr. Rizqi Puteri Mahyudi, S.Si., M.S', 'email' => 'rizqiputeri@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 23, 'id_ps' => 4, 'NIP' => 'ADM4001', 'username' => 'admin41', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 24, 'id_ps' => 4, 'NIP' => 'ADM4002', 'username' => 'admin42', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 25, 'id_ps' => 4, 'NIP' => '198411182008122003', 'username' => 'Dr. Ir. Nopi Stiyati Prihatini, S.Si., M.T', 'email' => 'anwar.ft@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 26, 'id_ps' => 4, 'NIP' => '198411182008122003', 'username' => 'Rijali Noor, S.T., M.T', 'email' => 'anwar.ft@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 27, 'id_ps' => 4, 'NIP' => '198007072008011029', 'username' => 'Dr. Andy Mizwar, S.T., M.Si', 'email' => 'anwar.ft@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 28, 'id_ps' => 5, 'NIP' => '198102102005011012', 'username' => 'Dr. -Eng. Akbar Rahman, S.T., M.T', 'email' => 'arzhi_teks@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 29, 'id_ps' => 5, 'NIP' => 'ADM5001', 'username' => 'admin51', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 30, 'id_ps' => 5, 'NIP' => 'ADM5002', 'username' => 'admin52', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 31, 'id_ps' => 5, 'NIP' => '198107162010121001', 'username' => 'J.C. Heldiansyah, S.T., M.Sc', 'email' => 'jcheldiansyah@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 32, 'id_ps' => 5, 'NIP' => '198301062005012002', 'username' => 'Naimatul Aufa, S.T., M.Sc', 'email' => 'naimatulaufa@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 33, 'id_ps' => 5, 'NIP' => '198511172019032016', 'username' => 'Irma Fawzia, S.T., M.Arch', 'email' => 'irma.fawzia@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 34, 'id_ps' => 6, 'NIP' => '198101122003121001', 'username' => 'Ir. Doni Rahmat Wicaksono, S.T., M.Eng', 'email' => 'doni.rahmat.w@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 35, 'id_ps' => 6, 'NIP' => 'ADM6001', 'username' => 'admin61', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 36, 'id_ps' => 6, 'NIP' => 'ADM6002', 'username' => 'admin62', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 37, 'id_ps' => 6, 'NIP' => '199002112019032019', 'username' => 'Rinny Jelita, S.T., M.Eng', 'email' => 'rinnyjelita@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 38, 'id_ps' => 6, 'NIP' => '198401192012122003', 'username' => "Dr. Ir. Lailan Ni'mah, S.T., M.Eng", 'email' => 'lailan.nimah@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 39, 'id_ps' => 6, 'NIP' => '199002112022032004', 'username' => 'Rinna Juwita, S.T., M.T', 'email' => 'rinna.juwita@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 40, 'id_ps' => 7, 'NIP' => '199307032019031011', 'username' => 'Andreyan Rizky Baskara, S.Kom., M.Kom.', 'email' => 'andreyan.baskara@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 41, 'id_ps' => 7, 'NIP' => 'ADM7001', 'username' => 'admin71', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 42, 'id_ps' => 7, 'NIP' => 'ADM7002', 'username' => 'admin72', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 43, 'id_ps' => 7, 'NIP' => '198810272019032013', 'username' => "Muti'a Maulida, S.Kom., M.T.I", 'email' => 'mutia.maulida@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 44, 'id_ps' => 7, 'NIP' => '199106192024062001', 'username' => 'Helda Yunita, S.Kom., M.Kom', 'email' => 'helda.yunita@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 45, 'id_ps' => 7, 'NIP' => '198205082008011010', 'username' => 'Ir. Eka Setya Wijaya, S.T., M.Kom', 'email' => 'ekasw@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 46, 'id_ps' => 8, 'NIP' => '197509242002121005', 'username' => 'Gunawan Rudi Cahyono, S.T., M.T', 'email' => 'gunawan.cahyono@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 47, 'id_ps' => 8, 'NIP' => 'ADM8001', 'username' => 'admin81', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 48, 'id_ps' => 8, 'NIP' => 'ADM8002', 'username' => 'admin82', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 49, 'id_ps' => 8, 'NIP' => '199106172022031007', 'username' => 'Arief Trisno Eko Suryo, S.T., M.T', 'email' => 'arief.suryo@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 50, 'id_ps' => 8, 'NIP' => '199412142022031013', 'username' => 'Akhmad Ghiffary Budianto, S.T., M.T', 'email' => 'ghiffary.budianto@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 51, 'id_ps' => 8, 'NIP' => '199007272019031018', 'username' => 'Andry Fajar Zulkarnain, S.ST., M.T', 'email' => 'andry.zulkarnain@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 52, 'id_ps' => 9, 'NIP' => '197310132003121001', 'username' => 'Uyu Saismana, S.T., M.T', 'email' => 'uyu@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 53, 'id_ps' => 9, 'NIP' => 'ADM9001', 'username' => 'admin91', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 54, 'id_ps' => 9, 'NIP' => 'ADM9002', 'username' => 'admin92', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 55, 'id_ps' => 9, 'NIP' => '198103062005011001', 'username' => 'Rudy Hendrawan Noor', 'email' => 'rudy.noor@ulm.ac.id', 'password, S.T., M.T' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 56, 'id_ps' => 9, 'NIP' => '197505302008011012', 'username' => 'Marselinus Untung Dwiatmoko, S.T', 'email' => 'untung@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 57, 'id_ps' => 9, 'NIP' => '199307262022031007', 'username' => 'Ir. Muhammad Zaini Arief, S.T., M.T', 'email' => 'zaini.arief@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
        ]);
    }
}
