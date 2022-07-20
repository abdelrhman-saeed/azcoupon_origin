<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermissionFactory extends Factory
{
    protected $model = Permission::class;
    protected static $counter1 = 0;
    protected static $counter2 = 0;

    public function definition()
    {
        $permissions = [
            'Coupons/Offers Management',
            'Categories Management',
            'Stores Management',
            'Events Management',
            'Users Management',
            'Email Subscribers Management',
            'Phone Subscribers Management',
            'Sidebar Widgets Management',
            'Slider Management',
            'Setting Management',
        ];
        $pathes = [
            'coupons',
            'categories',
            'stores',
            'events',
            'users',
            'subscribers',
            'phone_subscribers',
            'widgets',
            'slider',
            'setting',
        ];
        return [
            'title' => $permissions[self::$counter1++],
            'path' => $pathes[self::$counter2++]
        ];
    }
}
