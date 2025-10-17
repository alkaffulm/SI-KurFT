<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BentukPenugasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bentuk_penugasan')->insert([
            ['id_bentuk_penugasan' => 1, 'nama_bentuk_penugasan' => 'Makalah'],
            ['id_bentuk_penugasan' => 2,'nama_bentuk_penugasan' => 'Laporan'],
            ['id_bentuk_penugasan' => 3,'nama_bentuk_penugasan' => 'Presentasi'],
            ['id_bentuk_penugasan' => 4,'nama_bentuk_penugasan' => 'Proyek'],
            ['id_bentuk_penugasan' => 5,'nama_bentuk_penugasan' => 'Essay'],
        ]);   
    }
}
