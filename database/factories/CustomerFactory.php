<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ipaddress' => fake()->ipv4(),
            'visited_date'=> fake()->dateTimeBetween('2023-01-01','2024-01-01'),
            // 'count' => fake()->count()

        ];
    }
}
