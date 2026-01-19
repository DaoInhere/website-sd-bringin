<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;     
use App\Http\Controllers\PostController;     
use App\Http\Controllers\GalleryController;  
use App\Http\Controllers\TeacherController;  
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\ScheduleController; 
use App\Http\Controllers\PageController;     

// 1. HALAMAN DEPAN (HOME)
Route::get('/', [HomeController::class, 'index'])->name('home');

// === JALUR PUBLIK (Halaman Frontend / Tanpa Login) ===
// Menu Dropdown Profil
Route::get('/profile/sejarah', [PageController::class, 'sejarah'])->name('public.sejarah');
Route::get('/profile/visi-misi', [PageController::class, 'visi'])->name('public.visi');
Route::get('/profile/struktur', [PageController::class, 'struktur'])->name('public.struktur');
Route::get('/profile/sarana', [PageController::class, 'sarana'])->name('public.sarana');

// Menu Informasi & Galeri & Berita
Route::get('/guru', [PageController::class, 'teachers'])->name('public.teachers');
Route::get('/galeri', [PageController::class, 'galleries'])->name('public.galleries');
Route::get('/berita', [PageController::class, 'posts'])->name('public.posts');


// 2. DASHBOARD ADMIN
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. FITUR SCHEDULE (Jadwal)
Route::get('/schedules', [ScheduleController::class, 'schedules']);
Route::get('/schedule', [ScheduleController::class, 'index']);

// 4. FITUR ADMIN (Harus Login)
Route::middleware('auth')->group(function () {
    // Profil Bawaan
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD FITUR SEKOLAH
    Route::resource('posts', PostController::class);       // Berita
    Route::resource('galleries', GalleryController::class); // Galeri
    Route::resource('teachers', TeacherController::class);  // Guru
});

require __DIR__.'/auth.php';