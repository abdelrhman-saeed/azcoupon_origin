<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Widget;
use App\Models\Store;

class FrontCouponController extends Controller
{
    public function search()
    {
        $query = request()->input('coupon');
        $store = Store::where('name', $query);
        $store_count = $store->count();
        
        if( $store_count > 0 )
        {
            $store = $store->take(1)->get()[0];
            return redirect()->route('stores_events.show', $store->slug);
        }
        
        $result = Coupon::where('title', 'LIKE', "%$query%")
        ->whereHas('store', function ($builder) { 
            $builder->where('online', 1);
        })
        ->where('online', 1)
        ->AvailableInSchedule()
        ->paginate(20);
        
        $left_sidebar_widgets = Widget::latest()->where('related_sidebar', 'Search')->get();
        
        $last_updated_at = Store::where('online', 1)->orderBy('updated_at', 'DESC')->first()->updated_at;
        
        return view('coupons.search', [
            'query' => $query,
            'result' => $result,
            'left_sidebar_widgets' => $left_sidebar_widgets,
            'last_updated_at' => $last_updated_at
        ]);
    }

    public function check_coupon(Request $request)
    {
        $data = array();
        $rules = [
            'coupon_id' => 'required',
            'coupon_code' => 'required',
        ];
        $data['errors'] = array();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $data['success'] = 0;
            $data['errors']['coupon_id'] = $validator->errors()->first('coupon_id');
            $data['errors']['coupon_code'] = $validator->errors()->first('coupon_code');
            return response()->json($data);
        }else{
            $attributes = $validator->valid();

            if($attributes['coupon_code'] === '_')
            {
                $coupon = Coupon::where('id', $attributes['coupon_id'] );
            }
            else 
            {
                $coupon = Coupon::with('store.image')->where('id', $attributes['coupon_id'] )
                ->where('code', $attributes['coupon_code']);
            }

            if($coupon->first() !== null )
            {
                $c = $coupon->first();
                $link = $c->link == '' ? $c->store->link : $c->link;

                $count = $coupon->count();
                if($count)
                {
                    $data['success'] = 1;
                    $data['coupon'] = $c;
                    $data['coupon_store_image'] = $c->store->getStoreImage();
                    $data['store_updated_at'] = $c->store->updated_at->diffForHumans();
                    $data['coupon_id'] = $attributes['coupon_id'];
                    $data['coupon_code'] = $attributes['coupon_code'];
                    $data['coupon_link'] = $link;
                    $data['message'] = '';

                    $this->addView($c);
                }
                else 
                {
                    $data['success'] = 0;
                    $data['message'] = 'Il coupon non è valido.';
                }
            }else {
                $data['success'] = 0;
                $data['message'] = 'Il coupon non esiste.';
            }
        }
        return response()->json($data);
    }

    private function addView($c)
    {
        if( request()->has('store_views') ){
            $c->viewed += 1;
            $c->save();
        }
    }
}