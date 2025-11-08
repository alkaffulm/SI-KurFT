<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        $id_users = range(120, 130);

        $id_mk_start = 92;
        $id_mk_end = 164;

        for ($id_mk = $id_mk_start; $id_mk <= $id_mk_end; $id_mk++) {
            $jumlah_paralel = rand(1, 2);

            for ($p = 1; $p <= $jumlah_paralel; $p++) {
                $data[] = [
                    'id_kurikulum' => 7,
                    'id_tahun_akademik' => 1,
                    'id_mk' => $id_mk,
                    'id_user' => $id_users[array_rand($id_users)],
                    'paralel_ke' => $p,
                    'jumlah_mhs' => rand(25, 45),
                ];
            }
        }

        DB::table('kelas')->insert($data);
    }
}
