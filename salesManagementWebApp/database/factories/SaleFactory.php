<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time' => fake()->dateTime(),
            'sale_number' => fake()->numberBetween(10000000, 9000000),
            'description' => fake()->word(),
            'amount' => fake()->randomFloat(2, 0, 1000),
            'currency' => fake()->currencyCode(),
            'payment_link' => fake()->url('http'),
        ];
    }
}
