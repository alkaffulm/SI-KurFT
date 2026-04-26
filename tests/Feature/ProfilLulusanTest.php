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

it('delete dan update profil lulusan', function () {

    DB::table('profil_lulusan')->insert([
        [
            'id_pl' => 1,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'kode_pl' => 'PL1',
            'nama_pl_id' => 'Nama1',
            'nama_pl_en' => 'Name1',
            'desc_pl_id' => 'lama',
            'desc_pl_en' => 'old',
            'profesi' => 'profesi1'
        ],
        [
            'id_pl' => 2,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'kode_pl' => 'PL2',
            'nama_pl_id' => 'Nama2',
            'nama_pl_en' => 'Name2',
            'desc_pl_id' => 'lama2',
            'desc_pl_en' => 'old2',
            'profesi' => 'profesi2'
        ]
    ]);

    $this->put('/kaprodi/profil-lulusan/update-all', [
        'delete_pl' => [1],
        'pl' => [
            2 => [
                'kode_pl' => 'PL2',
                'nama_pl_id' => 'Nama2',
                'nama_pl_en' => 'Name2',
                'desc_pl_id' => 'baru',
                'desc_pl_en' => 'new',
                'profesi' => 'profesi2'
            ]
        ]
    ]);

    $this->assertDatabaseMissing('profil_lulusan', [
        'id_pl' => 1
    ]);

    $this->assertDatabaseHas('profil_lulusan', [
        'id_pl' => 2,
        'desc_pl_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 2: Delete saja
|--------------------------------------------------------------------------
*/

it('delete saja', function () {

    DB::table('profil_lulusan')->insert([
        'id_pl' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_pl' => 'PL1',
        'nama_pl_id' => 'Nama1',
        'nama_pl_en' => 'Name1',
        'desc_pl_id' => 'lama',
        'desc_pl_en' => 'old',
        'profesi' => 'profesi1'
    ]);

    $this->put('/kaprodi/profil-lulusan/update-all', [
        'delete_pl' => [1]
    ]);

    $this->assertDatabaseMissing('profil_lulusan', [
        'id_pl' => 1
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 3: Update saja
|--------------------------------------------------------------------------
*/

it('update saja', function () {

    DB::table('profil_lulusan')->insert([
        'id_pl' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_pl' => 'PL1',
        'nama_pl_id' => 'Nama1',
        'nama_pl_en' => 'Name1',
        'desc_pl_id' => 'lama',
        'desc_pl_en' => 'old',
        'profesi' => 'profesi1'
    ]);

    $this->put('/kaprodi/profil-lulusan/update-all', [
        'pl' => [
            1 => [
                'kode_pl' => 'PL1',
                'nama_pl_id' => 'Nama1',
                'nama_pl_en' => 'Name1',
                'desc_pl_id' => 'baru',
                'desc_pl_en' => 'new',
                'profesi' => 'profesi1'
            ]
        ]
    ]);

    $this->assertDatabaseHas('profil_lulusan', [
        'id_pl' => 1,
        'desc_pl_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 4: Tanpa input
|--------------------------------------------------------------------------
*/

it('tanpa input', function () {

    $response = $this->put('/kaprodi/profil-lulusan/update-all', []);

    $response->assertRedirect();
});