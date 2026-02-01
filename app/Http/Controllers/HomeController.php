<?php

namespace App\Http\Controllers;

use App\Models\HeroBanner; // Model Hero Banner
use Illuminate\Http\Request;
use App\Models\Teacher; // Model Guru
use App\Models\Gallery; // Model Galeri
use App\Models\Post;    // Model Berita
use App\Models\Schedule; // Model Jadwal

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $herobanners = HeroBanner::oldest()->get();

        // 2. Ambil 6 Foto Galeri Terbaru
        $galleries = Gallery::latest()->take(6)->get();

        // 3. Ambil Semua Data Guru
        $teachers = Teacher::all();
        $headmaster = Teacher::where('position', 'Kepala Sekolah')->first();

        $extracurriculars = Schedule::where('type', 'Ekstrakurikuler')->get();
        
        // Kirim semua data ke halaman depan
        return view('home', compact('posts', 'herobanners', 'galleries', 'teachers', 'headmaster', 'extracurriculars'));
    }
}