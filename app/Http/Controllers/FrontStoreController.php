<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

use App\Models\Setting;
use App\Models\Store;
use App\Models\Widget;
use App\Models\Category;

class FrontStoreController extends Controller
{
    public function index()
    {
        $last_updated_at = Store::where('online', 1)->orderBy('updated_at', 'DESC')->first()->updated_at ?? '';
        
        $stores = Store::where('online', 1)->orderBy('name')->get();
//        $popular_stores = Store::where('online', 1)
//            ->where('featured', 1)->
//            orderBy('name')->limit(10)->get();
            
        $category_has_stores = Category::has('stores')->get();
        
        return view('stores.index', [
            'stores' => $stores,
            'category_has_stores' => $category_has_stores,
            'last_updated_at' => $last_updated_at
        ]);
    }
    
    public function show( $store )
    {
        $stores = Store::where('id', $store)->first();
        return view('stores.show', [
            'store' => $stores
        ]);
    }
    
    public function rate(Store $store, Request $request)
    {
        $old_review = isset($_COOKIE["store_review_$store->id"]) ? $_COOKIE["store_review_$store->id"] : null;
        
        $data = array();
        $rules = [
            'review' => 'required',
        ];
        $data['errors'] = array();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $data['success'] = 0;
            $data['errors']['review'] = $validator->errors()->first('review');
        }else{
            // review is true check if user has rated before or not in thorugh 10 days
            if($old_review !== null)
            {
                $data['success'] = 0;
                $data['message'] = 'Sorry, but you will be able to vote again in 10 days.';
            }
            else 
            {
                $attributes = $validator->valid();
                $attributes['store_id'] = $store->id;
                $attributes['date'] = now()->toDateString();

                setcookie("store_review_$store->id", $attributes['review'], time()+10*24*60*60);
                $review = $store->reviews()->create($attributes);
                if($review)
                {
                    $data['success'] = 1;
                    $data['message'] = 'Thank you for giving ' . $attributes['review'] . ' stars to our '. $store->name . ' promo codes page!';
                }else {
                    $data['success'] = 0;
                    $data['message'] = 'Tariffa non valida. Riprova.';
                }
            }
        }
        return response()->json($data);
    }
}