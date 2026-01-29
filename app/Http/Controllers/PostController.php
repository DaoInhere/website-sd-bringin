<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // --- 1. FITUR BACA (READ) ---
    public function index()
    {
        // Ambil berita terbaru
        $posts = Post::latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // --- 2. FITUR TAMBAH (CREATE) ---
    public function create()
    {
        // Ambil data kategori untuk dropdown
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title'     => 'required|min:5',
            'category' => 'required',
            'content'   => 'required|min:10'
        ]);

        // Upload gambar ke folder public/posts
        $imagePath = $request->file('image')->store('posts', 'public');

        // Simpan ke database
        Post::create([
            'user_id' => Auth::id(),
            'image'     => $imagePath,
            'title'     => $request->title,
            'category' => $request->category,
            'content'   => $request->content
        ]);

        return redirect()->route('posts.index')->with(['success' => 'Berita Berhasil Disimpan!']);
    }

    // --- 3. FITUR EDIT (UPDATE) ---
    
    // Tampilkan Halaman Edit
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        
        return view('posts.edit', compact('post', 'categories'));
    }

    // Proses Simpan Perubahan
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'     => 'image|mimes:jpeg,png,jpg|max:2048', 
            'title'     => 'required|min:5',
            'category' => 'required',
            'content'   => 'required|min:10'
        ]);

        $post = Post::findOrFail($id);

        // LOGIKA GANTI GAMBAR
        if ($request->hasFile('image')) {
            
            // Upload gambar baru
            $imagePath = $request->file('image')->store('posts', 'public');

            // Hapus gambar lama dari penyimpanan
            Storage::delete('public/' . $post->image);

            // Update database dengan gambar baru
            $post->update([
                'image'     => $imagePath,
                'title'     => $request->title,
                'category' => $request->category,
                'content'   => $request->content
            ]);

        } else {
            $post->update([
                'title'     => $request->title,
                'category' => $request->category,
                'content'   => $request->content
            ]);
        }

        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    // --- 4. FITUR HAPUS (DELETE) ---
    public function destroy(string $id)
    {
        // Cari data berdasarkan ID
        $post = Post::findOrFail($id);

        // Hapus file gambar dari folder storage
        Storage::delete('public/' . $post->image);

        // Hapus data dari database
        $post->delete();

        // Kembali ke index
        return redirect()->route('posts.index')->with(['success' => 'Berita Berhasil Dihapus!']);
    }
}