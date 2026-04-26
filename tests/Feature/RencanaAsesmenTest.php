<?php

use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Livewire\RencanaAssesment;
use App\Livewire\RencanaAsesmenForm;
use App\Models\MataKuliahModel;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutMiddleware();

    session([
        'userRoleId' => 1,
        'id_kurikulum_aktif' => 1,
        'bypass_prodi_scope' => true,
        'bypass_kurikulum_scope' => true,
    ]);

    DB::table('rencana_asesmen_cpmk_bobot')->delete();
    DB::table('rencana_asesmen')->delete();
    DB::table('mk_cpmk_cpl_map')->delete();
    DB::table('mata_kuliah')->delete();
    DB::table('cpmk')->delete();
    DB::table('cpl')->delete();
    DB::table('kurikulum')->delete();
    DB::table('program_studi')->delete();

    DB::table('program_studi')->insert([
        'id_ps' => 1,
        'nama_prodi' => 'Teknik Sipil',
    ]);

    DB::table('kurikulum')->insert([
        'id_kurikulum' => 1,
        'id_ps' => 1,
        'tahun' => '2024',
    ]);

    DB::table('mata_kuliah')->insert([
        'id_mk' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'kode_mk' => 'MK1',
        'nama_matkul_id' => 'Matkul',
        'nama_matkul_en' => 'Course',
        'matkul_desc_id' => 'desc',
        'matkul_desc_en' => 'desc',
    ]);
});

it('reset state saat null', function () {
    Livewire::test(RencanaAssesment::class)
        ->set('selectedMataKuliah', 1)
        ->set('selectedMataKuliah', null)
        ->assertSet('assocCpmks', null)
        ->assertSet('groupedCpl', []);
});

it('handle tanpa cpmk', function () {
    Livewire::test(RencanaAssesment::class)
        ->set('selectedMataKuliah', 1)
        ->assertSet('assocCpmks', function ($value) {
            return $value->isEmpty();
        });
});

it('handle mapping kosong', function () {
    Livewire::test(RencanaAssesment::class)
        ->set('selectedMataKuliah', 1)
        ->assertSet('groupedCpl', function ($value) {
            return $value->isEmpty();
        });
});


it('add row berhasil', function () {
    Livewire::test(RencanaAsesmenForm::class, [
        'mataKuliah' => MataKuliahModel::find(1),
    ])
        ->set('rencanaAsesmens', [])
        ->call('addRow')
        ->assertCount('rencanaAsesmens', 1);
});

it('hapus baris db', function () {
    DB::table('rencana_asesmen')->insert([
        'id_rencana_asesmen' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'id_mk' => 1,
        'tipe_komponen' => 'tugas',
        'nomor_komponen' => 1,
    ]);

    Livewire::test(RencanaAsesmenForm::class, [
        'mataKuliah' => MataKuliahModel::find(1),
    ])
        ->set('rencanaAsesmens', [
            [
                'id_rencana_asesmen' => 1,
                'tipe_komponen' => 'tugas',
                'nomor_komponen' => 1,
                'bobot' => [],
            ],
        ])
        ->call('removeRow', 0);

    $this->assertDatabaseMissing('rencana_asesmen', [
        'id_rencana_asesmen' => 1,
    ]);
});

it('hapus baris lokal', function () {
    Livewire::test(RencanaAsesmenForm::class, [
        'mataKuliah' => MataKuliahModel::find(1),
    ])
        ->set('rencanaAsesmens', [
            [
                'id_rencana_asesmen' => null,
                'tipe_komponen' => 'tugas',
                'nomor_komponen' => 1,
                'bobot' => [],
            ],
        ])
        ->call('removeRow', 0)
        ->assertCount('rencanaAsesmens', 0);
});

it('hitung total cpmk', function () {
    DB::table('cpl')->insert([
        'id_cpl' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpl' => 'CPL1',
        'desc_cpl_id' => 'desc',
        'desc_cpl_en' => 'desc',
    ]);

    DB::table('cpmk')->insert([
        'id_cpmk' => 10,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpmk' => 'CPMK1',
        'desc_cpmk_id' => 'desc',
        'desc_cpmk_en' => 'desc',
    ]);

    DB::table('mk_cpmk_cpl_map')->insert([
        'id_mk_cpmk_cpl' => 1,
        'id_mk' => 1,
        'id_cpmk' => 10,
        'id_cpl' => 1,
    ]);

    $component = Livewire::test(RencanaAsesmenForm::class, [
        'mataKuliah' => MataKuliahModel::find(1),
    ]);

    $component->set('rencanaAsesmens', [
        [
            'id_rencana_asesmen' => null,
            'tipe_komponen' => 'tugas',
            'nomor_komponen' => 1,
            'bobot' => [1 => 50],
        ],
        [
            'id_rencana_asesmen' => null,
            'tipe_komponen' => 'tugas',
            'nomor_komponen' => 2,
            'bobot' => [1 => 30],
        ],
    ]);

    $component->call('hitungTotalPerCpmk');

    expect($component->get('totalPerCpmk')[10])->toBe(80);
});

it('simpan banyak row', function () {
    $component = Livewire::test(RencanaAsesmenForm::class, [
        'mataKuliah' => MataKuliahModel::find(1),
    ]);

    $component->set('rencanaAsesmens', [
        [
            'id_rencana_asesmen' => null,
            'tipe_komponen' => 'tugas',
            'nomor_komponen' => 1,
            'bobot' => [],
        ],
        [
            'id_rencana_asesmen' => null,
            'tipe_komponen' => 'uts',
            'nomor_komponen' => null,
            'bobot' => [],
        ],
    ]);

    $component->call('saveRencanaAsesmen');

    $this->assertDatabaseCount('rencana_asesmen', 2);
});

it('simpan bobot cpmk', function () {
    DB::table('cpl')->insert([
        'id_cpl' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpl' => 'CPL1',
        'desc_cpl_id' => 'desc',
        'desc_cpl_en' => 'desc',
    ]);

    DB::table('cpmk')->insert([
        'id_cpmk' => 10,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpmk' => 'CPMK1',
        'desc_cpmk_id' => 'desc',
        'desc_cpmk_en' => 'desc',
    ]);

    DB::table('mk_cpmk_cpl_map')->insert([
        'id_mk_cpmk_cpl' => 1,
        'id_mk' => 1,
        'id_cpmk' => 10,
        'id_cpl' => 1,
    ]);

    $component = Livewire::test(RencanaAsesmenForm::class, [
        'mataKuliah' => MataKuliahModel::find(1),
    ]);

    $component->set('assocCpmks', collect([
        (object) [
            'id_mk_cpmk_cpl' => 1,
            'cpmk' => (object) [
                'id_cpmk' => 10,
            ],
        ],
    ]));

    $component->set('rencanaAsesmens', [
        [
            'id_rencana_asesmen' => null,
            'tipe_komponen' => 'tugas',
            'nomor_komponen' => 1,
            'bobot' => [
                1 => 60,
            ],
        ],
    ]);

    $component->call('saveRencanaAsesmen');

    $this->assertDatabaseHas('rencana_asesmen_cpmk_bobot', [
        'id_mk_cpmk_cpl' => 1,
        'bobot' => 60,
    ]);
});