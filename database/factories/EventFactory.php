<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{

    protected $model = Event::class;   
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(),
            'single_event' => 0,
            'banner' => 'admin_assets/images/banners/banner.webp',
            'banner_title' => $this->faker->sentence(),
            'banner_subtitle' => $this->faker->sentence(),
            'user_id' => 1,
            'updated_by' => 1,
        ];
    }
    
}
