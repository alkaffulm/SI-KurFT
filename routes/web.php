<?php

use App\Http\Controllers\KurikulumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BahanKajianController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\CpmkController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatkulController;
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
});
Route::resource('bahan-kajian', BahanKajianController::class);
Route::resource('cpl', CplController::class);
Route::resource('cpmk', CpmkController::class);
Route::resource('sub-cpmk', SubCpmkController::class);
Route::resource('mata-kuliah', MatkulController::class);
Route::resource('profil-lulusan', ProfilLulusanController::class);
Route::resource('kurikulum', KurikulumController::class);

