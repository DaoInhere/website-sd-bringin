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
        $sort = request('sort', 'nip');
        $dir  = request('dir', 'desc');

        $allowed = ['nip', 'name', 'position', 'photo'];

        if (!in_array($sort, $allowed)) $sort = 'nip';
        if (!in_array($dir, ['asc', 'desc'])) $dir = 'desc';

        $teachers = Teacher::filter(request()->only(['find']))
            ->orderBy($sort, $dir)
            ->paginate(10)
            ->withQueryString();

        return view('teachers.index', compact('teachers', 'sort', 'dir'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        return view('teachers.create');
    }

    private function checkTeacherPosition(Request $request)
    {
        if (
            $request->position === 'Kepala Sekolah' &&
            Teacher::where('position', 'Kepala Sekolah')->exists()
        ) {
            return back()
                ->withErrors(['position' => 'Kepala Sekolah sudah ada.'])
                ->withInput();
        }

        return null;
    }

    private function checkHeadmaster(Teacher $teacher)
    {
        if ($teacher->position === 'Kepala Sekolah') {
            return back()->withErrors([
                'position' => 'Gagal menghapus data, lakukan perubahan jabatan pada Kepala Sekolah terlebih dahulu.'
            ]);
        }

        return null;
    }

    // 3. PROSES SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|max:20',
            'photo'   => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name'    => 'required|string|max:255',
            'position'   => 'required|string|max:255'
        ]);

        // Upload gambar
        $imagePath = $request->file('photo')->store('teachers', 'public');
        $filename = basename($imagePath);

        if ($response = $this->checkTeacherPosition($request)) {
            return $response;
        }

        Teacher::create([
            'nip' => $request->nip,
            'name'    => $request->name,
            'position' => $request->position,
            'photo'   => $filename
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
            'nip' => 'required|max:20',
            'photo'   => 'image|mimes:jpeg,png,jpg|max:2048',
            'name'    => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $teacher = Teacher::where('nip', $nip)->firstOrFail();

        if ($response = $this->checkTeacherPosition($request)) {
            return $response;
        }

        if ($request->hasFile('photo')) {
            // Upload baru
            $imagePath = $request->file('photo')->store('teachers', 'public');
            
            // Hapus foto lama
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }

            // Update DB dengan gambar baru
            $teacher->update([
                'nip' => $request->nip,
                'photo'   => $imagePath,
                'name'    => $request->name,
                'position' => $request->position,
            ]);
        } else {
            // Update tulisan saja
            $teacher->update([
                'nip' => $request->nip,
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
        
        if ($response = $this->checkHeadmaster($teacher)) {
            return $response;
        }

        // Hapus file gambar
        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }
        
        $teacher->delete();

        return redirect()->route('teachers.index')->with(['success' => 'Data Guru Berhasil Dihapus!']);
    }
}