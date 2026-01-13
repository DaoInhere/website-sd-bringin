<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Query Tambah Data
        Schedule::create([
            'day' => 'Senin',
            'subject' => 'Matematika',
            'class' => 'Kelas 1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
