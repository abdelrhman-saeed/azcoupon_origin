<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Coupon;
use App\Models\Subscriber;
use App\Models\Tel_Subscriber;

class NewsLetterController extends Controller
{
    public function subscribe()
    {
//        $mailchimp = new \MailchimpMarketing\ApiClient();
//        $mailchimp->setConfig([
//            'apiKey' => config('services.mailchimp.key'),
//            'server' => 'us5'
//        ]);
        $data = array();
        $data['success'] = 0;
        $rules = [
            'email' => 'required|email',
            'store_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'model' => 'required|in:store,category,home'
        ];
        $validator = Validator::make(request()->all(), $rules);
        $attributes = $validator->validated();
        $attributes['date'] = now()->toDateString();

        if( $validator->fails() )
        {   
            $data['message'] = $validator->errors()->first('email');
        }
        else
        {
            try
            {
//                $response = $mailchimp->lists->addListMember("a3970cfb79", [
//                    'email_address' => request('email'),
//                    'status' => 'subscribed'
//                ]);

                $data['success'] = 1;
                $data['message'] = 'Ti sei iscritto con successo alla nostra newsletter.';

                Subscriber::create( $attributes );
            }
            catch(\Exception $e)
            {
                \Log::info($e->getMessage());
                $data['message'] = 'Questa e-mail non può essere aggiunta alla nostra lista di newsletter O già presente';
            }
        }
        return response()->json($data);
    }
    
    public function phone_subscribe()
    {
        $data = array();
        $data['success'] = 0;
        
        $rules = [
            'visitor_phone' => 'required',
            'store_id' => 'required|numeric'
        ];

        $validator = Validator::make(request()->all(), $rules);
        $attributes = $validator->validated();
        $attributes['date'] = now()->toDateString();

        if( $validator->fails() )
        {
            $data['message'] = $validator->errors()->first('visitor_phone');
        }
        else
        {
            $tel_subscriber = Tel_Subscriber::create($attributes);
            $coupon = Coupon::find($attributes['store_id']);
            $tel_subscriber->stores()->syncWithoutDetaching([$coupon->store->id]);

            $data['success'] = 1;
            $data['message'] = 'Ti sei iscritto con successo al negozio '. $coupon->store->name;
        }
        return response()->json($data);
    }
}