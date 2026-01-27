<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Achievement>
 */
class AchievementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5, false),
            'name' => fake()->sentences(3, true),
            'category' => 'Kategori',
            'level' => 'Tingkat',
            'position' => 'Juara 1',
            'date' => '00/00/0000',
            'award' => 'Sertifikat',
        ];
    }
}
