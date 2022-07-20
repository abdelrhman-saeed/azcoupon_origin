<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Coupon;
use App\Models\Setting;
use App\Models\Widget;
use App\Models\Store;

class ExpiredSoonCouponsController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        
        $seo_title = $setting->expired_coupon_page_seo_title;
        $seo_description = $setting->expired_coupon_page_seo_description;
        
        $widgets = Widget::where('related_sidebar', 'Expiresoon')->orderBy('order')->get();
        
        $expiring_soon_coupons_featured_num = $setting->expiring_soon_coupons_featured_num;
        $expiring_soon_coupons_num = $setting->expiring_soon_coupons_num;
        
        $expired_soon_coupons_featured = Coupon::where('online', 1)
        ->AvailableInSchedule()
        ->NotExpired()
        ->where('featured', 1)
        ->where(function($query) {
            $query->where('expire_date', '>', now())
            ->where('expire_date', '<', now()->addDays(30))
            ->orWhere(function($query){
                $query->where('expire_soon', 1);
            });
        })
        ->orderBy('expire_date')
        ->take($expiring_soon_coupons_featured_num)
        ->get();

        $expired_soon_coupons_with_setted_by_admin = Coupon::where('online', 1)
        ->AvailableInSchedule()
        ->NotExpired()
        ->where(function($query) use ( $expired_soon_coupons_featured ) {
            $query->where('expire_date', '>', now())
            ->where('expire_date', '<', now()->addDays(30))
            ->orWhere(function($query){
                $query->where('expire_soon', 1);
            });
        })
        ->whereNotIn('id', $expired_soon_coupons_featured->pluck('id'))
        ->orderBy('expire_date')
        ->take($expiring_soon_coupons_num)
        ->get();
        
        $last_updated_at = Store::where('online', 1)->orderBy('updated_at', 'DESC')->first()->updated_at;
        
        return view('coupons.expiredcoupons', [
            'expired_soon_coupons_featured' => $expired_soon_coupons_featured,
            'expired_soon_coupons_with_setted_by_admin' => $expired_soon_coupons_with_setted_by_admin,
            'widgets' => $widgets,
            'seo_title' => $seo_title,
            'seo_description' => $seo_description,
            'last_updated_at' => $last_updated_at
        ]);
    }
}