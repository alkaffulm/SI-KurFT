<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MKCPMKCPLMapSeeder extends Seeder
{

    public function run()
    {
        $data = [
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 1],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 2],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 3],
            // ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 4],
            // ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 5],
            // ['id_mk' => 3, 'id_cpl' => 3, 'id_cpmk' => 6],

            // id mk = 92, 93, 94 ,95 , dan 96
            // id cpl = 19, 20, dan 21
            // id cpmk = 31, 32, 33, 34, 35

            // HULM1151
            ['id_mk'=>31,'id_cpl'=>26,'id_cpmk'=>56],

            // HULM1115
            ['id_mk'=>32,'id_cpl'=>26,'id_cpmk'=>58],

            // STI1101
            ['id_mk'=>33,'id_cpl'=>19,'id_cpmk'=>32],

            // STI1102
            ['id_mk'=>34,'id_cpl'=>19,'id_cpmk'=>32],

            // STI1103
            ['id_mk'=>35,'id_cpl'=>19,'id_cpmk'=>34],

            // STI1104
            ['id_mk'=>36,'id_cpl'=>19,'id_cpmk'=>33],

            // STI1105
            ['id_mk'=>37,'id_cpl'=>20,'id_cpmk'=>36],

            // STI1206
            ['id_mk'=>38,'id_cpl'=>20,'id_cpmk'=>36],

            // HULM1252
            ['id_mk'=>39,'id_cpl'=>26,'id_cpmk'=>56],

            // STI2107
            ['id_mk'=>40,'id_cpl'=>19,'id_cpmk'=>32],

            // STI2108
            ['id_mk'=>41,'id_cpl'=>26,'id_cpmk'=>57],

            // STI2109
            ['id_mk'=>42,'id_cpl'=>21,'id_cpmk'=>42],

            // STI2110
            ['id_mk'=>43,'id_cpl'=>20,'id_cpmk'=>37],

            // STI2211
            ['id_mk'=>44,'id_cpl'=>20,'id_cpmk'=>37],

            // STI2112
            ['id_mk'=>45,'id_cpl'=>20,'id_cpmk'=>36],

            // STI2213
            ['id_mk'=>46,'id_cpl'=>20,'id_cpmk'=>36],

            // STI2114
            ['id_mk'=>47,'id_cpl'=>19,'id_cpmk'=>31],

            // STI2215
            ['id_mk'=>48,'id_cpl'=>19,'id_cpmk'=>31],

            // STI3116
            ['id_mk'=>49,'id_cpl'=>19,'id_cpmk'=>32],

            // STI3117
            ['id_mk'=>50,'id_cpl'=>25,'id_cpmk'=>54],

            // STI3118
            ['id_mk'=>51,'id_cpl'=>26,'id_cpmk'=>58],

            // STI3119
            ['id_mk'=>52,'id_cpl'=>20,'id_cpmk'=>35],

            // STI3120
            ['id_mk'=>53,'id_cpl'=>21,'id_cpmk'=>41],

            // STI3221
            ['id_mk'=>54,'id_cpl'=>21,'id_cpmk'=>41],

            // STI3122
            ['id_mk'=>55,'id_cpl'=>20,'id_cpmk'=>36],

            // STI3223
            ['id_mk'=>56,'id_cpl'=>20,'id_cpmk'=>36],

            // STI3124
            ['id_mk'=>57,'id_cpl'=>20,'id_cpmk'=>37],

            // STI3225
            ['id_mk'=>58,'id_cpl'=>20,'id_cpmk'=>37],

            // HULM1251
            ['id_mk'=>59,'id_cpl'=>27,'id_cpmk'=>60],

            // STI4126
            ['id_mk'=>60,'id_cpl'=>26,'id_cpmk'=>56],

            // STI4127
            ['id_mk'=>61,'id_cpl'=>21,'id_cpmk'=>42],

            // STI4128
            ['id_mk'=>62,'id_cpl'=>22,'id_cpmk'=>45],

            // STI4129
            ['id_mk'=>63,'id_cpl'=>20,'id_cpmk'=>38],

            // STI4130
            ['id_mk'=>64,'id_cpl'=>20,'id_cpmk'=>36],
            ['id_mk'=>64,'id_cpl'=>20,'id_cpmk'=>40],

            // STI4231
            ['id_mk'=>65,'id_cpl'=>20,'id_cpmk'=>36],
            ['id_mk'=>65,'id_cpl'=>20,'id_cpmk'=>40],

            // STI4132
            ['id_mk'=>66,'id_cpl'=>20,'id_cpmk'=>36],
            ['id_mk'=>66,'id_cpl'=>20,'id_cpmk'=>40],

            // STI4233
            ['id_mk'=>67,'id_cpl'=>20,'id_cpmk'=>36],
            ['id_mk'=>67,'id_cpl'=>20,'id_cpmk'=>40],

            // HULM1171
            ['id_mk'=>68,'id_cpl'=>26,'id_cpmk'=>57],

            // STI5134
            ['id_mk'=>69,'id_cpl'=>21,'id_cpmk'=>43],

            // STI5135
            ['id_mk'=>70,'id_cpl'=>24,'id_cpmk'=>50],
            ['id_mk'=>70,'id_cpl'=>24,'id_cpmk'=>52],

            // STI5136
            ['id_mk'=>71,'id_cpl'=>23,'id_cpmk'=>49],

            // STI5137
            ['id_mk'=>72,'id_cpl'=>27,'id_cpmk'=>59],

            // HULM1152
            ['id_mk'=>73,'id_cpl'=>26,'id_cpmk'=>56],

            // HULM1272
            ['id_mk'=>74,'id_cpl'=>26,'id_cpmk'=>57],

            // STI6138
            ['id_mk'=>75,'id_cpl'=>21,'id_cpmk'=>43],

            // STI6139
            ['id_mk'=>76,'id_cpl'=>20,'id_cpmk'=>39],
            ['id_mk'=>76,'id_cpl'=>23,'id_cpmk'=>48],

            // STI6140
            ['id_mk'=>77,'id_cpl'=>20,'id_cpmk'=>38],
            ['id_mk'=>77,'id_cpl'=>23,'id_cpmk'=>49],

            // STI6141
            ['id_mk'=>78,'id_cpl'=>25,'id_cpmk'=>55],

            // HULM1161
            ['id_mk'=>79,'id_cpl'=>26,'id_cpmk'=>57],

            // STI7142
            ['id_mk'=>80,'id_cpl'=>23,'id_cpmk'=>49],
            ['id_mk'=>80,'id_cpl'=>26,'id_cpmk'=>56],

            // STI7143
            ['id_mk'=>81,'id_cpl'=>27,'id_cpmk'=>59],

            // STI8144
            ['id_mk'=>82,'id_cpl'=>27,'id_cpmk'=>59],

            // STI5445
            ['id_mk'=>83,'id_cpl'=>23,'id_cpmk'=>48],

            // STI5446
            ['id_mk'=>84,'id_cpl'=>22,'id_cpmk'=>46],

            // STI6447
            ['id_mk'=>85,'id_cpl'=>21,'id_cpmk'=>44],

            // STI7448
            ['id_mk'=>86,'id_cpl'=>22,'id_cpmk'=>45],

            // STI7449
            ['id_mk'=>87,'id_cpl'=>22,'id_cpmk'=>46],
            ['id_mk'=>87,'id_cpl'=>23,'id_cpmk'=>48],

            // STI5550
            ['id_mk'=>88,'id_cpl'=>24,'id_cpmk'=>50],
            ['id_mk'=>88,'id_cpl'=>24,'id_cpmk'=>52],

            // STI5551
            ['id_mk'=>89,'id_cpl'=>24,'id_cpmk'=>50],
            ['id_mk'=>89,'id_cpl'=>24,'id_cpmk'=>52],

            // STI6552
            ['id_mk'=>90,'id_cpl'=>24,'id_cpmk'=>51],

            // STI7553
            ['id_mk'=>91,'id_cpl'=>26,'id_cpmk'=>58],

            // STI7554
            ['id_mk'=>92,'id_cpl'=>24,'id_cpmk'=>51],

            // STI7355
            ['id_mk'=>93,'id_cpl'=>21,'id_cpmk'=>41],

            // STI7356
            ['id_mk'=>94,'id_cpl'=>25,'id_cpmk'=>55],

            // STI7357
            ['id_mk'=>95,'id_cpl'=>24,'id_cpmk'=>53],

            // STI8358
            ['id_mk'=>96,'id_cpl'=>20,'id_cpmk'=>39],
            ['id_mk'=>96,'id_cpl'=>22,'id_cpmk'=>47],

            // STI8359
            ['id_mk'=>97,'id_cpl'=>25,'id_cpmk'=>55],

            // STI8360
            ['id_mk'=>98,'id_cpl'=>27,'id_cpmk'=>61],

            
            // ['id_mk' => 34, 'id_cpl' => 19, 'id_cpmk' => 31],
            // ['id_mk' => 34, 'id_cpl' => 20, 'id_cpmk' => 32],
            // ['id_mk' => 34, 'id_cpl' => 21, 'id_cpmk' => 33],
            // ['id_mk' => 34, 'id_cpl' => 22, 'id_cpmk' => 34],

            // ['id_mk' => 35, 'id_cpl' => 19, 'id_cpmk' => 31],
            // ['id_mk' => 35, 'id_cpl' => 20, 'id_cpmk' => 32],
            // ['id_mk' => 35, 'id_cpl' => 21, 'id_cpmk' => 33],
            // ['id_mk' => 35, 'id_cpl' => 22, 'id_cpmk' => 34],

            // ['id_mk' => 36, 'id_cpl' => 19, 'id_cpmk' => 31],
            // ['id_mk' => 36, 'id_cpl' => 20, 'id_cpmk' => 32],
            // ['id_mk' => 36, 'id_cpl' => 21, 'id_cpmk' => 34],
            // ['id_mk' => 36, 'id_cpl' => 22, 'id_cpmk' => 35],

            // ['id_mk' => 92, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 92, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 92, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 92, 'id_cpl' => 26, 'id_cpmk' => 34],

            // ['id_mk' => 93, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 93, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 93, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 93, 'id_cpl' => 30, 'id_cpmk' => 33],

            // ['id_mk' => 94, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 94, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 94, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 94, 'id_cpl' => 25, 'id_cpmk' => 32],

            // ['id_mk' => 95, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 95, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 95, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 95, 'id_cpl' => 29, 'id_cpmk' => 31],

            // ['id_mk' => 96, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 96, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 96, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 96, 'id_cpl' => 24, 'id_cpmk' => 35],

            // ['id_mk' => 97, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 97, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 97, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 97, 'id_cpl' => 28, 'id_cpmk' => 34],

            // ['id_mk' => 98, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 98, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 98, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 98, 'id_cpl' => 23, 'id_cpmk' => 33],

            // ['id_mk' => 99, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 99, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 99, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 99, 'id_cpl' => 27, 'id_cpmk' => 32],

            // ['id_mk' => 100, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 100, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 100, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 100, 'id_cpl' => 31, 'id_cpmk' => 31],

            // ['id_mk' => 101, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 101, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 101, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 101, 'id_cpl' => 26, 'id_cpmk' => 35],

            // ['id_mk' => 102, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 102, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 102, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 102, 'id_cpl' => 30, 'id_cpmk' => 34],

            // ['id_mk' => 103, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 103, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 103, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 103, 'id_cpl' => 25, 'id_cpmk' => 33],

            // ['id_mk' => 104, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 104, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 104, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 104, 'id_cpl' => 29, 'id_cpmk' => 32],

            // ['id_mk' => 105, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 105, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 105, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 105, 'id_cpl' => 24, 'id_cpmk' => 31],

            // ['id_mk' => 106, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 106, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 106, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 106, 'id_cpl' => 28, 'id_cpmk' => 35],

            // ['id_mk' => 107, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 107, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 107, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 107, 'id_cpl' => 23, 'id_cpmk' => 34],

            // ['id_mk' => 108, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 108, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 108, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 108, 'id_cpl' => 27, 'id_cpmk' => 33],

            // ['id_mk' => 109, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 109, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 109, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 109, 'id_cpl' => 31, 'id_cpmk' => 32],

            // ['id_mk' => 110, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 110, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 110, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 110, 'id_cpl' => 26, 'id_cpmk' => 31],

            // ['id_mk' => 111, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 111, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 111, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 111, 'id_cpl' => 30, 'id_cpmk' => 35],

            // ['id_mk' => 112, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 112, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 112, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 112, 'id_cpl' => 25, 'id_cpmk' => 34],

            // ['id_mk' => 113, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 113, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 113, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 113, 'id_cpl' => 29, 'id_cpmk' => 33],

            // ['id_mk' => 114, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 114, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 114, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 114, 'id_cpl' => 24, 'id_cpmk' => 32],

            // ['id_mk' => 115, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 115, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 115, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 115, 'id_cpl' => 28, 'id_cpmk' => 31],

            // ['id_mk' => 116, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 116, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 116, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 116, 'id_cpl' => 23, 'id_cpmk' => 35],
            
            // ['id_mk' => 117, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 117, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 117, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 117, 'id_cpl' => 27, 'id_cpmk' => 34],

            // ['id_mk' => 118, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 118, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 118, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 118, 'id_cpl' => 31, 'id_cpmk' => 33],
            
            // ['id_mk' => 119, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 119, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 119, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 119, 'id_cpl' => 26, 'id_cpmk' => 32],

            // ['id_mk' => 120, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 120, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 120, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 120, 'id_cpl' => 30, 'id_cpmk' => 31],

            // ['id_mk' => 121, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 121, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 121, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 121, 'id_cpl' => 25, 'id_cpmk' => 35],

            // ['id_mk' => 122, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 122, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 122, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 122, 'id_cpl' => 29, 'id_cpmk' => 34],

            // ['id_mk' => 123, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 123, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 123, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 123, 'id_cpl' => 24, 'id_cpmk' => 33],

            // ['id_mk' => 124, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 124, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 124, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 124, 'id_cpl' => 28, 'id_cpmk' => 32],

            // ['id_mk' => 125, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 125, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 125, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 125, 'id_cpl' => 23, 'id_cpmk' => 31],

            // ['id_mk' => 126, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 126, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 126, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 126, 'id_cpl' => 27, 'id_cpmk' => 35],

            // ['id_mk' => 127, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 127, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 127, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 127, 'id_cpl' => 31, 'id_cpmk' => 34],

            // ['id_mk' => 128, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 128, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 128, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 128, 'id_cpl' => 26, 'id_cpmk' => 33],

            // ['id_mk' => 129, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 129, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 129, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 129, 'id_cpl' => 30, 'id_cpmk' => 32],

            // ['id_mk' => 130, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 130, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 130, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 130, 'id_cpl' => 25, 'id_cpmk' => 31],

            // ['id_mk' => 131, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 131, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 131, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 131, 'id_cpl' => 29, 'id_cpmk' => 35],

            // ['id_mk' => 132, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 132, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 132, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 132, 'id_cpl' => 24, 'id_cpmk' => 34],

            // ['id_mk' => 133, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 133, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 133, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 133, 'id_cpl' => 28, 'id_cpmk' => 33],

            // ['id_mk' => 134, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 134, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 134, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 134, 'id_cpl' => 23, 'id_cpmk' => 32],

            // ['id_mk' => 135, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 135, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 135, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 135, 'id_cpl' => 27, 'id_cpmk' => 31],

            // ['id_mk' => 136, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 136, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 136, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 136, 'id_cpl' => 31, 'id_cpmk' => 35],

            // ['id_mk' => 137, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 137, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 137, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 137, 'id_cpl' => 26, 'id_cpmk' => 34],

            // ['id_mk' => 138, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 138, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 138, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 138, 'id_cpl' => 30, 'id_cpmk' => 33],

            // ['id_mk' => 139, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 139, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 139, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 139, 'id_cpl' => 25, 'id_cpmk' => 32],

            // ['id_mk' => 140, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 140, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 140, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 140, 'id_cpl' => 29, 'id_cpmk' => 31],

            // ['id_mk' => 141, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 141, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 141, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 141, 'id_cpl' => 24, 'id_cpmk' => 35],

            // ['id_mk' => 142, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 142, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 142, 'id_cpl' => 27, 'id_cpmk' => 33],
            // ['id_mk' => 142, 'id_cpl' => 28, 'id_cpmk' => 34],
            
            // ['id_mk' => 143, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 143, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 143, 'id_cpl' => 31, 'id_cpmk' => 32],
            // ['id_mk' => 143, 'id_cpl' => 23, 'id_cpmk' => 33],

            // ['id_mk' => 144, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 144, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 144, 'id_cpl' => 26, 'id_cpmk' => 31],
            // ['id_mk' => 144, 'id_cpl' => 27, 'id_cpmk' => 32],

            // ['id_mk' => 145, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 145, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 145, 'id_cpl' => 30, 'id_cpmk' => 35],
            // ['id_mk' => 145, 'id_cpl' => 31, 'id_cpmk' => 31],

            // ['id_mk' => 146, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 146, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 146, 'id_cpl' => 25, 'id_cpmk' => 34],
            // ['id_mk' => 146, 'id_cpl' => 26, 'id_cpmk' => 35],

            // ['id_mk' => 147, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 147, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 147, 'id_cpl' => 29, 'id_cpmk' => 33],
            // ['id_mk' => 147, 'id_cpl' => 30, 'id_cpmk' => 34],

            // ['id_mk' => 148, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 148, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 148, 'id_cpl' => 24, 'id_cpmk' => 32],
            // ['id_mk' => 148, 'id_cpl' => 25, 'id_cpmk' => 33],

            // ['id_mk' => 149, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 149, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 149, 'id_cpl' => 28, 'id_cpmk' => 31],
            // ['id_mk' => 149, 'id_cpl' => 29, 'id_cpmk' => 32],

            // ['id_mk' => 150, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 150, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 150, 'id_cpl' => 23, 'id_cpmk' => 35],
            // ['id_mk' => 150, 'id_cpl' => 24, 'id_cpmk' => 31],

            // ['id_mk' => 151, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 151, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 151, 'id_cpl' => 27, 'id_cpmk' => 34],
            // ['id_mk' => 151, 'id_cpl' => 28, 'id_cpmk' => 35],

            // ['id_mk' => 152, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 152, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 152, 'id_cpl' => 31, 'id_cpmk' => 33],
            // ['id_mk' => 152, 'id_cpl' => 23, 'id_cpmk' => 34],

            // ['id_mk' => 153, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 153, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 153, 'id_cpl' => 26, 'id_cpmk' => 32],
            // ['id_mk' => 153, 'id_cpl' => 27, 'id_cpmk' => 33],

            // ['id_mk' => 154, 'id_cpl' => 28, 'id_cpmk' => 34],
            // ['id_mk' => 154, 'id_cpl' => 29, 'id_cpmk' => 35],
            // ['id_mk' => 154, 'id_cpl' => 30, 'id_cpmk' => 31],
            // ['id_mk' => 154, 'id_cpl' => 31, 'id_cpmk' => 32],

            // ['id_mk' => 155, 'id_cpl' => 23, 'id_cpmk' => 33],
            // ['id_mk' => 155, 'id_cpl' => 24, 'id_cpmk' => 34],
            // ['id_mk' => 155, 'id_cpl' => 25, 'id_cpmk' => 35],
            // ['id_mk' => 155, 'id_cpl' => 26, 'id_cpmk' => 31],

            // ['id_mk' => 156, 'id_cpl' => 27, 'id_cpmk' => 32],
            // ['id_mk' => 156, 'id_cpl' => 28, 'id_cpmk' => 33],
            // ['id_mk' => 156, 'id_cpl' => 29, 'id_cpmk' => 34],
            // ['id_mk' => 156, 'id_cpl' => 30, 'id_cpmk' => 35],

            // ['id_mk' => 157, 'id_cpl' => 31, 'id_cpmk' => 31],
            // ['id_mk' => 157, 'id_cpl' => 23, 'id_cpmk' => 32],
            // ['id_mk' => 157, 'id_cpl' => 24, 'id_cpmk' => 33],
            // ['id_mk' => 157, 'id_cpl' => 25, 'id_cpmk' => 34],

            // ['id_mk' => 158, 'id_cpl' => 26, 'id_cpmk' => 35],
            // ['id_mk' => 158, 'id_cpl' => 27, 'id_cpmk' => 31],
            // ['id_mk' => 158, 'id_cpl' => 28, 'id_cpmk' => 32],
            // ['id_mk' => 158, 'id_cpl' => 29, 'id_cpmk' => 33],

            // ['id_mk' => 159, 'id_cpl' => 30, 'id_cpmk' => 34],
            // ['id_mk' => 159, 'id_cpl' => 31, 'id_cpmk' => 35],
            // ['id_mk' => 159, 'id_cpl' => 23, 'id_cpmk' => 31],
            // ['id_mk' => 159, 'id_cpl' => 24, 'id_cpmk' => 32],

            // ['id_mk' => 160, 'id_cpl' => 25, 'id_cpmk' => 33],
            // ['id_mk' => 160, 'id_cpl' => 26, 'id_cpmk' => 34],
            // ['id_mk' => 160, 'id_cpl' => 27, 'id_cpmk' => 35],
            // ['id_mk' => 160, 'id_cpl' => 28, 'id_cpmk' => 31],

            // ['id_mk' => 161, 'id_cpl' => 29, 'id_cpmk' => 32],
            // ['id_mk' => 161, 'id_cpl' => 30, 'id_cpmk' => 33],
            // ['id_mk' => 161, 'id_cpl' => 31, 'id_cpmk' => 34],
            // ['id_mk' => 161, 'id_cpl' => 23, 'id_cpmk' => 35],

            // ['id_mk' => 162, 'id_cpl' => 24, 'id_cpmk' => 31],
            // ['id_mk' => 162, 'id_cpl' => 25, 'id_cpmk' => 32],
            // ['id_mk' => 162, 'id_cpl' => 26, 'id_cpmk' => 33],
            // ['id_mk' => 162, 'id_cpl' => 27, 'id_cpmk' => 34],

            // ['id_mk' => 163, 'id_cpl' => 28, 'id_cpmk' => 35],
            // ['id_mk' => 163, 'id_cpl' => 29, 'id_cpmk' => 31],
            // ['id_mk' => 163, 'id_cpl' => 30, 'id_cpmk' => 32],
            // ['id_mk' => 163, 'id_cpl' => 31, 'id_cpmk' => 33],
            
            // ['id_mk' => 164, 'id_cpl' => 23, 'id_cpmk' => 34],
            // ['id_mk' => 164, 'id_cpl' => 24, 'id_cpmk' => 35],
            // ['id_mk' => 164, 'id_cpl' => 25, 'id_cpmk' => 31],
            // ['id_mk' => 164, 'id_cpl' => 26, 'id_cpmk' => 32],
        ];

        DB::table('mk_cpmk_cpl_map')->insert($data);
    }
    // public function run()
    // {
    //     // Data manual khusus
    //     $data = [
    //         ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 1],
    //         ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 2],
    //         ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 3],
    //         ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 4],
    //         ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 5],
    //         ['id_mk' => 3, 'id_cpl' => 3, 'id_cpmk' => 6],

    //         ['id_mk' => 31, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 31, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 31, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 31, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 32, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 32, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 32, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 32, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 33, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 33, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 33, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 33, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 34, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 34, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 34, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 34, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 35, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 35, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 35, 'id_cpl' => 21, 'id_cpmk' => 33],
    //         ['id_mk' => 35, 'id_cpl' => 22, 'id_cpmk' => 34],

    //         ['id_mk' => 36, 'id_cpl' => 19, 'id_cpmk' => 31],
    //         ['id_mk' => 36, 'id_cpl' => 20, 'id_cpmk' => 32],
    //         ['id_mk' => 36, 'id_cpl' => 21, 'id_cpmk' => 34],
    //         ['id_mk' => 36, 'id_cpl' => 22, 'id_cpmk' => 35],
    //     ];

    //     $idCplStart = 23;
    //     $idCplEnd = 31;
    //     $idCpmkStart = 31;
    //     $idCpmkEnd = 35;
        
    //     $idCpl = $idCplStart;
    //     $idCpmk = $idCpmkStart;
        
    //     for ($idMk = 92; $idMk <= 164; $idMk++) {
    //         for ($i = 0; $i < 4; $i++) {
    //             $data[] = [
    //                 'id_mk' => $idMk,
    //                 'id_cpl' => $idCpl,
    //                 'id_cpmk' => $idCpmk,
    //             ];

    //             $idCpl++;
    //             $idCpmk++;

    //             if ($idCpl > $idCplEnd) $idCpl = $idCplStart;
    //             if ($idCpmk > $idCpmkEnd) $idCpmk = $idCpmkStart;
    //         }
    //     }

    //     DB::table('mk_cpmk_cpl_map')->insert($data);
    // }
}
    // public function run(): void
    // {

        // $data = [
        //     // DATA MANUAL KHUSUS
        //     ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 1],
        //     ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 2],
        //     ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk' => 3],
        //     ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 4],
        //     ['id_mk' => 2, 'id_cpl' => 2, 'id_cpmk' => 5],
        //     ['id_mk' => 3, 'id_cpl' => 3, 'id_cpmk' => 6],

        //     ['id_mk' => 31, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 31, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 31, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 31, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 32, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 32, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 32, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 32, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 33, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 33, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 33, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 33, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 34, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 34, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 34, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 34, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 35, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 35, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 35, 'id_cpl' => 21, 'id_cpmk'=>33],
        //     ['id_mk' => 35, 'id_cpl' => 22, 'id_cpmk'=>34],

        //     ['id_mk' => 36, 'id_cpl' => 19, 'id_cpmk'=>31],
        //     ['id_mk' => 36, 'id_cpl' => 20, 'id_cpmk'=>32],
        //     ['id_mk' => 36, 'id_cpl' => 21, 'id_cpmk'=>34],
        //     ['id_mk' => 36, 'id_cpl' => 22, 'id_cpmk'=>35],
        // ];

        // DB::table('mk_cpmk_cpl_map')->insert([
            // id mk yang bisa dipilih itu dari 92-164
            // id_cpmk yang bisa di pilih itu dari 31-35
            // cpl yang bisa dipilih itu dari 19-31
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>1],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>2],
            // ['id_mk' => 1, 'id_cpl' => 1, 'id_cpmk'=>3],

            // ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>4],
            // ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>5],
            // ['id_mk' => 2, 'id_cpl' => 1, 'id_cpmk'=>2],
            // // untuk MK IMK kurikulum 2025
        //     ['id_mk' => 80, 'id_cpl' => 57, 'id_cpmk'=>76],
        //     ['id_mk' => 80, 'id_cpl' => 58, 'id_cpmk'=>77],
        //     ['id_mk' => 80, 'id_cpl' => 58, 'id_cpmk'=>78],
        //     ['id_mk' => 80, 'id_cpl' => 59, 'id_cpmk'=>79],

        //     ['id_mk' => 92,  'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 92,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 92,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 92,  'id_cpl' => 20, 'id_cpmk' => 32],

        //     ['id_mk' => 93,  'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 93,  'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 93,  'id_cpl' => 22, 'id_cpmk' => 34],
        //     ['id_mk' => 93,  'id_cpl' => 22, 'id_cpmk' => 34],

        //     ['id_mk' => 94,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 94,  'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 94,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 94,  'id_cpl' => 21, 'id_cpmk' => 33],

        //     ['id_mk' => 95,  'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 95,  'id_cpl' => 22, 'id_cpmk' => 35],
        //     ['id_mk' => 95,  'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 95,  'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 96,  'id_cpl' => 20, 'id_cpmk' => 32],
        //     ['id_mk' => 96,  'id_cpl' => 23, 'id_cpmk' => 33],

        //     ['id_mk' => 97,  'id_cpl' => 24, 'id_cpmk' => 31],
        //     ['id_mk' => 97,  'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 98,  'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 98,  'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 99,  'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 99,  'id_cpl' => 25, 'id_cpmk' => 33],
        //     ['id_mk' => 99,  'id_cpl' => 27, 'id_cpmk' => 34],

        //     ['id_mk' => 100, 'id_cpl' => 24, 'id_cpmk' => 31],
        //     ['id_mk' => 100, 'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 101, 'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 101, 'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 102, 'id_cpl' => 28, 'id_cpmk' => 31],
        //     ['id_mk' => 102, 'id_cpl' => 29, 'id_cpmk' => 32],

        //     ['id_mk' => 103, 'id_cpl' => 28, 'id_cpmk' => 33],
        //     ['id_mk' => 103, 'id_cpl' => 30, 'id_cpmk' => 34],
        //     ['id_mk' => 103, 'id_cpl' => 31, 'id_cpmk' => 35],

        //     ['id_mk' => 104, 'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 104, 'id_cpl' => 20, 'id_cpmk' => 32],

        //     ['id_mk' => 105, 'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 105, 'id_cpl' => 22, 'id_cpmk' => 34],

        //     ['id_mk' => 106, 'id_cpl' => 23, 'id_cpmk' => 35],
        //     ['id_mk' => 106, 'id_cpl' => 24, 'id_cpmk' => 31],

        //     ['id_mk' => 107, 'id_cpl' => 25, 'id_cpmk' => 33],
        //     ['id_mk' => 107, 'id_cpl' => 26, 'id_cpmk' => 34],

        //     ['id_mk' => 108, 'id_cpl' => 27, 'id_cpmk' => 35],
        //     ['id_mk' => 108, 'id_cpl' => 28, 'id_cpmk' => 31],

        //     ['id_mk' => 109, 'id_cpl' => 29, 'id_cpmk' => 32],
        //     ['id_mk' => 109, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 110, 'id_cpl' => 31, 'id_cpmk' => 34],
        //     ['id_mk' => 110, 'id_cpl' => 19, 'id_cpmk' => 35],

        //     ['id_mk' => 111, 'id_cpl' => 20, 'id_cpmk' => 31],
        //     ['id_mk' => 111, 'id_cpl' => 21, 'id_cpmk' => 32],
        //     ['id_mk' => 111, 'id_cpl' => 22, 'id_cpmk' => 33],

        //     ['id_mk' => 112, 'id_cpl' => 23, 'id_cpmk' => 34],
        //     ['id_mk' => 112, 'id_cpl' => 24, 'id_cpmk' => 35],

        //     ['id_mk' => 113, 'id_cpl' => 25, 'id_cpmk' => 32],
        //     ['id_mk' => 113, 'id_cpl' => 26, 'id_cpmk' => 33],

        //     ['id_mk' => 114, 'id_cpl' => 27, 'id_cpmk' => 34],
        //     ['id_mk' => 114, 'id_cpl' => 28, 'id_cpmk' => 35],

        //     ['id_mk' => 115, 'id_cpl' => 29, 'id_cpmk' => 31],
        //     ['id_mk' => 115, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 116, 'id_cpl' => 31, 'id_cpmk' => 35],
        //     ['id_mk' => 116, 'id_cpl' => 19, 'id_cpmk' => 31],

        //     ['id_mk' => 117, 'id_cpl' => 20, 'id_cpmk' => 33],
        //     ['id_mk' => 117, 'id_cpl' => 21, 'id_cpmk' => 35],

        //     ['id_mk' => 118, 'id_cpl' => 22, 'id_cpmk' => 32],
        //     ['id_mk' => 118, 'id_cpl' => 23, 'id_cpmk' => 33],

        //     ['id_mk' => 119, 'id_cpl' => 24, 'id_cpmk' => 34],
        //     ['id_mk' => 119, 'id_cpl' => 25, 'id_cpmk' => 35],

        //     ['id_mk' => 120, 'id_cpl' => 26, 'id_cpmk' => 32],
        //     ['id_mk' => 120, 'id_cpl' => 27, 'id_cpmk' => 33],

        //     ['id_mk' => 121, 'id_cpl' => 28, 'id_cpmk' => 34],
        //     ['id_mk' => 121, 'id_cpl' => 29, 'id_cpmk' => 35],

        //     ['id_mk' => 122, 'id_cpl' => 30, 'id_cpmk' => 31],
        //     ['id_mk' => 122, 'id_cpl' => 31, 'id_cpmk' => 33],

        //     ['id_mk' => 123, 'id_cpl' => 19, 'id_cpmk' => 35],
        //     ['id_mk' => 123, 'id_cpl' => 20, 'id_cpmk' => 31],

        //     ['id_mk' => 124, 'id_cpl' => 21, 'id_cpmk' => 33],
        //     ['id_mk' => 124, 'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 125, 'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 125, 'id_cpl' => 24, 'id_cpmk' => 34],

        //     ['id_mk' => 126, 'id_cpl' => 25, 'id_cpmk' => 35],
        //     ['id_mk' => 126, 'id_cpl' => 26, 'id_cpmk' => 31],

        //     ['id_mk' => 127, 'id_cpl' => 27, 'id_cpmk' => 33],
        //     ['id_mk' => 127, 'id_cpl' => 28, 'id_cpmk' => 35],

        //     ['id_mk' => 128, 'id_cpl' => 29, 'id_cpmk' => 31],
        //     ['id_mk' => 128, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 129, 'id_cpl' => 31, 'id_cpmk' => 34],
        //     ['id_mk' => 129, 'id_cpl' => 19, 'id_cpmk' => 35],

        //     ['id_mk' => 130, 'id_cpl' => 20, 'id_cpmk' => 31],
        //     ['id_mk' => 130, 'id_cpl' => 21, 'id_cpmk' => 33],

        //    ['id_mk' => 131, 'id_cpl' => 22, 'id_cpmk' => 34],
        //     ['id_mk' => 131, 'id_cpl' => 23, 'id_cpmk' => 35],

        //     ['id_mk' => 132, 'id_cpl' => 24, 'id_cpmk' => 32],
        //     ['id_mk' => 132, 'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 133, 'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 133, 'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 134, 'id_cpl' => 28, 'id_cpmk' => 31],
        //     ['id_mk' => 134, 'id_cpl' => 29, 'id_cpmk' => 33],

        //     ['id_mk' => 135, 'id_cpl' => 30, 'id_cpmk' => 34],
        //     ['id_mk' => 135, 'id_cpl' => 31, 'id_cpmk' => 35],

        //     ['id_mk' => 136, 'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 136, 'id_cpl' => 20, 'id_cpmk' => 33],

        //     ['id_mk' => 137, 'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 137, 'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 138, 'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 138, 'id_cpl' => 24, 'id_cpmk' => 33],

        //     ['id_mk' => 139, 'id_cpl' => 25, 'id_cpmk' => 34],
        //     ['id_mk' => 139, 'id_cpl' => 26, 'id_cpmk' => 35],

        //     ['id_mk' => 140, 'id_cpl' => 27, 'id_cpmk' => 31],
        //     ['id_mk' => 140, 'id_cpl' => 28, 'id_cpmk' => 33],

        //     ['id_mk' => 141, 'id_cpl' => 29, 'id_cpmk' => 34],
        //     ['id_mk' => 141, 'id_cpl' => 30, 'id_cpmk' => 35],

        //     ['id_mk' => 142, 'id_cpl' => 31, 'id_cpmk' => 32],
        //     ['id_mk' => 142, 'id_cpl' => 19, 'id_cpmk' => 33],

        //     ['id_mk' => 143, 'id_cpl' => 20, 'id_cpmk' => 34],
        //     ['id_mk' => 143, 'id_cpl' => 21, 'id_cpmk' => 35],

        //     ['id_mk' => 144, 'id_cpl' => 22, 'id_cpmk' => 31],
        //     ['id_mk' => 144, 'id_cpl' => 23, 'id_cpmk' => 33],

        //     ['id_mk' => 145, 'id_cpl' => 24, 'id_cpmk' => 34],
        //     ['id_mk' => 145, 'id_cpl' => 25, 'id_cpmk' => 35],

        //     ['id_mk' => 146, 'id_cpl' => 26, 'id_cpmk' => 32],
        //     ['id_mk' => 146, 'id_cpl' => 27, 'id_cpmk' => 33],

        //     ['id_mk' => 147, 'id_cpl' => 28, 'id_cpmk' => 34],
        //     ['id_mk' => 147, 'id_cpl' => 29, 'id_cpmk' => 35],

        //     ['id_mk' => 148, 'id_cpl' => 30, 'id_cpmk' => 31],
        //     ['id_mk' => 148, 'id_cpl' => 31, 'id_cpmk' => 33],

        //     ['id_mk' => 149, 'id_cpl' => 19, 'id_cpmk' => 34],
        //     ['id_mk' => 149, 'id_cpl' => 20, 'id_cpmk' => 35],

        //     ['id_mk' => 150, 'id_cpl' => 21, 'id_cpmk' => 32],
        //     ['id_mk' => 150, 'id_cpl' => 22, 'id_cpmk' => 33],

        //     ['id_mk' => 151, 'id_cpl' => 23, 'id_cpmk' => 34],
        //     ['id_mk' => 151, 'id_cpl' => 24, 'id_cpmk' => 35],

        //     ['id_mk' => 152, 'id_cpl' => 25, 'id_cpmk' => 31],
        //     ['id_mk' => 152, 'id_cpl' => 26, 'id_cpmk' => 33],

        //     ['id_mk' => 153, 'id_cpl' => 27, 'id_cpmk' => 34],
        //     ['id_mk' => 153, 'id_cpl' => 28, 'id_cpmk' => 35],

        //     ['id_mk' => 154, 'id_cpl' => 29, 'id_cpmk' => 32],
        //     ['id_mk' => 154, 'id_cpl' => 30, 'id_cpmk' => 33],

        //     ['id_mk' => 155, 'id_cpl' => 31, 'id_cpmk' => 34],
        //     ['id_mk' => 155, 'id_cpl' => 19, 'id_cpmk' => 35],

        //     ['id_mk' => 156, 'id_cpl' => 20, 'id_cpmk' => 31],
        //     ['id_mk' => 156, 'id_cpl' => 21, 'id_cpmk' => 33],

        //     ['id_mk' => 157, 'id_cpl' => 22, 'id_cpmk' => 34],
        //     ['id_mk' => 157, 'id_cpl' => 23, 'id_cpmk' => 35],

        //     ['id_mk' => 158, 'id_cpl' => 24, 'id_cpmk' => 31],
        //     ['id_mk' => 158, 'id_cpl' => 25, 'id_cpmk' => 33],

        //     ['id_mk' => 159, 'id_cpl' => 26, 'id_cpmk' => 34],
        //     ['id_mk' => 159, 'id_cpl' => 27, 'id_cpmk' => 35],

        //     ['id_mk' => 160, 'id_cpl' => 28, 'id_cpmk' => 32],
        //     ['id_mk' => 160, 'id_cpl' => 29, 'id_cpmk' => 33],

        //     ['id_mk' => 161, 'id_cpl' => 30, 'id_cpmk' => 34],
        //     ['id_mk' => 161, 'id_cpl' => 31, 'id_cpmk' => 35],

        //     ['id_mk' => 162, 'id_cpl' => 19, 'id_cpmk' => 31],
        //     ['id_mk' => 162, 'id_cpl' => 20, 'id_cpmk' => 33],

        //     ['id_mk' => 163, 'id_cpl' => 21, 'id_cpmk' => 34],
        //     ['id_mk' => 163, 'id_cpl' => 22, 'id_cpmk' => 35],

        //     ['id_mk' => 164, 'id_cpl' => 23, 'id_cpmk' => 32],
        //     ['id_mk' => 164, 'id_cpl' => 24, 'id_cpmk' => 33],
        // ]);

//         $idCplStart = 23;
//         $idCplEnd = 31;
//         $idCpmkStart = 31;
//         $idCpmkEnd = 35;

//         $idCpl = $idCplStart;
//         $idCpmk = $idCpmkStart;

//         for ($idMk = 92; $idMk <= 164; $idMk++) {
//             for ($i = 0; $i < 4; $i++) {
//                 $data[] = [
//                     'id_mk' => $idMk,
//                     'id_cpl' => $idCpl,
//                     'id_cpmk' => $idCpmk,
//                 ];

//                 // Naikkan CPL dan CPMK setiap baris
//                 $idCpl++;
//                 $idCpmk++;

//                 // Reset kalau sudah lewat batas
//                 if ($idCpl > $idCplEnd) $idCpl = $idCplStart;
//                 if ($idCpmk > $idCpmkEnd) $idCpmk = $idCpmkStart;
//             }
//         }

//         DB::table('mapping_mk_cpl_cpmk')->insert($data);

//     }
// }
