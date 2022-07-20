<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = \App\Models\User::factory(1)->create()->first();
        $user->permissions()->sync( \App\Models\Permission::factory(10)->create() );

//        \App\Models\Store::factory(5)->create();
//        \App\Models\Store::factory(4)->create(['featured' => 1]);
//
//        \App\Models\Event::factory(10)->create();
//        \App\Models\Coupon::factory(80)->create();
//
//        $categories = \App\Models\Category::factory(20)->create();
//
//        foreach($categories as $category)
//            $category->coupons()->sync( \App\Models\Coupon::factory(5)->create() );
        
//        \App\Models\Coupon::factory(20)->create([
//            'expire_date' => now()->subDays(20)->toDateString(),
//        ]);

//        \App\Models\Coupon::factory(20)->create([
//            'expire_date' => now()->toDateString(),
//        ]);

//        \App\Models\CouponTerm::factory(100)->create();

//        \App\Models\Review::factory(100)->create();
//        \App\Models\Image::factory(50)->create();
        
//        \App\Models\Widget::factory(50)->create();
        
//        $event = \App\Models\Event::factory()->create([
//            'single_event' => 1,
//        ]);
//        $event->coupons()->sync( \App\Models\Coupon::factory(20)->create() );

//        \App\Models\Slider::factory(6)->create();
//
        \App\Models\Setting::factory(1)->create();
        
    }
}
