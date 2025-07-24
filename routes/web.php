<?php

use App\Http\Controllers\Kaprodi\CPLPLMapController;
use App\Http\Controllers\Kaprodi\KurikulumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Kaprodi\BahanKajianController;
use App\Http\Controllers\Kaprodi\CplController;
use App\Http\Controllers\Kaprodi\CpmkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\dosen\RPSController;
use App\Http\Controllers\Kaprodi\BKCPLMapController;
use App\Http\Controllers\Kaprodi\BKMKMapController;
use App\Http\Controllers\Kaprodi\MatkulController;
use App\Http\Controllers\Kaprodi\PeoController;
use App\Http\Controllers\Kaprodi\ProfilLulusanController;
use App\Http\Controllers\Kaprodi\SubCpmkController;
use App\Http\Controllers\Kaprodi\PLPEOMappingController;
use App\Models\BKCPLMapModel;
use App\Models\CPLPLMapModel;

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
        Route::resource('kurikulum', KurikulumController::class);

        // PEO Routes
        Route::get('/peo/edit-all', [PeoController::class, 'editAll'])->name('peo.editAll'); // Rute baru untuk form edit massal
        Route::put('/peo/update-all', [PeoController::class, 'updateAll'])->name('peo.updateAll'); // Rute baru untuk update massal
        Route::resource('peo', PeoController::class);

        // pl pe map
        Route::get('/mapping/pl-peo', [PLPEOMappingController::class, 'index'])->name('pl-peo-mapping.index'); 

        Route::get('/mapping/edit-pl-peo', [PLPEOMappingController::class, 'edit_pl_peo'])->name('pl-peo-mapping.edit');
        Route::put('/mapping/pl-peo', [PLPEOMappingController::class, 'updatePLPEOMap'])->name('pl-peo-mapping.update');

        // cpl pl map  
        Route::get('/mapping/edit-cpl-pl', [CPLPLMapController::class, 'edit_cpl_pl'])->name('cpl-pl-mapping.edit');
        Route::put('/mapping/cpl-pl', [CPLPLMapController::class, 'updateCPLPLMap'])->name('cpl-pl-mapping.update');

        // bk cpl map  
        Route::get('/mapping/edit-bk-cpl', [BKCPLMapController::class, 'edit_bk_cpl'])->name('bk-cpl-mapping.edit');
        Route::put('/mapping/bk-cpl', [BKCPLMapController::class, 'updateBKCPLMap'])->name('bk-cpl-mapping.update');

        // bk mk map  
        Route::get('/mapping/edit-bk-mk', [BKMKMapController::class, 'edit_bk_mk'])->name('bk-mk-mapping.edit');
        Route::put('/mapping/bk-mk', [BKMKMapController::class, 'updateBKMKMap'])->name('bk-mk-mapping.update');
    });
});


// rute untuk mapping pl peo
// Route::get('/mapping/edit-pl-peo', [PLPEOMappingController::class, 'edit_pl_peo']);
// Route::get('/mapping/edit-pl-peo/edit', [PLPEOMappingController::class, 'edit_pl_peo']);
// Route::get('/mapping/edit-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'edit_pl_peo'])->name('pl-peo-mapping.edit');
// Route::put('/mapping/update-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'updatePLPEOMap'])->name('pl-peo-mapping.update');
//Route::get('/profil-lulusan', [App\Http\Controllers\ProfilLulusanController::class, 'index'])->name('profil-lulusan.index');