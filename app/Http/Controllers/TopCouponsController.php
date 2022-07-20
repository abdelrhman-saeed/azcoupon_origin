<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\Coupon;
use App\Models\Widget;
use App\Models\Store;

class TopCouponsController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        
        $seo_title = $setting->top_coupon_page_seo_title;
        $seo_description = $setting->top_coupon_page_seo_description;
        
        $widgets = Widget::where('related_sidebar', 'Topcoupons')->orderBy('order')->get();

        $top_coupons_featured_num = $setting->top_coupons_featured_num;
        $top_coupons_num = $setting->top_coupons_num;

        $top_coupons_featured = Coupon::where('online', 1)
        ->AvailableInSchedule()
        ->NotExpired()
        ->where('featured', 1)
        ->orderBy('viewed', 'DESC')
        ->take($top_coupons_featured_num)->get();

        $top_coupons = Coupon::where('online', 1)
        ->AvailableInSchedule()
        ->NotExpired()
        ->where('featured', 0)
        ->orWhere('top_coupon', 1)
        ->whereNotIn('id', $top_coupons_featured->pluck('id'))
        ->orderBy('viewed', 'DESC')
        ->take($top_coupons_num)->get();

        $last_updated_at = Store::where('online', 1)->orderBy('updated_at', 'DESC')->first()->updated_at;
        
        return view('coupons.topcoupons', [
            'top_coupons_featured' => $top_coupons_featured,
            'top_coupons' => $top_coupons,
            'widgets' => $widgets,
            
            'seo_title' => $seo_title,
            'seo_description' => $seo_description,
            
            'last_updated_at' => $last_updated_at
        ]);
    }
}