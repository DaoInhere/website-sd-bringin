<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        // =========================
        // JIKA ADA QUERY DI URL
        // =========================
        if ($request->query()) {

            // Ambil semua query key
            $queryKeys = collect($request->query())->keys();

            // Hanya izinkan query tertentu
            $allowedKeys = ['kelas', 'kurikulum'];

            if ($queryKeys->diff($allowedKeys)->isNotEmpty()) {
                return redirect('/informasi/jadwalkbm');
            }

            // Default value
            $class = $request->query('kelas', '0');
            $curriculum = $request->query('kurikulum', 'Semua');

            // Ambil jadwal (kelas + kurikulum)
            $schedules = Schedule::when(
                    $class !== '0',
                    fn ($q) => $q->whereIn('class', [$class, '0'])
                )
                ->when(
                    $curriculum !== 'Semua',
                    fn ($q) => $q->whereIn('curriculum', [$curriculum, 'Semua'])
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
            ]);
        }

        // =========================
        // JIKA TIDAK ADA QUERY
        // =========================

        $curriculums = Schedule::select('curriculum')
            ->where('curriculum', '!=', 'Semua')
            ->distinct()
            ->orderByRaw('CAST(curriculum AS UNSIGNED) DESC')
            ->pluck('curriculum')
            ->values();

        $classes = ['1', '2', '3', '4', '5', '6'];

        return view('schedules', compact('curriculums', 'classes'));
    }
}


