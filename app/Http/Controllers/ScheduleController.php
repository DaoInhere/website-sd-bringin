<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->query()) {    // Ada query di URL
            if (collect($request->query())->keys()->diff(['kelas'])->isNotEmpty()) {
                return redirect('/informasi/jadwalkbm');
            }
        
            $class = $request->query('kelas', '0');

            // Ambil data
            $schedules = Schedule::when(
                $class !== '0',
                function ($query) use ($class) {
                    $query->whereIn('class', [$class, '0']);
                }
            )
            ->orderBy('hour')
            ->get();

            // Daftar hari
            $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

            // Ambil data
            $globalSchedules = $schedules->where('day', 'Semua');

            // Gabungkan data
            $schedulesByDay = collect();

            foreach ($days as $day) {
                $schedulesByDay[$day] = $schedules
                    ->where('day', $day)
                    ->merge($globalSchedules)
                    ->sortBy('hour')
                    ->values();
            }

            return view('schedule', [
                'schedules' => $schedulesByDay,
                'class' => $class
            ]);
        }

        // Tidak ada query di URL
        $curriculums = Schedule::select('curriculum')
            ->where('curriculum', '!=', 'Semua')
            ->distinct()
            ->orderBy('curriculum')
            ->pluck('curriculum');

        // Daftar kelas
        $classes = ['1', '2', '3', '4', '5', '6'];

        return view('schedules', compact('curriculums', 'classes'));
    }
}


