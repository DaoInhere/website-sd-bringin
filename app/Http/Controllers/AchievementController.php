<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $sort = request('sort', 'title');
        $dir  = request('dir', 'desc');

        $allowed = ['title', 'name', 'category', 'level', 'position', 'award', 'date', 'description', 'image'];

        if (!in_array($sort, $allowed)) $sort = 'title';
        if (!in_array($dir, ['asc', 'desc'])) $dir = 'desc';

        $achievements = Achievement::orderBy($sort, $dir)
            ->paginate(10)
            ->withQueryString();

        return view('achievements.index', compact('achievements', 'sort', 'dir'));
    }

    public function create()
    {
        return view('achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required',
            'name'     => 'required',
            'category' => 'required',
            'level'    => 'required',
            'position' => 'required',
            'award'    => 'nullable',
            'description' => 'nullable',
            'date'     => 'required|date',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create([
            'title'       => $request->title,
            'name'        => $request->name,
            'category'    => $request->category,
            'level'       => $request->level,
            'position'    => $request->position,
            'award'       => $request->award,
            'date'        => $request->date,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Data Prestasi berhasil ditambahkan!');
    }

    public function edit(Achievement $achievement)
    {
        return view('achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title'    => 'required',
            'name'     => 'required',
            'category' => 'required',
            'level'    => 'required',
            'position' => 'required',
            'award'    => 'nullable',
            'description' => 'nullable',
            'date'     => 'required|date',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($achievement->image) {
                Storage::delete('public/' . $achievement->image);
            }
            $imagePath = $request->file('image')->store('achievements', 'public');
        } else {
            $imagePath = $achievement->image;
        }

        $achievement->update([
            'title'       => $request->title,
            'name'        => $request->name,
            'category'    => $request->category,
            'level'       => $request->level,
            'position'    => $request->position,
            'award'       => $request->award,
            'date'        => $request->date,
            'description' => $request->description,
            'image'       => $imagePath,
        ]);

        return redirect()->route('achievements.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->image) {
            Storage::delete('public/' . $achievement->image);
        }
        $achievement->delete();
        return redirect()->route('achievements.index')->with('success', 'Data berhasil dihapus!');
    }
}