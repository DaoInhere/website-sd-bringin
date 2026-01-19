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
            'image'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name'    => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        // Upload gambar
        $imagePath = $request->file('image')->store('teachers', 'public');

        Teacher::create([
            'image'   => $imagePath,
            'name'    => $request->name,
            'subject' => $request->subject,
        ]);

        return redirect()->route('teachers.index')->with(['success' => 'Data Guru Berhasil Disimpan!']);
    }

    // 4. FORM EDIT
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    // 5. PROSES UPDATE
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image'   => 'image|mimes:jpeg,png,jpg|max:2048',
            'name'    => 'required|string|max:255',
            'subject' => 'required|string|max:255',
        ]);

        $teacher = Teacher::findOrFail($id);

        if ($request->hasFile('image')) {
            // Upload baru
            $imagePath = $request->file('image')->store('teachers', 'public');
            
            // Hapus foto lama
            if ($teacher->image) {
                Storage::delete('public/' . $teacher->image);
            }

            // Update DB dengan gambar baru
            $teacher->update([
                'image'   => $imagePath,
                'name'    => $request->name,
                'subject' => $request->subject,
            ]);
        } else {
            // Update tulisan saja
            $teacher->update([
                'name'    => $request->name,
                'subject' => $request->subject,
            ]);
        }

        return redirect()->route('teachers.index')->with(['success' => 'Data Guru Berhasil Diubah!']);
    }

    // 6. HAPUS DATA
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        
        // Hapus file gambar
        if ($teacher->image) {
            Storage::delete('public/' . $teacher->image);
        }
        
        $teacher->delete();

        return redirect()->route('teachers.index')->with(['success' => 'Data Guru Berhasil Dihapus!']);
    }
}