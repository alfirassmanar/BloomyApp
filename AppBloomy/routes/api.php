<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// for controller access
// use App\Http\Controllers\Auth\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/api/prosesRegistrasi', [AuthController::class, 'prosesRegistrasi'])->name('prosesRegistrasi.admin.bloomy')->middleware('authAdmin');
Route::post('/api/prosesLogin', [AuthController::class, 'prosesLogin'])->name('prosesLogin.admin.bloomy')->middleware('authAdmin');
Route::post('/api/prosesLogout', [AuthController::class, 'prosesLogout'])->name('prosesLogout.admin.bloomy')->middleware('authAdmin');
