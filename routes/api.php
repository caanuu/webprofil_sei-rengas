<?php

use App\Http\Controllers\Api\BeritaApiController;
use App\Http\Controllers\Api\InformasiApiController;
use App\Http\Controllers\Api\StatistikApiController;
use App\Http\Controllers\Api\PengaduanApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/berita', [BeritaApiController::class, 'index']);
    Route::get('/berita/{slug}', [BeritaApiController::class, 'show']);
    Route::get('/informasi', [InformasiApiController::class, 'index']);
    Route::get('/statistik', [StatistikApiController::class, 'index']);
    Route::post('/pengaduan', [PengaduanApiController::class, 'store']);
    Route::get('/pengaduan/{nomor_tiket}', [PengaduanApiController::class, 'show']);
});
