<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        // 1. VALIDASI
        $request->validate([
            'photos'   => 'required', 
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048', 
            'title'    => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255', 
            'activityDate'=> 'required|date',            
        ]);

        // 2. PROSES SIMPAN (LOOPING)
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                
                // Upload file fisik
                $path = $file->store('galleries', 'public');

                // Simpan ke Database
                Gallery::create([
                    'photo'       => $path, 
                    'title'       => $request->title,
                    'description' => $request->description,
                    'activityDate'=> $request->activityDate,
                ]);
            }
        }

        return redirect()->route('galleries.index')->with(['success' => 'Foto-foto berhasil diupload!']);
    }

    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'activityDate' => 'required|date',
        ]);

        $gallery = Gallery::findOrFail($id);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('galleries', 'public');
            if ($gallery->photo) Storage::delete('public/' . $gallery->photo);
            
            $gallery->update([
                'photo'       => $path,
                'title'       => $request->title,
                'description' => $request->description,
                'activityDate'=> $request->activityDate,
            ]);
        } else {
            $gallery->update([
                'title'       => $request->title,
                'description' => $request->description,
                'activityDate'=> $request->activityDate,
            ]);
        }

        return redirect()->route('galleries.index')->with(['success' => 'Galeri diperbarui!']);
    }

    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        if ($gallery->photo) Storage::delete('public/' . $gallery->photo);
        $gallery->delete();
        return redirect()->route('galleries.index')->with(['success' => 'Foto dihapus!']);
    }
}