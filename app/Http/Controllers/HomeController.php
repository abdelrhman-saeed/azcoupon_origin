<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Setting;
use App\Models\Slider;
use App\Models\Event;
use App\Models\Store;
use App\Models\Homedeals;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $setting = Setting::find(1);
        $stores = Store::latest()->where('online', 1)->get();

        $latest_stores = $stores->take($setting->latest_stores_num);
        $featured_brands = $stores->filter(fn ($store) => $store->featured)->take($setting->featured_brands_num);

//        $latest_stores = Store::latest()->where('online', 1)->take( $setting->latest_stores_num )->get();

        $coupons = Coupon::latest()
                            ->AvailableInSchedule()
//                            ->NotExpired()
                            ->where('online', 1)
                            ->get();

        $featured_coupons = $coupons->filter(fn($coupon) => $coupon->featured)->take($setting->featured_coupons_num);
//        $featured_coupons = Coupon::latest()
//                                        ->AvailableInSchedule()
//                                        ->NotExpired()
//                                        ->where('online', 1)
//                                        ->where('featured', 1)
//                                        ->take($setting->featured_coupons_num)->get();
//
        $latest_coupons = $coupons->unique('store_id')->take($setting->latest_coupons_num);
//        $latest_coupons = Coupon::latest()
//                                    ->AvailableInSchedule()
//                                    ->NotExpired()
//                                    ->where('online', 1)
//                                    ->get()
//                                    ->unique('store_id')
//                                    ->take($setting->latest_coupons_num);

        return view('home.index', [
            
            'home_title' => $setting->title,
            'home_subtitle' => $setting->subtitle,
            'homedeals' => Homedeals::find(1),

            'topvouchercodes' => DB::table('home_top_voucher_codes')->first(),

            'slider' => ( $slider = Slider::where('enabled', 1)->get() ),
            'slider_count' => $slider->count(),

            'special_events' => Event::latest()->where('single_event', 0)->take( $setting->special_events_num )->get(),

            
            'featured_brands' => $featured_brands,
            'featured_coupons' => $featured_coupons,
            
            'latest_stores' => $latest_stores,
            'latest_coupons' => $latest_coupons,
            'last_updated_at' => $stores->sortByDesc('updated_at')->first()->updated_at ?? ''
        ]);
    }
    
    public function coupons_suggestion()
    {
        $word = request()->input('word');
        $stores = Store::where('name', 'like', "%$word%")->withCount('all_coupons')->with('image')->get();

        return response()->json(['stores' => $stores]);
    }
}