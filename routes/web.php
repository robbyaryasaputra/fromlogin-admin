<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman login (method GET)
Route::get('/auth', [AuthController::class, 'index'])->name('login.form');

// Route untuk memproses form login (method POST)
Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');