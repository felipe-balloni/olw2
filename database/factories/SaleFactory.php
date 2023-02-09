<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Client;
use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    protected $model = Sale::class;

    public function definition(): array
    {
        return [
            'seller_id' => Seller::factory(),
            'client_id' => Client::factory(),
            'sold_at' => $this->faker->dateTimeBetween('-8 years', '-1 year'),
            'status' => $this->faker->randomElement(Status::cases()),
            'total_amount' => $this->faker->numberBetween(10000, 50000)
        ];
    }
}
