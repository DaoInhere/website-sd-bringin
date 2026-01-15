<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
=======
use App\Http\Controllers\PostController; 
>>>>>>> 8be42cf39953bc2e47a4ac8edd4db1e77a08f80d

// 1. HALAMAN DEPAN
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. DASHBOARD ADMIN (Halaman Utama Admin)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

<<<<<<< HEAD
Route::get('/schedules', function() {
    return view('schedules');
});

Route::get('/schedule', [ScheduleController::class, 'index']);

// 3. FITUR PROFIL
=======
// 3. FITUR ADMIN (Harus Login)
>>>>>>> 8be42cf39953bc2e47a4ac8edd4db1e77a08f80d
Route::middleware('auth')->group(function () {
    // Fitur Profil Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // FITUR BARU: CRUD BERITA
    Route::resource('posts', PostController::class);
});

// 4. SISTEM LOGIN
require __DIR__.'/auth.php';