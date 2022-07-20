<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;

class FrontCategoryController extends Controller
{
    public function index()
    {
        // will be updated soon
        $last_updated_at = Category::orderBy('updated_at', 'DESC')->first()->updated_at ?? '';

        $categories = Category::orderBy('name')->get();
        return view('categories.index', [
            'categories' => $categories,
            'last_updated_at' => $last_updated_at
        ]);
    }

    public function show(Category $category)
    {
        $setting = Setting::find(1);

        $category_coupons_featured = $category->coupons()
                                                ->whereHas('store', fn ($builder) => $builder->where('online', 1))
//                                                ->AvailableInSchedule()
//                                                ->NotExpired()
                                                ->where('featured', 1)
//                                                ->take($setting->category_coupons_featured_num)
                                                ->orderBy('updated_at', 'DESC')
                                                ->get();

        $category_coupons = $category->coupons()
                                        ->whereHas('store', fn ($builder) => $builder->where('online', 1))
                                        ->where('featured', 0)
//                                        ->take($setting->category_coupons_num)
                                        ->orderBy('updated_at', 'DESC')
                                        ->get();


        $sidebar_last_added_categories = Category::latest()
                                                    ->whereNotIn('id', $category)
                                                    ->take($setting->sidebar_related_categories_num)
                                                    ->get();

        $related_stores = $category->stores()->where('online', 1)->get();

        $related_categories_collection = [];
        foreach( $related_stores as $index => $store ) {
            $related_categories_collection[] = $store->categories()->inRandomOrder()->limit(4)->get();
        }

        $related_categories = [];
        foreach($related_categories_collection as $collection) {
            foreach( $collection as $c )
            {
                if( ! isset($related_categories[$c->id]) && $c->id !== $category->id)
                    $related_categories[$c->id] = $c;
            }
        }

        return view('categories.show', [
            'category' => $category,
            'stores_to_filter' => $category->stores()
                                            ->join('coupons', 'stores.id', '=', 'coupons.store_id')
                                            ->distinct()->get(),

            'related_categories' => $related_categories,
            'related_stores' => $related_stores,

            'category_coupons_featured' => $category_coupons_featured,
            'category_coupons' => $category_coupons,

            'sidebar_last_added_categories' => $sidebar_last_added_categories,
            'last_updated_at' => $category->updated_at->toDateString()
        ]);
    }
}