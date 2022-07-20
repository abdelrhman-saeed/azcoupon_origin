<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\Coupon;

class ExtensionController extends Controller
{
    public function __invoke(Request $request)
    {
        $storeurl = "";
        $storeurl_wrong_format = request()->url;
        
        $storeurl_arr = explode(".", $storeurl_wrong_format);
        foreach($storeurl_arr as $key => $s) {
            if($key != 0)
            {
                $storeurl .= $s;
                if( $key != count( $storeurl_arr ) - 1 )
                    $storeurl .= ".";
            }
        }
        
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");

        $stores = Store::where(function($query) use ( $storeurl ) {
            $query->where('online', 1)
            ->where('link', 'like', "%$storeurl%");
        })->orderBy('updated_at', 'DESC')->get();
        
        $returnarray = array();
        $returnarray['flag'] = 0;
        $returnarray['count'] = 0;
        
        $returned_coupons = array();
        
        if( count($stores) >= 1){
            $store_id = 0;
            for($i = 0; $i < count($stores); $i++) {
                $store = $stores[$i];
                
                $store_id = $store->id;
                $store_name = $store->name;
                $store_link = $store->link;
                $store_aff_link = $store->aff_link;
                $store_image_path = $store->image ? $store->image->path : '';
                
                break;
            }
            
            if( $store_id != 0 ){
                $coupons = Coupon::where('store_id', $store_id)
                ->select("coupons.code AS CouponCode", "coupons.created_at AS DateAdded", "coupons.expire_date AS ExpiryDate", "coupons.store_id AS WebsiteID", 
                "coupons.description AS description", "coupons.id AS itemID", "coupons.link", "updated_at AS itemURL" , "coupons.title AS title")
                ->orderBy('coupons.created_at', 'DESC')
                ->limit(3)
                ->get();
                
                if(count($coupons) >= 1){
                    $count = 0;
                    foreach($coupons as $coupon) {
                        if( $coupon->link == null )
                        {
                            $coupon->itemURL = "";
                        }else { $coupon->itemURL = $coupon->link; }
                        $coupon->preference = $coupon->offer == 1 ? 'd' : 'c'; 
                        
                        $coupon->itemflag = $coupon->preference; 
                        $now = date('Y-m-d');
                        
                        if( ($coupon->expire_date != '') && ($coupon->expire_date != '0000-00-00') ){  
                            $expiry = new DateTime($coupon->expire_date);
                        }else{
                            $expiry = 0;
                        }
                        
                        if( ($coupon->expire_date == '0000-00-00') || ($coupon->expire_date == NULL) || ($coupon->expire_date == '') || ($expiry >= $now) || ($expiry == 0 )){
                            array_push($returned_coupons, $coupon);
                            $count++;
                        }
                    }
                    
                    $returnarray['flag'] = 1; // 1
                    $returnarray['count'] = $count;
                    $returnarray['coupons'] = $returned_coupons;
                    $returnarray['storename'] = $store_name;
                    
                    setlocale(LC_TIME, 'it_IT');
                    $mydate =  strftime("%B %Y") ; 
                    
                    $returnarray['storedescription'] = "Codici Sconto e Offerte ". $store_name ." attive a ".$mydate  ;
                    $returnarray['storeaffilate'] = $store_aff_link;
                    
                    $returnarray['storeimg'] = $store_image_path ? asset('../glam_core/storage/app/public/images/markets/'.$store_image_path) : asset('admin_assets/images/stores/store_placeholder_small.png');
                    
                    $returnarray['exntensionsmallimg'] = "https://www.Glam.it/assets/images/icons/favicon.svg";
                }
            }
        }else{
            
            // $coupons = Coupon::where('offer', 0)
            // ->leftJoin('stores', "coupons.store_id", "=", "stores.id")
            // ->select("coupons.code AS CouponCode", "coupons.created_at AS DateAdded", "coupons.store_id AS WebsiteID", "coupons.link AS link", "coupons.title AS title", "stores.name as WebsiteName")
            // ->orderBy('coupons.created_at', 'DESC')
            // ->limit(20)
            // ->get();
            
            // if(count($coupons) >= 1){
                
                // foreach($coupons as $coupon ) {
                //     $coupon->storeimg = 'https://www.glam.it/glam_core/storage/app/public/images/markets/' . Store::find($coupon->WebsiteID)->image->path;
                //     array_push($returned_coupons, $coupon);
                // }
                $returnarray['flag'] = 2; // 2
                // $returnarray['coupons'] = $returned_coupons; 
                $returnarray['cdnlink'] = "https://www.glam.it/assets/images/";
                $returnarray['exntensionsmallimg'] = "https://www.glam.it/assets/images/icons/favicon.svg";
            // }
            $returnarray['coupons'] = [];
        }
        return response()->json( $returnarray );
    }
}