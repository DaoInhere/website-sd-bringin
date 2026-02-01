<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Gallery;
use App\Models\Teacher;
use App\Models\Schedule;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 

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

    public function syarat() {
        return view('frontend.syarat');
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

    public function extracurriculars() {
        $extracurriculars = Schedule::where('type', 'Ekstrakurikuler')
            ->latest()
            ->paginate(6);
        return view('ekstrakurikuler', compact('extracurriculars'));
    }

    // === MENU PRESTASI ===
    public function achievements() {
        $achievements = Achievement::orderByDesc('date')->paginate(6);

        $latestDateRaw = Achievement::max('date');
        $latestAchievementDate = $latestDateRaw 
            ? Carbon::parse($latestDateRaw)->translatedFormat('d F Y') 
            : '-';

        if (Achievement::where('level', 'Nasional')->exists()) {
            $levelSummary = 'Nasional';
        } elseif (Achievement::where('level', 'Provinsi')->exists()) {
            $levelSummary = 'Provinsi';
        } elseif (Achievement::where('level', 'Tingkat Daerah')->exists() || Achievement::where('level', 'Kabupaten/Kota')->exists()) {
            $levelSummary = 'Tingkat Daerah';
        } elseif (Achievement::where('level', 'Kecamatan')->exists()) {
            $levelSummary = 'Kecamatan';
        } else {
            // Ambil saja level dari data pertama kalo bingung
            $levelSummary = Achievement::first() ? Achievement::first()->level : '-';
        }

        return view('prestasi', compact('achievements', 'latestAchievementDate', 'levelSummary'));
    }

    // Menu Informasi (Jadwal)
    public function schedules(Request $request) {
        if ($request->query()) {
            $queryKeys = collect($request->query())->keys();
            $allowedKeys = ['kelas', 'kurikulum', 'tipe'];

            if ($queryKeys->diff($allowedKeys)->isNotEmpty()) {
                return redirect('/informasi/jadwalkbm');
            }

            $class = $request->query('kelas', '0');
            $curriculum = $request->query('kurikulum', 'Semua');
            $type = $request->query('tipe', '-'); 

            $schedules = Schedule::where('type', '!=', 'Ekstrakurikuler')
                ->when($class !== '0', fn ($q) => $q->whereIn('class', [$class, '0']))
                ->when($curriculum !== 'Semua', fn ($q) => $q->whereIn('curriculum', [$curriculum, 'Semua']))
                ->when($type !== '-', fn ($q) => $q->whereIn('type', [$type, '-']))
                ->orderBy('hour')
                ->get();

            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
            $globalSchedules = $schedules->where('day', 'Semua');
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

        $curriculum = $request->query('kurikulum', 'Semua');

        $classes = Schedule::select('class')
            ->where('class', '!=', '0') // 0 = Semua
            ->when(
                $curriculum !== 'Semua',
                fn ($q) => $q->whereIn('curriculum', [$curriculum, 'Semua'])
            )
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