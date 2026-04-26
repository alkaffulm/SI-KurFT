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

    DB::table('cpmk')->insert([
        'id_cpmk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpmk' => 'CPMK1',
        'desc_cpmk_id' => 'desc',
        'desc_cpmk_en' => 'desc'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 1
|--------------------------------------------------------------------------
*/

it('delete dan update sub cpmk', function () {

    DB::table('sub_cpmk')->insert([
        [
            'id_sub_cpmk' => 1,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'id_cpmk' => 1,
            'nama_kode_sub_cpmk' => 'SUB1',
            'desc_sub_cpmk_id' => 'lama',
            'desc_sub_cpmk_en' => 'old'
        ],
        [
            'id_sub_cpmk' => 2,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'id_cpmk' => 1,
            'nama_kode_sub_cpmk' => 'SUB2',
            'desc_sub_cpmk_id' => 'lama2',
            'desc_sub_cpmk_en' => 'old2'
        ]
    ]);

    $this->put('/kaprodi/sub-cpmk/update-all', [
        'delete_ids' => [1],
        'subCpmk' => [
            2 => [
                'id_cpmk' => 1,
                'nama_kode_sub_cpmk' => 'SUB2',
                'desc_sub_cpmk_id' => 'baru',
                'desc_sub_cpmk_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseMissing('sub_cpmk', [
        'id_sub_cpmk' => 1
    ]);

    $this->assertDatabaseHas('sub_cpmk', [
        'id_sub_cpmk' => 2,
        'desc_sub_cpmk_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 2
|--------------------------------------------------------------------------
*/

it('delete saja sub cpmk', function () {

    DB::table('sub_cpmk')->insert([
        'id_sub_cpmk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'id_cpmk' => 1,
        'nama_kode_sub_cpmk' => 'SUB1',
        'desc_sub_cpmk_id' => 'lama',
        'desc_sub_cpmk_en' => 'old'
    ]);

    $this->put('/kaprodi/sub-cpmk/update-all', [
        'delete_ids' => [1]
    ]);

    $this->assertDatabaseMissing('sub_cpmk', [
        'id_sub_cpmk' => 1
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 3
|--------------------------------------------------------------------------
*/

it('update saja sub cpmk', function () {

    DB::table('sub_cpmk')->insert([
        'id_sub_cpmk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'id_cpmk' => 1,
        'nama_kode_sub_cpmk' => 'SUB1',
        'desc_sub_cpmk_id' => 'lama',
        'desc_sub_cpmk_en' => 'old'
    ]);

    $this->put('/kaprodi/sub-cpmk/update-all', [
        'subCpmk' => [
            1 => [
                'id_cpmk' => 1,
                'nama_kode_sub_cpmk' => 'SUB1',
                'desc_sub_cpmk_id' => 'baru',
                'desc_sub_cpmk_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseHas('sub_cpmk', [
        'id_sub_cpmk' => 1,
        'desc_sub_cpmk_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 4
|--------------------------------------------------------------------------
*/

it('tanpa input sub cpmk', function () {

    $response = $this->put('/kaprodi/sub-cpmk/update-all', []);

    $response->assertRedirect();
});