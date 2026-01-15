<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 1, // Diupload oleh Admin
            'title' => $this->faker->sentence(3),
            'image' => 'https://via.placeholder.com/640x480', // Gambar placeholder
            'description' => $this->faker->paragraph(),
        ];
    }
}