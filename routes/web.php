<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\RegistToguideController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HalblogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuccessController;
use Symfony\Component\HttpKernel\Profiler\Profile;

// Menggunakan Middlerware (Nanti saja)
// Route::middleware(['LoginBloomy'])->group(function () {
//     Route::get('/', [LoginController::class, 'index'])->name('index.loginBloomy');
// });

// Route Tampilan User
// Route::get('/', [LoginController::class, 'index'])->name('index.bloomy');
Route::get('/', [HomeController::class, 'index'])->name('home.bloomy');
Route::get('/Registrasi/Bloomy', [LoginController::class, 'registrasi'])->name('registrasi.bloomy');
Route::get('/RegistToGuide/Bloomy', [RegistToguideController::class, 'index'])->name('registToguide');
Route::get('/Pembayaran/Bloomy', [PembayaranController::class, 'index'])->name('pembayaran');
Route::get('/Success/Bloomy', [SuccessController::class, 'index'])->name('successPay');

// Route Tampilan Admin
Route::get('/Login/Admin', [AdminController::class, 'login'])->name('login.admin.bloomy');
Route::get('/Registrasi/Admin', [AdminController::class, 'registrasi'])->name('registrasi.admin.bloomy');
Route::get('/Dashboard/Admin', [AdminController::class, 'index'])->name('dashboard.bloomy');

Route::get('/blog-bloomy', [BlogController::class, 'index'])->name('blog.bloomy');
Route::get('/bantuan-bloomy', [BantuanController::class, 'index'])->name('bantuan.bloomy');
Route::get('/contact-person', [ContactController::class, 'index'])->name('contactPerson');
Route::get('/profile-bloomy', [ProfileController::class, 'index'])->name('profile');
Route::get('/halaman-blog-bloomy', [HalblogController::class, 'index'])->name('blog.halBlog');
