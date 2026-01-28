<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    // 1. Tampilkan Daftar Prestasi
    public function index()
    {
        $achievements = Achievement::latest()->paginate(10);
        return view('achievements.index', compact('achievements'));
    }

    // 2. Tampilkan Form Tambah
    public function create()
    {
        return view('achievements.create');
    }

    // 3. Simpan Data Baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'level' => 'required',
            'rank'  => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048', // Validasi Gambar
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create([
            'title'       => $request->title,
            'level'       => $request->level,
            'rank'        => $request->rank,
            'description' => $request->description,
            'date'        => $request->date,
            'image'       => $imagePath,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Data Prestasi berhasil ditambahkan!');
    }

    // 4. Tampilkan Form Edit
    public function edit(Achievement $achievement)
    {
        return view('achievements.edit', compact('achievement'));
    }

    // 5. Update Data
    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required',
            'level' => 'required',
            'rank'  => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($achievement->image) {
                Storage::delete('public/' . $achievement->image);
            }
            $imagePath = $request->file('image')->store('achievements', 'public');
        } else {
            $imagePath = $achievement->image;
        }

        $achievement->update([
            'title'       => $request->title,
            'level'       => $request->level,
            'rank'        => $request->rank,
            'description' => $request->description,
            'date'        => $request->date,
            'image'       => $imagePath,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Data Prestasi berhasil diperbarui!');
    }

    // 6. Hapus Data
    public function destroy(Achievement $achievement)
    {
        if ($achievement->image) {
            Storage::delete('public/' . $achievement->image);
        }
        
        $achievement->delete();

        return redirect()->route('achievements.index')->with('success', 'Data Prestasi berhasil dihapus!');
    }
}