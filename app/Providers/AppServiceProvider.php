<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use App\Models\Event;
use App\Models\Store;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    
    public function boot(Request $request)
    {   
        Schema::defaultStringLength(191); Paginator::useBootstrap();
        
        if ( ! $request->is('*/install', '*/import_db')
                && Schema::hasTable('events')
                && Schema::hasTable('settings')
                && Schema::hasTable('stores')
                && Schema::hasTable('categories')
                && $setting = Setting::where('id', 1)->first() )
        {

            $events = Event::orderByDesc('single_event')->get();
            View::share('single_event', $events->first());

            View::share('events', $events);
            View::share('navbar_stores', Store::whereIn('id', explode(',', $setting->top_stores_ids) )->orderBy('name')->get() );

            View::share('navbar_categories', Category::take(9)->orderBy(
                    $setting->navbar_categories_order_by, $setting->navbar_categories_order_type
                )->get()
            );

            View::share('query', "");
            
            View::share('total_coupons_offers', Coupon::where('online', 1)->count());
            View::share('total_stores', Store::where('online', 1)->count());    
            
            View::share('sidebar_featured_stores', Store::where('featured', 1)->take($setting->sidebar_featured_stores_num)->get() );
            View::share('static_pages', Page::where('active', 1)->orderBy('id', 'DESC')->get());
            
            View::share('home_meta_title', $setting->meta_title);
            View::share('home_meta_description', $setting->meta_description);
            
            View::share('slider_link_1_title', $setting->slider_link_1_title);
            View::share('slider_link_1_link', $setting->slider_link_1_link);
            View::share('slider_link_2_title', $setting->slider_link_2_title);
            View::share('slider_link_2_link', $setting->slider_link_2_link);
            View::share('slider_link_3_title', $setting->slider_link_3_title);
            View::share('slider_link_3_link', $setting->slider_link_3_link);

            View::share('global_site_tag', $setting->global_site_tag);

            View::share('super_featured_coupon',
                            Coupon::where('super_featured', 1)
                                        ->where('expire_date', '=','0000-00-00')
                                        ->orWhere('expire_date', NULL)
                                        ->orWhere('expire_date', '>', now())
                                        ->where('online', 1)->orderBy('updated_at', 'DESC')->first()
                    );

            View::share('footer_links', DB::table('footer_links')->where('active', 1)->orderBy('link_order')->get());
            View::share('push_engage_notifications', $setting->push_engage_notifications);
        }
    }
}