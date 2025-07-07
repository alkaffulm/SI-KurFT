<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'id_ps' => 1,
                'NIP' => '198501012010011001',
                'username' => 'kaprodi_ti',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => 2,
                'NIP' => '198502012010011002',
                'username' => 'kaprodi_si',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => 1,
                'NIP' => '198503012010011003',
                'username' => 'dosen_ti_1',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => 1,
                'NIP' => '198504012010011004',
                'username' => 'dosen_ti_2',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => 2,
                'NIP' => '198505012010011005',
                'username' => 'dosen_si_1',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => 3,
                'NIP' => '198506012010011006',
                'username' => 'dosen_tk_1',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => null,
                'NIP' => '198507012010011007',
                'username' => 'pimpinan_ft',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => 1,
                'NIP' => '198508012010011008',
                'username' => 'upm_ti',
                'password' => Hash::make('password123'),
            ],
            [
                'id_ps' => 2,
                'NIP' => '198509012010011009',
                'username' => 'upm_si',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}

