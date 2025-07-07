<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SubCPMKTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sub_cpmk')->insert([
            ['id_cpmk' => 1, 'kode_sub_cpmk' => 1, 'desc' => 'Memahami konsep dasar algoritma dan flowchart'],
            ['id_cpmk' => 1, 'kode_sub_cpmk' => 2, 'desc' => 'Memahami struktur kontrol percabangan dan perulangan'],
            ['id_cpmk' => 2, 'kode_sub_cpmk' => 1, 'desc' => 'Mampu menulis program sederhana dengan sintaks yang benar'],
            ['id_cpmk' => 2, 'kode_sub_cpmk' => 2, 'desc' => 'Mampu debugging dan testing program'],
            ['id_cpmk' => 3, 'kode_sub_cpmk' => 1, 'desc' => 'Memahami konsep array dan linked list'],
            ['id_cpmk' => 3, 'kode_sub_cpmk' => 2, 'desc' => 'Memahami konsep tree dan graph'],
            ['id_cpmk' => 4, 'kode_sub_cpmk' => 1, 'desc' => 'Mampu mengimplementasikan stack dan queue'],
            ['id_cpmk' => 4, 'kode_sub_cpmk' => 2, 'desc' => 'Mampu mengimplementasikan sorting dan searching'],
            ['id_cpmk' => 5, 'kode_sub_cpmk' => 1, 'desc' => 'Memahami konsep entitas dan relasi dalam basis data'],
        ]);
    }
}
