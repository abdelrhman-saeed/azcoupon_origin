<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    public static $counter = 0;
    protected $model = Slider::class;

    public function definition()
    {
        $arr_of_images = ["1.jpg", "2.jpg", "3.jpg", "4.jpg", "5.jpg", "6.jpg"];
        $img = $arr_of_images[$this::$counter % count($arr_of_images)];
        $this::$counter += 1;
        return [
            'slide' => 'storage/images/slider/'.$img,
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->sentence(),
            'link' => $this->faker->url()
        ];
    }
}