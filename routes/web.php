<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Penerbit;

Route::get('/', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::middleware('auth')->group(function () {
    // Buku
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/add', [BukuController::class, 'add'])->name('buku.add');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/detail/{id}', [BukuController::class, 'show'])->name('buku.show');
    Route::delete('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::get('/log-buku', [BukuController::class, 'log'])->name('buku.log');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/add', [KategoriController::class, 'add'])->name('kategori.add');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/detail/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('/log-kategori', [KategoriController::class, 'log'])->name('kategori.log');

    // Penerbit
    Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
    Route::get('/penerbit/add', [PenerbitController::class, 'add'])->name('penerbit.add');
    Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
    Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
    Route::put('/penerbit/update/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
    Route::get('/penerbit/detail/{id}', [PenerbitController::class, 'show'])->name('penerbit.show');
    Route::delete('/penerbit/destroy/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');
    Route::get('/log-penerbit', [PenerbitController::class, 'log'])->name('penerbit.log');
});

require __DIR__.'/auth.php';

