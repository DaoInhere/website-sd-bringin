<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController; 

// 1. HALAMAN DEPAN
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. DASHBOARD ADMIN (Halaman Utama Admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/schedules', function() {
    return view('schedules');
});

Route::get('/schedule', [ScheduleController::class, 'index']);

// 3. FITUR PROFIL
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