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

// Menu Beranda
Route::get('/', [PageController::class, 'home'])->name('public.home');

// Menu Dropdown Profil
Route::get('/profil/sejarah', [PageController::class, 'schoolHistory'])->name('public.schoolHistory');
Route::get('/profil/visi-misi', [PageController::class, 'schoolVisionMission'])->name('public.schoolVisionMission');
// Route::get('/profil/struktur', [PageController::class, 'struktur'])->name('public.struktur');
// Route::get('/profil/sarana', [PageController::class, 'sarana'])->name('public.sarana');

// Menu Dropdown Kesiswaan
Route::get('/kesiswaan/ekstrakurikuler', [PageController::class, 'extracurriculars'])->name('public.extracurriculars');
Route::get('/kesiswaan/prestasi', [PageController::class, 'achievements'])->name('public.achievements');

// Menu Dropdown Informasi
Route::get('/informasi/berita', [PageController::class, 'posts'])->name('public.posts');
Route::get('/informasi/jadwalkbm', [PageController::class, 'schedules'])->name('public.schedules');
Route::get('/informasi/guru', [PageController::class, 'teachers'])->name('public.teachers');
Route::get('/informasi/syarat-pendaftaran', [PageController::class, 'registerRequirements'])->name('public.registerRequirements');

// Menu Galeri dan Kontak
Route::get('/galeri', [PageController::class, 'galleries'])->name('public.galleries');
Route::get('/kontak', [PageController::class, 'contact'])->name('public.contact');

// Dashboard Admin
Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Fitur Admin
Route::middleware('auth')->group(function () {
    // Profil Admin
    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profileAdmin.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profileAdmin.update');
    Route::delete('/dashboard/profile', [ProfileController::class, 'destroy'])->name('profileAdmin.destroy');

    // Fitur Sekolah
    Route::resource('/dashboard/berita', PostController::class)->names('posts');       // Berita
    Route::resource('/dashboard/galeri', GalleryController::class)->names('galleries'); // Galeri
    Route::resource('/dashboard/guru', TeacherController::class)->names('teachers');  // Guru
    Route::resource('/dashboard/jadwalkbm', ScheduleController::class)->names('schedules'); // JadwalSS
    Route::resource('/dashboard/prestasi', AchievementController::class)->names('achievements'); // Prestasi
    Route::resource('/dashboard/banner', HeroBannerController::class)->names('herobanners'); // Banner Beranda
});

require __DIR__.'/auth.php';