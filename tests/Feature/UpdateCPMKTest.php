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

it('delete dan update cpmk', function () {

    DB::table('cpmk')->insert([
        [
            'id_cpmk' => 1,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'nama_kode_cpmk' => 'CPMK1',
            'desc_cpmk_id' => 'lama',
            'desc_cpmk_en' => 'old'
        ],
        [
            'id_cpmk' => 2,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'nama_kode_cpmk' => 'CPMK2',
            'desc_cpmk_id' => 'lama2',
            'desc_cpmk_en' => 'old2'
        ]
    ]);

    $this->put('/kaprodi/cpmk/update-all', [
        'delete_ids' => [1],
        'cpmk' => [
            2 => [
                'nama_kode_cpmk' => 'CPMK2',
                'desc_cpmk_id' => 'baru',
                'desc_cpmk_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseMissing('cpmk', [
        'id_cpmk' => 1
    ]);

    $this->assertDatabaseHas('cpmk', [
        'id_cpmk' => 2,
        'desc_cpmk_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 2: Delete saja
|--------------------------------------------------------------------------
*/

it('delete saja cpmk', function () {

    DB::table('cpmk')->insert([
        'id_cpmk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpmk' => 'CPMK1',
        'desc_cpmk_id' => 'lama',
        'desc_cpmk_en' => 'old'
    ]);

    $this->put('/kaprodi/cpmk/update-all', [
        'delete_ids' => [1]
    ]);

    $this->assertDatabaseMissing('cpmk', [
        'id_cpmk' => 1
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 3: Update saja
|--------------------------------------------------------------------------
*/

it('update saja cpmk', function () {

    DB::table('cpmk')->insert([
        'id_cpmk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpmk' => 'CPMK1',
        'desc_cpmk_id' => 'lama',
        'desc_cpmk_en' => 'old'
    ]);

    $this->put('/kaprodi/cpmk/update-all', [
        'cpmk' => [
            1 => [
                'nama_kode_cpmk' => 'CPMK1',
                'desc_cpmk_id' => 'baru',
                'desc_cpmk_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseHas('cpmk', [
        'id_cpmk' => 1,
        'desc_cpmk_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 4: Tanpa input
|--------------------------------------------------------------------------
*/

it('tanpa input cpmk', function () {

    $response = $this->put('/kaprodi/cpmk/update-all', []);

    $response->assertRedirect();
});