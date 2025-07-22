<?php

use App\Http\Controllers\KurikulumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BahanKajianController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\CpmkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MappingController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\PeoController;
use App\Http\Controllers\PLPEOMappingController;
use App\Http\Controllers\ProfilLulusanController;
use App\Http\Controllers\SubCpmkController;
use App\Models\MataKuliahModel;

// Set the root to the login page
Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Route (Protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware('role:kaprodi')->group(function () {
        Route::resource('bahan-kajian', BahanKajianController::class);
        Route::resource('cpl', CplController::class);
        Route::resource('cpmk', CpmkController::class);
        Route::resource('sub-cpmk', SubCpmkController::class);
        Route::resource('mata-kuliah', MatkulController::class);
        Route::resource('profil-lulusan', ProfilLulusanController::class);
        Route::resource('kurikulum', KurikulumController::class);
        Route::resource('peo', PeoController::class);
    });
});

// rute untuk mapping pl peo
Route::get('/mapping/edit-pl-peo', [PLPEOMappingController::class, 'edit_pl_peo']);
Route::get('/mapping/edit-pl-peo/edit', [PLPEOMappingController::class, 'edit_pl_peo']);
Route::get('/mapping/edit-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'edit_pl_peo'])->name('pl-peo-mapping.edit');
Route::put('/mapping/update-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'updatePLPEOMap'])->name('pl-peo-mapping.update');
Route::get('/profil-lulusan', [App\Http\Controllers\ProfilLulusanController::class, 'index'])->name('profil-lulusan.index');


