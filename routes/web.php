<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // Import Controller Halaman Depan

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Utama (Depan) - Bisa diakses siapa saja
Route::get('/', [HomeController::class, 'index'])->name('home');

// --- Kita hapus dulu rute login/dashboard karena filenya belum ada ---
// Nanti kita tambahkan lagi kalau sudah install fitur Login.
=======
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});
>>>>>>> 47265a4096cc86dbaecee11fbf6e8820d663e9fd
