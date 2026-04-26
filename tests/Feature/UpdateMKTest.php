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

it('delete dan update mata kuliah', function () {

    DB::table('mata_kuliah')->insert([
        [
            'id_mk' => 1,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'kode_mk' => 'MK1',
            'nama_matkul_id' => 'Matkul1',
            'nama_matkul_en' => 'Course1',
            'matkul_desc_id' => 'lama',
            'matkul_desc_en' => 'old',
            'sks_teori' => 2,
            'sks_praktikum' => 1,
            'semester' => 1,
            'muncul' => 'ya'
        ],
        [
            'id_mk' => 2,
            'id_ps' => 1,
            'id_kurikulum' => 1,
            'kode_mk' => 'MK2',
            'nama_matkul_id' => 'Matkul2',
            'nama_matkul_en' => 'Course2',
            'matkul_desc_id' => 'lama2',
            'matkul_desc_en' => 'old2',
            'sks_teori' => 3,
            'sks_praktikum' => 0,
            'semester' => 2,
            'muncul' => 'ya'
        ]
    ]);

    $this->put('/kaprodi/mata-kuliah/update-all', [
        'delete_ids' => [1],
        'matkul' => [
            2 => [
                'kode_mk' => 'MK2',
                'nama_matkul_id' => 'Matkul2',
                'nama_matkul_en' => 'Course2',
                'matkul_desc_id' => 'baru',
                'matkul_desc_en' => 'new',
                'sks_teori' => 3,
                'sks_praktikum' => 0,
                'semester' => 2,
                'muncul' => 'ya'
            ]
        ]
    ]);

    $this->assertDatabaseMissing('mata_kuliah', [
        'id_mk' => 1
    ]);

    $this->assertDatabaseHas('mata_kuliah', [
        'id_mk' => 2,
        'matkul_desc_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 2: Delete saja
|--------------------------------------------------------------------------
*/

it('delete saja mata kuliah', function () {

    DB::table('mata_kuliah')->insert([
        'id_mk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_mk' => 'MK1',
        'nama_matkul_id' => 'Matkul1',
        'nama_matkul_en' => 'Course1',
        'matkul_desc_id' => 'lama',
        'matkul_desc_en' => 'old',
        'sks_teori' => 2,
        'sks_praktikum' => 1,
        'semester' => 1,
        'muncul' => 'ya'
    ]);

    $this->put('/kaprodi/mata-kuliah/update-all', [
        'delete_ids' => [1]
    ]);

    $this->assertDatabaseMissing('mata_kuliah', [
        'id_mk' => 1
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 3: Update saja
|--------------------------------------------------------------------------
*/

it('update saja mata kuliah', function () {

    DB::table('mata_kuliah')->insert([
        'id_mk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_mk' => 'MK1',
        'nama_matkul_id' => 'Matkul1',
        'nama_matkul_en' => 'Course1',
        'matkul_desc_id' => 'lama',
        'matkul_desc_en' => 'old',
        'sks_teori' => 2,
        'sks_praktikum' => 1,
        'semester' => 1,
        'muncul' => 'ya'
    ]);

    $this->put('/kaprodi/mata-kuliah/update-all', [
        'matkul' => [
            1 => [
                'kode_mk' => 'MK1',
                'nama_matkul_id' => 'Matkul1',
                'nama_matkul_en' => 'Course1',
                'matkul_desc_id' => 'baru',
                'matkul_desc_en' => 'new',
                'sks_teori' => 2,
                'sks_praktikum' => 1,
                'semester' => 1,
                'muncul' => 'ya'
            ]
        ]
    ]);

    $this->assertDatabaseHas('mata_kuliah', [
        'id_mk' => 1,
        'matkul_desc_id' => 'baru'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 4: Tanpa input
|--------------------------------------------------------------------------
*/

it('tanpa input mata kuliah', function () {

    $response = $this->put('/kaprodi/mata-kuliah/update-all', []);

    $response->assertRedirect();
});