<?php

use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Livewire\PenilaianMahasiswa;

uses(RefreshDatabase::class);

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
        'kelas',
        'user',
        'tahun_akademik',
        'kurikulum',
        'program_studi',
    ] as $table) {
        DB::table($table)->truncate();
    }

    DB::statement('SET FOREIGN_KEY_CHECKS=1');

    DB::table('program_studi')->insert([
        'id_ps' => 1,
        'nama_prodi' => 'TI',
    ]);

    DB::table('kurikulum')->insert([
        'id_kurikulum' => 1,
        'id_ps' => 1,
        'tahun' => '2024',
    ]);

    DB::table('user')->insert([
        'id_user' => 1,
        'NIP' => '123',
        'username' => 'test',
        'password' => bcrypt('123'),
        'email' => 'test@test.com',
        'last_active_kurikulum_id' => 1,
    ]);

    DB::table('tahun_akademik')->insert([
        'id_tahun_akademik' => 1,
        'tahun_akademik' => '2024',
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

    DB::table('kelas')->insert([
        'id_kelas' => 1,
        'id_user' => 1,
        'id_mk' => 1,
        'id_kurikulum' => 1,
        'id_tahun_akademik' => 1,
        'paralel_ke' => 1,
        'jumlah_mhs' => '1',
    ]);

    DB::table('cpmk')->insert([
        'id_cpmk' => 10,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpmk' => 'CPMK1',
        'desc_cpmk_id' => 'desc',
        'desc_cpmk_en' => 'desc',
    ]);

    DB::table('cpmk')->insert([
        'id_cpmk' => 11,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpmk' => 'CPMK2',
        'desc_cpmk_id' => 'desc',
        'desc_cpmk_en' => 'desc',
    ]);

    DB::table('rencana_asesmen')->insert([
        'id_rencana_asesmen' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'id_mk' => 1,
        'tipe_komponen' => 'tugas',
        'nomor_komponen' => 1,
    ]);

    DB::table('rencana_asesmen')->insert([
        'id_rencana_asesmen' => 2,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'id_mk' => 1,
        'tipe_komponen' => 'uts',
        'nomor_komponen' => 1,
    ]);

    DB::table('cpl')->insert([
        'id_cpl' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nama_kode_cpl' => 'CPL1',
        'desc_cpl_id' => 'desc',
        'desc_cpl_en' => 'desc',
    ]);

    DB::table('mk_cpmk_cpl_map')->insert([
        'id_mk_cpmk_cpl' => 1,
        'id_mk' => 1,
        'id_cpmk' => 10,
        'id_cpl' => 1,
    ]);

    DB::table('mk_cpmk_cpl_map')->insert([
        'id_mk_cpmk_cpl' => 2,
        'id_mk' => 1,
        'id_cpmk' => 11,
        'id_cpl' => 1,
    ]);

    DB::table('rencana_asesmen_cpmk_bobot')->insert([
        'id_rencana_asesmen' => 1,
        'id_mk_cpmk_cpl' => 1,
        'bobot' => 40,
    ]);

    DB::table('rencana_asesmen_cpmk_bobot')->insert([
        'id_rencana_asesmen' => 1,
        'id_mk_cpmk_cpl' => 2,
        'bobot' => 60,
    ]);

    DB::table('rencana_asesmen_cpmk_bobot')->insert([
        'id_rencana_asesmen' => 2,
        'id_mk_cpmk_cpl' => 1,
        'bobot' => 100,
    ]);
});

it('group CPMK berdasarkan rencana asesmen', function () {

    $data = \App\Models\RencanaAsesmenCPMKBobotModel::get()
        ->groupBy('id_rencana_asesmen');

    expect($data[1])->toHaveCount(2);
    expect($data[2])->toHaveCount(1);
});

it('menghitung max bobot CPMK dengan benar', function () {

    $rows = \App\Models\RencanaAsesmenCPMKBobotModel::with('mkCpmkMap')->get();

    $maxPerCpmk = [];

    foreach ($rows as $row) {
        $id = $row->mkCpmkMap->id_cpmk ?? null;
        if (!$id) continue;

        $maxPerCpmk[$id] = ($maxPerCpmk[$id] ?? 0) + $row->bobot;
    }

    expect($maxPerCpmk[10])->toBe(140.0);
    expect($maxPerCpmk[11])->toBe(60.0);
});