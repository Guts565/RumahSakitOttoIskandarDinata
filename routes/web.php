<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;

// Dokter Routes
Route::get('/', [DokterController::class, 'index']);
Route::get('/admin/create', [DokterController::class, 'create']);
Route::post('/dokter', [DokterController::class, 'store']);
Route::get('/dokter', [DokterController::class, 'index']);
Route::get('/dokter/{id_dokter}', [DokterController::class, 'show']);
Route::get('/dokter/{id_dokter}/edit', [DokterController::class, 'edit']);
Route::put('/dokter/{id_dokter}', [DokterController::class, 'update']);
Route::delete('/dokter/{id_dokter}', [DokterController::class, 'destroy'])->name('dokter.destroy');
Route::post('/dokter/deleteSelected', [DokterController::class, 'deleteSelected'])->name('dokter.deleteSelected');