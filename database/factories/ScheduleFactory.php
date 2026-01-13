<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day' => Carbon::parse(fake()->date())->translatedFormat('l'),
            'subject' => fake()->randomElement([
                'Matematika',
                'IPA',
                'IPS',
            ]),
            'class' => 'Kelas ' . fake()->numberBetween(1, 6),
        ];
    }
}
