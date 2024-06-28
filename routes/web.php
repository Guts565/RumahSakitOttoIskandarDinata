<?php

use App\Http\Controllers\CarouselController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JadwalController;
use App\Http\Middleware\Admin;
use App\Policies\AdminPolicy;

// Dokter Routes
Route::get('/', [DokterController::class, 'index']);
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/dokter/{id_dokter}', [DokterController::class, 'show']);

// admin routes
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/create', [AdminController::class, 'create']);
Route::get('/dokter/{id_dokter}/edit', [AdminController::class, 'edit']);
Route::put('/admin/{id_dokter}', [AdminController::class, 'update'])->name('dokter.update');
Route::post('/admin', [AdminController::class, 'store']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::delete('/admin/jadwal/{id}', [AdminController::class, 'destroyJadwal']);
// Route::post('/dokter/deleteSelected', [AdminController::class, 'deleteSelected'])->name('dokter.deleteSelected');

// carousel routes
Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
Route::get('/carousel/edit/{id}', [CarouselController::class, 'edit'])->name('carousel.edit');
Route::put('/carousel/{id}', [CarouselController::class, 'update'])->name('carousel.update');
Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
Route::post('/carousel/store', [CarouselController::class, 'store'])->name('carousel.store');
Route::delete('/carousel/{id}', [CarouselController::class, 'destroy'])->name('carousel.destroy');


