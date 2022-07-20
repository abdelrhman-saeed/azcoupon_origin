<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Category;
use App\Models\Image;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;
    public function definition()
    {
        $models = ['Store', 'Category'];
        $model = $models[rand(0, 1)];

        $stores_images = ['1.webp', '2.webp', '3.webp', '4.webp', '5.webp', '6.webp', '7.webp', '8.webp', '9.webp', 'hp.webp'];
        $categories_images = ['2.svg', 'headphone.webp'];

        $image = $model == 'Store' ? $stores_images[rand(0, 9)] : $categories_images[rand(0, 1)];
        
        return [
            'name' => $this->faker->name(),
            'path' => 'images/' . ($model == 'Store' ? 'stores/' : 'categories/') . $image,
            'imageable_id' => $model == 'Store' ? Store::all()->random()->id : Category::all()->random()->id,
            'imageable_type' => 'App\Models\\' . $model
        ];
    }
}
