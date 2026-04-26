<?php

use App\Models\PEOModel;
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

it('delete dan update peo', function () {

    $peo1 = PEOModel::create([
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_peo' => 'P1',
        'desc_peo_id' => 'lama',
        'desc_peo_en' => 'old'
    ]);

    $peo2 = PEOModel::create([
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_peo' => 'P2',
        'desc_peo_id' => 'lama2',
        'desc_peo_en' => 'old2'
    ]);

    $this->put('/kaprodi/peo/update-all', [
        'delete_peo' => [$peo1->id_peo],
        'peo' => [
            $peo2->id_peo => [
                'kode_peo' => 'P2', // wajib
                'desc_peo_id' => 'baru',
                'desc_peo_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseMissing('peo', [
        'id_peo' => $peo1->id_peo
    ]);

    $this->assertDatabaseHas('peo', [
        'id_peo' => $peo2->id_peo,
        'desc_peo_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 2: Delete saja
|--------------------------------------------------------------------------
*/

it('delete saja', function () {

    $peo = PEOModel::create([
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_peo' => 'P1',
        'desc_peo_id' => 'lama',
        'desc_peo_en' => 'old'
    ]);

    $this->put('/kaprodi/peo/update-all', [
        'delete_peo' => [$peo->id_peo]
    ]);

    $this->assertDatabaseMissing('peo', [
        'id_peo' => $peo->id_peo
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 3: Update saja
|--------------------------------------------------------------------------
*/

it('update saja', function () {

    $peo = PEOModel::create([
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_peo' => 'P1',
        'desc_peo_id' => 'lama',
        'desc_peo_en' => 'old'
    ]);

    $this->put('/kaprodi/peo/update-all', [
        'peo' => [
            $peo->id_peo => [
                'kode_peo' => 'P1', // wajib
                'desc_peo_id' => 'baru',
                'desc_peo_en' => 'new'
            ]
        ]
    ]);

    $this->assertDatabaseHas('peo', [
        'id_peo' => $peo->id_peo,
        'desc_peo_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 4: Tanpa input
|--------------------------------------------------------------------------
*/

it('tanpa input', function () {

    $response = $this->put('/kaprodi/peo/update-all', []);

    $response->assertRedirect();
});