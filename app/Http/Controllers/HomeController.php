<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use App\Models\Post; // Biar variabel $posts ada isinya
=======
use App\Models\Post;    // Model Berita
use App\Models\Gallery; // Model Galeri
use App\Models\Teacher; // Model Guru
>>>>>>> 0a8733ca06f1dc745a2f1a9bdcdd13db6b9f0755

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
<<<<<<< HEAD
        
        
        return view('home', compact('posts'));
=======

        // 2. Ambil 6 Foto Galeri Terbaru
        $galleries = Gallery::latest()->take(6)->get();

        // 3. Ambil Semua Data Guru
        $teachers = Teacher::all();

        // Kirim semua data ke halaman depan
        return view('welcome', compact('posts', 'galleries', 'teachers'));
>>>>>>> 0a8733ca06f1dc745a2f1a9bdcdd13db6b9f0755
    }
}