<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\InformasiController as AdminInformasiController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use Illuminate\Support\Facades\Route;

// ==========================================
// PUBLIC ROUTES
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.index');
Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/tracking', [PengaduanController::class, 'tracking'])->name('pengaduan.tracking');

// ==========================================
// AUTH ROUTES
// ==========================================
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');

// ==========================================
// ADMIN ROUTES (Protected)
// ==========================================
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Berita CRUD
    Route::resource('berita', AdminBeritaController::class)->names('admin.berita');

    // Informasi Publik CRUD
    Route::resource('informasi', AdminInformasiController::class)->names('admin.informasi');

    // Pengaduan Management
    Route::get('pengaduan', [AdminPengaduanController::class, 'index'])->name('admin.pengaduan.index');
    Route::get('pengaduan/{pengaduan}', [AdminPengaduanController::class, 'show'])->name('admin.pengaduan.show');
    Route::put('pengaduan/{pengaduan}', [AdminPengaduanController::class, 'update'])->name('admin.pengaduan.update');
    Route::delete('pengaduan/{pengaduan}', [AdminPengaduanController::class, 'destroy'])->name('admin.pengaduan.destroy');

    // Statistik Layanan CRUD
    Route::resource('statistik', StatistikController::class)->names('admin.statistik');

    // Profil Kelurahan
    Route::get('profil', [AdminProfilController::class, 'edit'])->name('admin.profil.edit');
    Route::put('profil', [AdminProfilController::class, 'update'])->name('admin.profil.update');

    // Sosial Media
    Route::get('social-media', [SocialMediaController::class, 'index'])->name('admin.social-media.index');
    Route::put('social-media', [SocialMediaController::class, 'update'])->name('admin.social-media.update');

    // Struktur Organisasi
    Route::resource('struktur', StrukturOrganisasiController::class)->names('admin.struktur')->parameters(['struktur' => 'struktur']);
});
