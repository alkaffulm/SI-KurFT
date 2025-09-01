<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kelas')->insert([
            ['id_kurikulum' => 1, 'id_tahun_akademik'=>1, 'id_mk'=>1, 'id_user'=>8, 'paralel_ke'=>1, 'hari'=>'senin', 'jam'=>'09.00-11.30', 'ruangan'=>'Ruangan 1', 'jumlah_mhs'=>'38'],
            ['id_kurikulum' => 1, 'id_tahun_akademik'=>1, 'id_mk'=>1, 'id_user'=>9, 'paralel_ke'=>1, 'hari'=>'senin', 'jam'=>'09.00-11.30', 'ruangan'=>'Ruangan 2', 'jumlah_mhs'=>'32'],
        ]);
    }
}
