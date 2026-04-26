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

it('delete dan update bahan kajian', function () {

    DB::table('bahan_kajian')->insert([
        [
            'id_bk' => 1,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'nama_kode_bk' => 'BK1',
            'nama_bk_id' => 'Nama1',
            'nama_bk_en' => 'Name1',
            'kategori' => 'kat1',
            'desc_bk_id' => 'lama',
            'desc_bk_en' => 'old'
        ],
        [
            'id_bk' => 2,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'nama_kode_bk' => 'BK2',
            'nama_bk_id' => 'Nama2',
            'nama_bk_en' => 'Name2',
            'kategori' => 'kat2',
            'desc_bk_id' => 'lama2',
            'desc_bk_en' => 'old2'
        ]
    ]);

    $this->put('/kaprodi/bahan-kajian/update-all', [
        'delete_bk' => [1],
        'bk' => [
            2 => [
                'nama_kode_bk' => 'BK2',
                'nama_bk_id' => 'Nama2',
                'nama_bk_en' => 'Name2',
                'kategori' => 'kat2',
                'desc_bk_id' => 'baru',
                'desc_bk_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseMissing('bahan_kajian', [
        'id_bk' => 1
    ]);

    $this->assertDatabaseHas('bahan_kajian', [
        'id_bk' => 2,
        'desc_bk_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 2: Delete saja
|--------------------------------------------------------------------------
*/

it('delete saja bahan kajian', function () {

    DB::table('bahan_kajian')->insert([
        'id_bk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_bk' => 'BK1',
        'nama_bk_id' => 'Nama BK',
        'nama_bk_en' => 'Name BK',
        'kategori' => 'kategori',
        'desc_bk_id' => 'lama',
        'desc_bk_en' => 'old'
    ]);

    $this->put('/kaprodi/bahan-kajian/update-all', [
        'delete_bk' => [1]
    ]);

    $this->assertDatabaseMissing('bahan_kajian', [
        'id_bk' => 1
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 3: Update saja
|--------------------------------------------------------------------------
*/

it('update saja bahan kajian', function () {

    DB::table('bahan_kajian')->insert([
        'id_bk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_bk' => 'BK1',
        'nama_bk_id' => 'Nama BK',
        'nama_bk_en' => 'Name BK',
        'kategori' => 'kategori',
        'desc_bk_id' => 'lama',
        'desc_bk_en' => 'old'
    ]);

    $this->put('/kaprodi/bahan-kajian/update-all', [
        'bk' => [
            1 => [
                'nama_kode_bk' => 'BK1',
                'nama_bk_id' => 'Nama BK',
                'nama_bk_en' => 'Name BK',
                'kategori' => 'kategori',
                'desc_bk_id' => 'baru',
                'desc_bk_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseHas('bahan_kajian', [
        'id_bk' => 1,
        'desc_bk_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 4: Tanpa input
|--------------------------------------------------------------------------
*/

it('tanpa input bahan kajian', function () {

    $response = $this->put('/kaprodi/bahan-kajian/update-all', []);

    $response->assertRedirect();
});