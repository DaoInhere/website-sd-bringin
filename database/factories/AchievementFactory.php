<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    public function definition(): array
    {
        return [
            // Sesuaikan dengan nama kolom baru
            'name'        => $this->faker->sentence(3), // Contoh: "Lomba Lari Maraton"
            'position'    => $this->faker->randomElement(['Juara 1', 'Juara 2', 'Juara 3', 'Harapan 1']),
            'level'       => $this->faker->randomElement(['Kecamatan', 'Kabupaten/Kota', 'Provinsi', 'Nasional']),
            'category'    => $this->faker->randomElement(['Akademik', 'Olahraga', 'Seni', 'Keagamaan']),
            'description' => $this->faker->paragraph(),
            'date'        => $this->faker->date(),
            'image'       => null, // Default null
        ];
    }
}