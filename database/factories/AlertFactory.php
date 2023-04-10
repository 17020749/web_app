<?php

namespace Database\Factories\Report;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Models>
 */
class AlertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'METER_NO' => fake()->unique()->randomNumber(),
            'MA_DDO' => fake()->regexify('[A-Z]{5}[0-9]{5}'),
            'TEN_KHANG' => fake()->name(),
            'DIA_CHI' => fake()->address(),
            'DON_VI' => fake()->company(),
            'ALERT_TIME' => fake()->dateTimeBetween('-1 week', 'now')
        ];
    }
}
