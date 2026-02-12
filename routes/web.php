<?php

use App\Models\BKCPLMapModel;
use App\Models\CPLPLMapModel;
use App\Livewire\RencanaAsesmenForm;
use App\Models\TeknikPenilaianModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MhsCplController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dosen\RPSController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Kaprodi\CplController;
use App\Http\Controllers\Kaprodi\PeoController;
use App\Http\Controllers\Kaprodi\CpmkController;
use App\Http\Controllers\Kaprodi\KelasController;
use App\Http\Controllers\Kaprodi\MatkulController;
use App\Http\Controllers\Kaprodi\MKCPMKController;
use App\Http\Controllers\Kaprodi\BKMKMapController;
use App\Http\Controllers\Kaprodi\CPLCPMKController;
use App\Http\Controllers\Kaprodi\SubCpmkController;
use App\Http\Controllers\Admin\KelasAdminController;
use App\Http\Controllers\Kaprodi\BKCPLMapController;
use App\Http\Controllers\Kaprodi\CPLPLMapController;
use App\Http\Controllers\Kaprodi\KurikulumController;
use App\Http\Controllers\Kaprodi\MKCPMKCPLController;
use App\Http\Controllers\PembobotanCPMKCPLController;
use App\Http\Controllers\Kaprodi\CPMKMPLMapController;
use App\Http\Controllers\Kaprodi\BahanKajianController;
use App\Http\Controllers\Dosen\RencanaAsesmenController;
use App\Http\Controllers\Kaprodi\PLPEOMappingController;
use App\Http\Controllers\Kaprodi\BobotController;

// Controller Admin
use App\Http\Controllers\Kaprodi\VisiKeilmuanController;
use App\Http\Controllers\Kaprodi\ProfilLulusanController;
use App\Http\Controllers\Kaprodi\TahunakademikController;

use App\Http\Controllers\Admin\ModelPembelajaranController;
use App\Http\Controllers\Dosen\EvaluasiMahasiswaController;
use App\Http\Controllers\Admin\MetodePembelajaranController;
use App\Http\Controllers\Admin\TahunakademikAdminController;
use App\Http\Controllers\Admin\TeknikPenilaianAdminController;
use App\Http\Controllers\Admin\KriteriaPenilaianAdminController;
use App\Http\Controllers\Admin\MasterMahasiswaController;
use App\Http\Controllers\Dosen\KelasDosenController;
use App\Http\Controllers\Admin\KelolaPenggunaController;
use App\Http\Controllers\EvaluasiUpmController;
use App\Http\Controllers\Kaprodi\AdminController;

// Set the root to the login page
Route::get('/', [LoginController::class, 'showLoginForm'])->name('home');


use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/test-pdf', function () {
    $pdf = Pdf::loadHTML('
        <h1>DOMPDF LOCAL OK</h1>
        <p>PDF berhasil dibuat</p>
    ');
    return $pdf->stream('test.pdf');
});



// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Route (Protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('rps', RPSController::class);
    Route::get('/rps/{rps}/generate-pdf', [RPSController::class, 'generatePDF'])->name('rps.generatePDF');

    Route::middleware('role:kaprodi')->prefix('kaprodi')->group(function () {
        // Route::resource('bahan-kajian', BahanKajianController::class);
        // Route::resource('cpl', CplController::class);
        // Route::resource('profil-lulusan', ProfilLulusanController::class);
        Route::resource('kurikulum', KurikulumController::class);
        Route::resource('mhs-cpl', MhsCplController::class);
        Route::resource('visi-keilmuan', VisiKeilmuanController::class);
        Route::get('/evaluasi-upm', [EvaluasiUpmController::class, 'index'])->name('evaluasi-upm.index'); 
        
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

        // Pembobotan CPL-CPMK di CPMK
        Route::get('/pembobotan/mata-kuliah/{mataKuliah}/edit', [PembobotanCPMKCPLController::class, 'edit'])->name('pembobotan.edit');
        // Route untuk memproses (menyimpan) form
        Route::put('/pembobotan/mata-kuliah/{mataKuliah}', [PembobotanCPMKCPLController::class, 'update'])->name('pembobotan.update');

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

        // // coba admin
        // Route::get('/roleadmin', [AdminController::class, 'index'])->name('role_admin');

        
        Route::get('/bobot-cpmk/{id_mk}', [BobotController::class, 'bobotCPMKperMK'])->name('bobot.cpmk.edit');
        Route::post('/bobot-cpmk/update/{id_mk}', [BobotController::class, 'updateBobotCPMK'])->name('bobot.cpmk.update');

        //Route::put('/mapping/cpmk-cpl', [CPMKMPLMapController::class, 'updateCPMKCPLMap'])->name('cpmk-cpl-mapping.update');
    });

    Route::middleware('role:dosen')->prefix('dosen')->group(function() {
        Route::resource('matkul', MatkulController::class);
        Route::resource('evaluasi-mahasiswa', EvaluasiMahasiswaController::class);
        
        Route::resource('rencana-asesmen', RencanaAsesmenController::class);
        Route::get('rencana-asesmen/form/{mataKuliah}', RencanaAsesmenForm::class)->name('rencana-asesmen.create');

        // Evaluasi Mahasiswa
            Route::get('/evaluasi/lihat/kelas/{id}', [EvaluasiMahasiswaController::class, 'lihatEvaluasi'])->name('dosen.lihat.evaluasi');
            // update nilai untuk evaluasi mahasiswa
            Route::post('/evaluasi/kelas/{id}/update-nilai', [EvaluasiMahasiswaController::class, 'updateNilai'])->name('dosen.evaluasi.updateNilai');


        // Kelas
            // masuk ke halaman kelas
            Route::get('/dosen/kelas/index', [KelasDosenController::class, 'index'])->name('dosen_kelas.index');
            // lihat daftar mahasiswa untuk kelas
            Route::get('/dosen/kelas/lihat/{id}', [KelasDosenController::class, 'lihatKelas'])->name('dosen.kelas.lihat');

        // Penilaian Mahasiswa Per Kelas
            // lihat daftar mahasiswa untuk kelas
            Route::get('/dosen/kelas/penilaian/kelas/{id}', [KelasDosenController::class, 'nilaiKelas'])->name('dosen.kelas.penilaian');
    
        Route::post('/dosen/kelas/{id}/nilai/simpan', [KelasDosenController::class, 'simpanNilai'])->name('dosen_kelas.simpanNilai');

        // Lihat Pemetaan MK-CPMK-CPL Per Mahasiswa
            Route::get('/dosen/pemetaan/', [KelasDosenController::class, 'index'])->name('pemetaan_mhs.index');

        // melihat capaian rata-rata perkelas
            Route::get('/dosen/capaian/{id}', [KelasDosenController::class, 'capaian_ratarata'])->name('capaian_ratarata.index');




    });


    Route::get('/mapping/tahun-akademik-kurikulum/tambah', [TahunakademikController::class, 'tambahTA'])->name('ta-kurikulum-mapping.add');
    Route::get('/mapping/tahun-akademik-kurikulum/index', [TahunakademikController::class, 'index'])->name('ta.index');
    Route::post('/mapping/tahun-akademik-kurikulum/update', [TahunakademikController::class, 'updateTA'])->name('ta.update');
    Route::get('/mapping/tahun-akademik-kurikulum', [TahunakademikController::class, 'index'])->name('ta.index');
    
    // buat kelas
    Route::get('/mapping/kelas/index', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('/mapping/kelas/tambah', [KelasController::class, 'tambahKelas'])->name('kelas.add');

    // Edit kelas
    Route::get('/mapping/kelas/{id}/edit', [KelasController::class, 'editKelas'])->name('kelas.edit');
    // update kelas
    Route::put('/mapping/kelas/{id}', [KelasController::class, 'updateKelas'])->name('kelas.update');

    // hapus kelas
    Route::get('/mapping/kelas/{id}/hapus', [KelasController::class, 'hapusKelas'])->name('kelas.hapus');
    // hapus kelas
    Route::get('/mapping/kelas/{id}/hapus', [KelasController::class, 'hapusKelas'])->name('kelas.hapus');


    // ROLE ADMIN
    Route::middleware('role:admin')->prefix('admin')->group(function () {
        // KURIKULUM, TAHUN AKADEMIK, DAN KELAS
            Route::get('/mapping/tahun-akademik-kurikulum/tambah', [TahunakademikController::class, 'tambahTA'])->name('ta-kurikulum-mapping.add');
            Route::get('/mapping/tahun-akademik-kurikulum/index', [TahunakademikController::class, 'index'])->name('ta.index');
            Route::post('/mapping/tahun-akademik-kurikulum/update', [TahunakademikController::class, 'updateTA'])->name('ta.update');
            Route::get('/mapping/tahun-akademik-kurikulum', [TahunakademikController::class, 'index'])->name('ta.index');
            // buat kelas
            // Route::get('/mapping/kelas/index', [KelasController::class, 'index'])->name('kelas.index');
            // Route::get('/mapping/kelas/tambah', [KelasController::class, 'tambahKelas'])->name('kelas.add');
            // Edit kelas
            // Route::get('/mapping/kelas/{id}/edit', [KelasController::class, 'editKelas'])->name('kelas.edit');
            // update kelas
            // Route::put('/mapping/kelas/{id}', [KelasController::class, 'updateKelas'])->name('kelas.update');
            // hapus kelas
            // Route::get('/mapping/kelas/{id}/hapus', [KelasController::class, 'hapusKelas'])->name('kelas.hapus');
            // hapus kelas
            // Route::get('/mapping/kelas/{id}/hapus', [KelasController::class, 'hapusKelas'])->name('kelas.hapus');

        // TAHUN AKADEMIK DAN KELAS
            Route::get('/mapping/tahun-akademik-kurikulum/tambah', [TahunakademikAdminController::class, 'tambahTA'])->name('ta-kurikulum-mapping.add');
            Route::get('/mapping/tahun-akademik-kurikulum/index', [TahunakademikAdminController::class, 'index'])->name('ta.admin.index');
            Route::post('/mapping/tahun-akademik-kurikulum/update', [TahunakademikAdminController::class, 'updateTA'])->name('ta.update');
            Route::get('/mapping/tahun-akademik-kurikulum', [TahunakademikAdminController::class, 'index'])->name('ta.admin.index');
            
            // buat kelas
            Route::get('/mapping/kelas/index', [KelasAdminController::class, 'index'])->name('kelas.index');
            Route::get('/mapping/kelas/tambah', [KelasAdminController::class, 'tambahKelas'])->name('kelas.add');

            // Edit kelas
            Route::get('/mapping/kelas/{id}/edit', [KelasAdminController::class, 'editKelas'])->name('kelas.edit');

            // update kelas
            Route::put('/mapping/kelas/{id}', [KelasAdminController::class, 'updateKelas'])->name('kelas.updaterill');

            // hapus kelas
            Route::get('/mapping/kelas/{id}/hapus', [KelasAdminController::class, 'hapusKelas'])->name('kelas.hapus');

            // lihat daftar mahasiswa untuk kelas
            Route::get('/mapping/kelas/lihat/{id}', [KelasAdminController::class, 'lihatKelas'])->name('kelas.lihat');
        
        // TEKNIK PENILAIAN
            Route::get('/teknik-penilaian', [TeknikPenilaianAdminController::class, 'index'])->name('teknik-penilaian.index');
            Route::get('/teknik-penilaian/edit', [TeknikPenilaianAdminController::class, 'editAll'])->name('teknik-penilaian.edit'); 
            Route::get('/teknik-penilaian/create', [TeknikPenilaianAdminController::class, 'create'])->name('teknik-penilaian.create'); 

            // edit teknik penilaian
            Route::put('/teknik-penilaian/update-all', [TeknikPenilaianAdminController::class, 'updateAll'])->name('teknik-penilaian.updateAll');

            // tambah teknik penilaian
            Route::post('/teknik-penilaian/store', [TeknikPenilaianAdminController::class, 'store'])->name('teknik-penilaian.store');

        // KRITERIA PENILAIAN 
            Route::get('/kriteria-penilaian', [KriteriaPenilaianAdminController::class, 'index'])->name('kriteria-penilaian.index'); 
            Route::get('/kriteria-penilaian/edit', [KriteriaPenilaianAdminController::class, 'editAll'])->name('kriteria-penilaian.edit'); 
            Route::get('/kriteria-penilaian/create', [KriteriaPenilaianAdminController::class, 'create'])->name('kriteria-penilaian.create'); 

            // edit teknik penilaian
            Route::put('/kriteria-penilaian/update-all', [KriteriaPenilaianAdminController::class, 'updateAll'])->name('kriteria-penilaian.updateAll');

            // tambah teknik penilaian
            Route::post('/kriteria-penilaian/store', [KriteriaPenilaianAdminController::class, 'store'])->name('kriteria-penilaian.store');

        // MODEL PEMBELAJARAN 
            Route::get('/model-pembelajaran', [ModelPembelajaranController::class, 'index'])->name('model-pembelajaran.index'); 
            Route::get('/model-pembelajaran/edit', [ModelPembelajaranController::class, 'editAll'])->name('model-pembelajaran.edit'); 
            Route::get('/model-pembelajaran/create', [ModelPembelajaranController::class, 'create'])->name('model-pembelajaran.create'); 

            // edit teknik penilaian
            Route::put('/model-pembelajaran/update-all', [ModelPembelajaranController::class, 'updateAll'])->name('model-pembelajaran.updateAll');

            // tambah teknik penilaian
            Route::post('/model-pembelajaran/store', [ModelPembelajaranController::class, 'store'])->name('model-pembelajaran.store');

        // METODE PMEBELAJARAN
            Route::get('/metode-pembelajaran', [MetodePembelajaranController::class, 'index'])->name('metode-pembelajaran.index'); 
            Route::get('/metode-pembelajaran/edit', [MetodePembelajaranController::class, 'editAll'])->name('metode-pembelajaran.edit'); 
            Route::get('/metode-pembelajaran/create', [MetodePembelajaranController::class, 'create'])->name('metode-pembelajaran.create'); 

            // edit teknik penilaian
            Route::put('/metode-pembelajaran/update-all', [MetodePembelajaranController::class, 'updateAll'])->name('metode-pembelajaran.updateAll');

            // tambah teknik penilaian
            Route::post('/metode-pembelajaran/store', [MetodePembelajaranController::class, 'store'])->name('metode-pembelajaran.store');
        
        //MASTER MAHASISWA
            Route::get('/master-mahasiswa', [MasterMahasiswaController::class, 'index'])->name('master-mahasiswa.index');
            Route::get('/master-mahasiswa/create', [MasterMahasiswaController::class, 'create'])->name('master-mahasiswa.create');  
            Route::get('/master-mahasiswa/edit/{id}', [MasterMahasiswaController::class, 'edit'])->name('master-mahasiswa.edit');
            Route::put('/master-mahasiswa/update/{id}', [MasterMahasiswaController::class, 'update'])->name('master-mahasiswa.update');
            Route::post('/master-mahasiswa/import', [MasterMahasiswaController::class, 'importExcel'])->name('master-mahasiswa.import');

        // CRUD ADMIN
            Route::get('/kelola-pengguna', [KelolaPenggunaController::class, 'index'])->name('admin.kelola-pengguna.index');
            Route::get('/kelola-pengguna/create', [KelolaPenggunaController::class, 'create'])->name('admin.kelola-pengguna.create');
            Route::post('/kelola-pengguna', [KelolaPenggunaController::class, 'store'])->name('admin.kelola-pengguna.store');

            Route::get('/kelola-pengguna/{id_user}/edit', [KelolaPenggunaController::class, 'edit'])->name('admin.kelola-pengguna.edit');
            Route::put('/kelola-pengguna/{id_user}', [KelolaPenggunaController::class, 'update'])->name('admin.kelola-pengguna.update');

            Route::delete('/kelola-pengguna/{id_user}', [KelolaPenggunaController::class, 'destroy'])->name('admin.kelola-pengguna.destroy');





    });

    // ROle Pimpinan
    Route::middleware('role:pimpinan,upm')->prefix('pimpinan')->group(function () {
        Route::get('/profil-lulusan-all', [ProfilLulusanController::class, 'index'])->name('profil-lulusan-all.index');
        Route::get('/peo-all', [PeoController::class, 'index'])->name('peo-all.index');
        Route::get('/cpl-all', [CplController::class, 'index'])->name('cpl-all.index');
        Route::get('/bahan-kajian-all', [BahanKajianController::class, 'index'])->name('bahan-kajian-all.index');    
        Route::get('/mata-kuliah-all', [MatkulController::class, 'index'])->name('mata-kuliah-all.index');   
        Route::get('/cpmk-all', [CpmkController::class, 'index'])->name('cpmk-all.index');             
        Route::get('/pengguna-all', [KelolaPenggunaController::class, 'index'])->name('pengguna-all.index');             
        Route::get('/mahasiswa-all', [MasterMahasiswaController::class, 'index'])->name('mahasiswa-all.index'); 
    }); 

    // Role UPM 
    Route::middleware('role:upm')->prefix('upm')->group(function () {
        Route::get('/evaluasi-upm-all', [EvaluasiUpmController::class, 'index'])->name('evaluasi-upm-all.index'); 
    });  
});
