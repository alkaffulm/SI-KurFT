<?php

use App\Models\EvaluasiUpmModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;
use App\Livewire\PimpinanUpm\EvaluasiUpmAll;

uses(RefreshDatabase::class);

/*
|--------------------------------------------------------------------------
| SETUP DATA
|--------------------------------------------------------------------------
*/

beforeEach(function () {

    DB::table('program_studi')->insert([
        'id_ps' => 1,
        'nama_prodi' => 'Teknik Sipil'
    ]);

    DB::table('tahun_akademik')->insert([
        'id_tahun_akademik' => 1,
        'tahun_akademik' => '2024/2025'
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST 1: Update ada perubahan
|--------------------------------------------------------------------------
*/

it('update ada perubahan', function () {

    $data = EvaluasiUpmModel::factory()->create([
        'catatan' => 'lama'
    ]);

    Livewire::test(EvaluasiUpmAll::class)
        ->set('isEditMode', true)
        ->set('id_evaluasi_upm', $data->id_evaluasi_upm)
        ->set('id_ps', 1)
        ->set('id_tahun_akademik', 1)
        ->set('catatan', 'BERUBAH TOTAL')
        ->call('store');

    expect(
        EvaluasiUpmModel::find($data->id_evaluasi_upm)->catatan
    )->toBe('BERUBAH TOTAL'); 
});

/*
|--------------------------------------------------------------------------
| TEST 2: Update tanpa perubahan
|--------------------------------------------------------------------------
*/

it('update tanpa perubahan', function () {

    $data = EvaluasiUpmModel::factory()->create([
        'catatan' => 'tetap'
    ]);

    Livewire::test(EvaluasiUpmAll::class)
        ->set('isEditMode', true)
        ->set('id_evaluasi_upm', $data->id_evaluasi_upm)
        ->set('id_ps', 1)
        ->set('id_tahun_akademik', 1)
        ->set('catatan', 'tetap')
        ->call('store');

    expect(
        EvaluasiUpmModel::find($data->id_evaluasi_upm)->catatan
    )->toBe('tetap');
});

/*
|--------------------------------------------------------------------------
| TEST 3: Mode edit aktif
|--------------------------------------------------------------------------
*/

it('mode edit aktif', function () {

    $data = EvaluasiUpmModel::factory()->create();

    Livewire::test(EvaluasiUpmAll::class)
        ->call('edit', $data->id_evaluasi_upm)
        ->assertSet('isEditMode', true);
});

/*
|--------------------------------------------------------------------------
| TEST 4: Mode tambah aktif
|--------------------------------------------------------------------------
*/

it('mode tambah aktif', function () {

    Livewire::test(EvaluasiUpmAll::class)
        ->call('create')
        ->assertSet('isEditMode', false);
});