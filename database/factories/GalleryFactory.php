<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'image' => 'sekolah sd bringin 01 semarang.jpg',
            'description' => $this->faker->paragraph(),
            'activityDate' => now(),
        ];
    }
}