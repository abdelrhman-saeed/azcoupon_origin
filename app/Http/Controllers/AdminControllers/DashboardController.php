<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Coupon;
use App\Models\Category;
use App\Models\Store;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin_dashboard.index', [
            'coupons_count' => Coupon::where('offer', false)->count(),
            'stores_count' => Store::count(),
            'categories_count' => Category::count(),
            'offers_count' => Coupon::where('offer', true)->count(),
            'recent_coupons' => Coupon::latest()->take(10)->get(),

            'active_coupons' => Coupon::where('expire_date', '>', now()->toDateString())->count(),
            'expired_coupons' => Coupon::where('expire_date', '<=', now()->toDateString())->count(),
        ]);
    }
}
