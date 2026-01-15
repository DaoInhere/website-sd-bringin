<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\GalleryController; // <--- PENTING: Panggil Controller Galeri

// 1. HALAMAN DEPAN
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. DASHBOARD ADMIN (Halaman Utama Admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. FITUR ADMIN (Harus Login)
Route::middleware('auth')->group(function () {
    // Fitur Profil Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FITUR: CRUD BERITA
    Route::resource('posts', PostController::class);

    // FITUR BARU: CRUD GALERI
    Route::resource('galleries', GalleryController::class);
});

// 4. SISTEM LOGIN
require __DIR__.'/auth.php';