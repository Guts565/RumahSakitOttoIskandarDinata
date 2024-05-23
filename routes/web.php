<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('siswa.index');
});

// Route untuk menangani GET request yang ditujukan pada /siswa/create
Route::get('/siswa/create', [SiswaController::class, 'create']);

Route::post('/siswa', [SiswaController::class, 'store']);

Route::get('/siswa', [SiswaController::class, 'index']);

Route::get('/siswa/{id_siswa}', [SiswaController::class, 'show']);

Route::get('/siswa/{id_siswa}/edit', [SiswaController::class, 'edit']);

Route::put('/siswa/{id_siswa}', [SiswaController::class, 'update']);

Route::delete('/siswa/{id_siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::post('/siswa/deleteSelected', 'SiswaController@deleteSelected')->name('siswa.deleteSelected');
