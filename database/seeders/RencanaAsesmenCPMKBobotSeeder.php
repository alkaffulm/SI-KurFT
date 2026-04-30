<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class RencanaAsesmenCPMKBobotSeeder extends Seeder
{
    /**
     * Menghasilkan matriks bobot seimbang (Baris=Asesmen, Kolom=CPMK).
     * Total bobot untuk setiap CPMK (kolom) akan dinormalisasi menjadi 100
     * dan dibulatkan menjadi bilangan bulat.
     * Total bobot untuk setiap Rencana Asesmen (baris) tidak wajib 100.
     */
    // private function generateBalancedMatrix(int $rows, int $cols): array
    // {
    //     $matrix = [];
    //     for ($i = 0; $i < $rows; $i++) {
    //         for ($j = 0; $j < $cols; $j++) {
    //             $matrix[$i][$j] = rand(10, 100);
    //         }
    //     }
    //     for ($iter = 0; $iter < 10; $iter++) {
    //         for ($j = 0; $j < $cols; $j++) {
    //             $colSum = array_sum(array_column($matrix, $j));
    //             if ($colSum > 0) {
    //                 foreach ($matrix as $i => $row) {
    //                     $matrix[$i][$j] = ($matrix[$i][$j] / $colSum) * 100;
    //                 }
    //             }
    //         }
    //     }
    //     for ($j = 0; $j < $cols; $j++) {
    //         $currentColSum = 0;
    //         $roundedCol = [];

    //         for ($i = 0; $i < $rows; $i++) {
    //             $roundedVal = round($matrix[$i][$j]);
    //             $roundedCol[$i] = $roundedVal;
    //             $currentColSum += $roundedVal;
    //         }

    //         $diff = 100 - $currentColSum;

    //         if ($diff !== 0) {
    //             $tempCol = [];
    //             foreach ($roundedCol as $i => $val) {
    //                 $tempCol[] = ['index' => $i, 'value' => $val];
    //             }

    //             usort($tempCol, fn($a, $b) => $b['value'] <=> $a['value']);

    //             for ($k = 0; $k < abs($diff); $k++) {
    //                 $indexToAdjust = $tempCol[$k]['index'];
    //                 if ($diff > 0) {
    //                     $roundedCol[$indexToAdjust] += 1;
    //                 } else {
    //                     if ($roundedCol[$indexToAdjust] > 0) {
    //                         $roundedCol[$indexToAdjust] -= 1;
    //                     }
    //                 }
    //             }
    //         }

    //         for ($i = 0; $i < $rows; $i++) {
    //             $matrix[$i][$j] = $roundedCol[$i];
    //         }
    //     }
        
    //     return $matrix;
    // }
    
    // public function run(): void
    // {

    //     DB::table('rencana_asesmen_cpmk_bobot')->truncate();

    //     $mataKuliahList = DB::table('mata_kuliah')->get();
    //     foreach ($mataKuliahList as $mk) {

    //         $cpmkList = DB::table('mk_cpmk_cpl_map')
    //             ->where('id_mk', $mk->id_mk)
    //             ->pluck('id_cpmk')
    //             ->toArray();

    //         $asesmenList = DB::table('rencana_asesmen')
    //             ->where('id_mk', $mk->id_mk)
    //             ->pluck('id_rencana_asesmen')
    //             ->toArray();
            
    //         if (empty($cpmkList) || empty($asesmenList)) {
    //             continue;
    //         }
    //         $matrix = $this->generateBalancedMatrix(count($asesmenList), count($cpmkList));
            
    //         // 🧩 Simpan ke tabel
    //         $dataToInsert = [];
    //         foreach ($matrix as $i => $row) {
    //             foreach ($row as $j => $bobot) {
    //                 $dataToInsert[] = [
    //                     'id_rencana_asesmen' => $asesmenList[$i],
    //                     'id_cpmk' => $cpmkList[$j],
    //                     'bobot' => (int) $bobot, 
    //                 ];
    //             }
    //         }

    //         if (!empty($dataToInsert)) {
    //             DB::table('rencana_asesmen_cpmk_bobot')->insert($dataToInsert);
    //         }
    //     }

    //     $this->command->info('RencanaAsesmenCPMKBobotSeeder selesai: Total bobot CPMK kini tepat 100 dan bilangan bulat.');
    // }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rencana_asesmen_cpmk_bobot')->insert([

            // =========================
            // TAHUN AKADEMIK 1
            // =========================
            // ===== Aljabar Linear (2 CPMK) =====
            ['id_rencana_asesmen'=>1,'id_mk_cpmk_cpl'=>1,'bobot'=>15],
            ['id_rencana_asesmen'=>1,'id_mk_cpmk_cpl'=>2,'bobot'=>15],

            ['id_rencana_asesmen'=>2,'id_mk_cpmk_cpl'=>1,'bobot'=>15],
            ['id_rencana_asesmen'=>2,'id_mk_cpmk_cpl'=>2,'bobot'=>15],

            ['id_rencana_asesmen'=>3,'id_mk_cpmk_cpl'=>1,'bobot'=>20],
            ['id_rencana_asesmen'=>3,'id_mk_cpmk_cpl'=>2,'bobot'=>20],


            // ===== Pemrograman 1 =====
            ['id_rencana_asesmen'=>4,'id_mk_cpmk_cpl'=>3,'bobot'=>15],
            ['id_rencana_asesmen'=>4,'id_mk_cpmk_cpl'=>4,'bobot'=>15],

            ['id_rencana_asesmen'=>5,'id_mk_cpmk_cpl'=>3,'bobot'=>15],
            ['id_rencana_asesmen'=>5,'id_mk_cpmk_cpl'=>4,'bobot'=>15],

            ['id_rencana_asesmen'=>6,'id_mk_cpmk_cpl'=>3,'bobot'=>20],
            ['id_rencana_asesmen'=>6,'id_mk_cpmk_cpl'=>4,'bobot'=>20],


            // ===== Sistem Operasi =====
            ['id_rencana_asesmen'=>7,'id_mk_cpmk_cpl'=>5,'bobot'=>15],
            ['id_rencana_asesmen'=>7,'id_mk_cpmk_cpl'=>6,'bobot'=>15],

            ['id_rencana_asesmen'=>8,'id_mk_cpmk_cpl'=>5,'bobot'=>15],
            ['id_rencana_asesmen'=>8,'id_mk_cpmk_cpl'=>6,'bobot'=>15],

            ['id_rencana_asesmen'=>9,'id_mk_cpmk_cpl'=>5,'bobot'=>20],
            ['id_rencana_asesmen'=>9,'id_mk_cpmk_cpl'=>6,'bobot'=>20],


            // ===== Keamanan Siber (1 CPMK) =====
            ['id_rencana_asesmen'=>10,'id_mk_cpmk_cpl'=>7,'bobot'=>30],
            ['id_rencana_asesmen'=>11,'id_mk_cpmk_cpl'=>7,'bobot'=>30],
            ['id_rencana_asesmen'=>12,'id_mk_cpmk_cpl'=>7,'bobot'=>40],

            // =========================
            // TAHUN AKADEMIK 2
            // =========================
            // ===== MPTI =====
            ['id_rencana_asesmen'=>13,'id_mk_cpmk_cpl'=>8,'bobot'=>15],
            ['id_rencana_asesmen'=>13,'id_mk_cpmk_cpl'=>9,'bobot'=>15],

            ['id_rencana_asesmen'=>14,'id_mk_cpmk_cpl'=>8,'bobot'=>15],
            ['id_rencana_asesmen'=>14,'id_mk_cpmk_cpl'=>9,'bobot'=>15],

            ['id_rencana_asesmen'=>15,'id_mk_cpmk_cpl'=>8,'bobot'=>20],
            ['id_rencana_asesmen'=>15,'id_mk_cpmk_cpl'=>9,'bobot'=>20],


            // ===== Kecerdasan Bisnis =====
            ['id_rencana_asesmen'=>16,'id_mk_cpmk_cpl'=>10,'bobot'=>30],
            ['id_rencana_asesmen'=>17,'id_mk_cpmk_cpl'=>10,'bobot'=>30],
            ['id_rencana_asesmen'=>18,'id_mk_cpmk_cpl'=>10,'bobot'=>40],


            // ===== Web =====
            ['id_rencana_asesmen'=>19,'id_mk_cpmk_cpl'=>11,'bobot'=>15],
            ['id_rencana_asesmen'=>19,'id_mk_cpmk_cpl'=>12,'bobot'=>15],

            ['id_rencana_asesmen'=>20,'id_mk_cpmk_cpl'=>11,'bobot'=>15],
            ['id_rencana_asesmen'=>20,'id_mk_cpmk_cpl'=>12,'bobot'=>15],

            ['id_rencana_asesmen'=>21,'id_mk_cpmk_cpl'=>11,'bobot'=>20],
            ['id_rencana_asesmen'=>21,'id_mk_cpmk_cpl'=>12,'bobot'=>20],


            // ===== Algoritma (3 CPMK) =====
            ['id_rencana_asesmen'=>22,'id_mk_cpmk_cpl'=>13,'bobot'=>10],
            ['id_rencana_asesmen'=>22,'id_mk_cpmk_cpl'=>14,'bobot'=>10],
            ['id_rencana_asesmen'=>22,'id_mk_cpmk_cpl'=>15,'bobot'=>10],

            ['id_rencana_asesmen'=>23,'id_mk_cpmk_cpl'=>13,'bobot'=>10],
            ['id_rencana_asesmen'=>23,'id_mk_cpmk_cpl'=>14,'bobot'=>10],
            ['id_rencana_asesmen'=>23,'id_mk_cpmk_cpl'=>15,'bobot'=>10],

            ['id_rencana_asesmen'=>24,'id_mk_cpmk_cpl'=>13,'bobot'=>13.33],
            ['id_rencana_asesmen'=>24,'id_mk_cpmk_cpl'=>14,'bobot'=>13.33],
            ['id_rencana_asesmen'=>24,'id_mk_cpmk_cpl'=>15,'bobot'=>13.34],
            
            // =========================
            // TAHUN AKADEMIK 3
            // =========================
            // ===== IMK =====
            ['id_rencana_asesmen'=>25,'id_mk_cpmk_cpl'=>16,'bobot'=>15],
            ['id_rencana_asesmen'=>26,'id_mk_cpmk_cpl'=>16,'bobot'=>15],
            ['id_rencana_asesmen'=>27,'id_mk_cpmk_cpl'=>16,'bobot'=>20],
            ['id_rencana_asesmen'=>28,'id_mk_cpmk_cpl'=>16,'bobot'=>25],
            ['id_rencana_asesmen'=>29,'id_mk_cpmk_cpl'=>16,'bobot'=>25],
            // total = 100


            // ===== Inggris =====
            ['id_rencana_asesmen'=>30,'id_mk_cpmk_cpl'=>17,'bobot'=>30],
            ['id_rencana_asesmen'=>31,'id_mk_cpmk_cpl'=>17,'bobot'=>30],
            ['id_rencana_asesmen'=>32,'id_mk_cpmk_cpl'=>17,'bobot'=>40],
            // ===== IMK (MK 50) =====
            // 1 CPMK → full
            // ['id_asesmen_cpmk_bobot' => 1,  'id_rencana_asesmen' => 1,  'id_mk_cpmk_cpl' => 20, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 2,  'id_rencana_asesmen' => 1,  'id_mk_cpmk_cpl' => 21, 'bobot' => 5.0],
            // ['id_asesmen_cpmk_bobot' => 3,  'id_rencana_asesmen' => 2,  'id_mk_cpmk_cpl' => 20, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 4,  'id_rencana_asesmen' => 2,  'id_mk_cpmk_cpl' => 21, 'bobot' => 5.0],
            // ['id_asesmen_cpmk_bobot' => 5,  'id_rencana_asesmen' => 3,  'id_mk_cpmk_cpl' => 20, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 6,  'id_rencana_asesmen' => 3,  'id_mk_cpmk_cpl' => 21, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 7,  'id_rencana_asesmen' => 4,  'id_mk_cpmk_cpl' => 20, 'bobot' => 20.0],
            // ['id_asesmen_cpmk_bobot' => 8,  'id_rencana_asesmen' => 4,  'id_mk_cpmk_cpl' => 21, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 9,  'id_rencana_asesmen' => 5,  'id_mk_cpmk_cpl' => 20, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 10,  'id_rencana_asesmen' => 5,  'id_mk_cpmk_cpl' => 21, 'bobot' => 30.0],

            // =========================
            // TAHUN AKADEMIK 4
            // =========================

            // etprof
            // tugas (id 33)
            ['id_rencana_asesmen'=>33,'id_mk_cpmk_cpl'=>18,'bobot'=>5.0],
            ['id_rencana_asesmen'=>33,'id_mk_cpmk_cpl'=>19,'bobot'=>5.0],

            // uts (id 34)
            ['id_rencana_asesmen'=>34,'id_mk_cpmk_cpl'=>18,'bobot'=>10.0],
            ['id_rencana_asesmen'=>34,'id_mk_cpmk_cpl'=>19,'bobot'=>10.0],

            // uas (id 35)
            ['id_rencana_asesmen'=>35,'id_mk_cpmk_cpl'=>18,'bobot'=>15.0],
            ['id_rencana_asesmen'=>35,'id_mk_cpmk_cpl'=>19,'bobot'=>15.0],

            // basis data
            ['id_rencana_asesmen'=>36,'id_mk_cpmk_cpl'=>20,'bobot'=>5.0],
            ['id_rencana_asesmen'=>36,'id_mk_cpmk_cpl'=>21,'bobot'=>5.0],

            // uts (id 34)
            ['id_rencana_asesmen'=>37,'id_mk_cpmk_cpl'=>20,'bobot'=>10.0],
            ['id_rencana_asesmen'=>37,'id_mk_cpmk_cpl'=>21,'bobot'=>10.0],

            // uas (id 35)
            ['id_rencana_asesmen'=>38,'id_mk_cpmk_cpl'=>20,'bobot'=>15.0],
            ['id_rencana_asesmen'=>38,'id_mk_cpmk_cpl'=>21,'bobot'=>15.0],


            // ===== Jarkomdat =====
            ['id_rencana_asesmen'=>39,'id_mk_cpmk_cpl'=>22,'bobot'=>30],
            ['id_rencana_asesmen'=>40,'id_mk_cpmk_cpl'=>22,'bobot'=>30],
            ['id_rencana_asesmen'=>41,'id_mk_cpmk_cpl'=>22,'bobot'=>40],


            // ===== Sistem Tertanam =====
            ['id_rencana_asesmen'=>42,'id_mk_cpmk_cpl'=>23,'bobot'=>30],
            ['id_rencana_asesmen'=>43,'id_mk_cpmk_cpl'=>23,'bobot'=>30],
            ['id_rencana_asesmen'=>44,'id_mk_cpmk_cpl'=>23,'bobot'=>40],
            

            // untuk Matkul IMK Kurikulum 2020
            // ['id_asesmen_cpmk_bobot' => 1,  'id_rencana_asesmen' => 1,  'id_mk_cpmk_cpl' => 20, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 2,  'id_rencana_asesmen' => 1,  'id_mk_cpmk_cpl' => 21, 'bobot' => 5.0],
            // ['id_asesmen_cpmk_bobot' => 3,  'id_rencana_asesmen' => 2,  'id_mk_cpmk_cpl' => 20, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 4,  'id_rencana_asesmen' => 2,  'id_mk_cpmk_cpl' => 21, 'bobot' => 5.0],
            // ['id_asesmen_cpmk_bobot' => 5,  'id_rencana_asesmen' => 3,  'id_mk_cpmk_cpl' => 20, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 6,  'id_rencana_asesmen' => 3,  'id_mk_cpmk_cpl' => 21, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 7,  'id_rencana_asesmen' => 4,  'id_mk_cpmk_cpl' => 20, 'bobot' => 20.0],
            // ['id_asesmen_cpmk_bobot' => 8,  'id_rencana_asesmen' => 4,  'id_mk_cpmk_cpl' => 21, 'bobot' => 10.0],
            // ['id_asesmen_cpmk_bobot' => 9,  'id_rencana_asesmen' => 5,  'id_mk_cpmk_cpl' => 20, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 10,  'id_rencana_asesmen' => 5,  'id_mk_cpmk_cpl' => 21, 'bobot' => 30.0],

            // ['id_asesmen_cpmk_bobot' => 1,  'id_rencana_asesmen' => 1,  'id_cpmk' => 32, 'bobot' => 2.0],
            // ['id_asesmen_cpmk_bobot' => 2,  'id_rencana_asesmen' => 1,  'id_cpmk' => 33, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 3,  'id_rencana_asesmen' => 1,  'id_cpmk' => 34, 'bobot' => 4.0],
            // ['id_asesmen_cpmk_bobot' => 4,  'id_rencana_asesmen' => 1,  'id_cpmk' => 35, 'bobot' => 5.0],
            // ['id_asesmen_cpmk_bobot' => 5,  'id_rencana_asesmen' => 2,  'id_cpmk' => 32, 'bobot' => 2.0],
            // ['id_asesmen_cpmk_bobot' => 6,  'id_rencana_asesmen' => 2,  'id_cpmk' => 33, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 7,  'id_rencana_asesmen' => 2,  'id_cpmk' => 34, 'bobot' => 4.0],
            // ['id_asesmen_cpmk_bobot' => 8,  'id_rencana_asesmen' => 2,  'id_cpmk' => 35, 'bobot' => 5.0],
            // ['id_asesmen_cpmk_bobot' => 9,  'id_rencana_asesmen' => 3,  'id_cpmk' => 32, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 10, 'id_rencana_asesmen' => 3,  'id_cpmk' => 33, 'bobot' => 4.0],
            // ['id_asesmen_cpmk_bobot' => 11, 'id_rencana_asesmen' => 3,  'id_cpmk' => 34, 'bobot' => 4.0],
            // ['id_asesmen_cpmk_bobot' => 12, 'id_rencana_asesmen' => 3,  'id_cpmk' => 35, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 13, 'id_rencana_asesmen' => 4,  'id_cpmk' => 32, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 14, 'id_rencana_asesmen' => 4,  'id_cpmk' => 33, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 15, 'id_rencana_asesmen' => 4,  'id_cpmk' => 34, 'bobot' => 4.0],
            // ['id_asesmen_cpmk_bobot' => 16, 'id_rencana_asesmen' => 4,  'id_cpmk' => 35, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 17, 'id_rencana_asesmen' => 5,  'id_cpmk' => 32, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 18, 'id_rencana_asesmen' => 5,  'id_cpmk' => 33, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 19, 'id_rencana_asesmen' => 5,  'id_cpmk' => 34, 'bobot' => 4.0],
            // ['id_asesmen_cpmk_bobot' => 20, 'id_rencana_asesmen' => 5,  'id_cpmk' => 35, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 21, 'id_rencana_asesmen' => 6,  'id_cpmk' => 32, 'bobot' => 2.0],
            // ['id_asesmen_cpmk_bobot' => 22, 'id_rencana_asesmen' => 6,  'id_cpmk' => 33, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 23, 'id_rencana_asesmen' => 6,  'id_cpmk' => 34, 'bobot' => 4.0],
            // ['id_asesmen_cpmk_bobot' => 24, 'id_rencana_asesmen' => 6,  'id_cpmk' => 35, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 25, 'id_rencana_asesmen' => 7,  'id_cpmk' => 32, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 26, 'id_rencana_asesmen' => 7,  'id_cpmk' => 33, 'bobot' => 15.0],
            // ['id_asesmen_cpmk_bobot' => 27, 'id_rencana_asesmen' => 7,  'id_cpmk' => 34, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 28, 'id_rencana_asesmen' => 7,  'id_cpmk' => 35, 'bobot' => 20.0],

            // ['id_asesmen_cpmk_bobot' => 29, 'id_rencana_asesmen' => 8,  'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 30, 'id_rencana_asesmen' => 8,  'id_cpmk' => 77, 'bobot' => 5.5],
            // ['id_asesmen_cpmk_bobot' => 31, 'id_rencana_asesmen' => 8,  'id_cpmk' => 78, 'bobot' => 5.5],
            // ['id_asesmen_cpmk_bobot' => 32, 'id_rencana_asesmen' => 8,  'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 33, 'id_rencana_asesmen' => 9,  'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 34, 'id_rencana_asesmen' => 9,  'id_cpmk' => 77, 'bobot' => 20.0],
            // ['id_asesmen_cpmk_bobot' => 35, 'id_rencana_asesmen' => 9,  'id_cpmk' => 78, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 36, 'id_rencana_asesmen' => 9,  'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 37, 'id_rencana_asesmen' => 10, 'id_cpmk' => 77, 'bobot' => 3.5],
            // ['id_asesmen_cpmk_bobot' => 38, 'id_rencana_asesmen' => 10, 'id_cpmk' => 78, 'bobot' => 5.5],
            // ['id_asesmen_cpmk_bobot' => 39, 'id_rencana_asesmen' => 10, 'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 40, 'id_rencana_asesmen' => 11, 'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 41, 'id_rencana_asesmen' => 11, 'id_cpmk' => 77, 'bobot' => 8.0],
            // ['id_asesmen_cpmk_bobot' => 42, 'id_rencana_asesmen' => 11, 'id_cpmk' => 78, 'bobot' => 7.0],
            // ['id_asesmen_cpmk_bobot' => 43, 'id_rencana_asesmen' => 11, 'id_cpmk' => 79, 'bobot' => 8.0],
            // ['id_asesmen_cpmk_bobot' => 44, 'id_rencana_asesmen' => 12, 'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 45, 'id_rencana_asesmen' => 12, 'id_cpmk' => 77, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 46, 'id_rencana_asesmen' => 12, 'id_cpmk' => 78, 'bobot' => 25.0],
            // ['id_asesmen_cpmk_bobot' => 47, 'id_rencana_asesmen' => 12, 'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 48, 'id_rencana_asesmen' => 13, 'id_cpmk' => 32, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 49, 'id_rencana_asesmen' => 13, 'id_cpmk' => 33, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 50, 'id_rencana_asesmen' => 13, 'id_cpmk' => 34, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 51, 'id_rencana_asesmen' => 13, 'id_cpmk' => 35, 'bobot' => 20.0],

            // untuk Matkul IMK Kurikulum 2025
            // ['id_asesmen_cpmk_bobot' => 25, 'id_rencana_asesmen' => 7, 'id_cpmk' => 76, 'bobot' => 8.5],
            // ['id_asesmen_cpmk_bobot' => 26, 'id_rencana_asesmen' => 7, 'id_cpmk' => 77, 'bobot' => 8.5],
            // ['id_asesmen_cpmk_bobot' => 27, 'id_rencana_asesmen' => 7, 'id_cpmk' => 78, 'bobot' => 3.0],
            // ['id_asesmen_cpmk_bobot' => 28, 'id_rencana_asesmen' => 7, 'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 29, 'id_rencana_asesmen' => 8, 'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 30, 'id_rencana_asesmen' => 8, 'id_cpmk' => 77, 'bobot' => 5.5],
            // ['id_asesmen_cpmk_bobot' => 31, 'id_rencana_asesmen' => 8, 'id_cpmk' => 78, 'bobot' => 5.5],
            // ['id_asesmen_cpmk_bobot' => 32, 'id_rencana_asesmen' => 8, 'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 33, 'id_rencana_asesmen' => 9, 'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 34, 'id_rencana_asesmen' => 9, 'id_cpmk' => 77, 'bobot' => 20.0],
            // ['id_asesmen_cpmk_bobot' => 35, 'id_rencana_asesmen' => 9, 'id_cpmk' => 78, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 36, 'id_rencana_asesmen' => 9, 'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 37, 'id_rencana_asesmen' => 10, 'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 38, 'id_rencana_asesmen' => 10, 'id_cpmk' => 77, 'bobot' => 3.5],
            // ['id_asesmen_cpmk_bobot' => 39, 'id_rencana_asesmen' => 10, 'id_cpmk' => 78, 'bobot' => 5.5],
            // ['id_asesmen_cpmk_bobot' => 40, 'id_rencana_asesmen' => 10, 'id_cpmk' => 79, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 41, 'id_rencana_asesmen' => 11, 'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 42, 'id_rencana_asesmen' => 11, 'id_cpmk' => 77, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 43, 'id_rencana_asesmen' => 11, 'id_cpmk' => 78, 'bobot' => 7.0],
            // ['id_asesmen_cpmk_bobot' => 44, 'id_rencana_asesmen' => 11, 'id_cpmk' => 79, 'bobot' => 8.0],
            // ['id_asesmen_cpmk_bobot' => 45, 'id_rencana_asesmen' => 12, 'id_cpmk' => 76, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 46, 'id_rencana_asesmen' => 12, 'id_cpmk' => 77, 'bobot' => 0.0],
            // ['id_asesmen_cpmk_bobot' => 47, 'id_rencana_asesmen' => 12, 'id_cpmk' => 78, 'bobot' => 25.0],
            // ['id_asesmen_cpmk_bobot' => 48, 'id_rencana_asesmen' => 12, 'id_cpmk' => 79, 'bobot' => 0.0],
        ]);
    }
}
