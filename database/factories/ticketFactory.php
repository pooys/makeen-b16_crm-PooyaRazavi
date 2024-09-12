<?php

namespace Database\Factories;


use App\Models\message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ticket>
 */
class ticketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'user_id' => user::factory(),
            'message_id'=>fake()->randomNumber(2 , false),
            'subject' => fake()->name(),
            'message' => fake()->text(),
            'supporter'=> fake()->firstName(),
            'started_at'=>fake()->date(),
            'ended_at'=>fake()->dateTime(),

        ];
    }
}
