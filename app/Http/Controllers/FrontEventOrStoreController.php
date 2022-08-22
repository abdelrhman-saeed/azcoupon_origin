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


        $setting = Setting::find(1);

        $store_coupons_offers = Coupon::whereStoreId($store->id)->NotExpired()->get();

        $store_coupons_at_specific_month =
            ( $store_non_featured_coupons = $store_coupons_offers->where('featured', 0) )
                                                                    ->sortByDesc('created_at')
                                                                    ->take($setting->store_specific_month_coupons_num);


        $store_expired_coupons_offers = Coupon::whereStoreId($store->id)->get()->filter(fn ($coupon) => $coupon->expired())->take(5);


        return view('stores.show', [
            'store' => $store,
            'max_discount' => $max_discount->discount?? 0,
            'preference' => $max_discount->preference?? '%',
            'related_stores' => $related_stores,
            'related_categories' => $related_categories,
            'store_coupons_specific_month' => $setting->store_coupons_specific_month,
            'store_featured_coupons' => $store_coupons_offers->where('featured', 1),
            'store_coupons_at_sepcific_month' => $store_coupons_at_specific_month,
            'store_latest_coupons_offers' => $store_non_featured_coupons->filter(fn($coupon) => $coupon->title ),
            'store_expired_coupons_offers' => $store_expired_coupons_offers,
            'store_reviews' => $store->avgReviews(),
            'all_coutpons_offers' => $store_coupons_offers->count(),
            'last_updated_at' => $store->updated_at->toDateString(),
            'coupon' => Coupon::whereId(request()->input('couponId'))->first(),
        ]);
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
