<?php

use App\Http\Controllers\KurikulumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Kaprodi\BahanKajianController;
use App\Http\Controllers\Kaprodi\CplController;
use App\Http\Controllers\Kaprodi\CpmkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\dosen\RPSController;
use App\Http\Controllers\Kaprodi\MatkulController;
use App\Http\Controllers\Kaprodi\PeoController;
use App\Http\Controllers\Kaprodi\ProfilLulusanController;
use App\Http\Controllers\Kaprodi\SubCpmkController;
use App\Http\Controllers\Kaprodi\PLPEOMappingController;

// Set the root to the login page
Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Route (Protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware('role:kaprodi')->prefix('kaprodi')->group(function () {
        Route::resource('bahan-kajian', BahanKajianController::class);
        Route::resource('cpl', CplController::class);
        Route::resource('cpmk', CpmkController::class);
        Route::resource('sub-cpmk', SubCpmkController::class);
        Route::resource('mata-kuliah', MatkulController::class);
        Route::resource('profil-lulusan', ProfilLulusanController::class);
        Route::resource('kurikulum', \App\Http\Controllers\kaprodi\KurikulumController::class);
        Route::resource('peo', PeoController::class);
        Route::get('/mapping/pl-peo', [PLPEOMappingController::class, 'index'])->name('pl-peo-mapping.index'); // Asumsi method index ada
        Route::get('/mapping/edit-pl-peo', [PLPEOMappingController::class, 'edit_pl_peo'])->name('pl-peo-mapping.edit');
        Route::put('/mapping/pl-peo', [PLPEOMappingController::class, 'updatePLPEOMap'])->name('pl-peo-mapping.update');
    });
    });


// rute untuk mapping pl peo
// Route::get('/mapping/edit-pl-peo', [PLPEOMappingController::class, 'edit_pl_peo']);
// Route::get('/mapping/edit-pl-peo/edit', [PLPEOMappingController::class, 'edit_pl_peo']);
// Route::get('/mapping/edit-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'edit_pl_peo'])->name('pl-peo-mapping.edit');
// Route::put('/mapping/update-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'updatePLPEOMap'])->name('pl-peo-mapping.update');
//Route::get('/profil-lulusan', [App\Http\Controllers\ProfilLulusanController::class, 'index'])->name('profil-lulusan.index');


