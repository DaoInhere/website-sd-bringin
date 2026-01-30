<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // 1. DAFTAR FOTO
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('galleries.index', compact('galleries'));
    }

    // 2. FORM UPLOAD
    public function create()
    {
        return view('galleries.create');
    }

    // 3. SIMPAN FOTO
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'activityDate' => 'required|date',
        ]);

        // Simpan ke folder 'galleries' di storage public
        $imagePath = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'image' => $imagePath,
            'title' => $request->title,
            'description' => $request->description,
            'activityDate' => $request->activityDate,
        ]);

        return redirect()->route('galleries.index')->with(['success' => 'Foto Berhasil Diupload!']);
    }

    // 4. FORM EDIT
    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.edit', compact('gallery'));
    }

    // 5. UPDATE FOTO
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'activityDate' => 'required|date',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('image')) {
            // Upload baru
            $imagePath = $request->file('image')->store('galleries', 'public');
            // Hapus lama
            Storage::delete('public/' . $gallery->image);
            // Update DB
            $gallery->update([
                'image' => $imagePath,
                'title' => $request->title,
                'description' => $request->description,
                'activityDate' => $request->activityDate,
            ]);
        } else {
            // Cuma ganti judul
            $gallery->update([
                'title' => $request->title,
                'description' => $request->description,
                'activityDate' => $request->activityDate,
            ]);
        }

        return redirect()->route('galleries.index')->with(['success' => 'Galeri Berhasil Diupdate!']);
    }

    // 6. HAPUS FOTO
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::delete('public/' . $gallery->image);
        $gallery->delete();

        return redirect()->route('galleries.index')->with(['success' => 'Foto Berhasil Dihapus!']);
    }
}