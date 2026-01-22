<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    // 1. DAFTAR GURU
    public function index()
    {
        $teachers = Teacher::latest()->get();
        return view('teachers.index', compact('teachers'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        return view('teachers.create');
    }

    // 3. PROSES SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'photo'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name'    => 'required|string|max:255',
            'position'   => 'required|string|max:255'
        ]);

        // Upload gambar
        $imagePath = $request->file('photo')->store('teachers', 'public');
        $filename = basename($imagePath);

        Teacher::create([
            'name'    => $request->name,
            'position' => $request->position,
            'photo'   => $imagePath
        ]);

        return redirect()->route('teachers.index')->with(['success' => 'Data Guru Berhasil Disimpan!']);
    }

    // 4. FORM EDIT
    public function edit(string $nip)
    {
        $teacher = Teacher::where('nip', $nip)->firstOrFail();
        return view('teachers.edit', compact('teacher'));
    }

    // 5. PROSES UPDATE
    public function update(Request $request, string $nip)
    {
        $request->validate([
            'photo'   => 'image|mimes:jpeg,png,jpg|max:2048',
            'name'    => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $teacher = Teacher::where('nip', $nip)->firstOrFail();

        if ($request->hasFile('photo')) {
            // Upload baru
            $imagePath = $request->file('photo')->store('teachers', 'public');
            
            // Hapus foto lama
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }

            // Update DB dengan gambar baru
            $teacher->update([
                'photo'   => $imagePath,
                'name'    => $request->name,
                'position' => $request->position,
            ]);
        } else {
            // Update tulisan saja
            $teacher->update([
                'name'    => $request->name,
                'position' => $request->position,
            ]);
        }

        return redirect()->route('teachers.index')->with(['success' => 'Data Guru Berhasil Diubah!']);
    }

    // 6. HAPUS DATA
    public function destroy(string $nip)
    {
        $teacher = Teacher::where('nip', $nip)->firstOrFail();
        
        // Hapus file gambar
        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }
        
        $teacher->delete();

        return redirect()->route('teachers.index')->with(['success' => 'Data Guru Berhasil Dihapus!']);
    }
}