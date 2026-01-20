<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // === 1. BAGIAN PROFIL (DROPDOWN) ===
    public function sejarah() {
        return view('frontend.profile.sejarah');
    }

    public function visi() {
        return view('frontend.profile.visi');
    }

    public function struktur() {
        return view('frontend.profile.struktur');
    }

    public function sarana() {
        return view('frontend.profile.sarana');
    }

    // === 2. MENU LAINNYA ===
    public function teachers() {
        $teachers = Teacher::all();
        return view('frontend.teachers', compact('teachers'));
    }

    public function galleries() {
        $galleries = Gallery::latest()->get();
        return view('frontend.galleries', compact('galleries'));
    }

    public function posts() {
        $posts = Post::latest()->paginate(6);
        return view('frontend.posts', compact('posts'));
    }
}