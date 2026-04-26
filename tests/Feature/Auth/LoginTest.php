<?php

use App\Models\UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

uses(RefreshDatabase::class);

/*
|--------------------------------------------------------------------------
| SETUP DATA (WAJIB UNTUK SEMUA TEST)
|--------------------------------------------------------------------------
*/

beforeEach(function () {

    // ✅ program studi (hindari FK error)
    DB::table('program_studi')->insert([
        'id_ps' => 1,
        'nama_prodi' => 'Teknik Sipil'
    ]);

    // ✅ role (hindari null role)
    DB::table('role')->insert([
        ['id_role' => 1, 'role' => 'Admin'],
        ['id_role' => 2, 'role' => 'Dosen'],
    ]);
});

/*
|--------------------------------------------------------------------------
| TEST: Validasi Input
|--------------------------------------------------------------------------
*/

it('validasi nip kosong', function () {
    $this->post('/login', [
        'nip' => '',
        'password' => 'password123',
        'login_as' => 'Dosen'
    ])->assertSessionHasErrors(['nip']);
});

it('validasi password kosong', function () {
    $this->post('/login', [
        'nip' => '123456',
        'password' => '',
        'login_as' => 'Dosen'
    ])->assertSessionHasErrors(['password']);
});

/*
|--------------------------------------------------------------------------
| TEST: Auth Gagal
|--------------------------------------------------------------------------
*/

it('auth gagal jika credential salah', function () {
    $this->post('/login', [
        'nip' => 'salah',
        'password' => 'salah',
        'login_as' => 'Dosen'
    ])->assertSessionHasErrors();
});

/*
|--------------------------------------------------------------------------
| TEST: Auth Sukses tapi Role Tidak Sesuai
|--------------------------------------------------------------------------
*/

it('auth sukses tapi role tidak sesuai', function () {

    $user = UserModel::factory()->create([
        'NIP' => '123456789',
        'password' => bcrypt('password123')
    ]);

    // user hanya punya role ADMIN
    DB::table('user_role_map')->insert([
        'id_user' => $user->id_user,
        'id_role' => 1, // Admin
        'id_ps' => 1
    ]);

    // login sebagai DOSEN → harus gagal
    $this->post('/login', [
        'nip' => '123456789',
        'password' => 'password123',
        'login_as' => 'Dosen'
    ])->assertSessionHasErrors();
});

/*
|--------------------------------------------------------------------------
| TEST: Auth Sukses dan Role Sesuai
|--------------------------------------------------------------------------
*/

it('auth sukses dengan role sesuai', function () {

    $user = UserModel::factory()->create([
        'NIP' => '123456789',
        'password' => bcrypt('password123')
    ]);

    // user punya role DOSEN
    DB::table('user_role_map')->insert([
        'id_user' => $user->id_user,
        'id_role' => 2, // Dosen
        'id_ps' => 1
    ]);

    $response = $this->post('/login', [
        'nip' => '123456789',
        'password' => 'password123',
        'login_as' => 'Dosen'
    ]);

    $response->assertRedirect('/dashboard');

    // ✅ cek user login
    $this->assertAuthenticatedAs($user);
});

/*
|--------------------------------------------------------------------------
| TEST: Redirect + Session
|--------------------------------------------------------------------------
*/

it('redirect ke dashboard dan set session setelah login berhasil', function () {

    $user = UserModel::factory()->create([
        'NIP' => '123456789',
        'password' => bcrypt('password123')
    ]);

    DB::table('user_role_map')->insert([
        'id_user' => $user->id_user,
        'id_role' => 2, // Dosen
        'id_ps' => 1
    ]);

    $response = $this->post('/login', [
        'nip' => '123456789',
        'password' => 'password123',
        'login_as' => 'Dosen'
    ]);

    $response->assertRedirect('/dashboard');

    // ✅ cek session
    $response->assertSessionHas('userRole');
    $response->assertSessionHas('userName');
    $response->assertSessionHas('userNip');
});