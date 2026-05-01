<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenilaianMahasiswaSeeder extends Seeder
{


   public function run(): void
    {
        DB::table('penilaian_mahasiswa')->insert([
            // kelas pertama
            ['id_kelas'=>1,'nim'=>'2210817110005','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>40],
            ['id_kelas'=>1,'nim'=>'2210817110005','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>40],
            ['id_kelas'=>1,'nim'=>'2210817110005','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>41],
            ['id_kelas'=>1,'nim'=>'2210817110005','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>41],
            ['id_kelas'=>1,'nim'=>'2210817110005','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>42.5],
            ['id_kelas'=>1,'nim'=>'2210817110005','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>42.5],

            ['id_kelas'=>1,'nim'=>'2210817120004','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>39],
            ['id_kelas'=>1,'nim'=>'2210817120004','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>39],
            ['id_kelas'=>1,'nim'=>'2210817120004','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>40],
            ['id_kelas'=>1,'nim'=>'2210817120004','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>40],
            ['id_kelas'=>1,'nim'=>'2210817120004','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>41.5],
            ['id_kelas'=>1,'nim'=>'2210817120004','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>41.5],

            ['id_kelas'=>1,'nim'=>'2210817210031','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>41],
            ['id_kelas'=>1,'nim'=>'2210817210031','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>41],
            ['id_kelas'=>1,'nim'=>'2210817210031','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>42],
            ['id_kelas'=>1,'nim'=>'2210817210031','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>42],
            ['id_kelas'=>1,'nim'=>'2210817210031','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>43],
            ['id_kelas'=>1,'nim'=>'2210817210031','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>43],

            ['id_kelas'=>1,'nim'=>'2210817210033','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>39.5],
            ['id_kelas'=>1,'nim'=>'2210817210033','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>39.5],
            ['id_kelas'=>1,'nim'=>'2210817210033','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>40.5],
            ['id_kelas'=>1,'nim'=>'2210817210033','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>40.5],
            ['id_kelas'=>1,'nim'=>'2210817210033','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>42],
            ['id_kelas'=>1,'nim'=>'2210817210033','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>42],

            ['id_kelas'=>1,'nim'=>'2210817310006','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>40],
            ['id_kelas'=>1,'nim'=>'2210817310006','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>40],
            ['id_kelas'=>1,'nim'=>'2210817310006','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>41],
            ['id_kelas'=>1,'nim'=>'2210817310006','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>41],
            ['id_kelas'=>1,'nim'=>'2210817310006','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>42.5],
            ['id_kelas'=>1,'nim'=>'2210817310006','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>42.5],

            ['id_kelas'=>1,'nim'=>'2210817110001','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>30],
            ['id_kelas'=>1,'nim'=>'2210817110001','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>30],
            ['id_kelas'=>1,'nim'=>'2210817110001','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>31],
            ['id_kelas'=>1,'nim'=>'2210817110001','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>31],
            ['id_kelas'=>1,'nim'=>'2210817110001','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>32.5],
            ['id_kelas'=>1,'nim'=>'2210817110001','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>32.5],

            ['id_kelas'=>1,'nim'=>'2210817110002','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>29],
            ['id_kelas'=>1,'nim'=>'2210817110002','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>29],
            ['id_kelas'=>1,'nim'=>'2210817110002','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>30],
            ['id_kelas'=>1,'nim'=>'2210817110002','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>30],
            ['id_kelas'=>1,'nim'=>'2210817110002','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>31.5],
            ['id_kelas'=>1,'nim'=>'2210817110002','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>31.5],

            ['id_kelas'=>1,'nim'=>'2210817110006','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>27.5],
            ['id_kelas'=>1,'nim'=>'2210817110006','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>27.5],
            ['id_kelas'=>1,'nim'=>'2210817110006','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>28.5],
            ['id_kelas'=>1,'nim'=>'2210817110006','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>28.5],
            ['id_kelas'=>1,'nim'=>'2210817110006','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>30],
            ['id_kelas'=>1,'nim'=>'2210817110006','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>30],

            ['id_kelas'=>1,'nim'=>'2210817110008','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>12.5],
            ['id_kelas'=>1,'nim'=>'2210817110008','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>12.5],
            ['id_kelas'=>1,'nim'=>'2210817110008','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>14],
            ['id_kelas'=>1,'nim'=>'2210817110008','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>14],
            ['id_kelas'=>1,'nim'=>'2210817110008','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>15],
            ['id_kelas'=>1,'nim'=>'2210817110008','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>15],

            ['id_kelas'=>1,'nim'=>'2210817120003','id_rencana_asesmen'=>1,'id_cpmk'=>31,'nilai'=>11],
            ['id_kelas'=>1,'nim'=>'2210817120003','id_rencana_asesmen'=>1,'id_cpmk'=>32,'nilai'=>11],
            ['id_kelas'=>1,'nim'=>'2210817120003','id_rencana_asesmen'=>2,'id_cpmk'=>31,'nilai'=>12.5],
            ['id_kelas'=>1,'nim'=>'2210817120003','id_rencana_asesmen'=>2,'id_cpmk'=>32,'nilai'=>12.5],
            ['id_kelas'=>1,'nim'=>'2210817120003','id_rencana_asesmen'=>3,'id_cpmk'=>31,'nilai'=>14],
            ['id_kelas'=>1,'nim'=>'2210817120003','id_rencana_asesmen'=>3,'id_cpmk'=>32,'nilai'=>14],

            // kelas kedua
            ['id_kelas'=>2,'nim'=>'2210817110005','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>41],
            ['id_kelas'=>2,'nim'=>'2210817110005','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>41],
            ['id_kelas'=>2,'nim'=>'2210817110005','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>42],
            ['id_kelas'=>2,'nim'=>'2210817110005','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>42],
            ['id_kelas'=>2,'nim'=>'2210817110005','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>43],
            ['id_kelas'=>2,'nim'=>'2210817110005','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>43],

            ['id_kelas'=>2,'nim'=>'2210817120004','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>38],
            ['id_kelas'=>2,'nim'=>'2210817120004','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>38],
            ['id_kelas'=>2,'nim'=>'2210817120004','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>39],
            ['id_kelas'=>2,'nim'=>'2210817120004','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>39],
            ['id_kelas'=>2,'nim'=>'2210817120004','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>41],
            ['id_kelas'=>2,'nim'=>'2210817120004','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>41],

            ['id_kelas'=>2,'nim'=>'2210817210031','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>42],
            ['id_kelas'=>2,'nim'=>'2210817210031','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>42],
            ['id_kelas'=>2,'nim'=>'2210817210031','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>43],
            ['id_kelas'=>2,'nim'=>'2210817210031','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>43],
            ['id_kelas'=>2,'nim'=>'2210817210031','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>44],
            ['id_kelas'=>2,'nim'=>'2210817210031','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>44],

            ['id_kelas'=>2,'nim'=>'2210817210033','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>40],
            ['id_kelas'=>2,'nim'=>'2210817210033','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>40],
            ['id_kelas'=>2,'nim'=>'2210817210033','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>41],
            ['id_kelas'=>2,'nim'=>'2210817210033','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>41],
            ['id_kelas'=>2,'nim'=>'2210817210033','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>42],
            ['id_kelas'=>2,'nim'=>'2210817210033','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>42],

            ['id_kelas'=>2,'nim'=>'2210817310006','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>41],
            ['id_kelas'=>2,'nim'=>'2210817310006','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>41],
            ['id_kelas'=>2,'nim'=>'2210817310006','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>42],
            ['id_kelas'=>2,'nim'=>'2210817310006','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>42],
            ['id_kelas'=>2,'nim'=>'2210817310006','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>43],
            ['id_kelas'=>2,'nim'=>'2210817310006','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>43],

            ['id_kelas'=>2,'nim'=>'2210817110001','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>31],
            ['id_kelas'=>2,'nim'=>'2210817110001','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>31],
            ['id_kelas'=>2,'nim'=>'2210817110001','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>32],
            ['id_kelas'=>2,'nim'=>'2210817110001','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>32],
            ['id_kelas'=>2,'nim'=>'2210817110001','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>33],
            ['id_kelas'=>2,'nim'=>'2210817110001','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>33],

            ['id_kelas'=>2,'nim'=>'2210817110002','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>30],
            ['id_kelas'=>2,'nim'=>'2210817110002','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>30],
            ['id_kelas'=>2,'nim'=>'2210817110002','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>31],
            ['id_kelas'=>2,'nim'=>'2210817110002','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>31],
            ['id_kelas'=>2,'nim'=>'2210817110002','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>32],
            ['id_kelas'=>2,'nim'=>'2210817110002','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>32],

            ['id_kelas'=>2,'nim'=>'2210817110006','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>28],
            ['id_kelas'=>2,'nim'=>'2210817110006','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>28],
            ['id_kelas'=>2,'nim'=>'2210817110006','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>29],
            ['id_kelas'=>2,'nim'=>'2210817110006','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>29],
            ['id_kelas'=>2,'nim'=>'2210817110006','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>30],
            ['id_kelas'=>2,'nim'=>'2210817110006','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>30],

            ['id_kelas'=>2,'nim'=>'2210817110008','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>13],
            ['id_kelas'=>2,'nim'=>'2210817110008','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>13],
            ['id_kelas'=>2,'nim'=>'2210817110008','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>14],
            ['id_kelas'=>2,'nim'=>'2210817110008','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>14],
            ['id_kelas'=>2,'nim'=>'2210817110008','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>15],
            ['id_kelas'=>2,'nim'=>'2210817110008','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>15],

            ['id_kelas'=>2,'nim'=>'2210817120003','id_rencana_asesmen'=>4,'id_cpmk'=>33,'nilai'=>12],
            ['id_kelas'=>2,'nim'=>'2210817120003','id_rencana_asesmen'=>4,'id_cpmk'=>34,'nilai'=>12],
            ['id_kelas'=>2,'nim'=>'2210817120003','id_rencana_asesmen'=>5,'id_cpmk'=>33,'nilai'=>13],
            ['id_kelas'=>2,'nim'=>'2210817120003','id_rencana_asesmen'=>5,'id_cpmk'=>34,'nilai'=>13],
            ['id_kelas'=>2,'nim'=>'2210817120003','id_rencana_asesmen'=>6,'id_cpmk'=>33,'nilai'=>14],
            ['id_kelas'=>2,'nim'=>'2210817120003','id_rencana_asesmen'=>6,'id_cpmk'=>34,'nilai'=>14],

            // kelas ketiga
            ['id_kelas'=>3,'nim'=>'2210817110005','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>42],
            ['id_kelas'=>3,'nim'=>'2210817110005','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>42],
            ['id_kelas'=>3,'nim'=>'2210817110005','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>43],
            ['id_kelas'=>3,'nim'=>'2210817110005','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>43],
            ['id_kelas'=>3,'nim'=>'2210817110005','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>44],
            ['id_kelas'=>3,'nim'=>'2210817110005','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>44],

            ['id_kelas'=>3,'nim'=>'2210817120004','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>37],
            ['id_kelas'=>3,'nim'=>'2210817120004','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>37],
            ['id_kelas'=>3,'nim'=>'2210817120004','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>38],
            ['id_kelas'=>3,'nim'=>'2210817120004','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>38],
            ['id_kelas'=>3,'nim'=>'2210817120004','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>40],
            ['id_kelas'=>3,'nim'=>'2210817120004','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>40],

            ['id_kelas'=>3,'nim'=>'2210817210031','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>43],
            ['id_kelas'=>3,'nim'=>'2210817210031','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>43],
            ['id_kelas'=>3,'nim'=>'2210817210031','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>44],
            ['id_kelas'=>3,'nim'=>'2210817210031','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>44],
            ['id_kelas'=>3,'nim'=>'2210817210031','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>45],
            ['id_kelas'=>3,'nim'=>'2210817210031','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>45],

            ['id_kelas'=>3,'nim'=>'2210817210033','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>40],
            ['id_kelas'=>3,'nim'=>'2210817210033','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>40],
            ['id_kelas'=>3,'nim'=>'2210817210033','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>41],
            ['id_kelas'=>3,'nim'=>'2210817210033','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>41],
            ['id_kelas'=>3,'nim'=>'2210817210033','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>42],
            ['id_kelas'=>3,'nim'=>'2210817210033','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>42],

            ['id_kelas'=>3,'nim'=>'2210817310006','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>41],
            ['id_kelas'=>3,'nim'=>'2210817310006','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>41],
            ['id_kelas'=>3,'nim'=>'2210817310006','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>42],
            ['id_kelas'=>3,'nim'=>'2210817310006','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>42],
            ['id_kelas'=>3,'nim'=>'2210817310006','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>43],
            ['id_kelas'=>3,'nim'=>'2210817310006','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>43],

            ['id_kelas'=>3,'nim'=>'2210817110001','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>31],
            ['id_kelas'=>3,'nim'=>'2210817110001','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>31],
            ['id_kelas'=>3,'nim'=>'2210817110001','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>32],
            ['id_kelas'=>3,'nim'=>'2210817110001','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>32],
            ['id_kelas'=>3,'nim'=>'2210817110001','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>33],
            ['id_kelas'=>3,'nim'=>'2210817110001','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>33],

            ['id_kelas'=>3,'nim'=>'2210817110002','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>30],
            ['id_kelas'=>3,'nim'=>'2210817110002','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>30],
            ['id_kelas'=>3,'nim'=>'2210817110002','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>31],
            ['id_kelas'=>3,'nim'=>'2210817110002','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>31],
            ['id_kelas'=>3,'nim'=>'2210817110002','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>32],
            ['id_kelas'=>3,'nim'=>'2210817110002','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>32],

            ['id_kelas'=>3,'nim'=>'2210817110006','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>28],
            ['id_kelas'=>3,'nim'=>'2210817110006','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>28],
            ['id_kelas'=>3,'nim'=>'2210817110006','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>29],
            ['id_kelas'=>3,'nim'=>'2210817110006','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>29],
            ['id_kelas'=>3,'nim'=>'2210817110006','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>30],
            ['id_kelas'=>3,'nim'=>'2210817110006','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>30],

            ['id_kelas'=>3,'nim'=>'2210817110008','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>13],
            ['id_kelas'=>3,'nim'=>'2210817110008','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>13],
            ['id_kelas'=>3,'nim'=>'2210817110008','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>14],
            ['id_kelas'=>3,'nim'=>'2210817110008','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>14],
            ['id_kelas'=>3,'nim'=>'2210817110008','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>15],
            ['id_kelas'=>3,'nim'=>'2210817110008','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>15],

            ['id_kelas'=>3,'nim'=>'2210817120003','id_rencana_asesmen'=>7,'id_cpmk'=>35,'nilai'=>12],
            ['id_kelas'=>3,'nim'=>'2210817120003','id_rencana_asesmen'=>7,'id_cpmk'=>36,'nilai'=>12],
            ['id_kelas'=>3,'nim'=>'2210817120003','id_rencana_asesmen'=>8,'id_cpmk'=>35,'nilai'=>13],
            ['id_kelas'=>3,'nim'=>'2210817120003','id_rencana_asesmen'=>8,'id_cpmk'=>36,'nilai'=>13],
            ['id_kelas'=>3,'nim'=>'2210817120003','id_rencana_asesmen'=>9,'id_cpmk'=>35,'nilai'=>14],
            ['id_kelas'=>3,'nim'=>'2210817120003','id_rencana_asesmen'=>9,'id_cpmk'=>36,'nilai'=>14],

            // kelas 4
            ['id_kelas'=>4,'nim'=>'2210817110005','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>85],
            ['id_kelas'=>4,'nim'=>'2210817110005','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>86],
            ['id_kelas'=>4,'nim'=>'2210817110005','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>88],

            ['id_kelas'=>4,'nim'=>'2210817120004','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>78],
            ['id_kelas'=>4,'nim'=>'2210817120004','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>80],
            ['id_kelas'=>4,'nim'=>'2210817120004','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>82],

            ['id_kelas'=>4,'nim'=>'2210817210031','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>88],
            ['id_kelas'=>4,'nim'=>'2210817210031','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>90],
            ['id_kelas'=>4,'nim'=>'2210817210031','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>92],

            ['id_kelas'=>4,'nim'=>'2210817210033','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>82],
            ['id_kelas'=>4,'nim'=>'2210817210033','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>83],
            ['id_kelas'=>4,'nim'=>'2210817210033','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>85],

            ['id_kelas'=>4,'nim'=>'2210817310006','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>84],
            ['id_kelas'=>4,'nim'=>'2210817310006','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>85],
            ['id_kelas'=>4,'nim'=>'2210817310006','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>87],

            ['id_kelas'=>4,'nim'=>'2210817110001','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>68],
            ['id_kelas'=>4,'nim'=>'2210817110001','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>70],
            ['id_kelas'=>4,'nim'=>'2210817110001','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>72],

            ['id_kelas'=>4,'nim'=>'2210817110002','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>65],
            ['id_kelas'=>4,'nim'=>'2210817110002','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>67],
            ['id_kelas'=>4,'nim'=>'2210817110002','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>69],

            ['id_kelas'=>4,'nim'=>'2210817110006','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>60],
            ['id_kelas'=>4,'nim'=>'2210817110006','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>62],
            ['id_kelas'=>4,'nim'=>'2210817110006','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>64],

            ['id_kelas'=>4,'nim'=>'2210817110008','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>35],
            ['id_kelas'=>4,'nim'=>'2210817110008','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>38],
            ['id_kelas'=>4,'nim'=>'2210817110008','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>40],

            ['id_kelas'=>4,'nim'=>'2210817120003','id_rencana_asesmen'=>10,'id_cpmk'=>37,'nilai'=>28],
            ['id_kelas'=>4,'nim'=>'2210817120003','id_rencana_asesmen'=>11,'id_cpmk'=>37,'nilai'=>30],
            ['id_kelas'=>4,'nim'=>'2210817120003','id_rencana_asesmen'=>12,'id_cpmk'=>37,'nilai'=>32],


            // kelas kelima
            ['id_kelas'=>5,'nim'=>'2210817110005','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>42],
            ['id_kelas'=>5,'nim'=>'2210817110005','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>43],
            ['id_kelas'=>5,'nim'=>'2210817110005','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>43],
            ['id_kelas'=>5,'nim'=>'2210817110005','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>44],
            ['id_kelas'=>5,'nim'=>'2210817110005','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>44],
            ['id_kelas'=>5,'nim'=>'2210817110005','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>45],

            ['id_kelas'=>5,'nim'=>'2210817120004','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>38],
            ['id_kelas'=>5,'nim'=>'2210817120004','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>39],
            ['id_kelas'=>5,'nim'=>'2210817120004','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>39],
            ['id_kelas'=>5,'nim'=>'2210817120004','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>40],
            ['id_kelas'=>5,'nim'=>'2210817120004','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>40],
            ['id_kelas'=>5,'nim'=>'2210817120004','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>41],

            ['id_kelas'=>5,'nim'=>'2210817210031','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>43],
            ['id_kelas'=>5,'nim'=>'2210817210031','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>44],
            ['id_kelas'=>5,'nim'=>'2210817210031','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>44],
            ['id_kelas'=>5,'nim'=>'2210817210031','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>45],
            ['id_kelas'=>5,'nim'=>'2210817210031','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>45],
            ['id_kelas'=>5,'nim'=>'2210817210031','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>46],

            ['id_kelas'=>5,'nim'=>'2210817210033','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>40],
            ['id_kelas'=>5,'nim'=>'2210817210033','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>41],
            ['id_kelas'=>5,'nim'=>'2210817210033','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>41],
            ['id_kelas'=>5,'nim'=>'2210817210033','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>42],
            ['id_kelas'=>5,'nim'=>'2210817210033','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>42],
            ['id_kelas'=>5,'nim'=>'2210817210033','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>43],

            ['id_kelas'=>5,'nim'=>'2210817310006','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>41],
            ['id_kelas'=>5,'nim'=>'2210817310006','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>42],
            ['id_kelas'=>5,'nim'=>'2210817310006','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>42],
            ['id_kelas'=>5,'nim'=>'2210817310006','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>43],
            ['id_kelas'=>5,'nim'=>'2210817310006','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>43],
            ['id_kelas'=>5,'nim'=>'2210817310006','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>44],

            ['id_kelas'=>5,'nim'=>'2210817110001','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>31],
            ['id_kelas'=>5,'nim'=>'2210817110001','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>32],
            ['id_kelas'=>5,'nim'=>'2210817110001','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>32],
            ['id_kelas'=>5,'nim'=>'2210817110001','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>33],
            ['id_kelas'=>5,'nim'=>'2210817110001','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>33],
            ['id_kelas'=>5,'nim'=>'2210817110001','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>34],

            ['id_kelas'=>5,'nim'=>'2210817110002','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>30],
            ['id_kelas'=>5,'nim'=>'2210817110002','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>31],
            ['id_kelas'=>5,'nim'=>'2210817110002','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>31],
            ['id_kelas'=>5,'nim'=>'2210817110002','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>32],
            ['id_kelas'=>5,'nim'=>'2210817110002','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>32],
            ['id_kelas'=>5,'nim'=>'2210817110002','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>33],

            ['id_kelas'=>5,'nim'=>'2210817110006','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>28],
            ['id_kelas'=>5,'nim'=>'2210817110006','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>29],
            ['id_kelas'=>5,'nim'=>'2210817110006','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>29],
            ['id_kelas'=>5,'nim'=>'2210817110006','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>30],
            ['id_kelas'=>5,'nim'=>'2210817110006','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>30],
            ['id_kelas'=>5,'nim'=>'2210817110006','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>31],

            ['id_kelas'=>5,'nim'=>'2210817110008','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>13],
            ['id_kelas'=>5,'nim'=>'2210817110008','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>14],
            ['id_kelas'=>5,'nim'=>'2210817110008','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>14],
            ['id_kelas'=>5,'nim'=>'2210817110008','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>15],
            ['id_kelas'=>5,'nim'=>'2210817110008','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>15],
            ['id_kelas'=>5,'nim'=>'2210817110008','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>16],

            ['id_kelas'=>5,'nim'=>'2210817120003','id_rencana_asesmen'=>13,'id_cpmk'=>38,'nilai'=>12],
            ['id_kelas'=>5,'nim'=>'2210817120003','id_rencana_asesmen'=>13,'id_cpmk'=>39,'nilai'=>13],
            ['id_kelas'=>5,'nim'=>'2210817120003','id_rencana_asesmen'=>14,'id_cpmk'=>38,'nilai'=>13],
            ['id_kelas'=>5,'nim'=>'2210817120003','id_rencana_asesmen'=>14,'id_cpmk'=>39,'nilai'=>14],
            ['id_kelas'=>5,'nim'=>'2210817120003','id_rencana_asesmen'=>15,'id_cpmk'=>38,'nilai'=>14],
            ['id_kelas'=>5,'nim'=>'2210817120003','id_rencana_asesmen'=>15,'id_cpmk'=>39,'nilai'=>15],

            // kelas keenam
            ['id_kelas'=>6,'nim'=>'2210817110005','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>86],
            ['id_kelas'=>6,'nim'=>'2210817110005','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>88],
            ['id_kelas'=>6,'nim'=>'2210817110005','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>90],

            ['id_kelas'=>6,'nim'=>'2210817120004','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>80],
            ['id_kelas'=>6,'nim'=>'2210817120004','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>82],
            ['id_kelas'=>6,'nim'=>'2210817120004','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>84],

            ['id_kelas'=>6,'nim'=>'2210817210031','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>88],
            ['id_kelas'=>6,'nim'=>'2210817210031','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>90],
            ['id_kelas'=>6,'nim'=>'2210817210031','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>92],

            ['id_kelas'=>6,'nim'=>'2210817210033','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>82],
            ['id_kelas'=>6,'nim'=>'2210817210033','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>84],
            ['id_kelas'=>6,'nim'=>'2210817210033','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>86],

            ['id_kelas'=>6,'nim'=>'2210817310006','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>84],
            ['id_kelas'=>6,'nim'=>'2210817310006','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>86],
            ['id_kelas'=>6,'nim'=>'2210817310006','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>88],

            ['id_kelas'=>6,'nim'=>'2210817110001','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>70],
            ['id_kelas'=>6,'nim'=>'2210817110001','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>72],
            ['id_kelas'=>6,'nim'=>'2210817110001','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>74],

            ['id_kelas'=>6,'nim'=>'2210817110002','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>66],
            ['id_kelas'=>6,'nim'=>'2210817110002','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>68],
            ['id_kelas'=>6,'nim'=>'2210817110002','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>70],

            ['id_kelas'=>6,'nim'=>'2210817110006','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>62],
            ['id_kelas'=>6,'nim'=>'2210817110006','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>64],
            ['id_kelas'=>6,'nim'=>'2210817110006','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>66],

            ['id_kelas'=>6,'nim'=>'2210817110008','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>35],
            ['id_kelas'=>6,'nim'=>'2210817110008','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>38],
            ['id_kelas'=>6,'nim'=>'2210817110008','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>40],

            ['id_kelas'=>6,'nim'=>'2210817120003','id_rencana_asesmen'=>16,'id_cpmk'=>50,'nilai'=>28],
            ['id_kelas'=>6,'nim'=>'2210817120003','id_rencana_asesmen'=>17,'id_cpmk'=>50,'nilai'=>30],
            ['id_kelas'=>6,'nim'=>'2210817120003','id_rencana_asesmen'=>18,'id_cpmk'=>50,'nilai'=>32],

            // kelas ketujuh
            ['id_kelas'=>7,'nim'=>'2210817110005','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>43],
            ['id_kelas'=>7,'nim'=>'2210817110005','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>45],
            ['id_kelas'=>7,'nim'=>'2210817110005','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>44],
            ['id_kelas'=>7,'nim'=>'2210817110005','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>46],
            ['id_kelas'=>7,'nim'=>'2210817110005','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>45],
            ['id_kelas'=>7,'nim'=>'2210817110005','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>47],

            ['id_kelas'=>7,'nim'=>'2210817120004','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>39],
            ['id_kelas'=>7,'nim'=>'2210817120004','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>41],
            ['id_kelas'=>7,'nim'=>'2210817120004','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>40],
            ['id_kelas'=>7,'nim'=>'2210817120004','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>42],
            ['id_kelas'=>7,'nim'=>'2210817120004','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>41],
            ['id_kelas'=>7,'nim'=>'2210817120004','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>43],

            ['id_kelas'=>7,'nim'=>'2210817210031','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>44],
            ['id_kelas'=>7,'nim'=>'2210817210031','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>46],
            ['id_kelas'=>7,'nim'=>'2210817210031','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>45],
            ['id_kelas'=>7,'nim'=>'2210817210031','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>47],
            ['id_kelas'=>7,'nim'=>'2210817210031','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>46],
            ['id_kelas'=>7,'nim'=>'2210817210031','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>48],

            ['id_kelas'=>7,'nim'=>'2210817210033','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>41],
            ['id_kelas'=>7,'nim'=>'2210817210033','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>43],
            ['id_kelas'=>7,'nim'=>'2210817210033','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>42],
            ['id_kelas'=>7,'nim'=>'2210817210033','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>44],
            ['id_kelas'=>7,'nim'=>'2210817210033','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>43],
            ['id_kelas'=>7,'nim'=>'2210817210033','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>45],

            ['id_kelas'=>7,'nim'=>'2210817310006','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>42],
            ['id_kelas'=>7,'nim'=>'2210817310006','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>44],
            ['id_kelas'=>7,'nim'=>'2210817310006','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>43],
            ['id_kelas'=>7,'nim'=>'2210817310006','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>45],
            ['id_kelas'=>7,'nim'=>'2210817310006','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>44],
            ['id_kelas'=>7,'nim'=>'2210817310006','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>46],

            ['id_kelas'=>7,'nim'=>'2210817110001','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>32],
            ['id_kelas'=>7,'nim'=>'2210817110001','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>34],
            ['id_kelas'=>7,'nim'=>'2210817110001','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>33],
            ['id_kelas'=>7,'nim'=>'2210817110001','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>35],
            ['id_kelas'=>7,'nim'=>'2210817110001','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>34],
            ['id_kelas'=>7,'nim'=>'2210817110001','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>36],

            ['id_kelas'=>7,'nim'=>'2210817110002','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>31],
            ['id_kelas'=>7,'nim'=>'2210817110002','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>33],
            ['id_kelas'=>7,'nim'=>'2210817110002','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>32],
            ['id_kelas'=>7,'nim'=>'2210817110002','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>34],
            ['id_kelas'=>7,'nim'=>'2210817110002','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>33],
            ['id_kelas'=>7,'nim'=>'2210817110002','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>35],

            ['id_kelas'=>7,'nim'=>'2210817110006','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>29],
            ['id_kelas'=>7,'nim'=>'2210817110006','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>31],
            ['id_kelas'=>7,'nim'=>'2210817110006','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>30],
            ['id_kelas'=>7,'nim'=>'2210817110006','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>32],
            ['id_kelas'=>7,'nim'=>'2210817110006','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>31],
            ['id_kelas'=>7,'nim'=>'2210817110006','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>33],

            ['id_kelas'=>7,'nim'=>'2210817110008','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>14],
            ['id_kelas'=>7,'nim'=>'2210817110008','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>16],
            ['id_kelas'=>7,'nim'=>'2210817110008','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>15],
            ['id_kelas'=>7,'nim'=>'2210817110008','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>17],
            ['id_kelas'=>7,'nim'=>'2210817110008','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>16],
            ['id_kelas'=>7,'nim'=>'2210817110008','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>18],

            ['id_kelas'=>7,'nim'=>'2210817120003','id_rencana_asesmen'=>19,'id_cpmk'=>40,'nilai'=>13],
            ['id_kelas'=>7,'nim'=>'2210817120003','id_rencana_asesmen'=>19,'id_cpmk'=>41,'nilai'=>15],
            ['id_kelas'=>7,'nim'=>'2210817120003','id_rencana_asesmen'=>20,'id_cpmk'=>40,'nilai'=>14],
            ['id_kelas'=>7,'nim'=>'2210817120003','id_rencana_asesmen'=>20,'id_cpmk'=>41,'nilai'=>16],
            ['id_kelas'=>7,'nim'=>'2210817120003','id_rencana_asesmen'=>21,'id_cpmk'=>40,'nilai'=>15],
            ['id_kelas'=>7,'nim'=>'2210817120003','id_rencana_asesmen'=>21,'id_cpmk'=>41,'nilai'=>17],

            // kelas kedelapan
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>28],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>31],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>29],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>31],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>32],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>32],
            ['id_kelas'=>8,'nim'=>'2210817110005','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>33],

            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>26],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>28],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>29],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>27],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>29],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>28],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817120004','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>31],

            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>32],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>33],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>31],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>33],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>33],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>32],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>33],
            ['id_kelas'=>8,'nim'=>'2210817210031','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>33],

            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>27],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>29],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>28],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>31],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>29],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>31],
            ['id_kelas'=>8,'nim'=>'2210817210033','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>32],

            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>29],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>31],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>32],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>30],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>32],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>33],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>31],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>33],
            ['id_kelas'=>8,'nim'=>'2210817310006','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>33],

            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>22],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>24],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>25],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>23],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>25],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>26],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>24],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>26],
            ['id_kelas'=>8,'nim'=>'2210817110001','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>27],

            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>21],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>23],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>24],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>22],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>24],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>25],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>23],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>25],
            ['id_kelas'=>8,'nim'=>'2210817110002','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>26],

            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>20],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>22],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>23],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>21],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>23],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>24],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>22],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>24],
            ['id_kelas'=>8,'nim'=>'2210817110006','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>25],

            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>12],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>14],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>15],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>13],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>15],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>16],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>14],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>16],
            ['id_kelas'=>8,'nim'=>'2210817110008','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>17],

            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>22,'id_cpmk'=>42,'nilai'=>10],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>22,'id_cpmk'=>43,'nilai'=>12],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>22,'id_cpmk'=>44,'nilai'=>13],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>23,'id_cpmk'=>42,'nilai'=>11],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>23,'id_cpmk'=>43,'nilai'=>13],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>23,'id_cpmk'=>44,'nilai'=>14],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>24,'id_cpmk'=>42,'nilai'=>12],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>24,'id_cpmk'=>43,'nilai'=>14],
            ['id_kelas'=>8,'nim'=>'2210817120003','id_rencana_asesmen'=>24,'id_cpmk'=>44,'nilai'=>15],

            // kelas 9 IMK (nilai langsung 0-100)

            ['id_kelas'=>9,'nim'=>'2210817110005','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>85],
            ['id_kelas'=>9,'nim'=>'2210817110005','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>86],
            ['id_kelas'=>9,'nim'=>'2210817110005','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>88],
            ['id_kelas'=>9,'nim'=>'2210817110005','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>90],
            ['id_kelas'=>9,'nim'=>'2210817110005','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>87],

            ['id_kelas'=>9,'nim'=>'2210817120004','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>82],
            ['id_kelas'=>9,'nim'=>'2210817120004','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>83],
            ['id_kelas'=>9,'nim'=>'2210817120004','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>85],
            ['id_kelas'=>9,'nim'=>'2210817120004','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>87],
            ['id_kelas'=>9,'nim'=>'2210817120004','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>84],

            ['id_kelas'=>9,'nim'=>'2210817210031','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>88],
            ['id_kelas'=>9,'nim'=>'2210817210031','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>89],
            ['id_kelas'=>9,'nim'=>'2210817210031','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>91],
            ['id_kelas'=>9,'nim'=>'2210817210031','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>92],
            ['id_kelas'=>9,'nim'=>'2210817210031','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>90],

            ['id_kelas'=>9,'nim'=>'2210817210033','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>84],
            ['id_kelas'=>9,'nim'=>'2210817210033','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>85],
            ['id_kelas'=>9,'nim'=>'2210817210033','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>87],
            ['id_kelas'=>9,'nim'=>'2210817210033','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>88],
            ['id_kelas'=>9,'nim'=>'2210817210033','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>86],

            ['id_kelas'=>9,'nim'=>'2210817310006','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>86],
            ['id_kelas'=>9,'nim'=>'2210817310006','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>87],
            ['id_kelas'=>9,'nim'=>'2210817310006','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>89],
            ['id_kelas'=>9,'nim'=>'2210817310006','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>91],
            ['id_kelas'=>9,'nim'=>'2210817310006','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>88],

            // sedang
            ['id_kelas'=>9,'nim'=>'2210817110001','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>70],
            ['id_kelas'=>9,'nim'=>'2210817110001','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>72],
            ['id_kelas'=>9,'nim'=>'2210817110001','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>74],
            ['id_kelas'=>9,'nim'=>'2210817110001','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>75],
            ['id_kelas'=>9,'nim'=>'2210817110001','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>73],

            ['id_kelas'=>9,'nim'=>'2210817110002','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>68],
            ['id_kelas'=>9,'nim'=>'2210817110002','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>70],
            ['id_kelas'=>9,'nim'=>'2210817110002','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>72],
            ['id_kelas'=>9,'nim'=>'2210817110002','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>74],
            ['id_kelas'=>9,'nim'=>'2210817110002','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>71],

            ['id_kelas'=>9,'nim'=>'2210817110006','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>65],
            ['id_kelas'=>9,'nim'=>'2210817110006','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>67],
            ['id_kelas'=>9,'nim'=>'2210817110006','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>69],
            ['id_kelas'=>9,'nim'=>'2210817110006','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>71],
            ['id_kelas'=>9,'nim'=>'2210817110006','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>68],

            // rendah
            ['id_kelas'=>9,'nim'=>'2210817110008','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>45],
            ['id_kelas'=>9,'nim'=>'2210817110008','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>47],
            ['id_kelas'=>9,'nim'=>'2210817110008','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>48],
            ['id_kelas'=>9,'nim'=>'2210817110008','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>50],
            ['id_kelas'=>9,'nim'=>'2210817110008','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>49],

            ['id_kelas'=>9,'nim'=>'2210817120003','id_rencana_asesmen'=>25,'id_cpmk'=>50,'nilai'=>40],
            ['id_kelas'=>9,'nim'=>'2210817120003','id_rencana_asesmen'=>26,'id_cpmk'=>50,'nilai'=>42],
            ['id_kelas'=>9,'nim'=>'2210817120003','id_rencana_asesmen'=>27,'id_cpmk'=>50,'nilai'=>44],
            ['id_kelas'=>9,'nim'=>'2210817120003','id_rencana_asesmen'=>28,'id_cpmk'=>50,'nilai'=>46],
            ['id_kelas'=>9,'nim'=>'2210817120003','id_rencana_asesmen'=>29,'id_cpmk'=>50,'nilai'=>43],

            // kelas 10 (Bahasa Inggris)

            ['id_kelas'=>10,'nim'=>'2210817110005','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>85],
            ['id_kelas'=>10,'nim'=>'2210817110005','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>87],
            ['id_kelas'=>10,'nim'=>'2210817110005','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>88],

            ['id_kelas'=>10,'nim'=>'2210817120004','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>82],
            ['id_kelas'=>10,'nim'=>'2210817120004','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>84],
            ['id_kelas'=>10,'nim'=>'2210817120004','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>85],

            ['id_kelas'=>10,'nim'=>'2210817210031','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>88],
            ['id_kelas'=>10,'nim'=>'2210817210031','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>90],
            ['id_kelas'=>10,'nim'=>'2210817210031','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>91],

            ['id_kelas'=>10,'nim'=>'2210817210033','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>84],
            ['id_kelas'=>10,'nim'=>'2210817210033','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>86],
            ['id_kelas'=>10,'nim'=>'2210817210033','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>87],

            ['id_kelas'=>10,'nim'=>'2210817310006','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>86],
            ['id_kelas'=>10,'nim'=>'2210817310006','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>88],
            ['id_kelas'=>10,'nim'=>'2210817310006','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>89],

            // sedang
            ['id_kelas'=>10,'nim'=>'2210817110001','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>70],
            ['id_kelas'=>10,'nim'=>'2210817110001','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>72],
            ['id_kelas'=>10,'nim'=>'2210817110001','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>74],

            ['id_kelas'=>10,'nim'=>'2210817110002','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>68],
            ['id_kelas'=>10,'nim'=>'2210817110002','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>70],
            ['id_kelas'=>10,'nim'=>'2210817110002','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>72],

            ['id_kelas'=>10,'nim'=>'2210817110006','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>65],
            ['id_kelas'=>10,'nim'=>'2210817110006','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>67],
            ['id_kelas'=>10,'nim'=>'2210817110006','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>69],

            // rendah
            ['id_kelas'=>10,'nim'=>'2210817110008','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>45],
            ['id_kelas'=>10,'nim'=>'2210817110008','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>47],
            ['id_kelas'=>10,'nim'=>'2210817110008','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>49],

            ['id_kelas'=>10,'nim'=>'2210817120003','id_rencana_asesmen'=>30,'id_cpmk'=>53,'nilai'=>40],
            ['id_kelas'=>10,'nim'=>'2210817120003','id_rencana_asesmen'=>31,'id_cpmk'=>53,'nilai'=>42],
            ['id_kelas'=>10,'nim'=>'2210817120003','id_rencana_asesmen'=>32,'id_cpmk'=>53,'nilai'=>44],

            // kelas kesebelas
            ['id_kelas'=>11,'nim'=>'2210817110005','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>42],
            ['id_kelas'=>11,'nim'=>'2210817110005','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>43],
            ['id_kelas'=>11,'nim'=>'2210817110005','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>44],
            ['id_kelas'=>11,'nim'=>'2210817110005','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>45],
            ['id_kelas'=>11,'nim'=>'2210817110005','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>46],
            ['id_kelas'=>11,'nim'=>'2210817110005','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>47],

            ['id_kelas'=>11,'nim'=>'2210817120004','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>40],
            ['id_kelas'=>11,'nim'=>'2210817120004','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>41],
            ['id_kelas'=>11,'nim'=>'2210817120004','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>42],
            ['id_kelas'=>11,'nim'=>'2210817120004','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>43],
            ['id_kelas'=>11,'nim'=>'2210817120004','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>44],
            ['id_kelas'=>11,'nim'=>'2210817120004','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>45],

            ['id_kelas'=>11,'nim'=>'2210817210031','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>38],
            ['id_kelas'=>11,'nim'=>'2210817210031','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>39],
            ['id_kelas'=>11,'nim'=>'2210817210031','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>40],
            ['id_kelas'=>11,'nim'=>'2210817210031','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>41],
            ['id_kelas'=>11,'nim'=>'2210817210031','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>42],
            ['id_kelas'=>11,'nim'=>'2210817210031','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>43],

            ['id_kelas'=>11,'nim'=>'2210817210033','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>37],
            ['id_kelas'=>11,'nim'=>'2210817210033','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>38],
            ['id_kelas'=>11,'nim'=>'2210817210033','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>39],
            ['id_kelas'=>11,'nim'=>'2210817210033','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>40],
            ['id_kelas'=>11,'nim'=>'2210817210033','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>41],
            ['id_kelas'=>11,'nim'=>'2210817210033','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>42],

            ['id_kelas'=>11,'nim'=>'2210817310006','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>41],
            ['id_kelas'=>11,'nim'=>'2210817310006','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>42],
            ['id_kelas'=>11,'nim'=>'2210817310006','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>43],
            ['id_kelas'=>11,'nim'=>'2210817310006','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>44],
            ['id_kelas'=>11,'nim'=>'2210817310006','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>45],
            ['id_kelas'=>11,'nim'=>'2210817310006','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>46],

            ['id_kelas'=>11,'nim'=>'2210817110001','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>39],
            ['id_kelas'=>11,'nim'=>'2210817110001','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>40],
            ['id_kelas'=>11,'nim'=>'2210817110001','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>41],
            ['id_kelas'=>11,'nim'=>'2210817110001','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>42],
            ['id_kelas'=>11,'nim'=>'2210817110001','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>43],
            ['id_kelas'=>11,'nim'=>'2210817110001','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>44],

            ['id_kelas'=>11,'nim'=>'2210817110002','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>44],
            ['id_kelas'=>11,'nim'=>'2210817110002','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>45],
            ['id_kelas'=>11,'nim'=>'2210817110002','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>46],
            ['id_kelas'=>11,'nim'=>'2210817110002','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>47],
            ['id_kelas'=>11,'nim'=>'2210817110002','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>48],
            ['id_kelas'=>11,'nim'=>'2210817110002','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>49],

            ['id_kelas'=>11,'nim'=>'2210817110006','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>36],
            ['id_kelas'=>11,'nim'=>'2210817110006','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>37],
            ['id_kelas'=>11,'nim'=>'2210817110006','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>38],
            ['id_kelas'=>11,'nim'=>'2210817110006','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>39],
            ['id_kelas'=>11,'nim'=>'2210817110006','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>40],
            ['id_kelas'=>11,'nim'=>'2210817110006','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>41],

            ['id_kelas'=>11,'nim'=>'2210817110008','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>43],
            ['id_kelas'=>11,'nim'=>'2210817110008','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>44],
            ['id_kelas'=>11,'nim'=>'2210817110008','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>45],
            ['id_kelas'=>11,'nim'=>'2210817110008','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>46],
            ['id_kelas'=>11,'nim'=>'2210817110008','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>47],
            ['id_kelas'=>11,'nim'=>'2210817110008','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>48],

            ['id_kelas'=>11,'nim'=>'2210817120003','id_rencana_asesmen'=>33,'id_cpmk'=>54,'nilai'=>41],
            ['id_kelas'=>11,'nim'=>'2210817120003','id_rencana_asesmen'=>33,'id_cpmk'=>55,'nilai'=>42],
            ['id_kelas'=>11,'nim'=>'2210817120003','id_rencana_asesmen'=>34,'id_cpmk'=>54,'nilai'=>43],
            ['id_kelas'=>11,'nim'=>'2210817120003','id_rencana_asesmen'=>34,'id_cpmk'=>55,'nilai'=>44],
            ['id_kelas'=>11,'nim'=>'2210817120003','id_rencana_asesmen'=>35,'id_cpmk'=>54,'nilai'=>45],
            ['id_kelas'=>11,'nim'=>'2210817120003','id_rencana_asesmen'=>35,'id_cpmk'=>55,'nilai'=>46],

            // kelas kedua belas
            ['id_kelas'=>12,'nim'=>'2210817110005','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>45],
            ['id_kelas'=>12,'nim'=>'2210817110005','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>46],
            ['id_kelas'=>12,'nim'=>'2210817110005','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>47],
            ['id_kelas'=>12,'nim'=>'2210817110005','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>48],
            ['id_kelas'=>12,'nim'=>'2210817110005','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>49],
            ['id_kelas'=>12,'nim'=>'2210817110005','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>50],

            ['id_kelas'=>12,'nim'=>'2210817120004','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>44],
            ['id_kelas'=>12,'nim'=>'2210817120004','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>45],
            ['id_kelas'=>12,'nim'=>'2210817120004','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>46],
            ['id_kelas'=>12,'nim'=>'2210817120004','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>47],
            ['id_kelas'=>12,'nim'=>'2210817120004','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>48],
            ['id_kelas'=>12,'nim'=>'2210817120004','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>49],

            ['id_kelas'=>12,'nim'=>'2210817210031','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>43],
            ['id_kelas'=>12,'nim'=>'2210817210031','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>44],
            ['id_kelas'=>12,'nim'=>'2210817210031','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>45],
            ['id_kelas'=>12,'nim'=>'2210817210031','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>46],
            ['id_kelas'=>12,'nim'=>'2210817210031','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>47],
            ['id_kelas'=>12,'nim'=>'2210817210031','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>48],

            ['id_kelas'=>12,'nim'=>'2210817210033','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>38],
            ['id_kelas'=>12,'nim'=>'2210817210033','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>39],
            ['id_kelas'=>12,'nim'=>'2210817210033','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>40],
            ['id_kelas'=>12,'nim'=>'2210817210033','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>41],
            ['id_kelas'=>12,'nim'=>'2210817210033','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>42],
            ['id_kelas'=>12,'nim'=>'2210817210033','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>43],

            ['id_kelas'=>12,'nim'=>'2210817310006','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>39],
            ['id_kelas'=>12,'nim'=>'2210817310006','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>40],
            ['id_kelas'=>12,'nim'=>'2210817310006','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>41],
            ['id_kelas'=>12,'nim'=>'2210817310006','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>42],
            ['id_kelas'=>12,'nim'=>'2210817310006','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>43],
            ['id_kelas'=>12,'nim'=>'2210817310006','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>44],

            ['id_kelas'=>12,'nim'=>'2210817110001','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>37],
            ['id_kelas'=>12,'nim'=>'2210817110001','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>38],
            ['id_kelas'=>12,'nim'=>'2210817110001','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>39],
            ['id_kelas'=>12,'nim'=>'2210817110001','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>40],
            ['id_kelas'=>12,'nim'=>'2210817110001','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>41],
            ['id_kelas'=>12,'nim'=>'2210817110001','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>42],

            ['id_kelas'=>12,'nim'=>'2210817110002','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>40],
            ['id_kelas'=>12,'nim'=>'2210817110002','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>41],
            ['id_kelas'=>12,'nim'=>'2210817110002','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>42],
            ['id_kelas'=>12,'nim'=>'2210817110002','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>43],
            ['id_kelas'=>12,'nim'=>'2210817110002','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>44],
            ['id_kelas'=>12,'nim'=>'2210817110002','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>45],

            ['id_kelas'=>12,'nim'=>'2210817110006','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>30],
            ['id_kelas'=>12,'nim'=>'2210817110006','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>31],
            ['id_kelas'=>12,'nim'=>'2210817110006','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>32],
            ['id_kelas'=>12,'nim'=>'2210817110006','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>33],
            ['id_kelas'=>12,'nim'=>'2210817110006','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>34],
            ['id_kelas'=>12,'nim'=>'2210817110006','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>35],

            ['id_kelas'=>12,'nim'=>'2210817110008','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>28],
            ['id_kelas'=>12,'nim'=>'2210817110008','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>29],
            ['id_kelas'=>12,'nim'=>'2210817110008','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>30],
            ['id_kelas'=>12,'nim'=>'2210817110008','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>31],
            ['id_kelas'=>12,'nim'=>'2210817110008','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>32],
            ['id_kelas'=>12,'nim'=>'2210817110008','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>33],

            ['id_kelas'=>12,'nim'=>'2210817120003','id_rencana_asesmen'=>36,'id_cpmk'=>56,'nilai'=>29],
            ['id_kelas'=>12,'nim'=>'2210817120003','id_rencana_asesmen'=>36,'id_cpmk'=>57,'nilai'=>30],
            ['id_kelas'=>12,'nim'=>'2210817120003','id_rencana_asesmen'=>37,'id_cpmk'=>56,'nilai'=>31],
            ['id_kelas'=>12,'nim'=>'2210817120003','id_rencana_asesmen'=>37,'id_cpmk'=>57,'nilai'=>32],
            ['id_kelas'=>12,'nim'=>'2210817120003','id_rencana_asesmen'=>38,'id_cpmk'=>56,'nilai'=>33],
            ['id_kelas'=>12,'nim'=>'2210817120003','id_rencana_asesmen'=>38,'id_cpmk'=>57,'nilai'=>34],

            // kelas ketiga belas
            ['id_kelas'=>13,'nim'=>'2210817110005','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>85],
            ['id_kelas'=>13,'nim'=>'2210817110005','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>87],
            ['id_kelas'=>13,'nim'=>'2210817110005','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>90],

            ['id_kelas'=>13,'nim'=>'2210817120004','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>82],
            ['id_kelas'=>13,'nim'=>'2210817120004','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>84],
            ['id_kelas'=>13,'nim'=>'2210817120004','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>88],

            ['id_kelas'=>13,'nim'=>'2210817210031','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>78],
            ['id_kelas'=>13,'nim'=>'2210817210031','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>80],
            ['id_kelas'=>13,'nim'=>'2210817210031','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>83],

            ['id_kelas'=>13,'nim'=>'2210817210033','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>75],
            ['id_kelas'=>13,'nim'=>'2210817210033','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>77],
            ['id_kelas'=>13,'nim'=>'2210817210033','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>80],

            ['id_kelas'=>13,'nim'=>'2210817310006','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>70],
            ['id_kelas'=>13,'nim'=>'2210817310006','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>72],
            ['id_kelas'=>13,'nim'=>'2210817310006','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>75],

            ['id_kelas'=>13,'nim'=>'2210817110001','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>68],
            ['id_kelas'=>13,'nim'=>'2210817110001','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>70],
            ['id_kelas'=>13,'nim'=>'2210817110001','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>73],

            ['id_kelas'=>13,'nim'=>'2210817110002','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>72],
            ['id_kelas'=>13,'nim'=>'2210817110002','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>74],
            ['id_kelas'=>13,'nim'=>'2210817110002','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>78],

            ['id_kelas'=>13,'nim'=>'2210817110006','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>60],
            ['id_kelas'=>13,'nim'=>'2210817110006','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>62],
            ['id_kelas'=>13,'nim'=>'2210817110006','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>65],

            ['id_kelas'=>13,'nim'=>'2210817110008','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>58],
            ['id_kelas'=>13,'nim'=>'2210817110008','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>60],
            ['id_kelas'=>13,'nim'=>'2210817110008','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>63],

            ['id_kelas'=>13,'nim'=>'2210817120003','id_rencana_asesmen'=>39,'id_cpmk'=>58,'nilai'=>62],
            ['id_kelas'=>13,'nim'=>'2210817120003','id_rencana_asesmen'=>40,'id_cpmk'=>58,'nilai'=>64],
            ['id_kelas'=>13,'nim'=>'2210817120003','id_rencana_asesmen'=>41,'id_cpmk'=>58,'nilai'=>67],

            // kelas terakhir
            ['id_kelas'=>14,'nim'=>'2210817110005','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>88],
            ['id_kelas'=>14,'nim'=>'2210817110005','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>90],
            ['id_kelas'=>14,'nim'=>'2210817110005','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>92],

            ['id_kelas'=>14,'nim'=>'2210817120004','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>85],
            ['id_kelas'=>14,'nim'=>'2210817120004','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>87],
            ['id_kelas'=>14,'nim'=>'2210817120004','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>89],

            ['id_kelas'=>14,'nim'=>'2210817210031','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>80],
            ['id_kelas'=>14,'nim'=>'2210817210031','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>82],
            ['id_kelas'=>14,'nim'=>'2210817210031','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>85],

            ['id_kelas'=>14,'nim'=>'2210817210033','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>78],
            ['id_kelas'=>14,'nim'=>'2210817210033','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>80],
            ['id_kelas'=>14,'nim'=>'2210817210033','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>83],

            ['id_kelas'=>14,'nim'=>'2210817310006','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>75],
            ['id_kelas'=>14,'nim'=>'2210817310006','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>77],
            ['id_kelas'=>14,'nim'=>'2210817310006','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>80],

            ['id_kelas'=>14,'nim'=>'2210817110001','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>72],
            ['id_kelas'=>14,'nim'=>'2210817110001','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>74],
            ['id_kelas'=>14,'nim'=>'2210817110001','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>76],

            ['id_kelas'=>14,'nim'=>'2210817110002','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>76],
            ['id_kelas'=>14,'nim'=>'2210817110002','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>78],
            ['id_kelas'=>14,'nim'=>'2210817110002','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>82],

            ['id_kelas'=>14,'nim'=>'2210817110006','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>65],
            ['id_kelas'=>14,'nim'=>'2210817110006','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>67],
            ['id_kelas'=>14,'nim'=>'2210817110006','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>70],

            ['id_kelas'=>14,'nim'=>'2210817110008','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>63],
            ['id_kelas'=>14,'nim'=>'2210817110008','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>65],
            ['id_kelas'=>14,'nim'=>'2210817110008','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>68],

            ['id_kelas'=>14,'nim'=>'2210817120003','id_rencana_asesmen'=>42,'id_cpmk'=>59,'nilai'=>68],
            ['id_kelas'=>14,'nim'=>'2210817120003','id_rencana_asesmen'=>43,'id_cpmk'=>59,'nilai'=>70],
            ['id_kelas'=>14,'nim'=>'2210817120003','id_rencana_asesmen'=>44,'id_cpmk'=>59,'nilai'=>73],
        ]);
    }
}