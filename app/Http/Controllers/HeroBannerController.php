<?php

namespace App\Http\Controllers;

use App\Models\HeroBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroBannerController extends Controller
{
    // 1. DAFTAR TABEL
    public function index()
    {
        $sort = request('sort', 'title');
        $dir  = request('dir', 'desc');

        $allowed = ['image', 'title', 'subtitle', 'dim'];

        if (!in_array($sort, $allowed)) $sort = 'title';
        if (!in_array($dir, ['asc', 'desc'])) $dir = 'desc';

        $herobanners = HeroBanner::filter(request()->only(['find']))
            ->orderBy($sort, $dir)
            ->paginate(10)
            ->withQueryString();

        return view('herobanners.index', compact('herobanners', 'sort', 'dir'));
    }

    // 2. FORM UPLOAD
    public function create()
    {
        return view('herobanners.create');
    }

    // 3. SIMPAN FOTO
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'dim' => 'required|boolean',
        ]);

        // Simpan ke folder 'galleries' di storage public
        $imagePath = $request->file('image')->store('herobanners', 'public');

        HeroBanner::create([
            'image' => $imagePath,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'dim' => $request->dim,
        ]);

        return redirect()->route('herobanners.index')->with(['success' => 'Banner Berhasil Diupload!']);
    }

    // 4. FORM EDIT
    public function edit(string $id)
    {
        $herobanner = HeroBanner::findOrFail($id);
        return view('herobanners.edit', compact('herobanner'));
    }

    // 5. UPDATE FOTO
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'dim' => 'required|boolean',
        ]);

        $herobanner = HeroBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Upload baru
            $imagePath = $request->file('image')->store('herobanners', 'public');
            // Hapus lama
            Storage::delete('public/' . $herobanner->image);
            // Update DB
            $herobanner->update([
                'image' => $imagePath,
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'dim' => $request->dim
            ]);
        } else {
            // Cuma ganti judul
            $herobanner->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'dim' => $request->dim
            ]);
        }

        return redirect()->route('herobanners.index')->with(['success' => 'Banner Berhasil Diperbarui!']);
    }

    // 6. HAPUS FOTO
    public function destroy(string $id)
    {
        $herobanner = HeroBanner::findOrFail($id);
        Storage::delete('public/' . $herobanner->image);
        $herobanner->delete();

        return redirect()->route('herobanners.index')->with(['success' => 'Banner Berhasil Dihapus!']);
    }
}
