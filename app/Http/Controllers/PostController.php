<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $sort = request('sort', 'author');
        $dir  = request('dir', 'desc');

        $allowed = ['author', 'image', 'title', 'category', 'content'];

        if (!in_array($sort, $allowed)) $sort = 'author';
        if (!in_array($dir, ['asc', 'desc'])) $dir = 'desc';

        $query = Post::with('user');

        if ($sort === 'author') {
            $query = $query->orderBy(
                User::select('name')->whereColumn('users.id', 'posts.user_id'),
                $dir
            );
        } else {
            $query = $query->orderBy($sort, $dir);
        }

        $posts = $query->filter(request()->only(['find']))->paginate(10)->withQueryString();

        return view('backend.menuAdmin.posts.index', compact('posts', 'sort', 'dir'));
    }

    public function create()
    {
        return view('backend.menuAdmin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title'     => 'required|min:5',
            'category' => 'required',
            'content'   => 'required|min:10'
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('posts', 'public');

        Post::create([
            'user_id' => Auth::id(),
            'image'     => $imagePath,
            'title'     => $request->title,
            'category' => $request->category,
            'content'   => $request->content
        ]);

        return redirect()->route('posts.index')->with(['success' => 'Berita Berhasil Disimpan!']);
    }
    
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        
        return view('backend.menuAdmin.posts.edit', compact('post'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'     => 'image|mimes:jpeg,png,jpg|max:2048', 
            'title'     => 'required|min:5',
            'category' => 'required',
            'content'   => 'required|min:10'
        ]);

        $post = Post::findOrFail($id);

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

    public function destroy(string $id)
    {
        // Cari data berdasarkan ID
        $post = Post::findOrFail($id);

        // Hapus file gambar
        Storage::delete('public/' . $post->image);

        $post->delete();

        return redirect()->route('posts.index')->with(['success' => 'Berita Berhasil Dihapus!']);
    }
}