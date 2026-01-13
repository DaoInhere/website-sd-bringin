<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;      // Import Model Berita
use App\Models\Gallery;   // Import Model Galeri
use App\Models\Teacher;   // Import Model Guru

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil 3 Berita Terbaru yang statusnya 'published'
        $posts = Post::where('status', 'published')
                    ->latest()
                    ->take(3)
                    ->get();

        // 2. Ambil semua data Guru
        $teachers = Teacher::all();

        // 3. Kirim data ke tampilan 'welcome' (Halaman Depan)
        return view('welcome', compact('posts', 'teachers'));
    }
}