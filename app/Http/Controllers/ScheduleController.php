<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    // 1. DAFTAR JADWAL
    public function index()
    {
        $schedules = Schedule::orderBy('hour')->paginate(15);
        return view('schedules.index', compact('schedules'));
    }

    // 2. FORM TAMBAH
    public function create()
    {
        return view('schedules.create');
    }

    // 3. PROSES SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'hour'    => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'uniform' => 'required|string|max:255',
            'curriculum' => 'required|string|max:255',
        ]);

        Schedule::create([
            'hour'    => $request->hour,
            'day' => $request->day,
            'subject' => $request->subject,
            'class' => $request->class,
            'type' => $request->type,
            'uniform' => $request->uniform,
            'curriculum' => $request->curriculum,
        ]);

        return redirect()->route('schedules.index')->with(['success' => 'Data Jadwal Berhasil Disimpan!']);
    }

    // 4. FORM EDIT
    public function edit(string $id)
    {
        $schedule = Schedule::where('id', $id)->firstOrFail();
        return view('schedules.edit', compact('schedule'));
    }

    // 5. PROSES UPDATE
    public function update(Request $request, string $id)
    {
        $request->validate([
            'hour'    => 'required|string|max:255',
            'day' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'uniform' => 'required|string|max:255',
            'curriculum' => 'required|string|max:255',
        ]);

        $schedule = Schedule::where('id', $id)->firstOrFail();

        $schedule->update([
            'hour'    => $request->hour,
            'day' => $request->day,
            'subject' => $request->subject,
            'class' => $request->class,
            'type' => $request->type,
            'uniform' => $request->uniform,
            'curriculum' => $request->curriculum,
        ]);

        return redirect()->route('schedules.index')->with(['success' => 'Data Jadwal Berhasil Diubah!']);
    }

    // 6. HAPUS DATA
    public function destroy(string $id)
    {
        $schedule = Schedule::where('id', $id)->firstOrFail();

        $schedule->delete();

        return redirect()->route('schedules.index')->with(['success' => 'Data Jadwal Berhasil Dihapus!']);
    }
}


