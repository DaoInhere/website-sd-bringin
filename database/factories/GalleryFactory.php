<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            // 'id' => 1, // Diupload oleh Admin
            'title' => $this->faker->sentence(3),
            'image' => 'sekolah sd bringin 01 semarang.jpg', // Gambar placeholder
            // 'description' => $this->faker->paragraph(),
        ];
    }
}