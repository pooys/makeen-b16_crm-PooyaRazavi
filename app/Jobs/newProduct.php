<?php

namespace App\Jobs;

use App\Models\product;
use http\Env\Response;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class newProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
                 product::create([
            'name_product' => fake()->firstName(),
                        'brand' => fake()->lastName(),
                        'model'=>fake()->word(2,true),
                        'price'=>fake()->randomNumber(1,5),
                        'image_path'=>fake()->imageUrl()

]);
    }

}

