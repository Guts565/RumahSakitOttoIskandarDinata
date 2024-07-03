<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PolisController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Policies\AdminPolicy;


// Dokter Routes
Route::get('/', [DokterController::class, 'index']);
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/dokter/{id_dokter}', [DokterController::class, 'show']);

// admin routes
Route::get('/login', [AdminController::class, 'login'])->middleware('guest');
Route::post('/auth', [AdminController::class, 'auth']);
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/admin/create', [AdminController::class, 'create'])->middleware('admin');
Route::get('/dokter/{id_dokter}/edit', [AdminController::class, 'edit'])->middleware('admin');
Route::put('/admin/{id_dokter}', [AdminController::class, 'update'])->name('dokter.update');
Route::post('/admin', [AdminController::class, 'store']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::delete('/admin/jadwal/{id}', [AdminController::class, 'destroyJadwal']);
Route::get('/logout', [AdminController::class, 'logout'])->middleware('admin');
// Route::post('/dokter/deleteSelected', [AdminController::class, 'deleteSelected'])->name('dokter.deleteSelected');

//users
Route::get('/user', [UserController::class, 'index'])->middleware('admin');
Route::get('/user/create', [UserController::class, 'create'])->middleware('admin');
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('admin');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//polis
Route::get('/poli', [PolisController::class, 'index'])->middleware('admin');
Route::get('/poli/create', [PolisController::class, 'create'])->middleware('admin');
Route::post('/poli', [PolisController::class, 'store']);
Route::get('/poli/{id}/edit', [PolisController::class, 'edit'])->middleware('admin');
Route::put('/poli/{id}', [PolisController::class, 'update'])->name('poli.update');
Route::delete('/poli/{id}', [PolisController::class, 'destroy'])->name('poli.destroy');

// carousel routes
Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index')->middleware('admin');
Route::get('/carousel/edit/{id}', [CarouselController::class, 'edit'])->name('carousel.edit')->middleware('admin');
Route::put('/carousel/{id}', [CarouselController::class, 'update'])->name('carousel.update');
Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create')->middleware('admin');
Route::post('/carousel/store', [CarouselController::class, 'store'])->name('carousel.store');
Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel.destroy');