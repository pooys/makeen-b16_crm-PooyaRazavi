<?php

namespace Database\Factories;

use App\Models\ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\message>
 */
class messageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_id'=>fake()->randomNumber(2 , false),
            'masseges' => fake()->name(),

            ];
    }
}
