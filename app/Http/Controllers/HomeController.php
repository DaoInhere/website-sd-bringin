<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Biar variabel $posts ada isinya

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        
        
        return view('home', compact('posts'));
    }
}