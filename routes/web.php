<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BerandaController::class, 'index']);



