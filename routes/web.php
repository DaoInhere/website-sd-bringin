<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;

// 1. HALAMAN DEPAN
Route::get('/', [HomeController::class, 'index'])->name('home');

// 2. DASHBOARD ADMIN (Wajib Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/schedules', function() {
    return view('schedules');
});

Route::get('/schedule', [ScheduleController::class, 'index']);

// 3. FITUR PROFIL
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 4. FILE AUTH 
require __DIR__.'/auth.php';