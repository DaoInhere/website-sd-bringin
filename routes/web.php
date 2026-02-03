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
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\MailTestingController;
use App\Models\HeroBanner;

// 1. HALAMAN DEPAN (HOME)
Route::get('/', [HomeController::class, 'index'])->name('home');

// === JALUR PUBLIK (Halaman Frontend / Tanpa Login) ===
// Menu Dropdown Profil
Route::get('/profil/sejarah', [PageController::class, 'sejarah'])->name('public.sejarah');
Route::get('/profil/visi-misi', [PageController::class, 'visi'])->name('public.visi');
Route::get('/profil/struktur', [PageController::class, 'struktur'])->name('public.struktur');
Route::get('/profil/sarana', [PageController::class, 'sarana'])->name('public.sarana');

// Menu Informasi, Galeri, Berita & Kontak
Route::get('/kesiswaan/ekstrakurikuler', [PageController::class, 'extracurriculars'])->name('public.extracurriculars');
Route::get('/kesiswaan/prestasi', [PageController::class, 'achievements'])->name('public.achievements');
Route::get('/informasi/berita', [PageController::class, 'posts'])->name('public.posts');
Route::get('/informasi/jadwalkbm', [PageController::class, 'schedules'])->name('public.schedules');
Route::get('/informasi/guru', [PageController::class, 'teachers'])->name('public.teachers');
Route::get('/informasi/syarat-pendaftaran', [PageController::class, 'registerRequirements'])->name('public.registerRequirements');
Route::get('/galeri', [PageController::class, 'galleries'])->name('public.galleries');
Route::get('/kontak', [PageController::class, 'kontak'])->name('public.kontak');

// 2. DASHBOARD ADMIN
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 4. FITUR ADMIN (Harus Login)
Route::middleware('auth')->group(function () {
    // Profil Bawaan
    Route::get('/dashboard/pengaturan', [ProfileController::class, 'edit'])->name('profile (admin).edit');
    Route::patch('/dashboard/pengaturan', [ProfileController::class, 'update'])->name('profile (admin).update');
    Route::delete('/dashboard/pengaturan', [ProfileController::class, 'destroy'])->name('profile (admin).destroy');

    // CRUD FITUR SEKOLAH
    Route::resource('/dashboard/berita', PostController::class)->names('posts');       // Berita
    Route::resource('/dashboard/galeri', GalleryController::class)->names('galleries'); // Galeri
    Route::resource('/dashboard/guru', TeacherController::class)->names('teachers');  // Guru
    Route::resource('/dashboard/jadwalkbm', ScheduleController::class)->names('schedules'); // JadwalSS
    Route::resource('/dashboard/prestasi', AchievementController::class)->names('achievements'); // Prestasi
    Route::resource('/dashboard/banner', HeroBannerController::class)->names('herobanners'); // Banner Beranda
});

require __DIR__.'/auth.php';