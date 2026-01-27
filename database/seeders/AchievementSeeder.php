<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::create([
            'title' => 'Kompetisi SDN 1 Beringin',
            'name' => 'Lomba Renang',
            'category' => 'Olahraga',
            'level' => 'Tingkat Daerah',
            'position' => 'Juara 1',
            'date' => '10/10/2025',
            'award' => 'Sertifikat',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Achievement::create([
            'title' => 'Kompetisi SDN 1 Beringin',
            'name' => 'Lomba Mengambar',
            'category' => 'Kreativitas',
            'level' => 'Tingkat Daerah',
            'position' => 'Juara 1',
            'date' => '11/10/2025',
            'award' => 'Sertifikat',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Achievement::create([
            'title' => 'Kompetisi SDN 1 Beringin',
            'name' => 'Lomba Sepak Bola',
            'category' => 'Olahraga',
            'level' => 'Tingkat Daerah',
            'position' => 'Juara 1',
            'date' => '12/10/2025',
            'award' => 'Sertifikat',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
