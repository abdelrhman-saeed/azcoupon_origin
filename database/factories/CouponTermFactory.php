<?php

namespace Database\Factories;

use App\Models\CouponTerm;
use App\Models\Coupon;

use Illuminate\Database\Eloquent\Factories\Factory;

class CouponTermFactory extends Factory
{
    protected $model = CouponTerm::class;
    public function definition()
    {
        return [
            'term' => $this->faker->text(),
            'coupon_id' => Coupon::all()->random()->id
        ];
    }
}
