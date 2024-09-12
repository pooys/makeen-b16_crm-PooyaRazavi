<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\resseler>
 */
class resselerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'team'=>fake()->name(),
                'name'=>fake()->firstName(),
                'sales_number'=>fake()->phoneNumber(),
        ];
    }
}
