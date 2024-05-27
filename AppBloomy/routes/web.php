<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;

// Menggunakan Middlerware (Nanti saja)
// Route::middleware(['LoginBloomy'])->group(function () {
//     Route::get('/', [LoginController::class, 'index'])->name('index.loginBloomy');
// });

// Route Tampilan User
Route::get('/', [LoginController::class, 'index'])->name('index.bloomy');
Route::get('/Registrasi/Bloomy', [LoginController::class, 'registrasi'])->name('registrasi.bloomy');

// Route Tampilan Admin
Route::get('/Login/Admin', [AdminController::class, 'login'])->name('login.admin.bloomy');
Route::get('/Registrasi/Admin', [AdminController::class, 'registrasi'])->name('registrasi.admin.bloomy');
Route::get('/Dashboard/Admin', [AdminController::class, 'index'])->name('dashboard.bloomy');
