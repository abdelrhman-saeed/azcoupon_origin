<?php

namespace Database\Factories;

use App\Models\Widget;
use App\Models\Store;
use App\Models\Event;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\Factory;

class WidgetFactory extends Factory
{
    protected $model = Widget::class;
    
    public function definition()
    {
        $random = $this->faker->randomElement(['Store', 'Event', 'Category', 'Topcoupons', 'Expiresoon']);

        $store_id = $random == 'Store' ? Store::all()->random()->id : 0;
        $event_id = $random == 'Event' ? Event::all()->random()->id : 0;
        $category_id = $random == 'Category' ? Category::all()->random()->id : 0;
        
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => 1,
            'updated_by' => 1,
            'related_sidebar' => $random,
            'store_id' => $store_id,
            'event_id' => $event_id,
            'category_id' => $category_id,
            'order' => $this->faker->randomElement([1,2,3,4,5,6,7,8,9])
        ];
    }
}
