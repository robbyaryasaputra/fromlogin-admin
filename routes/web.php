<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\UserController;

Route::get('/', function () {

});

// Route untuk menampilkan halaman login (method GET)
Route::get('/', [AuthController::class, 'index'])->name('login.form');

// Route untuk memproses form login (method POST)
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

// Resource routes untuk CRUD Warga
Route::resource('warga', WargaController::class);

// Resource routes untuk CRUD Profil
Route::resource('profil', ProfilController::class);

// Resource routes untuk CRUD Kategori Berita
Route::resource('kategori-berita', KategoriBeritaController::class);

// Resource routes untuk CRUD User
Route::resource('user', UserController::class);
