<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\factor;
use App\Models\lable;
use App\Models\order;
use App\Models\product;
use App\Models\team;
use App\Models\User;

use Database\Factories\factorFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([PermissionSeeder::class, FactorySeeder::class]);
        User::factory()->has(order::factory()->has(product::factory()->count(3))->count(2))->count(3)->create();
        lable::factory()->has(team::factory()->count(2)->count(3))->create();
        order::factory()->has(factor::factory()->count(2)->count(2))->create();
    }

}
