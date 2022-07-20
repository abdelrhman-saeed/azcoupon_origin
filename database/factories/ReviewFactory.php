<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Store;
use App\Models\Review;

class ReviewFactory extends Factory
{
    protected $model = Review::class;
    
    public function definition()
    {
        return [
            'store_id' => Store::all()->random()->id,
            'review' => $this->faker->randomElement([1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 5]),
            'date' => now()->toDateString()
        ];
    }
}
