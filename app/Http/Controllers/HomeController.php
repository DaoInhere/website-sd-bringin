<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;    // Model Berita
use App\Models\Gallery; // <--- Model Galeri (PENTING)

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil 3 Berita Terbaru
        $posts = Post::latest()->take(3)->get();

        // 2. Ambil 6 Foto Galeri Terbaru (BARU)
        $galleries = Gallery::latest()->take(6)->get();

        // 3. Kirim kedua data (posts & galleries) ke halaman depan
        return view('welcome', compact('posts', 'galleries'));
    }
}