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
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index')->middleware('permission:view.buku|create.buku|edit.buku|delete.buku|view.log');
    Route::get('/buku/add', [BukuController::class, 'add'])->name('buku.add')->middleware('permission:create.buku');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit')->middleware('permission:edit.buku');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/detail/{id}', [BukuController::class, 'show'])->name('buku.show')->middleware('permission:view.buku');
    Route::delete('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy')->middleware('permission:delete.buku');
    Route::get('/log-buku', [BukuController::class, 'log'])->name('buku.log')->middleware('permission:view.log');

    // Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index')->middleware('permission:view.kategori|create.kategori|edit.kategori|delete.kategori|view.log');
    Route::get('/kategori/add', [KategoriController::class, 'add'])->name('kategori.add')->middleware('permission:create.kategori');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('permission:edit.kategori');
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/detail/{id}', [KategoriController::class, 'show'])->name('kategori.show')->middleware('permission:view.kategori');
    Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy')->middleware('permission:delete.kategori');
    Route::get('/log-kategori', [KategoriController::class, 'log'])->name('kategori.log')->middleware('permission:view.log');

    // Penerbit
    Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index')->middleware('permission:view.penerbit|create.penerbit|edit.penerbit|delete.penerbit|view.log');
    Route::get('/penerbit/add', [PenerbitController::class, 'add'])->name('penerbit.add')->middleware('permission:create.penerbit');
    Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
    Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit')->middleware('permission:edit.penerbit');
    Route::put('/penerbit/update/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
    Route::get('/penerbit/detail/{id}', [PenerbitController::class, 'show'])->name('penerbit.show')->middleware('permission:view.penerbit');
    Route::delete('/penerbit/destroy/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy')->middleware('permission:delete.penerbit');
    Route::get('/log-penerbit', [PenerbitController::class, 'log'])->name('penerbit.log')->middleware('permission:view.log');
});

require __DIR__.'/auth.php';

