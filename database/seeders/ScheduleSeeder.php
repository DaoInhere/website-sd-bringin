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
            'hourStart' => '07:00',
            'hourEnd' => '08:00',
            'day' => 'Senin',
            'subject' => 'Upacara',
            'type' => 'Kegiatan',
            'uniform' => 'Merah Putih',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedule::create([
            'hourStart' => '09:00',
            'hourEnd' => '09:30',
            'day' => 'Semua',
            'subject' => 'Istirahat',
            'type' => 'Kegiatan',
            'uniform' => '-',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedule::create([
            'hourStart' => '07:00',
            'hourEnd' => '08:00',
            'day' => 'Senin',
            'subject' => 'Matematika',
            'type' => 'UTS',
            'class' => '1',
            'uniform' => 'Merah Putih',
            'curriculum' => '2025/2026',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedule::create([
            'hourStart' => '07:00',
            'hourEnd' => '08:00',
            'day' => 'Selasa',
            'subject' => 'Olahraga',
            'type' => 'UAS',
            'class' => '2',
            'uniform' => 'Olahraga',
            'curriculum' => '2025/2026',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Schedule::create([
            'hourStart' => '15:00',
            'hourEnd' => '16:00',
            'day' => 'Jumat',
            'subject' => 'Pramuka',
            'type' => 'Ekstrakurikuler',
            'class' => '0',
            'uniform' => 'Pramuka',
            'description' => 'Membentuk karakter disiplin, mandiri, dan cinta tanah air melalui kegiatan kepramukaan yang menyenangkan.',
            'image' => 'gambarPramuka.png',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedule::create([
            'hourStart' => '10:00',
            'hourEnd' => '11:00',
            'day' => 'Sabtu',
            'subject' => 'Futsal',
            'type' => 'Ekstrakurikuler',
            'class' => '0',
            'uniform' => 'Bebas',
            'description' => 'Mengembangkan kemampuan futsal',
            'image' => 'gambarFutsal.png',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
