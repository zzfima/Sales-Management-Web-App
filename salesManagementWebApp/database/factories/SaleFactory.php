<?php

namespace Database\Factories;

use App\Http\Controllers\SaleController;
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
        $salesController = new SaleController();
        return [
            'time' => fake()->dateTime(),
            'amount' => fake()->randomFloat(2, 0, 1000),
            'installments' => 1,
            'sale_number' => fake()->numberBetween(10000000, 90000000),
            'description' => fake()->word(),
            'currency' => fake()->randomElement($salesController->GetCurrencies()),
            'payment_link' => fake()->url('http'),
            'language' => 'en',
            'seller_payme_id' => fake()->uuid(),
            'payme_sale_id' => fake()->uuid(),
            'transaction_id' => fake()->uuid(),
        ];
    }
}
