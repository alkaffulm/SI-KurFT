<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurikulumTahunAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kurikulum_tahun_akademik_map')->insert([
            //id_tahun_akademik=1 ['tahun_akademik' => '2022/2023'],
            //id_tahun_akademik=2 ['tahun_akademik' => '2023/2024'],
            //id_tahun_akademik=3 ['tahun_akademik' => '2024/2025'],
            //id_tahun_akademik=4 ['tahun_akademik' => '2025/2026'],
            //id_tahun_akademik=5 ['tahun_akademik' => '2026/2027'],

            // id_ps = 1 , id_kurikulum= 1 dan 10
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>1],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>1],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>1],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>10],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>10],

            // id_ps = 2 , id_kurikulum= 2 dan 11
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>2],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>2],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>2],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>11],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>11],

            // id_ps = 3 , id_kurikulum= 3 dan 12
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>3],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>3],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>3],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>12],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>12],

            // id_ps = 4 , id_kurikulum= 4 dan 13
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>4],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>4],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>4],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>13],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>13],

            // id_ps = 5 , id_kurikulum= 5 dan 14
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>5],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>5],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>5],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>14],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>14],

            // id_ps = 6 , id_kurikulum= 6 dan 15
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>6],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>6],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>6],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>15],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>15],

            // id_ps = 7 , id_kurikulum= 7 dan 16
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>7],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>7],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>7],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>16],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>16],

            // id_ps = 8 , id_kurikulum= 8 dan 17
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>8],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>8],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>8],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>17],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>17],

            // id_ps = 8 , id_kurikulum= 9 dan 18
            ['id_tahun_akademik' => 1, 'id_kurikulum'=>9],
            ['id_tahun_akademik' => 2, 'id_kurikulum'=>9],
            ['id_tahun_akademik' => 3, 'id_kurikulum'=>9],
            ['id_tahun_akademik' => 4, 'id_kurikulum'=>18],
            ['id_tahun_akademik' => 5, 'id_kurikulum'=>18],
        ]);
    }
}
