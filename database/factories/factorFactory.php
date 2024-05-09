<?php

namespace Database\Factories;

use App\Models\order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\factor>
 */
class factorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_factor' => fake()->name(),

//              'order_id'=> order::factory(),
        ];

    }
}
