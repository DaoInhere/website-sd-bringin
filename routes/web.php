<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Import Controller Halaman Depan

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama (Depan) - Bisa diakses siapa saja
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- Kita hapus dulu rute login/dashboard karena filenya belum ada ---
// Nanti kita tambahkan lagi kalau sudah install fitur Login.