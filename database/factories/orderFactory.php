<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\order>
 */
class orderFactory extends Factory

{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>user::factory(),
            'namte' => fake()->name(),
            'brand' => fake()->text(),
            'model' => fake()->word(2,true),
            'price'=>fake()->randomNumber(5,false),

        ];
    }
}
