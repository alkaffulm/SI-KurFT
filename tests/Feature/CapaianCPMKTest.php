<?php

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;

// uses(RefreshDatabase::class);

// beforeEach(function () {
//     $this->withoutMiddleware();

//     Auth::shouldReceive('id')->andReturn(1);

//     session([
//         'userRoleId' => 1,
//         'id_kurikulum_aktif' => 1,
//         'bypass_prodi_scope' => true,
//         'bypass_kurikulum_scope' => true,
//     ]);

//     DB::statement('SET FOREIGN_KEY_CHECKS=0');

//     foreach ([
//         'penilaian_mahasiswa',
//         'kelas_mahasiswa',
//         'rencana_asesmen_cpmk_bobot',
//         'rencana_asesmen',
//         'mk_cpmk_cpl_map',
//         'kelas',
//         'mahasiswa',
//         'mata_kuliah',
//         'cpmk',
//         'cpl',
//         'user',
//         'tahun_akademik',
//         'kurikulum',
//         'program_studi',
//     ] as $table) {
//         DB::table($table)->truncate();
//     }

//     DB::statement('SET FOREIGN_KEY_CHECKS=1');

//     DB::table('program_studi')->insert([
//         'id_ps' => 1,
//         'nama_prodi' => 'Teknik Sipil',
//     ]);

//     DB::table('kurikulum')->insert([
//         'id_kurikulum' => 1,
//         'id_ps' => 1,
//         'tahun' => '2024',
//     ]);

//     DB::table('user')->insert([
//         'id_user' => 1,
//         'NIP' => '123456',
//         'username' => 'testuser',
//         'password' => bcrypt('password'),
//         'email' => 'test@example.com',
//         'last_active_kurikulum_id' => 1,
//     ]);

//     DB::table('tahun_akademik')->insert([
//         'id_tahun_akademik' => 1,
//         'tahun_akademik' => '2024/2025',
//     ]);

//     DB::table('mata_kuliah')->insert([
//         'id_mk' => 1,
//         'id_ps' => 1,
//         'id_kurikulum' => 1,
//         'kode_mk' => 'MK1',
//         'nama_matkul_id' => 'Matkul',
//         'nama_matkul_en' => 'Course',
//         'matkul_desc_id' => 'desc',
//         'matkul_desc_en' => 'desc',
//         'sks_teori' => 2,
//         'sks_praktikum' => 1,
//     ]);

//     DB::table('kelas')->insert([
//         'id_kelas' => 1,
//         'id_user' => 1,
//         'id_mk' => 1,
//         'id_kurikulum' => 1,
//         'id_tahun_akademik' => 1,
//         'paralel_ke' => 1,
//         'jumlah_mhs' => '1',
//     ]);

//     DB::table('mahasiswa')->insert([
//         'id_mhs' => 1,
//         'id_ps' => 1,
//         'id_kurikulum' => 1,
//         'nim' => '123',
//         'nama_lengkap' => 'Budi',
//         'angkatan' => 2020,
//     ]);

//     DB::table('kelas_mahasiswa')->insert([
//         'id_kelas' => 1,
//         'nim' => '123',
//     ]);

//     DB::table('cpl')->insert([
//         'id_cpl' => 1,
//         'id_ps' => 1,
//         'id_kurikulum' => 1,
//         'nama_kode_cpl' => 'CPL1',
//         'desc_cpl_id' => 'desc',
//         'desc_cpl_en' => 'desc',
//     ]);

//     DB::table('cpmk')->insert([
//         [
//             'id_cpmk' => 10,
//             'id_ps' => 1,
//             'id_kurikulum' => 1,
//             'nama_kode_cpmk' => 'CPMK1',
//             'desc_cpmk_id' => 'desc',
//             'desc_cpmk_en' => 'desc',
//         ],
//         [
//             'id_cpmk' => 11,
//             'id_ps' => 1,
//             'id_kurikulum' => 1,
//             'nama_kode_cpmk' => 'CPMK2',
//             'desc_cpmk_id' => 'desc',
//             'desc_cpmk_en' => 'desc',
//         ]
//     ]);

//     DB::table('mk_cpmk_cpl_map')->insert([
//         ['id_mk_cpmk_cpl' => 1, 'id_cpmk' => 10, 'id_mk' => 1, 'id_cpl'=>1],
//         ['id_mk_cpmk_cpl' => 2, 'id_cpmk' => 11, 'id_mk' => 1, 'id_cpl'=>1],
//     ]);

//     DB::table('rencana_asesmen')->insert([
//         [
//             'id_rencana_asesmen' => 1,
//             'id_ps' => 1,
//             'id_kurikulum' => 1,
//             'id_mk' => 1,
//             'tipe_komponen' => 'tugas',
//             'nomor_komponen' => 1,
//         ],
//         [
//             'id_rencana_asesmen' => 2,
//             'id_ps' => 1,
//             'id_kurikulum' => 1,
//             'id_mk' => 1,
//             'tipe_komponen' => 'tugas',
//             'nomor_komponen' => 1,
//         ],
//     ]);

//     DB::table('rencana_asesmen_cpmk_bobot')->insert([
//         ['id_rencana_asesmen' => 1, 'id_mk_cpmk_cpl' => 1, 'bobot' => 40],
//         ['id_rencana_asesmen' => 1, 'id_mk_cpmk_cpl' => 2, 'bobot' => 60],
//         ['id_rencana_asesmen' => 2, 'id_mk_cpmk_cpl' => 1, 'bobot' => 100],
//     ]);
// });

// it('menghitung total bobot per asesmen', function () {

//     $group = \App\Models\RencanaAsesmenCPMKBobotModel::get()
//         ->groupBy('id_rencana_asesmen');

//     $total = [];

//     foreach ($group as $id => $rows) {
//         $total[$id] = (float) $rows->sum('bobot');
//     }

//     expect($total[1])->toBe(100.0);
//     expect($total[2])->toBe(100.0);
// });

// it('menghitung nilai bobot', function () {

//     $nilai = 80;
//     $totalBobot = 100;

//     $factor = $totalBobot / 100;

//     $hasil = $nilai * $factor;

//     expect($hasil)->toBe(80);
// });

// it('group CPMK berdasarkan asesmen', function () {

//     $group = \App\Models\RencanaAsesmenCPMKBobotModel::get()
//         ->groupBy('id_rencana_asesmen');

//     expect($group[1])->toHaveCount(2);
//     expect($group[2])->toHaveCount(1);
// });

// it('menghitung rata rata nilai', function () {

//     $nilai = [80, 60, 100];

//     $avg = round(array_sum($nilai) / count($nilai), 2);

//     expect($avg)->toBe(80.0);
// });

// it('menghitung max CPMK', function () {

//     $rows = \App\Models\RencanaAsesmenCPMKBobotModel::with('mkCpmkMap')->get();

//     $max = [];

//     foreach ($rows as $row) {
//         $id = $row->mkCpmkMap->id_cpmk ?? null;
//         if (!$id) continue;

//         $max[$id] = ($max[$id] ?? 0) + (float) $row->bobot;
//     }

//     expect($max[10])->toBe(140.0);
//     expect($max[11])->toBe(60.0);
// });

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\RencanaAsesmenCPMKBobotModel;

uses(RefreshDatabase::class);

/*
|--------------------------------------------------------------------------
| HELPER (simulate system-level calculation)
|--------------------------------------------------------------------------
*/
function calculateBobot($nilai, $totalBobot)
{
    return $nilai * ($totalBobot / 100);
}

function calculateAverage($nilai)
{
    return round(array_sum($nilai) / count($nilai), 2);
}

function calculateMaxCPMK($rows)
{
    $max = [];

    foreach ($rows as $row) {
        $id = $row->mkCpmkMap->id_cpmk ?? null;
        if (!$id) continue;

        $max[$id] = ($max[$id] ?? 0) + (float) $row->bobot;
    }

    return $max;
}

/*
|--------------------------------------------------------------------------
| SETUP
|--------------------------------------------------------------------------
*/
beforeEach(function () {

    $this->withoutMiddleware();

    Auth::shouldReceive('id')->andReturn(1);

    session([
        'userRoleId' => 1,
        'id_kurikulum_aktif' => 1,
        'bypass_prodi_scope' => true,
        'bypass_kurikulum_scope' => true,
    ]);

    DB::statement('SET FOREIGN_KEY_CHECKS=0');

    foreach ([
        'rencana_asesmen_cpmk_bobot',
        'rencana_asesmen',
        'mk_cpmk_cpl_map',
        'cpmk',
        'cpl',
        'mata_kuliah',
        'program_studi',
    ] as $table) {
        DB::table($table)->truncate();
    }

    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    DB::table('program_studi')->insert([
        'id_ps' => 1,
        'nama_prodi' => 'Teknik Sipil',
    ]);

    DB::table('mata_kuliah')->insert([
        'id_mk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
    ]);

    DB::table('cpl')->insert([
        'id_cpl' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
    ]);

    DB::table('cpmk')->insert([
        ['id_cpmk' => 10, 'id_ps' => 1, 'id_kurikulum' => 1],
        ['id_cpmk' => 11, 'id_ps' => 1, 'id_kurikulum' => 1]
    ]);

    DB::table('mk_cpmk_cpl_map')->insert([
        ['id_mk_cpmk_cpl' => 1, 'id_cpmk' => 10, 'id_mk' => 1, 'id_cpl'=>1],
        ['id_mk_cpmk_cpl' => 2, 'id_cpmk' => 11, 'id_mk' => 1, 'id_cpl'=>1],
    ]);

    DB::table('rencana_asesmen')->insert([
        ['id_rencana_asesmen' => 1, 'id_mk' => 1],
        ['id_rencana_asesmen' => 2, 'id_mk' => 1],
    ]);

    DB::table('rencana_asesmen_cpmk_bobot')->insert([
        ['id_rencana_asesmen' => 1, 'id_mk_cpmk_cpl' => 1, 'bobot' => 40],
        ['id_rencana_asesmen' => 1, 'id_mk_cpmk_cpl' => 2, 'bobot' => 60],
        ['id_rencana_asesmen' => 2, 'id_mk_cpmk_cpl' => 1, 'bobot' => 100],
    ]);
});

/*
|--------------------------------------------------------------------------
| WHITEBOX TESTS (IMPROVED)
|--------------------------------------------------------------------------
*/

it('menghitung total bobot per asesmen (system data)', function () {

    $group = RencanaAsesmenCPMKBobotModel::get()
        ->groupBy('id_rencana_asesmen');

    $total = [];

    foreach ($group as $id => $rows) {
        $total[$id] = (float) $rows->sum('bobot');
    }

    expect($total[1])->toBe(100.0);
    expect($total[2])->toBe(100.0);
});

it('menghitung nilai bobot (via function)', function () {

    $result = calculateBobot(80, 100);

    expect($result)->toBe(80);
});

it('group CPMK berdasarkan asesmen (system query)', function () {

    $group = RencanaAsesmenCPMKBobotModel::get()
        ->groupBy('id_rencana_asesmen');

    expect($group[1])->toHaveCount(2);
    expect($group[2])->toHaveCount(1);
});

it('menghitung rata rata nilai (via function)', function () {

    $result = calculateAverage([80, 60, 100]);

    expect($result)->toBe(80.0);
});

it('menghitung max CPMK (system aggregation)', function () {

    $rows = RencanaAsesmenCPMKBobotModel::with('mkCpmkMap')->get();

    $max = calculateMaxCPMK($rows);

    expect($max[10])->toBe(140.0);
    expect($max[11])->toBe(60.0);
});
