<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nip' => $this->faker->numerify('19##########'), // NIP acak
            'position' => $this->faker->randomElement(['Kepala Sekolah', 'Guru Kelas', 'Guru PJOK', 'Guru Agama']),
            'photo' => null, // Foto kosong dulu
        ];
    }
}