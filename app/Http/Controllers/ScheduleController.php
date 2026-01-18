<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $class = $request->query('class', '0');

        $schedules = Schedule::when(
            $class !== '0',
            function ($query) use ($class) {
                $query->whereIn('class', [$class, '0']);
            }
        )
        ->orderBy('hour')
        ->get()
        ->groupBy('day');

        return view('schedule', compact('schedules', 'class'));
    }
}


