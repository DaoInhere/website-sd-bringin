<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController; 
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ScheduleController; 
use App\Http\Controllers\TeacherController;

// 1. HALAMAN DEPAN
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. DASHBOARD ADMIN
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. FITUR SCHEDULE
Route::get('/schedules', function () {
    return view('schedules');
});

// 4. FITUR ADMIN (Harus Login)
Route::middleware('auth')->group(function () {
    // Profil Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD BERITA
    Route::resource('posts', PostController::class);

    // CRUD GALERI
    Route::resource('galleries', GalleryController::class);

    // CRUD GURU
    Route::resource('teachers', TeacherController::class);
});

require __DIR__.'/auth.php';