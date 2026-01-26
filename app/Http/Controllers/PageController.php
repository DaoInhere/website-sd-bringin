<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Teacher;
use App\Models\Schedule;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // === 1. BAGIAN PROFIL (DROPDOWN) ===
    public function sejarah() {
        return view('frontend.profile.sejarah');
    }

    public function visi() {
        return view('frontend.profile.visi');
    }

    public function struktur() {
        return view('frontend.profile.struktur');
    }

    public function sarana() {
        return view('frontend.profile.sarana');
    }

    public function kontak() {
        return view('frontend.contact');
    }

    // === 2. MENU LAINNYA ===
    public function teachers() {
        $teachers = Teacher::all();
        return view('frontend.teachers', compact('teachers'));
    }

    public function galleries() {
        $galleries = Gallery::latest()->get();
        return view('frontend.galleries', compact('galleries'));
    }

    public function posts() {
        $posts = Post::latest()->paginate(6);
        return view('frontend.posts', compact('posts'));
    }

    // Menu Informasi
    public function schedules(Request $request) {
        // Jika ada query di URL
        if ($request->query()) {

            // Ambil semua query key
            $queryKeys = collect($request->query())->keys();

            // Hanya izinkan query tertentu
            $allowedKeys = ['kelas', 'kurikulum', 'tipe'];

            if ($queryKeys->diff($allowedKeys)->isNotEmpty()) {
                return redirect('/informasi/jadwalkbm');
            }

            // Default value
            $class = $request->query('kelas', '0');
            $curriculum = $request->query('kurikulum', 'Semua');
            $type = $request->query('tipe', '-'); // Default tipe '-' jika tidak ada

            // Ambil jadwal (kelas + kurikulum + tipe)
            $schedules = Schedule::when(
                    $class !== '0',
                    fn ($q) => $q->whereIn('class', [$class, '0'])
                )
                ->when(
                    $curriculum !== 'Semua',
                    fn ($q) => $q->whereIn('curriculum', [$curriculum, 'Semua'])
                )
                ->when(
                    $type !== '-', // Hanya filter jika tipe bukan default
                    fn ($q) => $q->whereIn('type', [$type, '-'])
                )
                ->orderBy('hour')
                ->get();

            // Daftar hari
            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

            // Jadwal global
            $globalSchedules = $schedules->where('day', 'Semua');

            // Gabungkan per hari
            $schedulesByDay = collect();

            foreach ($days as $day) {
                $schedulesByDay[$day] = $schedules
                    ->where('day', $day)
                    ->merge($globalSchedules)
                    ->sortBy('hour')
                    ->values();
            }

            return view('schedule', [
                'schedules'  => $schedulesByDay,
                'class'      => $class,
                'curriculum' => $curriculum,
                'type'       => $type,
            ]);
        }

        $curriculums = Schedule::select('curriculum')
            ->where('curriculum', '!=', 'Semua')
            ->distinct()
            ->orderByRaw('CAST(curriculum AS UNSIGNED) DESC')
            ->pluck('curriculum')
            ->values();

        $classes = Schedule::select('class')
            ->where('class', '!=', '0') // 0 = Semua
            ->distinct()
            ->orderByRaw('CAST(class AS UNSIGNED)')
            ->pluck('class')
            ->values();

        $types = Schedule::select('type')
            ->where('type', '!=', '-') // default
            ->distinct()
            ->orderBy('type')
            ->pluck('type')
            ->prepend('-')
            ->values();

        // Set default tipe
        $type = '-';

        return view('schedules', compact('curriculums', 'classes', 'types', 'type'));
    }
}