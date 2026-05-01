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
        DB::table('kelas')->insert([
           // ===== TAHUN 1 =====
            ['id_kelas'=>1,'id_tahun_akademik'=>1,'id_kurikulum'=>7,'id_mk'=>33,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>2,'id_tahun_akademik'=>1,'id_kurikulum'=>7,'id_mk'=>37,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>3,'id_tahun_akademik'=>1,'id_kurikulum'=>7,'id_mk'=>42,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>4,'id_tahun_akademik'=>1,'id_kurikulum'=>7,'id_mk'=>62,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],

            // ===== TAHUN 2 =====
            ['id_kelas'=>5,'id_tahun_akademik'=>2,'id_kurikulum'=>7,'id_mk'=>71,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>6,'id_tahun_akademik'=>2,'id_kurikulum'=>7,'id_mk'=>70,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>7,'id_tahun_akademik'=>2,'id_kurikulum'=>7,'id_mk'=>45,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>8,'id_tahun_akademik'=>2,'id_kurikulum'=>7,'id_mk'=>47,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],

            // ===== TAHUN 3 =====
            ['id_kelas'=>9,'id_tahun_akademik'=>3,'id_kurikulum'=>7,'id_mk'=>50,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>10,'id_tahun_akademik'=>3,'id_kurikulum'=>7,'id_mk'=>31,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>11,'id_tahun_akademik'=>3,'id_kurikulum'=>7,'id_mk'=>41,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>12,'id_tahun_akademik'=>3,'id_kurikulum'=>7,'id_mk'=>43,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],

            // ===== TAHUN 4 =====
            ['id_kelas'=>13,'id_tahun_akademik'=>4,'id_kurikulum'=>7,'id_mk'=>53,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
            ['id_kelas'=>14,'id_tahun_akademik'=>4,'id_kurikulum'=>7,'id_mk'=>98,'id_user'=>155,'paralel_ke'=>1,'jumlah_mhs'=>10],
        ]);
    }
}
