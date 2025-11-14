<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BobotMKUntukCPLSeeder extends Seeder
{
 public function run()
    {
        $relationsData = [
            ['id_mk' => 31, 'id_cpl' => 19], ['id_mk' => 31, 'id_cpl' => 20], ['id_mk' => 31, 'id_cpl' => 21], ['id_mk' => 31, 'id_cpl' => 22],
            ['id_mk' => 32, 'id_cpl' => 19], ['id_mk' => 32, 'id_cpl' => 20], ['id_mk' => 32, 'id_cpl' => 21], ['id_mk' => 32, 'id_cpl' => 22],
            ['id_mk' => 33, 'id_cpl' => 19], ['id_mk' => 33, 'id_cpl' => 20], ['id_mk' => 33, 'id_cpl' => 21], ['id_mk' => 33, 'id_cpl' => 22],
            ['id_mk' => 34, 'id_cpl' => 19], ['id_mk' => 34, 'id_cpl' => 20], ['id_mk' => 34, 'id_cpl' => 21], ['id_mk' => 34, 'id_cpl' => 22],
            ['id_mk' => 35, 'id_cpl' => 19], ['id_mk' => 35, 'id_cpl' => 20], ['id_mk' => 35, 'id_cpl' => 21], ['id_mk' => 35, 'id_cpl' => 22],
            ['id_mk' => 36, 'id_cpl' => 19], ['id_mk' => 36, 'id_cpl' => 20], ['id_mk' => 36, 'id_cpl' => 21], ['id_mk' => 36, 'id_cpl' => 22],
            
            ['id_mk' => 92, 'id_cpl' => 23], ['id_mk' => 92, 'id_cpl' => 24], ['id_mk' => 92, 'id_cpl' => 25], ['id_mk' => 92, 'id_cpl' => 26],
            ['id_mk' => 93, 'id_cpl' => 27], ['id_mk' => 93, 'id_cpl' => 28], ['id_mk' => 93, 'id_cpl' => 29], ['id_mk' => 93, 'id_cpl' => 30],
            ['id_mk' => 94, 'id_cpl' => 31], ['id_mk' => 94, 'id_cpl' => 23], ['id_mk' => 94, 'id_cpl' => 24], ['id_mk' => 94, 'id_cpl' => 25],
            ['id_mk' => 95, 'id_cpl' => 26], ['id_mk' => 95, 'id_cpl' => 27], ['id_mk' => 95, 'id_cpl' => 28], ['id_mk' => 95, 'id_cpl' => 29],
            ['id_mk' => 96, 'id_cpl' => 30], ['id_mk' => 96, 'id_cpl' => 31], ['id_mk' => 96, 'id_cpl' => 23], ['id_mk' => 96, 'id_cpl' => 24],
            ['id_mk' => 97, 'id_cpl' => 25], ['id_mk' => 97, 'id_cpl' => 26], ['id_mk' => 97, 'id_cpl' => 27], ['id_mk' => 97, 'id_cpl' => 28],
            ['id_mk' => 98, 'id_cpl' => 29], ['id_mk' => 98, 'id_cpl' => 30], ['id_mk' => 98, 'id_cpl' => 31], ['id_mk' => 98, 'id_cpl' => 23],
            ['id_mk' => 99, 'id_cpl' => 24], ['id_mk' => 99, 'id_cpl' => 25], ['id_mk' => 99, 'id_cpl' => 26], ['id_mk' => 99, 'id_cpl' => 27],
            ['id_mk' => 100, 'id_cpl' => 28], ['id_mk' => 100, 'id_cpl' => 29], ['id_mk' => 100, 'id_cpl' => 30], ['id_mk' => 100, 'id_cpl' => 31],
            ['id_mk' => 101, 'id_cpl' => 23], ['id_mk' => 101, 'id_cpl' => 24], ['id_mk' => 101, 'id_cpl' => 25], ['id_mk' => 101, 'id_cpl' => 26],
            ['id_mk' => 102, 'id_cpl' => 27], ['id_mk' => 102, 'id_cpl' => 28], ['id_mk' => 102, 'id_cpl' => 29], ['id_mk' => 102, 'id_cpl' => 30],
            ['id_mk' => 103, 'id_cpl' => 31], ['id_mk' => 103, 'id_cpl' => 23], ['id_mk' => 103, 'id_cpl' => 24], ['id_mk' => 103, 'id_cpl' => 25],
            ['id_mk' => 104, 'id_cpl' => 26], ['id_mk' => 104, 'id_cpl' => 27], ['id_mk' => 104, 'id_cpl' => 28], ['id_mk' => 104, 'id_cpl' => 29],
            ['id_mk' => 105, 'id_cpl' => 30], ['id_mk' => 105, 'id_cpl' => 31], ['id_mk' => 105, 'id_cpl' => 23], ['id_mk' => 105, 'id_cpl' => 24],
            ['id_mk' => 106, 'id_cpl' => 25], ['id_mk' => 106, 'id_cpl' => 26], ['id_mk' => 106, 'id_cpl' => 27], ['id_mk' => 106, 'id_cpl' => 28],
            ['id_mk' => 107, 'id_cpl' => 29], ['id_mk' => 107, 'id_cpl' => 30], ['id_mk' => 107, 'id_cpl' => 31], ['id_mk' => 107, 'id_cpl' => 23],
            ['id_mk' => 108, 'id_cpl' => 24], ['id_mk' => 108, 'id_cpl' => 25], ['id_mk' => 108, 'id_cpl' => 26], ['id_mk' => 108, 'id_cpl' => 27],
            ['id_mk' => 109, 'id_cpl' => 28], ['id_mk' => 109, 'id_cpl' => 29], ['id_mk' => 109, 'id_cpl' => 30], ['id_mk' => 109, 'id_cpl' => 31],
            ['id_mk' => 110, 'id_cpl' => 23], ['id_mk' => 110, 'id_cpl' => 24], ['id_mk' => 110, 'id_cpl' => 25], ['id_mk' => 110, 'id_cpl' => 26],
            ['id_mk' => 111, 'id_cpl' => 27], ['id_mk' => 111, 'id_cpl' => 28], ['id_mk' => 111, 'id_cpl' => 29], ['id_mk' => 111, 'id_cpl' => 30],
            ['id_mk' => 112, 'id_cpl' => 31], ['id_mk' => 112, 'id_cpl' => 23], ['id_mk' => 112, 'id_cpl' => 24], ['id_mk' => 112, 'id_cpl' => 25],
            ['id_mk' => 113, 'id_cpl' => 26], ['id_mk' => 113, 'id_cpl' => 27], ['id_mk' => 113, 'id_cpl' => 28], ['id_mk' => 113, 'id_cpl' => 29],
            ['id_mk' => 114, 'id_cpl' => 30], ['id_mk' => 114, 'id_cpl' => 31], ['id_mk' => 114, 'id_cpl' => 23], ['id_mk' => 114, 'id_cpl' => 24],
            ['id_mk' => 115, 'id_cpl' => 25], ['id_mk' => 115, 'id_cpl' => 26], ['id_mk' => 115, 'id_cpl' => 27], ['id_mk' => 115, 'id_cpl' => 28],
            ['id_mk' => 116, 'id_cpl' => 29], ['id_mk' => 116, 'id_cpl' => 30], ['id_mk' => 116, 'id_cpl' => 31], ['id_mk' => 116, 'id_cpl' => 23],
            
            ['id_mk' => 117, 'id_cpl' => 24], ['id_mk' => 117, 'id_cpl' => 25], ['id_mk' => 117, 'id_cpl' => 26], ['id_mk' => 117, 'id_cpl' => 27],
            ['id_mk' => 118, 'id_cpl' => 28], ['id_mk' => 118, 'id_cpl' => 29], ['id_mk' => 118, 'id_cpl' => 30], ['id_mk' => 118, 'id_cpl' => 31],
            ['id_mk' => 119, 'id_cpl' => 23], ['id_mk' => 119, 'id_cpl' => 24], ['id_mk' => 119, 'id_cpl' => 25], ['id_mk' => 119, 'id_cpl' => 26],
            ['id_mk' => 120, 'id_cpl' => 27], ['id_mk' => 120, 'id_cpl' => 28], ['id_mk' => 120, 'id_cpl' => 29], ['id_mk' => 120, 'id_cpl' => 30],
            ['id_mk' => 121, 'id_cpl' => 31], ['id_mk' => 121, 'id_cpl' => 23], ['id_mk' => 121, 'id_cpl' => 24], ['id_mk' => 121, 'id_cpl' => 25],
            ['id_mk' => 122, 'id_cpl' => 26], ['id_mk' => 122, 'id_cpl' => 27], ['id_mk' => 122, 'id_cpl' => 28], ['id_mk' => 122, 'id_cpl' => 29],
            ['id_mk' => 123, 'id_cpl' => 30], ['id_mk' => 123, 'id_cpl' => 31], ['id_mk' => 123, 'id_cpl' => 23], ['id_mk' => 123, 'id_cpl' => 24],
            ['id_mk' => 124, 'id_cpl' => 25], ['id_mk' => 124, 'id_cpl' => 26], ['id_mk' => 124, 'id_cpl' => 27], ['id_mk' => 124, 'id_cpl' => 28],
            ['id_mk' => 125, 'id_cpl' => 29], ['id_mk' => 125, 'id_cpl' => 30], ['id_mk' => 125, 'id_cpl' => 31], ['id_mk' => 125, 'id_cpl' => 23],
            ['id_mk' => 126, 'id_cpl' => 24], ['id_mk' => 126, 'id_cpl' => 25], ['id_mk' => 126, 'id_cpl' => 26], ['id_mk' => 126, 'id_cpl' => 27],
            ['id_mk' => 127, 'id_cpl' => 28], ['id_mk' => 127, 'id_cpl' => 29], ['id_mk' => 127, 'id_cpl' => 30], ['id_mk' => 127, 'id_cpl' => 31],
            ['id_mk' => 128, 'id_cpl' => 23], ['id_mk' => 128, 'id_cpl' => 24], ['id_mk' => 128, 'id_cpl' => 25], ['id_mk' => 128, 'id_cpl' => 26],
            ['id_mk' => 129, 'id_cpl' => 27], ['id_mk' => 129, 'id_cpl' => 28], ['id_mk' => 129, 'id_cpl' => 29], ['id_mk' => 129, 'id_cpl' => 30],
            ['id_mk' => 130, 'id_cpl' => 31], ['id_mk' => 130, 'id_cpl' => 23], ['id_mk' => 130, 'id_cpl' => 24], ['id_mk' => 130, 'id_cpl' => 25],
            ['id_mk' => 131, 'id_cpl' => 26], ['id_mk' => 131, 'id_cpl' => 27], ['id_mk' => 131, 'id_cpl' => 28], ['id_mk' => 131, 'id_cpl' => 29],
            ['id_mk' => 132, 'id_cpl' => 30], ['id_mk' => 132, 'id_cpl' => 31], ['id_mk' => 132, 'id_cpl' => 23], ['id_mk' => 132, 'id_cpl' => 24],
            ['id_mk' => 133, 'id_cpl' => 25], ['id_mk' => 133, 'id_cpl' => 26], ['id_mk' => 133, 'id_cpl' => 27], ['id_mk' => 133, 'id_cpl' => 28],
            ['id_mk' => 134, 'id_cpl' => 29], ['id_mk' => 134, 'id_cpl' => 30], ['id_mk' => 134, 'id_cpl' => 31], ['id_mk' => 134, 'id_cpl' => 23],
            ['id_mk' => 135, 'id_cpl' => 24], ['id_mk' => 135, 'id_cpl' => 25], ['id_mk' => 135, 'id_cpl' => 26], ['id_mk' => 135, 'id_cpl' => 27],
            ['id_mk' => 136, 'id_cpl' => 28], ['id_mk' => 136, 'id_cpl' => 29], ['id_mk' => 136, 'id_cpl' => 30], ['id_mk' => 136, 'id_cpl' => 31],
            ['id_mk' => 137, 'id_cpl' => 23], ['id_mk' => 137, 'id_cpl' => 24], ['id_mk' => 137, 'id_cpl' => 25], ['id_mk' => 137, 'id_cpl' => 26],
            ['id_mk' => 138, 'id_cpl' => 27], ['id_mk' => 138, 'id_cpl' => 28], ['id_mk' => 138, 'id_cpl' => 29], ['id_mk' => 138, 'id_cpl' => 30],
            ['id_mk' => 139, 'id_cpl' => 31], ['id_mk' => 139, 'id_cpl' => 23], ['id_mk' => 139, 'id_cpl' => 24], ['id_mk' => 139, 'id_cpl' => 25],
            ['id_mk' => 140, 'id_cpl' => 26], ['id_mk' => 140, 'id_cpl' => 27], ['id_mk' => 140, 'id_cpl' => 28], ['id_mk' => 140, 'id_cpl' => 29],
            ['id_mk' => 141, 'id_cpl' => 30], ['id_mk' => 141, 'id_cpl' => 31], ['id_mk' => 141, 'id_cpl' => 23], ['id_mk' => 141, 'id_cpl' => 24],
            ['id_mk' => 142, 'id_cpl' => 25], ['id_mk' => 142, 'id_cpl' => 26], ['id_mk' => 142, 'id_cpl' => 27], ['id_mk' => 142, 'id_cpl' => 28],
            ['id_mk' => 143, 'id_cpl' => 29], ['id_mk' => 143, 'id_cpl' => 30], ['id_mk' => 143, 'id_cpl' => 31], ['id_mk' => 143, 'id_cpl' => 23],
            ['id_mk' => 144, 'id_cpl' => 24], ['id_mk' => 144, 'id_cpl' => 25], ['id_mk' => 144, 'id_cpl' => 26], ['id_mk' => 144, 'id_cpl' => 27],
            ['id_mk' => 145, 'id_cpl' => 28], ['id_mk' => 145, 'id_cpl' => 29], ['id_mk' => 145, 'id_cpl' => 30], ['id_mk' => 145, 'id_cpl' => 31],
            ['id_mk' => 146, 'id_cpl' => 23], ['id_mk' => 146, 'id_cpl' => 24], ['id_mk' => 146, 'id_cpl' => 25], ['id_mk' => 146, 'id_cpl' => 26],
            ['id_mk' => 147, 'id_cpl' => 27], ['id_mk' => 147, 'id_cpl' => 28], ['id_mk' => 147, 'id_cpl' => 29], ['id_mk' => 147, 'id_cpl' => 30],
            ['id_mk' => 148, 'id_cpl' => 31], ['id_mk' => 148, 'id_cpl' => 23], ['id_mk' => 148, 'id_cpl' => 24], ['id_mk' => 148, 'id_cpl' => 25],
            ['id_mk' => 149, 'id_cpl' => 26], ['id_mk' => 149, 'id_cpl' => 27], ['id_mk' => 149, 'id_cpl' => 28], ['id_mk' => 149, 'id_cpl' => 29],
            ['id_mk' => 150, 'id_cpl' => 30], ['id_mk' => 150, 'id_cpl' => 31], ['id_mk' => 150, 'id_cpl' => 23], ['id_mk' => 150, 'id_cpl' => 24],
            ['id_mk' => 151, 'id_cpl' => 25], ['id_mk' => 151, 'id_cpl' => 26], ['id_mk' => 151, 'id_cpl' => 27], ['id_mk' => 151, 'id_cpl' => 28],
            ['id_mk' => 152, 'id_cpl' => 29], ['id_mk' => 152, 'id_cpl' => 30], ['id_mk' => 152, 'id_cpl' => 31], ['id_mk' => 152, 'id_cpl' => 23],
            ['id_mk' => 153, 'id_cpl' => 24], ['id_mk' => 153, 'id_cpl' => 25], ['id_mk' => 153, 'id_cpl' => 26], ['id_mk' => 153, 'id_cpl' => 27],
            ['id_mk' => 154, 'id_cpl' => 28], ['id_mk' => 154, 'id_cpl' => 29], ['id_mk' => 154, 'id_cpl' => 30], ['id_mk' => 154, 'id_cpl' => 31],
            ['id_mk' => 155, 'id_cpl' => 23], ['id_mk' => 155, 'id_cpl' => 24], ['id_mk' => 155, 'id_cpl' => 25], ['id_mk' => 155, 'id_cpl' => 26],
            ['id_mk' => 156, 'id_cpl' => 27], ['id_mk' => 156, 'id_cpl' => 28], ['id_mk' => 156, 'id_cpl' => 29], ['id_mk' => 156, 'id_cpl' => 30],
            ['id_mk' => 157, 'id_cpl' => 31], ['id_mk' => 157, 'id_cpl' => 23], ['id_mk' => 157, 'id_cpl' => 24], ['id_mk' => 157, 'id_cpl' => 25],
            ['id_mk' => 158, 'id_cpl' => 26], ['id_mk' => 158, 'id_cpl' => 27], ['id_mk' => 158, 'id_cpl' => 28], ['id_mk' => 158, 'id_cpl' => 29],
            ['id_mk' => 159, 'id_cpl' => 30], ['id_mk' => 159, 'id_cpl' => 31], ['id_mk' => 159, 'id_cpl' => 23], ['id_mk' => 159, 'id_cpl' => 24],
            ['id_mk' => 160, 'id_cpl' => 25], ['id_mk' => 160, 'id_cpl' => 26], ['id_mk' => 160, 'id_cpl' => 27], ['id_mk' => 160, 'id_cpl' => 28],
            ['id_mk' => 161, 'id_cpl' => 29], ['id_mk' => 161, 'id_cpl' => 30], ['id_mk' => 161, 'id_cpl' => 31], ['id_mk' => 161, 'id_cpl' => 23],
            ['id_mk' => 162, 'id_cpl' => 24], ['id_mk' => 162, 'id_cpl' => 25], ['id_mk' => 162, 'id_cpl' => 26], ['id_mk' => 162, 'id_cpl' => 27],
            ['id_mk' => 163, 'id_cpl' => 28], ['id_mk' => 163, 'id_cpl' => 29], ['id_mk' => 163, 'id_cpl' => 30], ['id_mk' => 163, 'id_cpl' => 31],
            ['id_mk' => 164, 'id_cpl' => 23], ['id_mk' => 164, 'id_cpl' => 24], ['id_mk' => 164, 'id_cpl' => 25], ['id_mk' => 164, 'id_cpl' => 26],
        ];

        $relevantCplRange = range(19, 31);
        $filteredRelations = array_filter($relationsData, function($rel) use ($relevantCplRange) {
            return in_array($rel['id_cpl'], $relevantCplRange);
        });

        $groupedRelations = [];
        foreach ($filteredRelations as $rel) {
            $cplId = $rel['id_cpl'];
            if (!isset($groupedRelations[$cplId])) {
                $groupedRelations[$cplId] = [];
            }
            $groupedRelations[$cplId][] = $rel['id_mk'];
        }

        $dataToInsert = [];
        $id_bobot_mk_cpl = 1;

        foreach ($groupedRelations as $cplId => $mkIds) {
            $count = count($mkIds);

            $baseWeight = floor(100 / $count);

            $remainder = 100 - ($baseWeight * $count);

            for ($i = 0; $i < $count; $i++) {
                $bobot = (int)$baseWeight;

                if ($i < $remainder) {
                    $bobot += 1;
                }

                $dataToInsert[] = [
                    'id_mk' => $mkIds[$i],
                    'id_cpl' => $cplId,
                    'bobot_persen' => $bobot,
                ];
            }
        }

        DB::table('bobot_mk_untuk_cpl')->insert($dataToInsert);
    }
}
