<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resort>
 */
class ResortFactory extends Factory
{
    private const FROM_COUNTRY_ID = 1;
    private const TO_COUNTRY_ID = 2;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'description' => fake()->text(100),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'country_id' => rand(self::FROM_COUNTRY_ID, self::TO_COUNTRY_ID)
        ];
    }
}
