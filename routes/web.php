<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/homepage-pagi', [HomeController::class, 'paginated'])->name('homepage.paginated');

Route::get('/daftar', [AuthController::class, 'showRegister'])->name('daftar');
Route::post('/daftar', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/berita/kategori/{kategori}', [NewsController::class, 'byKategori'])->name('berita.kategori');

Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/view/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/search-berita', [BeritaController::class, 'search']);
Route::get('/cari', [BeritaController::class, 'cari'])->name('berita.cari');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/ubahprof', function () {
    return view('ubah-profile');
})->name('ubah-profile');

Route::get('/kate-selec', function () {
    return view('kategori-selector');
})->name('kategori-selector');

Route::post('/logout', function () {
    Auth::logout(); 
    request()->session()->invalidate(); 
    request()->session()->regenerateToken(); 
    return redirect()->route('homepage'); 
})->name('logout');