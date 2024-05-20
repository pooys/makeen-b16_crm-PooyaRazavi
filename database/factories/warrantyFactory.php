<?php

namespace Database\Factories;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\warranty>
 */
class warrantyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->word(3 , false),

            'description'=>fake()->paragraph(),
            'product_id'=>product::factory(),
            'started_at'=>now(),
            'ended_at'=>fake()->date(),
        ];
    }
}
