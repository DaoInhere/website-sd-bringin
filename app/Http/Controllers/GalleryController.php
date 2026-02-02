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

        $imagePaths = []; // Wadah untuk menampung nama-nama file

        // 2. PROSES UPLOAD (Kumpulkan path ke array)
        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                // Upload file fisik
                $path = $file->store('galleries', 'public');
                // Masukkan path ke wadah
                $imagePaths[] = $path; 
            }
        }

        // 3. SIMPAN KE DATABASE (Cukup 1 kali create)
        Gallery::create([
            'photos'      => $imagePaths, 
            'title'       => $request->title,
            'description' => $request->description,
            'activityDate'=> $request->activityDate,
        ]);

        return redirect()->route('galleries.index')->with(['success' => 'Album berhasil dibuat!']);
    }

    // Menampilkan Detail Album (Semua Foto)
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.show', compact('gallery'));
    }

    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'activityDate' => 'required|date',
        ]);

        $gallery = Gallery::findOrFail($id);
        $dataToUpdate = [
            'title'       => $request->title,
            'description' => $request->description,
            'activityDate'=> $request->activityDate,
        ];

        // Jika user upload foto baru, hapus yg lama, ganti yg baru
        if ($request->hasFile('photos')) {
            // 1. Hapus foto lama fisik
            if ($gallery->photos) {
                foreach($gallery->photos as $oldPhoto) {
                    Storage::delete('public/' . $oldPhoto);
                }
            }

            // 2. Upload foto baru
            $newPaths = [];
            foreach ($request->file('photos') as $file) {
                $newPaths[] = $file->store('galleries', 'public');
            }
            
            $dataToUpdate['photos'] = $newPaths;
        }

        $gallery->update($dataToUpdate);

        return redirect()->route('galleries.index')->with(['success' => 'Album diperbarui!']);
    }

    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Hapus semua file fisik dalam array
        if ($gallery->photos) {
            foreach($gallery->photos as $photo) {
                Storage::delete('public/' . $photo);
            }
        }
        
        $gallery->delete();
        return redirect()->route('galleries.index')->with(['success' => 'Album dihapus!']);
    }
}