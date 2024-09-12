<?php

namespace Database\Factories;

use App\Models\team;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                        'name_product' => fake()->firstName(),
                        'brand' => fake()->lastName(),
                        'model'=>fake()->word(2,true),
                        'price'=>fake()->randomNumber(1,5),
                        'image_path'=>fake()->image(),


                    ];
    }
}
