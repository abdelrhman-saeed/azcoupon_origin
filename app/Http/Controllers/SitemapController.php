<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Event;
use App\Models\Coupon;
use App\Models\Category;

class SitemapController extends Controller
{
    public function index()
    {
        $stores = Store::latest()->where('online', 1)->pluck('slug');
        $events = Event::latest()->pluck('slug');
        $categories = Category::latest()->pluck('slug');
        
        return response()->view('sitemap', 
        [
            'stores' => $stores,
            'events' => $events,
            'categories' => $categories
        ])->header('Content-Type', 'text/xml');
    }
}


