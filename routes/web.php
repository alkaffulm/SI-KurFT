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
use App\Http\Controllers\MhsCplController;
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
        // Route::resource('cpl', CplController::class);
        Route::resource('sub-cpmk', SubCpmkController::class);
        // Route::resource('profil-lulusan', ProfilLulusanController::class);
        Route::resource('kurikulum', KurikulumController::class);
        Route::resource('mhs-cpl', MhsCplController::class);
        
        // PEO Routes
        Route::get('/peo/edit-all', [PeoController::class, 'editAll'])->name('peo.editAll'); // Rute baru untuk form edit massal
        Route::put('/peo/update-all', [PeoController::class, 'updateAll'])->name('peo.updateAll'); // Rute baru untuk update massal
        Route::resource('peo', PeoController::class);
        
         // == PROFIL LULUSAN ROUTES ==
        Route::get('/profil-lulusan', [ProfilLulusanController::class, 'index'])->name('profil-lulusan.index');
        Route::get('/profil-lulusan/create', [ProfilLulusanController::class, 'create'])->name('profil-lulusan.create');
        Route::post('/profil-lulusan', [ProfilLulusanController::class, 'store'])->name('profil-lulusan.store');
        Route::get('/profil-lulusan/edit-all', [ProfilLulusanController::class, 'editAll'])->name('profil-lulusan.editAll');
        Route::put('/profil-lulusan/update-all', [ProfilLulusanController::class, 'updateAll'])->name('profil-lulusan.updateAll');
        Route::delete('/profil-lulusan/{profil_lulusan}', [ProfilLulusanController::class, 'destroy'])->name('profil-lulusan.destroy');

        // == CPL ROUTES ==
        Route::get('/cpl', [CplController::class, 'index'])->name('cpl.index');
        Route::get('/cpl/create', [CplController::class, 'create'])->name('cpl.create');
        Route::post('/cpl', [CplController::class, 'store'])->name('cpl.store');
        Route::get('/cpl/edit-all', [CplController::class, 'editAll'])->name('cpl.editAll');
        Route::put('/cpl/update-all', [CplController::class, 'updateAll'])->name('cpl.updateAll');
        
        Route::get('mata-kuliah/edit-all', [MatkulController::class, 'editAll'])->name('mata-kuliah.editAll');
        Route::put('mata-kuliah/update-all', [MatkulController::class, 'updateAll'])->name('mata-kuliah.updateAll');
        Route::resource('mata-kuliah', MatkulController::class);
        
        Route::get('cpmk/edit-all', [CpmkController::class, 'editAll'])->name('cpmk.editAll');
        Route::put('cpmk/update-all', [CpmkController::class, 'updateAll'])->name('cpmk.updateAll');
        Route::resource('cpmk', CpmkController::class);
        
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