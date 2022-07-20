<?php

namespace App\Http\Controllers;
use  App\Http\Controllers\Controller;

use App\Models\Store;
use App\Models\Event;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Coupon;

class FrontEventOrStoreController extends Controller
{
    public function show($slug)
    {

        if ( $page = Page::where('active', 1)->where('slug', $slug)->first() ) {
            return $this->showPage($page);
        }

        if ( $store = Store::where('slug', $slug)->first() ) {
            return $this->showStore($store);
        }

        if ( $event = Event::where('slug', $slug)->first() ) {
            return $this->showEvent($event);
        }

        return abort(404);
    }

    public function showStore($store)
    {
        $max_discount = $store->coupons()->where('online', 1)->orderBy('discount', 'DESC')->first();

        $related_categories         = $store->categories;
        $related_stores_collection  = [];

        foreach( $related_categories as $category ) {
            $related_stores_collection[] = $category->stores()->where('online', 1)->inRandomOrder()->limit(4)->get();
        }

        $related_stores = [];

        foreach($related_stores_collection as $collection) {
            foreach( $collection as $c )
            {
                if( ! isset($related_stores[$c->id]) && $c->id !== $store->id)
                    $related_stores[$c->id] = $c;
            }
        }

        // check if the store is offline or online

        if ( ! $store->online ) {
            return abort(404);
        }

        $one = 0; $two = 0; $three = 0; $four = 0; $five = 0;
        $one_half = 0; $two_half = 0; $three_half = 0; $four_half = 0;

        foreach($store->reviews as $review) {
            if($review->review == 1){ $one++; }
            else if($review->review == 1.5){ $one_half++; }
            else if($review->review == 2){ $two++; }
            else if($review->review == 2.5){ $two_half++; }
            else if($review->review == 3){ $three++; }
            else if($review->review == 3.5){ $three_half++; }
            else if($review->review == 4){ $four++; }
            else if($review->review == 4.5){ $four_half++; }
            else if($review->review == 5){ $five++; }
        }

        $store_reviews = (5*$five) + (4.5 * $four_half) + (4*$four) + (3.5 * $three_half) + (3*$three) + (2.5 * $two_half)
            + (2*$two) + (1.5 * $one_half) + (1 * $one);

        $store_reviews = $store->reviews->count() === 0 ? 0 : round($store_reviews / $store->reviews->count() );
        $setting = Setting::find(1);

        $store_coupons_offers = Coupon::whereStoreId($store->id)->NotExpired()->get();

        $store_coupons_at_sepcific_month =
            ( $store_non_featured_coupons = $store_coupons_offers->where('featured', 0) )
                                                                    ->sortByDesc('created_at')
                                                                    ->take($setting->store_specific_month_coupons_num);


        $store_expired_coupons_offers = Coupon::whereStoreId($store->id)->get()->filter(fn ($coupon) => $coupon->expired());


        return view('stores.show', [
            'store' => $store,
            'max_discount' => $max_discount->discount?? 0,
            'preference' => $max_discount->preference?? '%',
            'related_stores' => $related_stores,
            'related_categories' => $related_categories,
            'store_coupons_specific_month' => $setting->store_coupons_specific_month,
            'store_featured_coupons' => $store_coupons_offers->where('featured', 1),
            'store_coupons_at_sepcific_month' => $store_coupons_at_sepcific_month,
            'store_latest_coupons_offers' => $store_non_featured_coupons,
            'store_expired_coupons_offers' => $store_expired_coupons_offers,
            'store_reviews' => $store_reviews,
            'all_coutpons_offers' => $store_coupons_offers->count(),
            'last_updated_at' => $store->updated_at->toDateString(),
        ]);

//        $store_featured_coupons = $store->coupons()
//                                            ->latest()
//                                            ->AvailableInSchedule()
//                                            ->NotExpired()
//                                            ->where('online', 1)
//                                            ->where('featured', 1)
//                                            ->take($setting->store_coupons_featured_num)
//                                            ->get();

//        $store_coupons_at_sepcific_month = $store->coupons()
//            ->latest()
//            ->where('online', 1)
//            ->AvailableInSchedule()
//            ->NotExpired()
//            ->where('featured', 0)
//            ->orderBy('created_at', 'DESC')
//            ->take($setting->store_specific_month_coupons_num)
//            ->get();
//
//        $store_latest_coupons_offers = $store->coupons()->latest()
//            ->AvailableInSchedule()
//            ->NotExpired()
//
//            ->where(function($query) {
//                $query
//                    ->where('featured', 0)
//                    ->where('online', 1);
//            })
//            ->take($setting->store_latest_coupons_offers_num)
//            ->get();

//        $store_expired_coupons_offers = $store->coupons()
//            ->latest()
//            // ->where('online', 1)
//            // ->AvailableInSchedule()
//            ->where(function($query){
//                $query
//                    ->where('expire_date', '!=','0000-00-00')
//                    ->where('expire_date', '<=', now());
//            })
//            // ->where('featured', 0)
//            ->take($setting->store_expired_coupons_num)
//            ->get();

//        $all_coutpons_offers = $store_featured_coupons->count() + $store_coupons_at_sepcific_month->count() + $store_expired_coupons_offers->count();
//
//        $last_updated_at = $store->updated_at->toDateString();
//
//        return view('stores.show', [
//            'store' => $store,
//            'max_discount' => $max_discount->discount??0,
//            'preference' => $max_discount->preference??'%',
//            'related_stores' => $related_stores,
//            'related_categories' => $related_categories,
//            'store_coupons_specific_month' => $setting->store_coupons_specific_month,
//            'store_featured_coupons' => $store_featured_coupons,
//            'store_coupons_at_sepcific_month' => $store_coupons_at_sepcific_month,
//            'store_latest_coupons_offers' => $store_latest_coupons_offers,
//            'store_expired_coupons_offers' => $store_expired_coupons_offers,
//            'store_reviews' => $store_reviews,
//            'all_coutpons_offers' => $all_coutpons_offers,
//            'last_updated_at' => $last_updated_at
////            dd($store->coupons()->where('featured', 1)->limit(1)->get()
//        ]);
    }

    public function showEvent($event)
    {
        $event_coupons = $event->coupons()->orderBy('id', 'DESC')->get()->unique('store_id')->groupBy('featured');
        isset( $event_coupons[0] ) ?: $event_coupons[0] = collect();
        isset( $event_coupons[1] ) ?: $event_coupons[1] = collect();

        return view('events.show', [
            'event_featured_coupons' => $event_coupons[1], // featured coupons
            'event_coupons' => $event_coupons[0], // coupons
            'event' => $event,
            'event_coupons_count' => $event_coupons[0]->count(),
            'event_offers_count' => $event_coupons[1]->count(),
            'last_updated_at' => $event->updated_at->toDateString(),
        ]);
    }

    public function showPage($page) {
        return view('pages.show', [ 'page' => $page,  'last_updated_at' => $page->updated_at->toDateString() ]);
    }
}
