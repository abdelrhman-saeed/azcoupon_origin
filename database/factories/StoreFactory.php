<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model = Store::class;
    
    public function definition()
    {
        $store_degrees = ['premium', 'medium', 'lower'];
        
        $name = $this->faker->word();
        return [
            'seo_title' => $this->faker->sentence(),
            'seo_description' => $this->faker->sentence(),
            'name' => $name,
            'slug' => $this->faker->unique()->slug(),
            'title' => "Coupon " . $name,
            'link' => $this->faker->url(),
            'store_degree' => $this->faker->randomElement($store_degrees),
            'featured' => 0,
            'updated_by' => 1,
            'user_id' => 1
        ];
    }
}