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
            ['id_user' => 1, 'id_ps' => null, 'NIP' => 'PFT1001', 'username' => 'pimpinanft1', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 2, 'id_ps' => null, 'NIP' => 'PFT1002', 'username' => 'pimpinanft2', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 3, 'id_ps' => null, 'NIP' => 'PFT1003', 'username' => 'pimpinanft3', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 4, 'id_ps' => 1, 'NIP' => 'KAP1001', 'username' => 'kaprodi1', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 5, 'id_ps' => 1, 'NIP' => 'ADM1001', 'username' => 'admin11', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 6, 'id_ps' => 1, 'NIP' => 'ADM1002', 'username' => 'admin12', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 7, 'id_ps' => 1, 'NIP' => 'DSN1001', 'username' => 'dosen11', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 8, 'id_ps' => 1, 'NIP' => 'DSN1002', 'username' => 'dosen12', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 9, 'id_ps' => 1, 'NIP' => 'DSN1003', 'username' => 'dosen13', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 10, 'id_ps' => 2, 'NIP' => 'KAP2001', 'username' => 'kaprodi2', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 11, 'id_ps' => 2, 'NIP' => 'ADM2001', 'username' => 'admin21', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 12, 'id_ps' => 2, 'NIP' => 'ADM2002', 'username' => 'admin22', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 13, 'id_ps' => 2, 'NIP' => 'DSN2001', 'username' => 'dosen21', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 14, 'id_ps' => 2, 'NIP' => 'DSN2002', 'username' => 'dosen22', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 15, 'id_ps' => 2, 'NIP' => 'DSN2003', 'username' => 'dosen23', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 16, 'id_ps' => 3, 'NIP' => 'KAP3001', 'username' => 'kaprodi3', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 17, 'id_ps' => 3, 'NIP' => 'ADM3001', 'username' => 'admin31', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 18, 'id_ps' => 3, 'NIP' => 'ADM3002', 'username' => 'admin32', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 19, 'id_ps' => 3, 'NIP' => 'DSN3001', 'username' => 'dosen31', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 20, 'id_ps' => 3, 'NIP' => 'DSN3002', 'username' => 'dosen32', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 21, 'id_ps' => 3, 'NIP' => 'DSN3003', 'username' => 'dosen33', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 22, 'id_ps' => 4, 'NIP' => 'KAP4001', 'username' => 'kaprodi4', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 23, 'id_ps' => 4, 'NIP' => 'ADM4001', 'username' => 'admin41', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 24, 'id_ps' => 4, 'NIP' => 'ADM4002', 'username' => 'admin42', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 25, 'id_ps' => 4, 'NIP' => 'DSN4001', 'username' => 'dosen41', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 26, 'id_ps' => 4, 'NIP' => 'DSN4002', 'username' => 'dosen42', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 27, 'id_ps' => 4, 'NIP' => 'DSN4003', 'username' => 'dosen43', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 28, 'id_ps' => 5, 'NIP' => 'KAP5001', 'username' => 'kaprodi5', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 29, 'id_ps' => 5, 'NIP' => 'ADM5001', 'username' => 'admin51', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 30, 'id_ps' => 5, 'NIP' => 'ADM5002', 'username' => 'admin52', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 31, 'id_ps' => 5, 'NIP' => 'DSN5001', 'username' => 'dosen51', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 32, 'id_ps' => 5, 'NIP' => 'DSN5002', 'username' => 'dosen52', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 33, 'id_ps' => 5, 'NIP' => 'DSN5003', 'username' => 'dosen53', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 34, 'id_ps' => 6, 'NIP' => 'KAP6001', 'username' => 'kaprodi6', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 35, 'id_ps' => 6, 'NIP' => 'ADM6001', 'username' => 'admin61', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 36, 'id_ps' => 6, 'NIP' => 'ADM6002', 'username' => 'admin62', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 37, 'id_ps' => 6, 'NIP' => 'DSN6001', 'username' => 'dosen61', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 38, 'id_ps' => 6, 'NIP' => 'DSN6002', 'username' => 'dosen62', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 39, 'id_ps' => 6, 'NIP' => 'DSN6003', 'username' => 'dosen63', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 40, 'id_ps' => 7, 'NIP' => '199307032019031011', 'username' => 'Andreyan Rizky Baskara, S.Kom., M.Kom.', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 41, 'id_ps' => 7, 'NIP' => 'ADM7001', 'username' => 'admin71', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 42, 'id_ps' => 7, 'NIP' => 'ADM7002', 'username' => 'admin72', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 43, 'id_ps' => 7, 'NIP' => '198810272019032013', 'username' => "Muti'a Maulida, S.Kom., M.T.I", 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 44, 'id_ps' => 7, 'NIP' => 'DSN7002', 'username' => 'dosen72', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 45, 'id_ps' => 7, 'NIP' => 'DSN7003', 'username' => 'dosen73', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 46, 'id_ps' => 8, 'NIP' => 'KAP8001', 'username' => 'kaprodi8', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 47, 'id_ps' => 8, 'NIP' => 'ADM8001', 'username' => 'admin81', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 48, 'id_ps' => 8, 'NIP' => 'ADM8002', 'username' => 'admin82', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 49, 'id_ps' => 8, 'NIP' => 'DSN8001', 'username' => 'dosen81', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 50, 'id_ps' => 8, 'NIP' => 'DSN8002', 'username' => 'dosen82', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 51, 'id_ps' => 8, 'NIP' => 'DSN8003', 'username' => 'dosen83', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],

            ['id_user' => 52, 'id_ps' => 9, 'NIP' => 'KAP9001', 'username' => 'kaprodi9', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 53, 'id_ps' => 9, 'NIP' => 'ADM9001', 'username' => 'admin91', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 54, 'id_ps' => 9, 'NIP' => 'ADM9002', 'username' => 'admin92', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 55, 'id_ps' => 9, 'NIP' => 'DSN9001', 'username' => 'dosen91', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 56, 'id_ps' => 9, 'NIP' => 'DSN9002', 'username' => 'dosen92', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
            ['id_user' => 57, 'id_ps' => 9, 'NIP' => 'DSN9003', 'username' => 'dosen93', 'password' => '$2y$12$eYii3Q2XWiuMgm7sQ90dxekLECkNbGd9uQL6PWIPvPtUEbxgfTJEO'],
        ]);
    }
}
