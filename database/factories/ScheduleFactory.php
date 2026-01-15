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
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $hours = [
            '07:00 - 08:00',
            '08:00 - 09:00',
            '09:00 - 10:00',
        ];

        $day  = fake()->randomElement($days);
        $hour = fake()->randomElement($hours);

        $uniform = match ($day) {
            'Senin', 'Selasa' => 'Merah Putih',
            'Rabu', 'Kamis'   => 'Batik',
            'Jumat'           => 'Pramuka',
        };

        $subject = ($day === 'Senin' && $hour === '07:00 - 08:00')
            ? 'Upacara'
            : fake()->randomElement([
                'Matematika',
                'IPA',
                'IPS',
            ]);

        return [
            'day'     => $day,
            'hour'    => $hour,
            'subject' => $subject,
            'class'   => 'Kelas ' . fake()->numberBetween(1, 6),
            'uniform' => $uniform,
        ];
    }
}
