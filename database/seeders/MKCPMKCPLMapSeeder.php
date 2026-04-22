<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKCPMKCPLMapSeeder extends Seeder
{
    public function run()
    {
        DB::table('mk_cpmk_cpl_map')->insert([

            ['id_mk'=>33,'id_cpl'=>19,'id_cpmk'=>32],
            ['id_mk'=>37,'id_cpl'=>20,'id_cpmk'=>36],
            ['id_mk'=>42,'id_cpl'=>21,'id_cpmk'=>42],
            ['id_mk'=>62,'id_cpl'=>22,'id_cpmk'=>45],
            ['id_mk'=>71,'id_cpl'=>23,'id_cpmk'=>49],
            ['id_mk'=>70,'id_cpl'=>24,'id_cpmk'=>50],
            ['id_mk'=>70,'id_cpl'=>24,'id_cpmk'=>52],
            ['id_mk'=>50,'id_cpl'=>25,'id_cpmk'=>54],
            ['id_mk'=>31,'id_cpl'=>26,'id_cpmk'=>56],
            ['id_mk'=>98,'id_cpl'=>27,'id_cpmk'=>61],


            // saat deploy uncomment ini
            // ['id_mk'=>32,'id_cpl'=>26,'id_cpmk'=>58],
            // ['id_mk'=>34,'id_cpl'=>19,'id_cpmk'=>32],
            // ['id_mk'=>35,'id_cpl'=>19,'id_cpmk'=>34],
            // ['id_mk'=>36,'id_cpl'=>19,'id_cpmk'=>33],
            // ['id_mk'=>38,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>39,'id_cpl'=>26,'id_cpmk'=>56],
            // ['id_mk'=>40,'id_cpl'=>19,'id_cpmk'=>32],
            // ['id_mk'=>41,'id_cpl'=>26,'id_cpmk'=>57],
            // ['id_mk'=>43,'id_cpl'=>20,'id_cpmk'=>37],
            // ['id_mk'=>44,'id_cpl'=>20,'id_cpmk'=>37],
            // ['id_mk'=>45,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>46,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>47,'id_cpl'=>19,'id_cpmk'=>31],
            // ['id_mk'=>48,'id_cpl'=>19,'id_cpmk'=>31],
            // ['id_mk'=>49,'id_cpl'=>19,'id_cpmk'=>32],
            // ['id_mk'=>51,'id_cpl'=>26,'id_cpmk'=>58],
            // ['id_mk'=>52,'id_cpl'=>20,'id_cpmk'=>35],
            // ['id_mk'=>53,'id_cpl'=>21,'id_cpmk'=>41],
            // ['id_mk'=>54,'id_cpl'=>21,'id_cpmk'=>41],
            // ['id_mk'=>55,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>56,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>57,'id_cpl'=>20,'id_cpmk'=>37],
            // ['id_mk'=>58,'id_cpl'=>20,'id_cpmk'=>37],
            // ['id_mk'=>59,'id_cpl'=>27,'id_cpmk'=>60],
            // ['id_mk'=>60,'id_cpl'=>26,'id_cpmk'=>56],
            // ['id_mk'=>61,'id_cpl'=>21,'id_cpmk'=>42],
            // ['id_mk'=>63,'id_cpl'=>20,'id_cpmk'=>38],
            // ['id_mk'=>64,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>64,'id_cpl'=>20,'id_cpmk'=>40],
            // ['id_mk'=>65,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>65,'id_cpl'=>20,'id_cpmk'=>40],
            // ['id_mk'=>66,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>66,'id_cpl'=>20,'id_cpmk'=>40],
            // ['id_mk'=>67,'id_cpl'=>20,'id_cpmk'=>36],
            // ['id_mk'=>67,'id_cpl'=>20,'id_cpmk'=>40],
            // ['id_mk'=>68,'id_cpl'=>26,'id_cpmk'=>57],
            // ['id_mk'=>69,'id_cpl'=>21,'id_cpmk'=>43],
            // ['id_mk'=>72,'id_cpl'=>27,'id_cpmk'=>59],
            // ['id_mk'=>73,'id_cpl'=>26,'id_cpmk'=>56],
            // ['id_mk'=>74,'id_cpl'=>26,'id_cpmk'=>57],
            // ['id_mk'=>75,'id_cpl'=>21,'id_cpmk'=>43],
            // ['id_mk'=>76,'id_cpl'=>20,'id_cpmk'=>39],
            // ['id_mk'=>76,'id_cpl'=>23,'id_cpmk'=>48],
            // ['id_mk'=>77,'id_cpl'=>20,'id_cpmk'=>38],
            // ['id_mk'=>77,'id_cpl'=>23,'id_cpmk'=>49],
            // ['id_mk'=>78,'id_cpl'=>25,'id_cpmk'=>55],
            // ['id_mk'=>79,'id_cpl'=>26,'id_cpmk'=>57],
            // ['id_mk'=>80,'id_cpl'=>23,'id_cpmk'=>49],
            // ['id_mk'=>80,'id_cpl'=>26,'id_cpmk'=>56],
            // ['id_mk'=>81,'id_cpl'=>27,'id_cpmk'=>59],
            // ['id_mk'=>82,'id_cpl'=>27,'id_cpmk'=>59],
            // ['id_mk'=>83,'id_cpl'=>23,'id_cpmk'=>48],
            // ['id_mk'=>84,'id_cpl'=>22,'id_cpmk'=>46],
            // ['id_mk'=>85,'id_cpl'=>21,'id_cpmk'=>44],
            // ['id_mk'=>86,'id_cpl'=>22,'id_cpmk'=>45],
            // ['id_mk'=>87,'id_cpl'=>22,'id_cpmk'=>46],
            // ['id_mk'=>87,'id_cpl'=>23,'id_cpmk'=>48],
            // ['id_mk'=>88,'id_cpl'=>24,'id_cpmk'=>50],
            // ['id_mk'=>88,'id_cpl'=>24,'id_cpmk'=>52],
            // ['id_mk'=>89,'id_cpl'=>24,'id_cpmk'=>50],
            // ['id_mk'=>89,'id_cpl'=>24,'id_cpmk'=>52],
            // ['id_mk'=>90,'id_cpl'=>24,'id_cpmk'=>51],
            // ['id_mk'=>91,'id_cpl'=>26,'id_cpmk'=>58],
            // ['id_mk'=>92,'id_cpl'=>24,'id_cpmk'=>51],
            // ['id_mk'=>93,'id_cpl'=>21,'id_cpmk'=>41],
            // ['id_mk'=>94,'id_cpl'=>25,'id_cpmk'=>55],
            // ['id_mk'=>95,'id_cpl'=>24,'id_cpmk'=>53],
            // ['id_mk'=>96,'id_cpl'=>20,'id_cpmk'=>39],
            // ['id_mk'=>96,'id_cpl'=>22,'id_cpmk'=>47],
            // ['id_mk'=>97,'id_cpl'=>25,'id_cpmk'=>55],

        ]);
    }
}
