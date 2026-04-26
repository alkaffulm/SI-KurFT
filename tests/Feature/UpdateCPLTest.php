<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

beforeEach(function () {

    $this->withoutMiddleware();

    session([
        'userRoleId' => 1,
        'id_kurikulum_aktif' => 1,
        'bypass_prodi_scope' => true,
        'bypass_kurikulum_scope' => true,
    ]);

    DB::table('program_studi')->insert([
        'id_ps' => 1,
        'nama_prodi' => 'Teknik Sipil'
    ]);

    DB::table('kurikulum')->insert([
        'id_kurikulum' => 1,
        'id_ps' => 1,
        'tahun' => '2024'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 1: Delete + Update
|--------------------------------------------------------------------------
*/

it('delete dan update cpl', function () {

    DB::table('cpl')->insert([
        [
            'id_cpl' => 1,
            'nama_kode_cpl' => 'CPL1',
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'desc_cpl_id' => 'lama',
            'desc_cpl_en' => 'old'
        ],
        [
            'id_cpl' => 2,
            'nama_kode_cpl' => 'CPL2',
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'desc_cpl_id' => 'lama2',
            'desc_cpl_en' => 'old2'
        ]
    ]);

    $this->put('/kaprodi/cpl/update-all', [
        'delete_cpl' => [1],
        'cpl' => [
            2 => [
                'nama_kode_cpl' => 'CPL2',
                'desc_cpl_id' => 'baru',
                'desc_cpl_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseMissing('cpl', [
        'id_cpl' => 1
    ]);

    $this->assertDatabaseHas('cpl', [
        'id_cpl' => 2,
        'desc_cpl_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 2: Delete saja
|--------------------------------------------------------------------------
*/

it('delete saja', function () {

    DB::table('cpl')->insert([
        'id_cpl' => 1,
        'nama_kode_cpl' => 'CPL1',
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'desc_cpl_id' => 'lama',
        'desc_cpl_en' => 'old'
    ]);

    $this->put('/kaprodi/cpl/update-all', [
        'delete_cpl' => [1]
    ]);

    $this->assertDatabaseMissing('cpl', [
        'id_cpl' => 1
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 3: Update saja
|--------------------------------------------------------------------------
*/

it('update saja', function () {

    DB::table('cpl')->insert([
        'id_cpl' => 1,
        'nama_kode_cpl' => 'CPL1',
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'desc_cpl_id' => 'lama',
        'desc_cpl_en' => 'old'
    ]);

    $this->put('/kaprodi/cpl/update-all', [
        'cpl' => [
            1 => [
                'nama_kode_cpl' => 'CPL1',
                'desc_cpl_id' => 'baru',
                'desc_cpl_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseHas('cpl', [
        'id_cpl' => 1,
        'desc_cpl_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 4: Tanpa input
|--------------------------------------------------------------------------
*/

it('tanpa input', function () {

    $response = $this->put('/kaprodi/cpl/update-all', []);

    $response->assertRedirect();
});