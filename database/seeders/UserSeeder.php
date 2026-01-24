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
        $password = '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO';

        $data_per_prodi = [
            // 1. TEKNIK SIPIL (id_ps = 1)
            1 => [
                ['NIP' => 'ADMPSTS1', 'username' => 'adminpsts1', 'email' => 'admin_sipil1@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSTS2', 'username' => 'adminpsts2', 'email' => 'admin_sipil2@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197208261998021001', 'username' => 'Dr. Muhammad Arsyad, S.T., M.T.', 'email' => 'emarsyad@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSTS
                ['NIP' => '197309031997021001', 'username' => 'Prof. Dr. Iphan Fitrian Radam, S.T., M.T.', 'email' => 'ifradam@ulm.ac.id','password' => $password, 'last_active_kurikulum_id' => null], // Dekan
                ['NIP' => '197907232005012005', 'username' => 'Dr. Nursiah Chairunnisa, S.T., M.Eng.', 'email' => 'nursiah.chairunnisa@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197507192000031001', 'username' => 'Prof. Dr.-Ing. Yulian Firmana Arifin, S.T., M.T.', 'email' => 'y.arifin@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196911101993032001', 'username' => 'Ir. Ida Barkiah, M.T.', 'email' => 'idabarkiah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197503192000031001', 'username' => 'Darmansyah Tjitradi, S.T., M.T.', 'email' => 'tjitradi_syah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197408092000031001', 'username' => 'Prof. Dr. Rusdiansyah, S.T., M.T.', 'email' => 'rusdiansyah74@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196204261990031001', 'username' => 'Dr. Ir. Rustam Effendi, M.A.Sc.', 'email' => 'rustamff@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197303041997022001', 'username' => 'Candra Yuliana, S.T., M.T.', 'email' => 'candrayuliana@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197511242005012005', 'username' => 'Dr. Novitasari, S.T., M.T.', 'email' => 'novitasari@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196208311990032002', 'username' => 'Ir. Retna Hapsari Kartadipura, M.T.', 'email' => 'arikartadipura@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197002121995021001', 'username' => 'Dr. Hutagamissufardal, S.T., M.T.', 'email' => 'agamsufardal@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196605201991031005', 'username' => 'Ir. Fauzi Rahman, M.T.', 'email' => 'fauzirahman@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196301311991031001', 'username' => 'Ir. Rusliansyah, M.Sc.', 'email' => 'rusliansyah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198205032005012001', 'username' => 'Dr.Eng. Maya Amalia, S.T., M.Eng.', 'email' => 'm.amalia@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198109222005012003', 'username' => 'Ulfa Fitriati, S.T., M.Eng.', 'email' => 'ufitriati@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198510262008121001', 'username' => 'Dr.Eng. Irfan Prasetia, S.T., M.T.', 'email' => 'iprasetia@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198410312008121001', 'username' => 'Dr. Muhammad Afief Ma\'ruf, S.T., M.T.', 'email' => 'afief.maruf@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196201151991031002', 'username' => 'Ir. Adriani, M.T.', 'email' => 'adriani.sipil@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196901061995022001', 'username' => 'Dr. Ir. Ratni Nurwidayati, M.T., M.Eng.Sc.', 'email' => 'ratninurwidayat@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197505252005012004', 'username' => 'Eliatun, S.T., M.T.', 'email' => 'eliatun_tarip@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197609012005012003', 'username' => 'Noordiah Helda, S.T., M.Sc.', 'email' => 'noordiah.helda@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196012251990031002', 'username' => 'Ir. Yasruddin, M.T.', 'email' => 'yasruddin@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198109152005011001', 'username' => 'Husnul Khatimi, S.T., M.T.', 'email' => 'hkhatimi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197606222005012002', 'username' => 'Dr. Nilna Amal, S.T., M.Eng.', 'email' => 'nilna.amal@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198112092014042001', 'username' => 'Utami Sylvia Lestari, S.T., M.T.', 'email' => 'utami.s.lestari@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199003062022032010', 'username' => 'Ade Yuniati Pratiwi, S.T., M.Sc., Ph.D.', 'email' => 'ade.pratiwi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197210281997021001', 'username' => 'Gawit Hidayat, S.T., M.T.', 'email' => 'gawit.hidayat@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196310161992011001', 'username' => 'Ir. Markawie, M.T.', 'email' => 'markawie@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198107072005011003', 'username' => 'Dr. Ing. Puguh Budi Prakoso, S.T., M.Sc.', 'email' => 'puguh.prakoso@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198606282012121002', 'username' => 'Wiku Adhiwicaksana Krasna, S.T., M.Eng., Ph.D.', 'email' => 'wakrasna@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199308102019031011', 'username' => 'Arya Rizki Darmawan, S.T., M.T.', 'email' => 'arya.darmawan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199306172019032024', 'username' => 'Elma Sofia, S.T., M.T.', 'email' => 'elma.sofia@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199511012022032021', 'username' => 'Nova Widayanti, S.T., M.T.', 'email' => 'nova.widayanti@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199505192022031013', 'username' => 'Abdul Karim, S.T., M.T.', 'email' => 'abdulkarim@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199107082022031005', 'username' => 'Eddy Nashrullah, S.T., M.T.', 'email' => 'eddy.nashrullah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199406012022032014', 'username' => 'Endah Widiastuti, S.T., M.T.', 'email' => 'endah.widiastuti@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198205222008121001', 'username' => 'Aulia Isramaulana, S.T., M.T.', 'email' => 'auliaisramaulana@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199307292024061001', 'username' => 'Ir. Fariz Baihaqi, S.T., M.T.', 'email' => 'fariz.baihaqi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197804302006042001', 'username' => 'Dr. Rahmani Kadarningsih, S.T., M.T.', 'email' => 'rahmani.kadarningsih@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '200101242025062009', 'username' => 'Nada Salsabila, S.T., M.T.', 'email' => 'nadasals@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199312312025061006', 'username' => 'Muhammad Alfian Noor, S.T., M.T.', 'email' => 'alfianmuhammad@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199504112023212036', 'username' => 'Humaira Afrila, S.T., M.T.', 'email' => 'humaira.afrila@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 2. TEKNIK PERTAMBANGAN (id_ps = 2)
            2 => [
                ['NIP' => 'ADMPSTP1', 'username' => 'adminpstp1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSTP2', 'username' => 'adminpstp2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],            
                ['NIP' => '198008032006041001', 'username' => 'Agus Triantoro, S.T., M.T.', 'email' => 'agus@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSTP
                ['NIP' => '197306152000031002', 'username' => 'Nurhakim, S.T., M.T.', 'email' => 'nurhakim@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // WD Bidang Umum & Keuangan
                ['NIP' => '198006162006041005', 'username' => 'Romla Noor Hakim, S.T., M.T.', 'email' => 'romla@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198007012008122001', 'username' => 'Annisa, S.T., M.T.', 'email' => 'annisa@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197312312008121008', 'username' => 'Riswan, S.T., M.T.', 'email' => 'riswan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198504192014041001', 'username' => 'Eko Santoso, S.T., M.T.', 'email' => 'eko@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198704172015041003', 'username' => 'Dr.mont. Hafidz Noor Fikri, S.T., M.T.', 'email' => 'hafidz@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198706112015042002', 'username' => 'Yuniar Siska Novianti, S.T., M.T.', 'email' => 'yuniar@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198710182018032001', 'username' => 'Sari Melati, S.T., M.T.', 'email' => 'sari@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198803072019032012', 'username' => 'Karina Shella Putri, S.T., M.T.', 'email' => 'karinashella@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199111222022031006', 'username' => 'Ahmad Ali Syafi\'i, S.T., M.T.', 'email' => 'ali.syafii@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199307262022031007', 'username' => 'Muhammad Zaini Arief, S.T., M.T.', 'email' => 'zaini.arief@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199101012024062004', 'username' => 'Pillayati, S.T., M.T.', 'email' => 'pillayati@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199203092024061001', 'username' => 'Satrio Ramadhan, S.T., M.T.', 'email' => 'satrio.ramadhan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199402232025062008', 'username' => 'Riri Lidya Fathira, S.T., M.T.', 'email' => 'ririlidyaf@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '19620804LB2021', 'username' => 'Dr. Ir. Ihsan Noor, S.E., M.S.', 'email' => 'ihsan.noor@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 3. TEKNIK MESIN (id_ps = 3)
            3 => [
                ['NIP' => 'ADMPSTM1', 'username' => 'adminpstm1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSTM2', 'username' => 'adminpstm2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],               
                ['NIP' => '197601282008121002', 'username' => 'Ma\'ruf, S.T., M.T.', 'email' => 'maruf@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSTM
                ['NIP' => '197007171998021001', 'username' => 'Prof. Dr. Abdul Ghofur, S.T., M.T.', 'email' => 'ghofur70@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // WD Bidang Kemahasiswaan dan Alumni
                ['NIP' => '197608052008121001', 'username' => 'Prof. Dr. Rachmat Subagyo, S.T., M.T.', 'email' => 'rachmatsubagyo@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199002212018031001', 'username' => 'Herry Irawansyah, S.T., M.Eng.', 'email' => 'herryirawansyah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197509242002121005', 'username' => 'Gunawan Rudi Cahyono, S.T., M.T.', 'email' => 'gunawan.cahyono@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197003121995121002', 'username' => 'Prof. Dr. Mastiadi Tamjidillah, S.T., M.T.', 'email' => 'mastiadit@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197106111995121001', 'username' => 'Dr. Aqli Mursadin, S.T., M.T.', 'email' => 'a.mursadin@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197105231999031004', 'username' => 'Akhmad Syarief, S.T., M.T.', 'email' => 'akhmad.syarief@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198108102012121001', 'username' => 'Dr.Eng. Apip Amrullah, S.T., M.Eng.', 'email' => 'apip.amrullah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199203222019031010', 'username' => 'Muhammad Nizar Ramadhan, S.T., M.T.', 'email' => 'nizarramadhan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199210182019031010', 'username' => 'Pathur Razi Ansyah, S.T., M.Eng.', 'email' => 'pathur.razi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198906282022031008', 'username' => 'Andy Nugraha, S.T., M.T.', 'email' => 'andy.nugraha@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198808282022031006', 'username' => 'Anwar, S.T., M.T.', 'email' => 'anwar.ft@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '200106092025061003', 'username' => 'Muhammad Farouk Setiawan, S.T., M.T.', 'email' => 'mfarouksetiawan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199411132025061005', 'username' => 'Aldinor Setiawan, S.T., M.T.', 'email' => 'aldinorsetiawan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199606222025061006', 'username' => 'Elwas Cahya Wahyu Pribadi, S.T., M.T.', 'email' => 'elwascahyawahyupribadi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196806072023211005', 'username' => 'Rudi Siswanto, S.T., M.Eng.', 'email' => 'rudisiswanto@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],

            ],
            
            // 4. TEKNIK Lingkungan (id_ps = 4)
            4 => [
                ['NIP' => 'ADMPSTL1', 'username' => 'adminpstl1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSTL2', 'username' => 'adminpstl2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198708282012122001', 'username' => 'Dr. Rizqi Puteri Mahyudin, S.Si., M.S.', 'email' => 'rizqiputeri@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSTL 
                ['NIP' => '197401071998021001', 'username' => 'Dr. Mahmud, S.T., M.T.', 'email' => 'mahmud@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // WD Bidang Akademik
                ['NIP' => '198007072008011029', 'username' => 'Dr. Andy Mizwar, S.T., M.Si.', 'email' => 'andymizwar@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196605291999031001', 'username' => 'Muhammad Husin, S.T., M.S.', 'email' => 'muhammad.husin@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197610171999031003', 'username' => 'Dr. Rony Riduan, S.T., M.T.', 'email' => 'ronyrdn@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197607071999031005', 'username' => 'Rijali Noor, S.T., M.T.', 'email' => 'rijali.noor@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198411182008122003', 'username' => 'Dr. Nopi Stiyati Prihatini, S.Si., M.T.', 'email' => 'ns.prihatini@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197706192008012019', 'username' => 'Rd. Indah Nirtha Nilawati N.P.S., S.T., M.Si.', 'email' => 'indahnirtha@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197511092009121002', 'username' => 'Muhammad Syahirul Alim, S.T., M.T.', 'email' => 'syahirul.alim@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197807122012121002', 'username' => 'Chairul Abdi, S.T., M.T.', 'email' => 'chairulabdi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198909112015041002', 'username' => 'Muhammad Firmansyah, S.T., M.T.', 'email' => 'muhammad.firmansyah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199101192019031016', 'username' => 'Muhammad Abrar Firdausy, S.T., M.T.', 'email' => 'abrar.firdausy@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199210052022032013', 'username' => 'Gusti Ihda Mazaya, S.T., M.T.', 'email' => 'ihda.mazaya@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197305071998021001', 'username' => 'Badaruddin Mu\'min, S.T., M.T.', 'email' => 'mu\'min@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199107302024062002', 'username' => 'Fatimah Juhra, S.T., M.T.', 'email' => 'fatimah.juhra@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199408052025061006', 'username' => 'Ilman Sahbani, S.T., M.T.', 'email' => 'isahbani@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198405102024211001', 'username' => 'Riza Miftahul Khair, S.T., M.Eng.', 'email' => 'mkriza@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198911282024212032', 'username' => 'Nova Annisa, S.Si., M.S.', 'email' => 'aiyuvasha@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 5. ARSITEKTUR (id_ps = 5)
            5 => [
                ['NIP' => 'ADMPSA1', 'username' => 'adminpsa1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSA2', 'username' => 'adminpsa2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],  
                ['NIP' => '198102102005011012', 'username' => 'Dr. Eng. Akbar Rahman, S.T., M.T.', 'email' => 'arzhi_teks@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSA
                ['NIP' => '197204301997031003', 'username' => 'Dr. Bani Noor Muchamad, S.T., M.T.', 'email' => 'bani.nm@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196004081988031004', 'username' => 'Ir. Pakhri Anhar, M.T.', 'email' => 'pakhrianhar@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197408011998032001', 'username' => 'Dr. Ira Mentayani, S.T., M.T.', 'email' => 'ira_arch@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196701281995021001', 'username' => 'Ir. Muhammad Deddy Huzairin, M.Sc.', 'email' => 'deddyhuz@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197312222005011002', 'username' => 'Nurfansyah, S.T., M.T.', 'email' => 'nfsarsitek@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198301062005012002', 'username' => 'Naimatul Aufa, S.T., M.Sc.', 'email' => 'naimatulaufa@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197906272002122002', 'username' => 'Prima Widia Wastuty, S.T., M.T.', 'email' => 'primawidiawastuty@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197509242002122001', 'username' => 'Dr. Dahliani, S.T., M.T.', 'email' => 'dahliani.teknik@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197702102005012002', 'username' => 'Dr. Yuswinda Febrita, S.T., M.T.', 'email' => 'yfebrita@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198006232005012001', 'username' => 'Indah Mutia, S.T., MUD., Ph.D.', 'email' => 'imutia@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197811272006041002', 'username' => 'Mohammad Ibnu Sa\'ud, S.T., M.Sc.', 'email' => 'ibnusaud@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198107162010121001', 'username' => 'J.C. Heldiansyah, S.T., M.Sc.', 'email' => 'jcheldiansyah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197210291999032001', 'username' => 'Anna Oktaviana, S.T., M.T.', 'email' => 'oktaviana@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198302222006042003', 'username' => 'Dila Nadya Andini, S.T., M.Sc.', 'email' => 'dila.andini@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196911061995121002', 'username' => 'Gusti Novi Sarbini, S.T., MUP', 'email' => 'gustinovi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198607202019031011', 'username' => 'Dr. Irwan Yudha Hadinata, S.T., M.Sc.', 'email' => 'irwan.yudha@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197101011998021001', 'username' => 'Muhammad Tharziansyah, S.T., M.T.', 'email' => 'tharziansyah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196811091995121002', 'username' => 'Rudi Hartono, S.T., MUP', 'email' => 'rudi.hartono@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198511172019032016', 'username' => 'Irma Fawzia, S.T., M.Arch', 'email' => 'irma.fawzia@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197608232002121001', 'username' => 'Nursyarif Agusniansyah, S.T., M.T.', 'email' => 'nursyarif.agusniansyah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 6. TEKNIK KIMIA (id_ps = 6)
            6 => [
                ['NIP' => 'ADMPSTK1', 'username' => 'adminpstk1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSTK2', 'username' => 'adminpstk2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198005292005012003', 'username' => 'Hesti Wijayanti, S.T., M.Eng., Ph.D.', 'email' => 'hesti.wijayanti@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSTK
                ['NIP' => '197504042000031002', 'username' => 'Prof. Chairul Irawan, S.T., M.T., Ph.D.', 'email' => 'cirawan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196906081997022002', 'username' => 'Dr. Isnasyauqiah, S.T., M.T.', 'email' => 'isna_tk@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],            
                ['NIP' => '197608192003121001', 'username' => 'Prof. Dr. Agus Mirwan, S.T., M.T.', 'email' => 'agusmirwan@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],    
                ['NIP' => '198101122003121001', 'username' => 'Dr. Doni Rahmat Wicakso, S.T., M.Eng.', 'email' => 'doni.rahmat.w@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197501132000032003', 'username' => 'Prof. Iryanti Fatyasari Nata, S.T., M.T., Ph.D.', 'email' => 'ifnata@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198401192012122003', 'username' => 'Dr. Lailan Ni\'mah, S.T., M.Eng.', 'email' => 'lailan.nimah@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197405212002122003', 'username' => 'Prof. Muthia Elma, S.T., M.Sc., Ph.D.', 'email' => 'melma@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198103242006042002', 'username' => 'Primata Mardina, S.T., M.Eng., Ph.D.', 'email' => 'pmardina@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198205012006041014', 'username' => 'Prof. Meilana Dharma Putra, S.T., M.Sc., Ph.D.', 'email' => 'mdputra@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197508202005011001', 'username' => 'Dr. Abubakar Tuhuloula, S.T., M.T.', 'email' => 'atuhuloula@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198711152015042004', 'username' => 'Desi Nurandini, S.T., M.Eng.', 'email' => 'desi.nurandini@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199002112019032019', 'username' => 'Rinny Jelita, S.T., M.Eng.', 'email' => 'rinnyjelita@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198910302020121006', 'username' => 'Awali Sir Kautsar Harivram, S.T., M.T.', 'email' => 'awali.harivram@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199002112022032004', 'username' => 'Rinna Juwita, S.T., M.T.', 'email' => 'rinna.juwita@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199207272024062004', 'username' => 'Yulia Nurul Ma\'rifah, S.T., M.T.', 'email' => 'yulia.nurul@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199409212024062001', 'username' => 'Indah Retno Wulandary, S.T., M.T.', 'email' => 'indah.retno@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199702272025061005', 'username' => 'Syamsul Ma\'arif Putera Ukhrawi, S.Tr., M.Eng.Sc.', 'email' => 'syamsulukhrawi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198604292023212031', 'username' => 'Riani Ayu Lestari, S.T., M.Eng.', 'email' => 'ra.lestari@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198808272023211017', 'username' => 'Jefriadi, S.T., M.Eng.', 'email' => 'jefriadi@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 7. TEKNOLOGI INFORMASI (id_ps = 7)
            7 => [
                ['NIP' => 'ADMPSTI1', 'username' => 'adminpsti1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSTI2', 'username' => 'adminpsti2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199307032019031011', 'username' => 'Andreyan Rizky Baskara, S.Kom., M.Kom.', 'email' => 'andreyan.baskara@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSTI
                ['NIP' => '198205082008011010', 'username' => 'Eka Setya Wijaya, S.T., M.Kom.', 'email' => 'ekasw@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198411202015042002', 'username' => 'Dr. Yuslena Sari, S.Kom., M.Kom.', 'email' => 'yuzlena@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198606132015041001', 'username' => 'Muhammad Alkaff, S.Kom., M.Kom., Ph.D.', 'email' => 'm.alkaff@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198810272019032013', 'username' => 'Muti\'a Maulida, S.Kom., M.T.I.', 'email' => 'mutia.maulida@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199110252019032018', 'username' => 'Nurul Fathanah Mustamin, S.Pd., M.T.', 'email' => 'nurul.mustamin@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199106192024062001', 'username' => 'Helda Yunita, S.Kom., M.Kom.', 'email' => 'helda.yunita@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199710312025061009', 'username' => 'Irham Maulani Abdul Gani, S.Kom., M.Kom.', 'email' => 'irhammag.199710312025061009@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199807102025061010', 'username' => 'Achmad Mujaddid Islami, S.Kom., M.Kom.', 'email' => 'achmadmi.199807102025061010@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '200006192025062016', 'username' => 'Erika Maulidiya, S.Kom., M.Kom.', 'email' => 'erikam.200006192025062016@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199611092023211009', 'username' => 'Muhammad Fajrian Noor, S.Kom., M.Kom.', 'email' => 'fajrian.noor@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198904162024211002', 'username' => 'Muhammad Bahit, S.Kom., M.Eng.', 'email' => 'muhammadbahit@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '1981090420181113001', 'username' => 'Fadliyanur, S.Pd.I, M.Pd.I', 'email' => 'fadliyanur@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 8. REKAYASA ELEKTRO (id_ps = 8)
            8 => [
                ['NIP' => 'ADMPSRE1', 'username' => 'adminpsre1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSRE2', 'username' => 'adminpsre2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199412142022031013', 'username' => 'Akhmad Ghiffary Budianto, S.T., M.T.', 'email' => 'ghiffary.budianto@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSRE
                ['NIP' => '199007272019031018', 'username' => 'Andry Fajar Zulkarnain, S.ST., M.T.', 'email' => 'andry.zulkarnain@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199106172022031007', 'username' => 'Arief Trisno Eko Suryo, S.T., M.T.', 'email' => 'arief.suryo@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197208202005012001', 'username' => 'Dr. Rusilawati, S.T., M.T.', 'email' => 'rusilawati@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199310052024061001', 'username' => 'Bayu Setyo Wibowo, S.T., M.T.', 'email' => 'bayu.setyo@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '200003092025061006', 'username' => 'Muhammad Daffa Abiyyu Rahman, S.T., M.T.', 'email' => 'daffaabiyyu@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199701302025061007', 'username' => 'Ahmad Zaki Ramadhani, S.T., M.T.', 'email' => 'ahmadzakiramadhani@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199703152025061003', 'username' => 'Ditza Pasca Irwangsa, S.T., M.T.', 'email' => 'ditzapsc@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 9. REKAYASA GEOLOGI (id_ps = 9)
            9 => [
                ['NIP' => 'ADMPSRG1', 'username' => 'adminpsrg1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSRG2', 'username' => 'adminpsrg2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '198103062005011001', 'username' => 'Rudy Hendrawan Noor, S.T., M.T.', 'email' => 'rudy.noor@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null], // Koordinator PSRG
                ['NIP' => '199706032024062001', 'username' => 'Arica Nefia, S.T., M.T.', 'email' => 'arica.nefia@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '199005082025062003', 'username' => 'Ayu Narwastu Ciptahening, S.T., M.Eng.', 'email' => 'ayunarwastu@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197505302008011012', 'username' => 'Marselinus Untung Dwiatmoko, S.T., M.Eng.', 'email' => 'untung@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '196209221986031001', 'username' => 'Adip Mustofa, S.T., M.T.', 'email' => 'adip@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => '197310132003121001', 'username' => 'Uyu Saismana, S.T., M.T.', 'email' => 'uyu@ulm.ac.id', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],

            // 10. MAGISTER TEKNIK SIPIL (id_ps = 10)
            10 => [
                ['NIP' => 'ADMPSMTS1', 'username' => 'adminpsmts1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSMTS2', 'username' => 'adminpsmts2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],
            // 11. MAGISTER TEKNIK MESIN (id_ps = 11)
            11 => [
                ['NIP' => 'ADMPSMTM1', 'username' => 'adminpsmtm1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSMTM2', 'username' => 'adminpsmtm2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],
            // 12. MAGISTER ARSITEKTUR (id_ps = 12)
            12 => [
                ['NIP' => 'ADMPSMA1', 'username' => 'adminpsma1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSMA2', 'username' => 'adminpsma2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],
            // 13. MAGISTER TEKNIK KIMIA (id_ps = 13)
            13 => [
                ['NIP' => 'ADMPSMTK1', 'username' => 'adminpsmtk1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSMTK2', 'username' => 'adminpsmtk2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],
            // 14. TEKNIK BERKELANJUTAN (id_ps =
            14 => [
                ['NIP' => 'ADMPSTB1', 'username' => 'adminpstb1', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
                ['NIP' => 'ADMPSTB2', 'username' => 'adminpstb2', 'email' => '-', 'password' => $password, 'last_active_kurikulum_id' => null],
            ],
        ];

        // --- EKSEKUSI ---
        foreach ($data_per_prodi as $id_ps_context => $users) {
            foreach ($users as $user) {
                // A. Insert User (Tanpa id_ps)
                $userId = DB::table('user')->insertGetId([
                    'NIP' => $user['NIP'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'password' => $password,
                    'last_active_kurikulum_id' => null,
                ]);

                // B. Berikan Role Dasar di tabel Pivot
                $roleId = str_contains($user['NIP'], 'ADM') || str_contains($user['NIP'], 'PFT') ? 1 : 2; // Admin(1) atau Dosen(2)
                
                DB::table('user_role_map')->insert([
                    'id_user' => $userId,
                    'id_role' => $roleId, // Role Dosen atau Admin
                    'id_ps'   => $id_ps_context // Sesuai kelompok prodi di atas
                ]);
            }
        }
             
    }
}
