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
            'hour' => '07:00 - 08:00',
            'day' => 'Senin',
            'subject' => 'Upacara',
            'type' => 'Kegiatan',
            'uniform' => 'Merah Putih',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedule::create([
            'hour' => '09:00 - 09:30',
            'day' => 'Semua',
            'subject' => 'Istirahat',
            'type' => 'Kegiatan',
            'uniform' => '-',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
