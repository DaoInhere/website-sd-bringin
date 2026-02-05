<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use App\Models\Post;
use App\Models\Gallery;
use App\Models\Teacher;
use App\Models\Schedule;
use App\Models\HeroBanner;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    // Beranda
    public function home()
    {
        $posts = Post::latest()->take(3)->get();
        $herobanners = HeroBanner::oldest()->get();

        // 2. Ambil 6 Foto Galeri Terbaru
        $galleries = Gallery::latest()->take(6)->get();

        // 3. Ambil Semua Data Guru
        $teachers = Teacher::all();
        $headmaster = Teacher::where('position', 'Kepala Sekolah')->first();

        $extracurriculars = Schedule::where('type', 'Ekstrakurikuler')->get();
        
        // Kirim semua data ke halaman depan
        return view('frontend.home', compact('posts', 'herobanners', 'galleries', 'teachers', 'headmaster', 'extracurriculars'));
    }

    // Profil
    public function schoolHistory() {
        return view('frontend.profile.schoolHistory');
    }

    public function schoolVisionMission() {
        return view('frontend.profile.schoolVisionMission');
    }

    public function struktur() {
        return view('frontend.profile.struktur');
    }

    public function sarana() {
        return view('frontend.profile.sarana');
    }

    public function extracurriculars() {
        $extracurriculars = Schedule::where('type', 'Ekstrakurikuler')
            ->latest()
            ->paginate(6);
        return view('frontend.studentaffairs.extracurriculars', compact('extracurriculars'));
    }

    // Kesiswaan
    public function achievements() {
        $years = Achievement::selectRaw('YEAR(date) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        $query = Achievement::query();

        $query->when(request('tahun'), function ($tahun, $year) {
            $tahun->whereYear('date', $year);
        });

        $query->when(request('cari'), function ($cari, $search) {
            $cari->where(function ($cari) use ($search) {
                $cari->where('title', 'like', "%{$search}%")
                ->orWhere('name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%")
                ->orWhere('level', 'like', "%{$search}%")
                ->orWhere('position', 'like', "%{$search}%")
                ->orWhere('award', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%");
            });
        });

        $achievements = $query
            ->latest()
            ->paginate(6)
            ->withQueryString();

        // Tampilan Tanggal Terbaru dan Tingkat Dominan
        $latestDateRaw = Achievement::max('date');
        $latestAchievementDate = $latestDateRaw 
            ? Carbon::parse($latestDateRaw)->translatedFormat('d F Y') 
            : '-';

        if (Achievement::where('level', 'Internasional')->exists()) {
            $levelSummary = 'Internasional';
        } elseif (Achievement::where('level', 'Nasional')->exists()) {
            $levelSummary = 'Nasional';
        } elseif (Achievement::where('level', 'Provinsi')->exists()) {
            $levelSummary = 'Provinsi';
        } elseif (Achievement::where('level', 'Kabupaten/Kota')->exists()) {
            $levelSummary = 'Kabupaten/Kota';
        } else {
            $levelSummary = 'Kecamatan';
        }

        return view('frontend.studentaffairs.achievements', compact('achievements', 'latestAchievementDate', 'levelSummary', 'years'));
    }

    // Information
    public function posts() {
        $years = Post::selectRaw('YEAR(created_at) as year')
            ->distinct()
            ->orderByDesc('year')
            ->pluck('year');

        $query = Post::query();

        $query->when(request('tahun'), function ($tahun, $year) {
            $tahun->whereYear('created_at', $year);
        });

        $query->when(request('kategori'), function ($kategori, $category) {
            $kategori->where('category', $category);
        });

        $posts = $query->latest()
            ->paginate(9)
            ->withQueryString();

        return view('frontend.information.posts', compact('posts', 'years'));
    }

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
            ->where('type', '!=', '-')
            ->distinct()
            ->orderBy('type')
            ->pluck('type')
            ->prepend('-')
            ->values();

        // Set default tipe
        $type = '-';

        return view('frontend.information.schedules', compact('curriculums', 'classes', 'types', 'type'));
    }

    public function teachers() {
        $teachers = Teacher::all();
        return view('frontend.information.teachers', compact('teachers'));
    }

    public function registerRequirements() {
        return view('frontend.information.registerRequirements');
    }

    // Galeri
    public function galleries() {
        $galleries = Gallery::latest()->paginate(6);
        return view('frontend.galleries', compact('galleries'));
    }

    // Kontak
    public function contact() {
        return view('frontend.contact');
    }
}