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

        Schedule::create([
            'hour' => '07:00 - 08:00',
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
            'hour' => '07:00 - 08:00',
            'day' => 'Selasa',
            'subject' => 'IPA',
            'type' => 'UAS',
            'class' => '2',
            'uniform' => 'Merah Putih',
            'curriculum' => '2025/2026',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Schedule::create([
            'hour' => '15:00 - 16:00',
            'day' => 'Jumat',
            'subject' => 'Pramuka',
            'type' => 'Ekstrakurikuler',
            'class' => '0',
            'uniform' => 'Pramuka',
            'teacher' => 'Pak Doni',
            'description' => 'Membentuk karakter disiplin, mandiri, dan cinta tanah air melalui kegiatan kepramukaan yang menyenangkan.',
            'image' => 'gambarPramuka.png',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Schedule::create([
            'hour' => '10:00 - 11:00',
            'day' => 'Sabtu',
            'subject' => 'Futsal',
            'type' => 'Ekstrakurikuler',
            'class' => '0',
            'uniform' => 'Bebas',
            'teacher' => 'Pak Andre',
            'description' => 'Mengembangkan kemampuan futsal',
            'image' => 'gambarFutsal.png',
            'curriculum' => 'Semua',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
