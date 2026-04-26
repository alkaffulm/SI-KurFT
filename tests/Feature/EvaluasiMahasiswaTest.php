<?php

use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Livewire\EvaluasiMahasiswa;
use App\Models\Kelas;

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
        'penilaian_mahasiswa',
        'kelas_mahasiswa',
        'rencana_asesmen_cpmk_bobot',
        'rencana_asesmen',
        'mk_cpmk_cpl_map',
        'kelas',
        'mahasiswa',
        'mata_kuliah',
        'cpmk',
        'cpl',
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
        'nama_prodi' => 'Teknik Sipil',
    ]);

    DB::table('kurikulum')->insert([
        'id_kurikulum' => 1,
        'id_ps' => 1,
        'tahun' => '2024',
    ]);

    DB::table('user')->insert([
        'id_user' => 1,
        'NIP' => '123456',
        'username' => 'testuser',
        'password' => bcrypt('password'),
        'email' => 'test@example.com',
        'last_active_kurikulum_id' => 1,
    ]);

    DB::table('tahun_akademik')->insert([
        'id_tahun_akademik' => 1,
        'tahun_akademik' => '2024/2025',
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
        'sks_teori' => 2,
        'sks_praktikum' => 1,
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

    DB::table('mahasiswa')->insert([
        'id_mhs' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nim' => '123',
        'nama_lengkap' => 'Budi',
        'angkatan' => 2020,
    ]);

    DB::table('kelas_mahasiswa')->insert([
        'id_kelas' => 1,
        'nim' => '123',
    ]);

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

    DB::table('rencana_asesmen')->insert([
        'id_rencana_asesmen' => 1,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'id_mk' => 1,
        'tipe_komponen' => 'tugas',
        'nomor_komponen' => 1,
    ]);

    DB::table('rencana_asesmen_cpmk_bobot')->insert([
        'id_rencana_asesmen' => 1,
        'id_mk_cpmk_cpl' => 1,
        'bobot' => 100,
    ]);
});

function getLoadedKelas()
{
    return Kelas::with([
        'mataKuliahModel.mkcpmkcpl.cpl',
        'mataKuliahModel.mkcpmkcpl.cpmk',
        'mahasiswa.penilaianMahasiswa',
    ])->find(1);
}

function insertNilai($nilai, $nim = '123')
{
    DB::table('penilaian_mahasiswa')->insert([
        'id_kelas' => 1,
        'nim' => $nim,
        'id_rencana_asesmen' => 1,
        'id_cpmk' => 10,
        'nilai' => $nilai,
    ]);
}

it('threshold kelulusan menghasilkan status tidak lulus', function () {
    insertNilai(40);

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect($data[0]['status'])->toBeFalse();
    expect($data[0]['status_label'])->toBe('Belum Lulus');
});

it('hitung maks nilai tidak melebihi 100', function () {
    insertNilai(200);

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect($data[0]['nilai_per_cpmk'][10])->toBe(100.0);
});

it('hitung bobot tercapai benar', function () {
    insertNilai(80);

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect($data[0]['nilai_per_cpmk'][10])->toBe(80.0);
});

it('hitung cpmk benar', function () {
    insertNilai(75);

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect($data[0]['nilai_per_cpmk'][10])->toBe(75.0);
});

it('hitung cpl benar', function () {
    insertNilai(85);

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect($data[0]['nilai_per_cpl'][1])->toBe(85.0);
});

it('status kelulusan lulus jika nilai cpl memenuhi threshold', function () {
    insertNilai(90);

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect($data[0]['status'])->toBeTrue();
    expect($data[0]['status_label'])->toBe('Lulus');
});

it('clamp nilai max saat simpan nilai', function () {
    Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('prepareStructureAsesmen')
        ->set('editingNim', '123')
        ->set('editingNama', 'Budi')
        ->set('editingNilai', [1 => [10 => 150]])
        ->call('simpanNilai');

    $this->assertDatabaseHas('penilaian_mahasiswa', [
        'id_kelas' => 1,
        'nim' => '123',
        'id_rencana_asesmen' => 1,
        'id_cpmk' => 10,
        'nilai' => 100,
    ]);
});

it('clamp nilai min saat simpan nilai', function () {
    Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('prepareStructureAsesmen')
        ->set('editingNim', '123')
        ->set('editingNama', 'Budi')
        ->set('editingNilai', [1 => [10 => -20]])
        ->call('simpanNilai');

    $this->assertDatabaseHas('penilaian_mahasiswa', [
        'id_kelas' => 1,
        'nim' => '123',
        'id_rencana_asesmen' => 1,
        'id_cpmk' => 10,
        'nilai' => 0,
    ]);
});

it('loop mahasiswa memproses banyak data', function () {
    DB::table('mahasiswa')->insert([
        'id_mhs' => 2,
        'id_ps' => 1,
        'id_kurikulum' => 1,
        'nim' => '456',
        'nama_lengkap' => 'Siti',
        'angkatan' => 2020,
    ]);

    DB::table('kelas_mahasiswa')->insert([
        'id_kelas' => 1,
        'nim' => '456',
    ]);

    insertNilai(80, '123');
    insertNilai(70, '456');

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect(count($data))->toBe(2);
});

it('status label sesuai dengan nilai cpl', function () {
    insertNilai(60);

    $component = Livewire::test(EvaluasiMahasiswa::class)
        ->set('kelas', getLoadedKelas())
        ->call('hitungEvaluasi');

    $data = $component->get('allMahasiswaEvaluasi');

    expect($data[0]['status_label'])->toBe('Lulus');
});