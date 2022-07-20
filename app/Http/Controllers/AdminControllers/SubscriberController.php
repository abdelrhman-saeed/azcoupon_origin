<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subscriber;
use App\Models\Tel_Subscriber;

class SubscriberController extends Controller
{
    public function index()
    {
        return view('admin_dashboard.subscribers.index', [
            'subscribers' => Subscriber::with('store')->get()
        ]);
    }
    
    public function phone_subscribers()
    {
        return view('admin_dashboard.subscribers.phone_subscribers', [
            'tel_subscribers' => Tel_Subscriber::with('stores')->get()
        ]);
    }
}
