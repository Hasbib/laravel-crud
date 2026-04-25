<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/satu', function () {
    return view('welcome');
});

    Route::get('/', [PagesController::class, 'index'])->name('home.index');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'show']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
 
    Route::get('/barang', [BarangController::class, 'barang'])->name('barang.index');
    Route::get('tambah-barang', [BarangController::class, 'tambahbarang']);
    Route::post('tambah-barang', [BarangController::class, 'store']);
    Route::get('edit/barang/{barang}/edit', [BarangController::class, 'editbarang']);
    Route::put('edit/barang/{barang}', [BarangController::class, 'update']);
    Route::delete('/barang/{barang}', [BarangController::class, 'destroy']);


    // Mahasiswa
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create']);
    Route::post('/tambah-mahasiswa', [MahasiswaController::class, 'store']);
    Route::get('/edit/mahasiswa/{mahasiswa}/edit', [MahasiswaController::class, 'edit']);
    Route::put('/edit/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy']);