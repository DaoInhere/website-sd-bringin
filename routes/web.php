<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\GalleryController;  
use App\Http\Controllers\HomeController;     
use App\Http\Controllers\PageController;     
use App\Http\Controllers\PostController;     
use App\Http\Controllers\ScheduleController; 
use App\Http\Controllers\TeacherController;  

// 1. HALAMAN DEPAN (HOME)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/test', function () {
    return view('layouts/frontend2');
});

// === JALUR PUBLIK (Halaman Frontend / Tanpa Login) ===
// Menu Dropdown Profil
Route::get('/profil/sejarah', [PageController::class, 'sejarah'])->name('public.sejarah');
Route::get('/profil/visi-misi', [PageController::class, 'visi'])->name('public.visi');
Route::get('/profil/struktur', [PageController::class, 'struktur'])->name('public.struktur');
Route::get('/profil/sarana', [PageController::class, 'sarana'])->name('public.sarana');

// Menu Informasi
Route::get('/informasi/jadwalkbm', [PageController::class, 'schedules'])->name('public.schedules');

// Menu Informasi & Galeri & Berita
Route::get('/guru', [PageController::class, 'teachers'])->name('public.teachers');
Route::get('/galeri', [PageController::class, 'galleries'])->name('public.galleries');
Route::get('/berita', [PageController::class, 'posts'])->name('public.posts');
Route::get('/kesiswaan/ekstrakurikuler', function () {
return view('ekstrakurikuler');
});

// 2. DASHBOARD ADMIN
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 4. FITUR ADMIN (Harus Login)
Route::middleware('auth')->group(function () {
    // Profil Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile (admin).edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile (admin).update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile (admin).destroy');

    // CRUD FITUR SEKOLAH
    Route::resource('posts', PostController::class);       // Berita
    Route::resource('galleries', GalleryController::class); // Galeri
    Route::resource('teachers', TeacherController::class);  // Guru
});

require __DIR__.'/auth.php';