<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\KonfigurasiController;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth'])->name('login');
Route::middleware(['middleware'=>'auth'])->group(function () {
    Route::get('/admin', [AuthController::class, 'admin']);
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/konfigurasi', [KonfigurasiController::class, 'index']);
    Route::post('/konfigurasi', [KonfigurasiController::class, 'add']);
    Route::put('/konfigurasi-update/{id}', [KonfigurasiController::class, 'update']);

    Route::get('/about-me/{id}', [AboutMeController::class, 'index']);
    Route::put('/about-me-update/{id}', [AboutMeController::class, 'update']);

    Route::get('/portofolio', [PortofolioController::class, 'index']);
    Route::post('/portofolio', [PortofolioController::class, 'add']);
    Route::delete('/portofolio-delete/{id}', [PortofolioController::class, 'delete']);


});

Route::middleware(['allow.index'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});

