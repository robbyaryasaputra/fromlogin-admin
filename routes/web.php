<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman login (method GET)
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

// Route untuk memproses form login (method POST)
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Resource routes untuk CRUD Warga
Route::resource('warga', WargaController::class);

// Resource routes untuk CRUD Profil
Route::resource('profil', ProfilController::class);