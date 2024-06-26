<?php

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
// Route::post('/dokter/deleteSelected', [AdminController::class, 'deleteSelected'])->name('dokter.deleteSelected');
Route::post('/admin', [AdminController::class, 'store']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::delete('/admin/jadwal/{id}', [AdminController::class, 'destroyJadwal']);

