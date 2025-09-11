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
            
            // id_ps => 1 (Teknik Sipil)
            ['id_user' => 4, 'id_ps' => 1, 'NIP' => '197208261998021001', 'username' => 'Dr. Muhammad Arsyad, S.T., M.T', 'email' => 'emarsyad@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 5, 'id_ps' => 1, 'NIP' => 'ADM1001', 'username' => 'admin11', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 6, 'id_ps' => 1, 'NIP' => 'ADM1002', 'username' => 'admin12', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 7, 'id_ps' => 1, 'NIP' => '197511242005012005', 'username' => 'Dr. Novitasari, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'novitasari@ulm.ac.id'],
            ['id_user' => 8, 'id_ps' => 1, 'NIP' => '196911011993032001', 'username' => 'Ir. Ida Barkiah, M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'idabarkiah@ulm.ac.id'],
            ['id_user' => 9, 'id_ps' => 1, 'NIP' => '196605201991031005', 'username' => 'Ir. Fauzi Rahman, M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'fauzirahman@ulm.ac.id'],
            ['id_user' => 10, 'id_ps' => 1, 'NIP' => '196301311991031001', 'username' => 'Ir. Rusliansyah, M.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rusliansyah@ulm.ac.id'],
            ['id_user' => 11, 'id_ps' => 1, 'NIP' => '198109222005012003', 'username' => 'Ulfa Fitriati, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ufitriati@ulm.ac.id'],
            ['id_user' => 12, 'id_ps' => 1, 'NIP' => '196201151991031002', 'username' => 'Ir. Adriani, M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'adriani.sipil@ulm.ac.id'],
            ['id_user' => 13, 'id_ps' => 1, 'NIP' => '196901061995022001', 'username' => 'Dr. Ir. Ratni Nurwidayati, M.T., M.Eng.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ratninurwidayati@ulm.ac.id'],
            ['id_user' => 14, 'id_ps' => 1, 'NIP' => '197505252005012004', 'username' => 'Eliatun, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'eliatun_tarip@ulm.ac.id'],
            ['id_user' => 15, 'id_ps' => 1, 'NIP' => '197609012005012003', 'username' => 'Noordiah Helda, S.T., M.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'noordiah.helda@ulm.ac.id'],
            ['id_user' => 16, 'id_ps' => 1, 'NIP' => '196012251990031002', 'username' => 'Ir. Yasruddin, M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'yasruddin@ulm.ac.id'],
            ['id_user' => 17, 'id_ps' => 1, 'NIP' => '198109152005011001', 'username' => 'Husnul Khatimi, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'hkhatimi@ulm.ac.id'],
            ['id_user' => 18, 'id_ps' => 1, 'NIP' => '197606222005012002', 'username' => 'Dr. Nilna Amal, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nilna.amal@ulm.ac.id'],
            ['id_user' => 19, 'id_ps' => 1, 'NIP' => '198112092014042001', 'username' => 'Utami Sylvia Lestari, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'utami.s.lestari@ulm.ac.id'],
            ['id_user' => 20, 'id_ps' => 1, 'NIP' => '197210281997021001', 'username' => 'Gawit Hidayat, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'gawit.hidayat@ulm.ac.id'],
            ['id_user' => 21, 'id_ps' => 1, 'NIP' => '196310161992011001', 'username' => 'Ir. Markawie, M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'markawie@ulm.ac.id'],
            ['id_user' => 22, 'id_ps' => 1, 'NIP' => '198606282012121002', 'username' => 'Wiku Adhiwicaksana Krasna, S.T., M.Eng., Ph.D', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'wakrasna@ulm.ac.id'],
            ['id_user' => 23, 'id_ps' => 1, 'NIP' => '199308102019031011', 'username' => 'Arya Rizki Darmawan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'arya.darmawan@ulm.ac.id'],
            ['id_user' => 24, 'id_ps' => 1, 'NIP' => '199306172019032024', 'username' => 'Elma Sofia, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'elma.sofia@ulm.ac.id'],
            ['id_user' => 25, 'id_ps' => 1, 'NIP' => '199511012022032021', 'username' => 'Nova Widayanti, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nova.widayanti@ulm.ac.id'],
            ['id_user' => 26, 'id_ps' => 1, 'NIP' => '199505192022031013', 'username' => 'Abdul Karim, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'abdulkarim@ulm.ac.id'],
            ['id_user' => 27, 'id_ps' => 1, 'NIP' => '199107082022031005', 'username' => 'Eddy Nashrullah, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'eddy.nashrullah@ulm.ac.id'],
            ['id_user' => 28, 'id_ps' => 1, 'NIP' => '199406012022032014', 'username' => 'Endah Widiastuti, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'endah.widiastuti@ulm.ac.id'],
            ['id_user' => 29, 'id_ps' => 1, 'NIP' => '199205222008121001', 'username' => 'Aulia Isramaulana, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'auliaisramaulana@ulm.ac.id'],
            ['id_user' => 30, 'id_ps' => 1, 'NIP' => '199307292024061001', 'username' => 'Ir. Fariz Baihaqi, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'fariz.baihaqi@ulm.ac.id'],
            ['id_user' => 31, 'id_ps' => 1, 'NIP' => '197804302006042001', 'username' => 'Dr. Rahmani Kadarningsih, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rahmani.kadarningsih@ulm.ac.id'],
            ['id_user' => 32, 'id_ps' => 1, 'NIP' => '200101242025062009', 'username' => 'Nada Salsabila', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nadasals@ulm.ac.id'],
            ['id_user' => 33, 'id_ps' => 1, 'NIP' => '199312312025061006', 'username' => 'Muhammad Alfian Noor, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'alfianmuhammad@ulm.ac.id'],
            ['id_user' => 34, 'id_ps' => 1, 'NIP' => '199504112023212036', 'username' => 'Humaira Afrila', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'humaira.afrila@ulm.ac.id'],

            // id_ps => 2 (Teknik Pertambangan)
            ['id_user' => 35, 'id_ps' => 2, 'NIP' => '198008032006041001', 'username' => 'Agus Triantoro, S.T., M.T', 'email' => 'agus@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 36, 'id_ps' => 2, 'NIP' => 'ADM2001', 'username' => 'admin21', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 37, 'id_ps' => 2, 'NIP' => 'ADM2002', 'username' => 'admin22', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 38, 'id_ps' => 2, 'NIP' => '198006162006041005', 'username' => 'Romla Noor Hakim, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'romla@ulm.ac.id'],
            ['id_user' => 39, 'id_ps' => 2, 'NIP' => '197306152000031002', 'username' => 'Nurhakim, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nurhakim@ulm.ac.id'],
            ['id_user' => 40, 'id_ps' => 2, 'NIP' => '198807012008122001', 'username' => 'Annisa, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'annisa@ulm.ac.id'],
            ['id_user' => 41, 'id_ps' => 2, 'NIP' => '197312312008121008', 'username' => 'Riswan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'riswan@ulm.ac.id'],
            ['id_user' => 42, 'id_ps' => 2, 'NIP' => '198504192014041001', 'username' => 'Eko Santoso, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'eko@ulm.ac.id'],
            ['id_user' => 43, 'id_ps' => 2, 'NIP' => '198704172015041003', 'username' => 'Dr.mont. Hafidz Noor Fikri, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'hafidz@ulm.ac.id'],
            ['id_user' => 44, 'id_ps' => 2, 'NIP' => '198706112015042002', 'username' => 'Yuniar Siska Novianti, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'yuniar@ulm.ac.id'],
            ['id_user' => 45, 'id_ps' => 2, 'NIP' => '198710182018032001', 'username' => 'Sari Melati, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'sari@ulm.ac.id'],
            ['id_user' => 46, 'id_ps' => 2, 'NIP' => '198803072019032012', 'username' => 'Karina Shella Putri, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'karinashella@ulm.ac.id'],
            ['id_user' => 47, 'id_ps' => 2, 'NIP' => '199108112022031006', 'username' => 'Ahmad Ali Syafi\'i, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ali.syafii@ulm.ac.id'],
            ['id_user' => 48, 'id_ps' => 2, 'NIP' => '199101012024062004', 'username' => 'Pillayati, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'pillayati@ulm.ac.id'],
            ['id_user' => 49, 'id_ps' => 2, 'NIP' => '199203092024061001', 'username' => 'Satrio Ramadhan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'satrio.ramadhan@ulm.ac.id'],
            ['id_user' => 50, 'id_ps' => 2, 'NIP' => '199402232025062008', 'username' => 'Riri Lidya Fathira, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ririlidyaf@ulm.ac.id'],
            ['id_user' => 51, 'id_ps' => 2, 'NIP' => 'NIP_BELUM_TERSEDIA', 'username' => 'Dr. Ir. Ihsan Noor, S.E., M.S.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ihsan.noor@ulm.ac.id'],

            // id_ps => 3 (Teknik Mesin)
            ['id_user' => 52, 'id_ps' => 3, 'NIP' => '199002212018031001', 'username' => 'Herry Irawansyah, S.T., M.Eng', 'email' => 'herryirawansyah@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 53, 'id_ps' => 3, 'NIP' => 'ADM3001', 'username' => 'admin31', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 54, 'id_ps' => 3, 'NIP' => 'ADM3002', 'username' => 'admin32', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 55, 'id_ps' => 3, 'NIP' => '197105231999031004', 'username' => 'Akhmad Syarief, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'akhmad.syarief@ulm.ac.id'],
            ['id_user' => 56, 'id_ps' => 3, 'NIP' => '197601282008121002', 'username' => 'Ma\'ruf, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'maruf@ulm.ac.id'],
            ['id_user' => 57, 'id_ps' => 3, 'NIP' => '199203222019031010', 'username' => 'Muhammad Nizar Ramadhan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nizarramadhan@ulm.ac.id'],
            ['id_user' => 58, 'id_ps' => 3, 'NIP' => '199210182019031010', 'username' => 'Pathur Razi Ansyah, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'pathur.razi@ulm.ac.id'],
            ['id_user' => 59, 'id_ps' => 3, 'NIP' => '198906282022031008', 'username' => 'Andy Nugraha, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'andy.nugraha@ulm.ac.id'],
            ['id_user' => 60, 'id_ps' => 3, 'NIP' => '198808282022031006', 'username' => 'Anwar, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'anwar.ft@ulm.ac.id'],
            ['id_user' => 61, 'id_ps' => 3, 'NIP' => '200106092025061003', 'username' => 'Muhammad Farouk Setiawan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'mfarouksetiawan@ulm.ac.id'],
            ['id_user' => 62, 'id_ps' => 3, 'NIP' => '199411132025061005', 'username' => 'Aldinor Setiawan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'aldinorsetiawan@ulm.ac.id'],
            ['id_user' => 63, 'id_ps' => 3, 'NIP' => '199606222025061006', 'username' => 'Elwas Cahya Wahyu Pribadi, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'elwascahyawahyupribadi@ulm.ac.id'],
            ['id_user' => 64, 'id_ps' => 3, 'NIP' => '196806072023211005', 'username' => 'Rudi Siswanto, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rudisiswanto@ulm.ac.id'],

            // id_ps => 4 (Teknik Lingkungan)
            ['id_user' => 65, 'id_ps' => 4, 'NIP' => '198708282012122001', 'username' => 'Dr. Rizqi Puteri Mahyudin, S.Si., M.S', 'email' => 'rizqiputeri@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 66, 'id_ps' => 4, 'NIP' => 'ADM4001', 'username' => 'admin41', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 67, 'id_ps' => 4, 'NIP' => 'ADM4002', 'username' => 'admin42', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 68, 'id_ps' => 4, 'NIP' => '198007072008011029', 'username' => 'Dr. Andy Mizwar, S.T., M.Si.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'andymizwar@ulm.ac.id'],
            ['id_user' => 69, 'id_ps' => 4, 'NIP' => '196605291999031001', 'username' => 'Muhammad Husin, S.T., M.S.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'muhammad.husin@ulm.ac.id'],
            ['id_user' => 70, 'id_ps' => 4, 'NIP' => '197610171999031003', 'username' => 'Dr. Rony Riduan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ronyrdn@ulm.ac.id'],
            ['id_user' => 71, 'id_ps' => 4, 'NIP' => '197607071999031005', 'username' => 'Rijali Noor, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rijali.noor@ulm.ac.id'],
            ['id_user' => 72, 'id_ps' => 4, 'NIP' => '198411182008122003', 'username' => 'Dr. Nopi Stiyati Prihatini, S.Si., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ns.prihatini@ulm.ac.id'],
            ['id_user' => 73, 'id_ps' => 4, 'NIP' => '197706192008012019', 'username' => 'Rd. Indah Nirtha Nilawati N.P.S., S.T., M.Si.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'indah.nirtha@ulm.ac.id'],
            ['id_user' => 74, 'id_ps' => 4, 'NIP' => '197511092009121002', 'username' => 'Muhammad Syahirul Alim, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'syahirul.alim@ulm.ac.id'],
            ['id_user' => 75, 'id_ps' => 4, 'NIP' => '197807122012121002', 'username' => 'Chairul Abdi, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'chairulabdi@ulm.ac.id'],
            ['id_user' => 76, 'id_ps' => 4, 'NIP' => '198909112015041002', 'username' => 'Muhammad Firmansyah, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'muhammad.firmansyah@ulm.ac.id'],
            ['id_user' => 77, 'id_ps' => 4, 'NIP' => '199101192019031016', 'username' => 'Muhammad Abrar Firdausy, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'abrar.firdausy@ulm.ac.id'],
            ['id_user' => 78, 'id_ps' => 4, 'NIP' => '199210052022032013', 'username' => 'Gusti Ihda Mazaya, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ihda.mazaya@ulm.ac.id'],
            ['id_user' => 79, 'id_ps' => 4, 'NIP' => '197305071998021001', 'username' => 'Badaruddin Mu\'min, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'mu\'min@ulm.ac.id'],
            ['id_user' => 80, 'id_ps' => 4, 'NIP' => '199107302024062002', 'username' => 'Fatimah Juhra, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'fatimah.juhra@ulm.ac.id'],
            ['id_user' => 81, 'id_ps' => 4, 'NIP' => '199408052025061006', 'username' => 'Ilman Sahbani, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'isahbani@ulm.ac.id'],
            ['id_user' => 82, 'id_ps' => 4, 'NIP' => '198405102024211001', 'username' => 'Riza Miftahul Khair, M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'mkriza@ulm.ac.id'],
            ['id_user' => 83, 'id_ps' => 4, 'NIP' => '198911282024212032', 'username' => 'Nova Annisa, S.Si., M.S.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'aiyuvasha@ulm.ac.id'],

            // id_ps => 5 (Arsitektur)
            ['id_user' => 84, 'id_ps' => 5, 'NIP' => '198102102005011012', 'username' => 'Dr. -Ing. Akbar Rahman, S.T., M.T', 'email' => 'arzhi_teks@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 85, 'id_ps' => 5, 'NIP' => 'ADM5001', 'username' => 'admin51', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 86, 'id_ps' => 5, 'NIP' => 'ADM5002', 'username' => 'admin52', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 87, 'id_ps' => 5, 'NIP' => '196004081988031004', 'username' => 'Ir. Pakhri Anhar, M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'pakhrianhar@ulm.ac.id'],
            ['id_user' => 88, 'id_ps' => 5, 'NIP' => '196701281995021001', 'username' => 'Ir. Muhammad Deddy Huzairin, M.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'deddyhuz@ulm.ac.id'],
            ['id_user' => 89, 'id_ps' => 5, 'NIP' => '197312222005011002', 'username' => 'Nurfansyah, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nfsarsitek@ulm.ac.id'],
            ['id_user' => 90, 'id_ps' => 5, 'NIP' => '198301062005012002', 'username' => 'Naimatul Aufa, S.T., M.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'naimatulaufa@ulm.ac.id'],
            ['id_user' => 91, 'id_ps' => 5, 'NIP' => '197906272002122002', 'username' => 'Prima Widia Wastuty, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'primawidiawastuty@ulm.ac.id'],
            ['id_user' => 92, 'id_ps' => 5, 'NIP' => '197702102005012002', 'username' => 'Dr. Yuswinda Febrita, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'yfebrita@ulm.ac.id'],
            ['id_user' => 93, 'id_ps' => 5, 'NIP' => '197811272006041002', 'username' => 'Mohammad Ibnu Sa\'ud, S.T., M.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ibnusaud@ulm.ac.id'],
            ['id_user' => 94, 'id_ps' => 5, 'NIP' => '198107162010121001', 'username' => 'J.C. Heldiansyah, S.T., M.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'jcheldiansyah@ulm.ac.id'],
            ['id_user' => 95, 'id_ps' => 5, 'NIP' => '197210291999032001', 'username' => 'Anna Oktaviana, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'oktaviana@ulm.ac.id'],
            ['id_user' => 96, 'id_ps' => 5, 'NIP' => '198302222006042003', 'username' => 'Dila Nadya Andini, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'dila.andini@ulm.ac.id'],
            ['id_user' => 97, 'id_ps' => 5, 'NIP' => '196911061995121002', 'username' => 'Gusti Novi Sarbini, S.T., MUP', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'gustinovi@ulm.ac.id'],
            ['id_user' => 98, 'id_ps' => 5, 'NIP' => '197101011998021001', 'username' => 'Muhammad Tharziansyah, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'tharziansyah@ulm.ac.id'],
            ['id_user' => 99, 'id_ps' => 5, 'NIP' => '196811091995121002', 'username' => 'Rudi Hartono, S.T., MUP', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rudi.hartono@ulm.ac.id'],
            ['id_user' => 100, 'id_ps' => 5, 'NIP' => '198511172019032016', 'username' => 'Irma Fawzia, S.T., M.Arch', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'irma.fawzia@ulm.ac.id'],
            ['id_user' => 101, 'id_ps' => 5, 'NIP' => '197608232002121001', 'username' => 'Nursyarif Agusniansyah, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nursyarif.agusniansyah@ulm.ac.id'],

            // id_ps => 6 (Teknik Kimia)
            ['id_user' => 102, 'id_ps' => 6, 'NIP' => '198101122003121001', 'username' => 'Dr. Doni Rahmat Wicaksono, S.T., M.Eng', 'email' => 'doni.rahmat.w@ulm.ac.id', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 103, 'id_ps' => 6, 'NIP' => 'ADM6001', 'username' => 'admin61', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 104, 'id_ps' => 6, 'NIP' => 'ADM6002', 'username' => 'admin62', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 105, 'id_ps' => 6, 'NIP' => '197608192003121001', 'username' => 'Prof. Dr. Agus Mirwan, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'agusmirwan@ulm.ac.id'],
            ['id_user' => 106, 'id_ps' => 6, 'NIP' => '198401192012122002', 'username' => 'Dr. Lailan Ni\'mah, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'lailan.nimah@ulm.ac.id'],
            ['id_user' => 107, 'id_ps' => 6, 'NIP' => '198103242006042002', 'username' => 'Primata Mardina, S.T., M.Eng., Ph.D', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'pmardina@ulm.ac.id'],
            ['id_user' => 108, 'id_ps' => 6, 'NIP' => '198711152015042004', 'username' => 'Desi Nurandini, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'desi.nurandini@ulm.ac.id'],
            ['id_user' => 109, 'id_ps' => 6, 'NIP' => '199002112019032019', 'username' => 'Rinny Jelita, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rinnyjelita@ulm.ac.id'],
            ['id_user' => 110, 'id_ps' => 6, 'NIP' => '198910302020121006', 'username' => 'Awali Sir Kautsar Harivram, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'awali.harivram@ulm.ac.id'],
            ['id_user' => 111, 'id_ps' => 6, 'NIP' => '199002112022032004', 'username' => 'Rinna Juwita, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rinna.juwita@ulm.ac.id'],
            ['id_user' => 112, 'id_ps' => 6, 'NIP' => '199207272024062004', 'username' => 'Yulia Nurul Ma\'rifah, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'yulia.nurul@ulm.ac.id'],
            ['id_user' => 113, 'id_ps' => 6, 'NIP' => '199409212024062001', 'username' => 'Indah Retno Wulandary, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'indah.retno@ulm.ac.id'],
            ['id_user' => 114, 'id_ps' => 6, 'NIP' => '199702272025061005', 'username' => 'Syamsul Ma\'arif Putera Ukhrawi, S.T., M.Eng.Sc.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'syamsulukhrawi@ulm.ac.id'],
            ['id_user' => 115, 'id_ps' => 6, 'NIP' => '198604292023212031', 'username' => 'Riani Ayu Lestari, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ra.lestari@ulm.ac.id'],
            ['id_user' => 116, 'id_ps' => 6, 'NIP' => '198808272023211017', 'username' => 'Jefriadi, S.T., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'jefriadi@ulm.ac.id'],

            // id_ps => 7 (Teknologi Informasi)
            ['id_user' => 117, 'id_ps' => 7, 'NIP' => '197608052003121004', 'username' => 'Prof. S.Pd., S.Si., M.Kom., Ph.D. Juhrisyansyah Dalle', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'j.dalle@ulm.ac.id'],
            ['id_user' => 118, 'id_ps' => 7, 'NIP' => 'ADM7001', 'username' => 'admin71', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 119, 'id_ps' => 7, 'NIP' => 'ADM7002', 'username' => 'admin72', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 120, 'id_ps' => 7, 'NIP' => '198205082008011010', 'username' => 'Eka Setya Wijaya, S.T., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ekasw@ulm.ac.id'],
            ['id_user' => 121, 'id_ps' => 7, 'NIP' => '198411202015042002', 'username' => 'Dr. Yuslena Sari, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'yuzlena@ulm.ac.id'],
            ['id_user' => 122, 'id_ps' => 7, 'NIP' => '198606132015041001', 'username' => 'Muhammad Alkaff, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'm.alkaff@ulm.ac.id'],
            ['id_user' => 123, 'id_ps' => 7, 'NIP' => '198810272019032013', 'username' => 'Muti\'a Maulida, S.Kom., M.T.I.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'mutia.maulida@ulm.ac.id'],
            ['id_user' => 124, 'id_ps' => 7, 'NIP' => '199307032019031011', 'username' => 'Andreyan Rizky Baskara, S.Kom., M.Kom.', 'email' => 'andreyan.baskara@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 125, 'id_ps' => 7, 'NIP' => '199110252019032018', 'username' => 'Nurul Fathanah Mustamin, S.Pd., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'nurul.mustamin@ulm.ac.id'],
            ['id_user' => 126, 'id_ps' => 7, 'NIP' => '199106192024062001', 'username' => 'Helda Yunita, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'helda.yunita@ulm.ac.id'],
            ['id_user' => 127, 'id_ps' => 7, 'NIP' => '199710312025061009', 'username' => 'Irham Maulani Abdul Gani, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'irhammag.199710312025061009@ulm.ac.id'],
            ['id_user' => 128, 'id_ps' => 7, 'NIP' => '199807102025061010', 'username' => 'Achmad Mujaddid Islami, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'achmadmi.199807102025061010@ulm.ac.id'],
            ['id_user' => 129, 'id_ps' => 7, 'NIP' => '200006192025062016', 'username' => 'Erika Maulidiya, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'erikam.200006192025062016@ulm.ac.id'],
            ['id_user' => 130, 'id_ps' => 7, 'NIP' => '199611092023211009', 'username' => 'Muhammad Fajrian Noor, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'fajrian.noor@ulm.ac.id'],
            ['id_user' => 131, 'id_ps' => 7, 'NIP' => '198904162024211002', 'username' => 'Muhammad Bahit, S.Kom., M.Eng.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'muhammadbahit@ulm.ac.id'],
            ['id_user' => 132, 'id_ps' => 7, 'NIP' => '1981090420181113001', 'username' => 'Fadliyanur, S.Pd.I, M.Pd.I', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'fadliyanur@ulm.ac.id'],

            // id_ps => 8 (Rekayasa Elektro)
            ['id_user' => 133, 'id_ps' => 8, 'NIP' => '197509242002121005', 'username' => 'Gunawan Rudi Cahyono, S.T., M.T', 'email' => 'gunawan.cahyono@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 134, 'id_ps' => 8, 'NIP' => 'ADM8001', 'username' => 'admin81', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 135, 'id_ps' => 8, 'NIP' => 'ADM8002', 'username' => 'admin82', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 136, 'id_ps' => 8, 'NIP' => '199007272019031011', 'username' => 'Andry Fajar Zulkarnain, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'andry.zulkarnain@ulm.ac.id'],
            ['id_user' => 137, 'id_ps' => 8, 'NIP' => '199412142022031013', 'username' => 'Akhmad Ghiffary Budianto, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ghiffary.budianto@ulm.ac.id'],
            ['id_user' => 138, 'id_ps' => 8, 'NIP' => '199106172022031007', 'username' => 'Arief Trisno Eko Suryo, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'arief.suryo@ulm.ac.id'],
            ['id_user' => 139, 'id_ps' => 8, 'NIP' => '197208202005012001', 'username' => 'Dr. Rusilawati, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rusilawati@ulm.ac.id'],
            ['id_user' => 140, 'id_ps' => 8, 'NIP' => '199310052024061001', 'username' => 'Bayu Setyo Wibowo, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'bayu.setyo@ulm.ac.id'],
            ['id_user' => 141, 'id_ps' => 8, 'NIP' => '200003092025061006', 'username' => 'Muhammad Daffa Abiyyu Rahman, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'daffaabiyyu@ulm.ac.id'],
            ['id_user' => 142, 'id_ps' => 8, 'NIP' => '199701302025061007', 'username' => 'Ahmad Zaki Ramadhani, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ahmadzakiramadhani@ulm.ac.id'],
            ['id_user' => 143, 'id_ps' => 8, 'NIP' => '199703152025061003', 'username' => 'Ditza Pasca Irwangsa, S.T., M.T.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ditzapsc@ulm.ac.id'],

            // id_ps => 9 (Rekayasa Geologi)
            ['id_user' => 144, 'id_ps' => 9, 'NIP' => '197310132003121001', 'username' => 'Uyu Saismana, S.T., M.T', 'email' => 'uyu@ulm.ac.id','password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 145, 'id_ps' => 9, 'NIP' => 'ADM9001', 'username' => 'admin91', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 146, 'id_ps' => 9, 'NIP' => 'ADM9002', 'username' => 'admin92', 'email' => '-', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 147, 'id_ps' => 9, 'NIP' => '196209221986031001', 'username' => 'Adip Mustofa', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'adip@ulm.ac.id'],
            ['id_user' => 148, 'id_ps' => 9, 'NIP' => '199307262022031007', 'username' => 'Muhammad Zaini Arief', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'zaini.arief@ulm.ac.id'],
            ['id_user' => 149, 'id_ps' => 9, 'NIP' => '198103062005011001', 'username' => 'Rudy Hendrawan Noor', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'rudy.noor@ulm.ac.id'],
            ['id_user' => 150, 'id_ps' => 9, 'NIP' => '197505202008011012', 'username' => 'Marselinus Untung Dwiatmoko', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'untung@ulm.ac.id'],
            ['id_user' => 151, 'id_ps' => 9, 'NIP' => '199706032024062001', 'username' => 'Arica Nefia', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'arica.nefia@ulm.ac.id'],
            ['id_user' => 152, 'id_ps' => 9, 'NIP' => '199005082025062003', 'username' => 'Ayu Narwastu Ciptahening', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO', 'email' => 'ayunarwastu@ulm.ac.id'],
        ]);
    }
}
