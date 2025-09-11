<?php

use App\Http\Controllers\Kaprodi\CPLPLMapController;
use App\Http\Controllers\Kaprodi\KurikulumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Kaprodi\BahanKajianController;
use App\Http\Controllers\Kaprodi\CplController;
use App\Http\Controllers\Kaprodi\CpmkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dosen\EvaluasiMahasiswaController;
use App\Http\Controllers\Dosen\MatkulController as DosenMatkulController;
use App\Http\Controllers\Dosen\RencanaAsesmenController;
use App\Http\Controllers\dosen\RPSController;
use App\Http\Controllers\kaprodi\AdminController;
use App\Http\Controllers\Kaprodi\BKCPLMapController;
use App\Http\Controllers\Kaprodi\BKMKMapController;
use App\Http\Controllers\Kaprodi\CPLCPMKController;
use App\Http\Controllers\Kaprodi\CPMKMPLMapController;
use App\Http\Controllers\Kaprodi\KelasController;
use App\Http\Controllers\Kaprodi\MatkulController;
use App\Http\Controllers\Kaprodi\MKCPMKController;
use App\Http\Controllers\Kaprodi\MKCPMKCPLController;
use App\Http\Controllers\Kaprodi\PeoController;
use App\Http\Controllers\Kaprodi\ProfilLulusanController;
use App\Http\Controllers\Kaprodi\SubCpmkController;
use App\Http\Controllers\Kaprodi\PLPEOMappingController;
use App\Http\Controllers\Kaprodi\TahunakademikController;
use App\Http\Controllers\Kaprodi\VisiKeilmuanController;
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
        // Route::resource('bahan-kajian', BahanKajianController::class);
        // Route::resource('cpl', CplController::class);
        // Route::resource('profil-lulusan', ProfilLulusanController::class);
        Route::resource('kurikulum', KurikulumController::class);
        Route::resource('mhs-cpl', MhsCplController::class);
        Route::resource('visi-keilmuan', VisiKeilmuanController::class);
        
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
        
        // == BAHAN KAJIAN ROUTES (NEW) ==
        Route::get('/bahan-kajian', [BahanKajianController::class, 'index'])->name('bahan-kajian.index');
        Route::get('/bahan-kajian/create', [BahanKajianController::class, 'create'])->name('bahan-kajian.create');
        Route::post('/bahan-kajian', [BahanKajianController::class, 'store'])->name('bahan-kajian.store');
        Route::get('/bahan-kajian/edit-all', [BahanKajianController::class, 'editAll'])->name('bahan-kajian.editAll');
        Route::put('/bahan-kajian/update-all', [BahanKajianController::class, 'updateAll'])->name('bahan-kajian.updateAll');
        
        Route::get('mata-kuliah/edit-all', [MatkulController::class, 'editAll'])->name('mata-kuliah.editAll');
        Route::put('mata-kuliah/update-all', [MatkulController::class, 'updateAll'])->name('mata-kuliah.updateAll');
        Route::resource('mata-kuliah', MatkulController::class);
        
        Route::get('sub-cpmk/edit-all', [SubCpmkController::class, 'editAll'])->name('sub-cpmk.editAll');
        Route::put('sub-cpmk/update-all', [SubCpmkController::class, 'updateAll'])->name('sub-cpmk.updateAll');
        Route::resource('sub-cpmk', SubCpmkController::class);

        Route::get('cpmk/edit-all', [CpmkController::class, 'editAll'])->name('cpmk.editAll');
        Route::put('cpmk/update-all', [CpmkController::class, 'updateAll'])->name('cpmk.updateAll');
        Route::resource('cpmk', CpmkController::class);

        Route::get('/mapping/edit-mk-cpmk', [MKCPMKController::class, 'editMKCPMK'])->name('mk-cpmk-mapping.edit');
        Route::put('/mapping/mk-cpmk', [MKCPMKController::class, 'updateMKCPMK'])->name('mk-cpmk-mapping.update');

        // routes untuk mk-cpmk-cpl yang baru
        Route::get('/mapping/edit-mk-cpl', [MKCPMKCPLController::class, 'editMKCPL'])->name('mk-cpl-mapping.edit');
        Route::put('/mapping/mk-cpl-update', [MKCPMKCPLController::class, 'updateMKCPL'])->name('mk-cpl-mapping.update');
        Route::get('/mapping/edit-cpl-cpmk', [CPLCPMKController::class, 'editCPLCPMK'])->name('cpl-cpmk-mapping.edit');
        Route::put('/mapping/cpl-cpmk-update', [CPLCPMKController::class, 'updateCPLCPMK'])->name('cpl-cpmk-mapping.update');

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

        // cpmk cpl map  
        Route::get('/mapping/edit-cpmk-cpl', [CPMKMPLMapController::class, 'edit_cpmk_cpl'])->name('cpmk-cpl-mapping.edit');
        Route::put('/mapping/cpmk-cpl', [CPMKMPLMapController::class, 'updateCPMKCPLMap'])->name('cpmk-cpl-mapping.update');

        // coba admin
        Route::get('/roleadmin', [AdminController::class, 'index'])->name('role_admin');

        //Route::put('/mapping/cpmk-cpl', [CPMKMPLMapController::class, 'updateCPMKCPLMap'])->name('cpmk-cpl-mapping.update');
    });

    Route::middleware('role:dosen')->prefix('dosen')->group(function() {
        Route::resource('rps', RPSController::class);
        Route::resource('matkul', MatkulController::class);
        Route::resource('rencana-assesment', RencanaAsesmenController::class);
        Route::resource('evaluasi-mahasiswa', EvaluasiMahasiswaController::class);
    });
    Route::get('/mapping/tahun-akademik-kurikulum/tambah', [TahunakademikController::class, 'tambahTA'])->name('ta-kurikulum-mapping.add');
    Route::get('/mapping/tahun-akademik-kurikulum/index', [TahunakademikController::class, 'index'])->name('ta.index');
    Route::post('/mapping/tahun-akademik-kurikulum/update', [TahunakademikController::class, 'updateTA'])->name('ta.update');
    Route::get('/mapping/tahun-akademik-kurikulum', [TahunakademikController::class, 'index'])->name('ta.index');

    // buat kelas
    Route::get('/mapping/kelas/index', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/mapping/kelas/tambah', [KelasController::class, 'tambahKelas'])->name('kelas.add');


});


// rute untuk mapping pl peo
// Route::get('/mapping/edit-pl-peo', [PLPEOMappingController::class, 'edit_pl_peo']);
// Route::get('/mapping/edit-pl-peo/edit', [PLPEOMappingController::class, 'edit_pl_peo']);
// Route::get('/mapping/edit-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'edit_pl_peo'])->name('pl-peo-mapping.edit');
// Route::put('/mapping/update-pl-peo', [App\Http\Controllers\PLPEOMappingController::class, 'updatePLPEOMap'])->name('pl-peo-mapping.update');
//Route::get('/profil-lulusan', [App\Http\Controllers\ProfilLulusanController::class, 'index'])->name('profil-lulusan.index');