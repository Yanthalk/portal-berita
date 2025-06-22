<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/homepage-pagi', [HomeController::class, 'paginated'])->name('homepage.paginated');

Route::get('/daftar', [AuthController::class, 'showRegister'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/berita/kategori/{kategori}', [NewsController::class, 'byKategori'])->name('berita.kategori');

Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/view/{id}', [HomeController::class, 'showDetail'])->name('view-berita');
Route::post('/berita/view/{id}/komentar', [HomeController::class, 'kirimKomentar'])->middleware('auth')->name('kirim-komentar');
Route::get('/search-berita', [BeritaController::class, 'search']);
Route::get('/cari', [BeritaController::class, 'cari'])->name('berita.cari');
Route::get('/kategori/{slug}', [\App\Http\Controllers\KategoriController::class, 'tampilkanBerita'])->name('kategori.show');
Route::get('/kategori/{slug}/semua', [KategoriController::class, 'kategoriPaginated'])->name('kategori.paginated');


Route::get('/profile', [HomeController::class, 'showProfile'])->name('profile');

Route::middleware('auth')->group(function () {
    Route::get('/ubah-profile', [HomeController::class, 'editProfile'])->name('ubah-profile');
    Route::post('/ubah-profile', [HomeController::class, 'updateProfile'])->name('ubah-profile.update');
});

Route::post('/logout', function () {
    Auth::logout(); 
    request()->session()->invalidate(); 
    request()->session()->regenerateToken(); 
    return redirect()->route('homepage'); 
})->name('logout');