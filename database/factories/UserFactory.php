<?php

namespace Database\Factories;

use App\Http\Controllers\user\usercontroller;
//use http\Client\Curl\User;
use App\Models\team;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'codemeli' => fake()->numberBetween(1,10),
            'mobile' => fake()->phoneNumber(),
            'tarikht_tavalod'=>fake()->date(),
            'sex'=>fake()->randomElement(['mard', 'zan']),
            'password' => Hash::make('1234'),

        ];
    }




    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
