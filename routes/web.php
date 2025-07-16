<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FrontendSuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reset-izin-search', function() {
    Session::forget('izin_search');
    return redirect()->back();
})->name('reset.izin.search');


Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/validasi-nidn', [SearchController::class, 'validasiNidn'])->name('validasi.nidn');

// Halaman publik untuk upload SK
Route::get('/tambah-sk', [FrontendSuratController::class, 'form'])->name('frontend.sk.form');
Route::post('/tambah-sk', [FrontendSuratController::class, 'proses'])->name('frontend.sk.proses');

Route::get('/login', [AuthController::class, 'index'])->name('auth.index')->middleware('guest');
Route::post('/login', [AuthController::class, 'verify'])->name('auth.verify');

Route::group(['middleware' => 'auth:user'], function(){
    Route::prefix('admin')->group(function(){
        Route::get('/',[DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/profile',[DashboardController::class, 'profile'])->name('dashboard.profile');
        Route::get('/reset-password', [DashboardController::class, 'resetPassword'])->name('dashboard.resetPassword');
        Route::post('/reset-password', [DashboardController::class, 'prosesResetPassword'])->name('dashboard.prosesResetPassword');

        Route::get('/kategori',[KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/tambah',[KategoriController::class, 'tambah'])->name('kategori.tambah');
        Route::post('/kategori/prosesTambah',[KategoriController::class, 'prosesTambah'])->name('kategori.prosesTambah');
        Route::get('/kategori/ubah/{id}',[KategoriController::class, 'ubah'])->name('kategori.ubah');
        Route::post('/kategori/prosesUbah',[KategoriController::class, 'prosesUbah'])->name('kategori.prosesUbah');
        Route::get('/kategori/hapus/{id}',[KategoriController::class, 'hapus'])->name('kategori.hapus');

        Route::get('/dosen',[DosenController::class, 'index'])->name('dosen.index');
        Route::get('/dosen/tambah',[DosenController::class, 'tambah'])->name('dosen.tambah');
        Route::post('/dosen/prosesTambah',[DosenController::class, 'prosesTambah'])->name('dosen.prosesTambah');
        Route::get('/dosen/ubah/{id}',[DosenController::class, 'ubah'])->name('dosen.ubah');
        Route::post('/dosen/prosesUbah',[DosenController::class, 'prosesUbah'])->name('dosen.prosesUbah');
        Route::get('/dosen/hapus/{id}',[DosenController::class, 'hapus'])->name('dosen.hapus');

        Route::get('/user',[UserController::class, 'index'])->name('user.index');
        Route::get('/user/tambah',[UserController::class, 'tambah'])->name('user.tambah');
        Route::post('/user/prosesTambah',[UserController::class, 'prosesTambah'])->name('user.prosesTambah');
        Route::get('/user/ubah/{id}',[UserController::class, 'ubah'])->name('user.ubah');
        Route::post('/user/prosesUbah',[UserController::class, 'prosesUbah'])->name('user.prosesUbah');
        Route::get('/user/hapus/{id}',[UserController::class, 'hapus'])->name('user.hapus');
    
        Route::get('/berita',[BeritaController::class, 'index'])->name('berita.index');
        Route::get('/berita/tambah',[BeritaController::class, 'tambah'])->name('berita.tambah');
        Route::post('/berita/prosesTambah',[BeritaController::class, 'prosesTambah'])->name('berita.prosesTambah');
        Route::get('/berita/ubah/{id}',[BeritaController::class, 'ubah'])->name('berita.ubah');
        Route::post('/berita/prosesUbah',[BeritaController::class, 'prosesUbah'])->name('berita.prosesUbah');
        Route::get('/berita/hapus/{id}',[BeritaController::class, 'hapus'])->name('berita.hapus');

        Route::get('/periode',[PeriodeController::class, 'index'])->name('periode.index');
        Route::get('/periode/tambah',[PeriodeController::class, 'tambah'])->name('periode.tambah');
        Route::post('/periode/prosesTambah',[PeriodeController::class, 'prosesTambah'])->name('periode.prosesTambah');
        Route::get('/periode/ubah/{id}',[PeriodeController::class, 'ubah'])->name('periode.ubah');
        Route::post('/periode/prosesUbah',[PeriodeController::class, 'prosesUbah'])->name('periode.prosesUbah');
        Route::get('/periode/hapus/{id}',[PeriodeController::class, 'hapus'])->name('periode.hapus');

    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

