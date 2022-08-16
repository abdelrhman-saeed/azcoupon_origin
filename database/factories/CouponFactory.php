<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Coupon;
use App\Models\Store;
use App\Models\Category;
use App\Models\Event;

class CouponFactory extends Factory
{
    
    protected $model = Coupon::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'code' => Str::random(10),
            'discount' => rand(1, 30),
            'preference' => $this->faker->randomElement( ['%', '$'] ),
            'expire_date' => now()->addDays(40)->toDateString(),
            'link' => $this->faker->url(),
            'featured' => rand(0, 1),
            'user_id' => 1,
            'updated_by' => 1,
            'store_id' => Store::all()->random()->id,
        ];
    }
}
