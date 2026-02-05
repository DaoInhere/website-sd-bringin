<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $sort = request('sort', 'title');
        $dir  = request('dir', 'desc');

        $allowed = ['title', 'photos', 'description', 'activityDate'];

        if (!in_array($sort, $allowed)) $sort = 'title';
        if (!in_array($dir, ['asc', 'desc'])) $dir = 'desc';

        $galleries = Gallery::filter(request()->only(['find']))
            ->orderBy($sort, $dir)
            ->paginate(10)
            ->withQueryString();

        return view('backend.menuAdmin.galleries.index', compact('galleries', 'sort', 'dir'));
    }

    public function create()
    {
        return view('backend.menuAdmin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photos'   => 'required', 
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048', 
            'title'    => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255', 
            'activityDate'=> 'required|date',            
        ]);

        $imagePaths = [];

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $file) {
                // Upload file fisik
                $path = $file->store('galleries', 'public');
                // Masukkan path ke wadah
                $imagePaths[] = $path; 
            }
        }

        Gallery::create([
            'photos'      => $imagePaths, 
            'title'       => $request->title,
            'description' => $request->description,
            'activityDate'=> $request->activityDate,
        ]);

        return redirect()->route('galleries.index')->with(['success' => 'Album berhasil dibuat!']);
    }

    // Menampilkan Detail Album
    public function show(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('backend.menuAdmin.galleries.show', compact('gallery'));
    }

    public function edit(string $id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('backend.menuAdmin.galleries.edit', compact('gallery'));
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

        // Jika user upload foto baru, hapus yg lama dan ganti yg baru
        if ($request->hasFile('photos')) {
            if ($gallery->photos) {
                foreach($gallery->photos as $oldPhoto) {
                    Storage::delete('public/' . $oldPhoto);
                }
            }

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
        
        if ($gallery->photos) {
            foreach($gallery->photos as $photo) {
                Storage::delete('public/' . $photo);
            }
        }
        
        $gallery->delete();
        return redirect()->route('galleries.index')->with(['success' => 'Album dihapus!']);
    }
}