<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Setting;
use App\Models\Store;
use App\Models\Homedeals;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin_dashboard.setting.index', [
            'setting' => Setting::find(1),
            'stores' => Store::where('online', 1)->pluck('name', 'id'),
        ]);
    }
    
    public function home()
    {
        return view('admin_dashboard.setting.home_special_deals', [
            'stores' => Store::where('online', 1)->pluck('name', 'id'),
            'home_special_deals' => Homedeals::find(1)
        ]);
    }
    
    public function topVoucherCodes()
    {
        return view('admin_dashboard.setting.top_voucher_codes', [
            'topvouchercodes' => \DB::table('home_top_voucher_codes')->first()
        ]);
    }
    
    public function footer()
    {
        return view('admin_dashboard.setting.footer', [
            'footer_links' => \DB::table('footer_links')->orderBy('link_order', 'DESC')->get()
        ]);
    }
    
    public function updatefooter(Request $request)
    {
        $inserted_data = [];
        \DB::table('footer_links')->truncate();
        
        if($request->input('text'))
        {
            for($i = 0; $i < count($request->input('text')); $i++)
            {   
                $text = $request->input('text')[$i];
                $link = $request->input('link')[$i];
                $link_order = $request->input('link_order')[$i];
                $active = $request->input('active') ? isset($request->input('active')[$i]) : 0;
                
                $data = [
                    'text' => $text,
                    'link' => $link,
                    'link_order' => $link_order,
                    'active' => $active,
                ];
                $inserted_data[] = $data;
            }
           \DB::table('footer_links')->insert( $inserted_data );
        }
        return redirect()->back()->with('success', 'Footer Links has been modified');
    }
    
    public function update(Request $request)
    {
        $data = array();
        $rules = [
            'meta_title' => 'required',
            'meta_description' => 'required',

            'title' => 'required|max:100',
            'subtitle' => 'required|max:80',
            'special_events_num' => 'required|numeric|max:100',
            'latest_stores_num' => 'required|numeric|max:100',
            'featured_brands_num' => 'required|numeric|max:100',
            'featured_coupons_num' => 'required|numeric|max:100',
            'latest_coupons_num' => 'required|numeric|max:100',

            'top_coupons_featured_num' => 'required|numeric|max:100',
            'top_coupons_num' => 'required|numeric|max:100',
            'expiring_soon_coupons_featured_num' => 'required|numeric|max:100',
            'expiring_soon_coupons_num' => 'required|numeric|max:100',

            'store_coupons_featured_num' => 'required|numeric|max:100',
            'store_coupons_specific_month' => 'required|max:20',
            'store_specific_month_coupons_num' => 'required|numeric|max:100',
            'store_latest_coupons_offers_num' => 'required|numeric|max:100',
            'store_expired_coupons_num' => 'required|numeric|max:100',
            'category_coupons_featured_num' => 'required|numeric|max:100',
            'category_coupons_num' => 'required|numeric|max:100',
            
            'navbar_categories_order_by' => 'required',
            'navbar_categories_order_type' => 'required|in:ASC,DESC',
            
            'sidebar_related_categories_num' => 'required|numeric|max:100',
            'sidebar_featured_stores_num' => 'required|numeric|max:100',
            'global_site_tag' => 'nullable',
            'push_engage_notifications' => 'nullable'
        ];
        
        $data['errors'] = array();
        $validator = Validator::make($request->all(), $rules);
        
        $setting = Setting::find( 1 );
        if ($validator->fails()) {

            $data['success'] = 0;
            $data['errors']['meta_title'] = $validator->errors()->first('meta_title');
            $data['errors']['meta_description'] = $validator->errors()->first('meta_description');

            $data['errors']['title'] = $validator->errors()->first('title');
            $data['errors']['subtitle'] = $validator->errors()->first('subtitle');
            $data['errors']['special_events_num'] = $validator->errors()->first('special_events_num');
            $data['errors']['latest_stores_num'] = $validator->errors()->first('latest_stores_num');
            $data['errors']['featured_brands'] = $validator->errors()->first('featured_brands');
            $data['errors']['featured_coupons'] = $validator->errors()->first('featured_coupons');
            $data['errors']['latest_coupons'] = $validator->errors()->first('latest_coupons');

            $data['errors']['top_coupons_featured_num'] = $validator->errors()->first('top_coupons_featured_num');
            $data['errors']['top_coupons_num'] = $validator->errors()->first('top_coupons_num');
            $data['errors']['expiring_soon_coupons_featured_num'] = $validator->errors()->first('expiring_soon_coupons_featured_num');
            $data['errors']['expiring_soon_coupons_num'] = $validator->errors()->first('expiring_soon_coupons_num');

            $data['errors']['store_coupons_featured_num'] = $validator->errors()->first('store_coupons_featured_num');
            $data['errors']['store_coupons_specific_month'] = $validator->errors()->first('store_coupons_specific_month');
            $data['errors']['store_specific_month_coupons_num'] = $validator->errors()->first('store_specific_month_coupons_num');
            $data['errors']['store_latest_coupons_offers_num'] = $validator->errors()->first('store_latest_coupons_offers_num');
            $data['errors']['store_expired_coupons_num'] = $validator->errors()->first('store_expired_coupons_num');
            $data['errors']['top_stores_ids'] = $validator->errors()->first('top_stores_ids');

            $data['errors']['category_coupons_featured_num'] = $validator->errors()->first('category_coupons_featured_num');
            $data['errors']['category_coupons_num'] = $validator->errors()->first('category_coupons_num');
            
            $data['errors']['navbar_categories_order_by'] = $validator->errors()->first('navbar_categories_order_by');
            $data['errors']['navbar_categories_order_type'] = $validator->errors()->first('navbar_categories_order_type');
            
            $data['errors']['sidebar_related_categories_num'] = $validator->errors()->first('sidebar_related_categories_num');
            $data['errors']['sidebar_featured_stores_num'] = $validator->errors()->first('sidebar_featured_stores_num');

            return response()->json($data);
        }else{
            $attributes = $validator->valid();
            $data['message'] = 'Setting has been updated';
            $data['success'] = 1;
            
            $setting->update( $attributes );
        }
        return response()->json($data);
    }
    
    
    public function updatehomedeals(Request $request)
    {
        $data = array();
        $rules = [
            'related_store_id' => 'required|numeric',
            'deal_1_title' => 'nullable',
            'deal_2_title' => 'nullable',
            'deal_3_title' => 'nullable',
            'deal_1_thumbnail' => 'nullable|image|mimes:webp,svg,png,jpg,jpeg',
            'deal_2_thumbnail' => 'nullable|image|mimes:webp,svg,png,jpg,jpeg',
            'deal_3_thumbnail' => 'nullable|image|mimes:webp,svg,png,jpg,jpeg',
            'deal_1_link' => 'nullable',
            'deal_2_link' => 'nullable',
            'deal_3_link' => 'nullable',
        ];

        $data['errors'] = array();
        $validator = Validator::make($request->all(), $rules);
        
        $homedeals = Homedeals::find(1);
        if ($validator->fails()) {

            $data['success'] = 0;
            $data['errors']['related_store_id'] = $validator->errors()->first('related_store_id');
            
            $data['errors']['deal_1_title'] = $validator->errors()->first('deal_1_title');
            $data['errors']['deal_2_title'] = $validator->errors()->first('deal_2_title');
            $data['errors']['deal_3_title'] = $validator->errors()->first('deal_3_title');
            
            $data['errors']['deal_1_thumbnail'] = $validator->errors()->first('deal_1_thumbnail');
            $data['errors']['deal_2_thumbnail'] = $validator->errors()->first('deal_2_thumbnail');
            $data['errors']['deal_3_thumbnail'] = $validator->errors()->first('deal_3_thumbnail');
            
            $data['errors']['deal_1_link'] = $validator->errors()->first('deal_1_link');
            $data['errors']['deal_2_link'] = $validator->errors()->first('deal_2_link');
            $data['errors']['deal_3_link'] = $validator->errors()->first('deal_3_link');

            return response()->json($data);
        }else{
            $attributes = $validator->valid();

            if( $request->file('deal_1_thumbnail')) {
                $file = $request->file('deal_1_thumbnail');
                $filename = $file->getClientOriginalName();
                $filepath = $file->store('public/images/homedeals');
                $filepath_exploded = explode('/', $filepath);
                $path = 'images/homedeals/' . $filepath_exploded[ count($filepath_exploded) - 1 ];
                $data['filepath'] = $path;
                $attributes['deal_1_thumbnail'] = $path;
            }
            
            if( $request->file('deal_2_thumbnail')) {
                $file = $request->file('deal_2_thumbnail');
                $filename = $file->getClientOriginalName();
                $filepath = $file->store('public/images/homedeals');
                $filepath_exploded = explode('/', $filepath);
                $path = 'images/homedeals/' . $filepath_exploded[ count($filepath_exploded) - 1 ];
                $data['filepath'] = $path;
                $attributes['deal_2_thumbnail'] = $path;
            }
            
            if( $request->file('deal_3_thumbnail')) {
                $file = $request->file('deal_3_thumbnail');
                $filename = $file->getClientOriginalName();
                $filepath = $file->store('public/images/homedeals');
                $filepath_exploded = explode('/', $filepath);
                $path = 'images/homedeals/' . $filepath_exploded[ count($filepath_exploded) - 1 ];
                $data['filepath'] = $path;
                $attributes['deal_3_thumbnail'] = $path;
            }
            $data['message'] = 'Deals has been updated';
            $data['success'] = 1;
            $homedeals->update( $attributes );
        }
        return response()->json($data);
    }
    
    public function updateTopVoucherCodes(Request $request)
    {
        $topvouchercodes = \DB::table('home_top_voucher_codes')->first();
        \DB::table('home_top_voucher_codes')->where('id', 1)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        
        return redirect()->back();
    }
    
    public function our_backup_database(){
        //ENTER THE RELEVANT INFO BELOW
        $mysqlHostName      = env('DB_HOST');
        $mysqlUserName      = env('DB_USERNAME');
        $mysqlPassword      = env('DB_PASSWORD');
        $DbName             = env('DB_DATABASE');
        
        $tables             = array(
                                    "users",
                                    "password_resets",
                                    "failed_jobs",
                                    "personal_access_tokens",
                                    "migrations",
                                    "coupons",
                                    "stores",
                                    "reviews",
                                    "categories",
                                    "category_store",
                                    "images",
                                    "widgets",
                                    "home_setting",
                                    "home_special_deals",
                                    "events",
                                    "coupon_event",
                                    "sliders",
                                    "settings",
                                    "coupon_terms",
                                    "subscribers",
                                    "tel__subscribers",
                                    "stores_tel__subscribers",
                                    "permissions",
                                    "permission_user",
                                    "category_coupon",
                                    "contacts",
                                    "pages"
                                    );

        $filename = 'database_backup' . time() . '.sql';
        return $this->Export_Database($mysqlHostName,$mysqlUserName,$mysqlPassword,$DbName, $tables, $filename);
    }
    
    function Export_Database($host,$user,$pass,$name,  $tables=false, $backup_name=false )
    {
        $mysqli = new \mysqli($host,$user,$pass,$name); 
        $mysqli->select_db($name); 
        $mysqli->query("SET NAMES 'utf8'");
            
        foreach($tables as $table)
        {
            $result         =   $mysqli->query('SELECT * FROM '.$table);  
            $fields_amount  =   $result->field_count;  
            $rows_num=$mysqli->affected_rows;     
            $res            =   $mysqli->query('SHOW CREATE TABLE '.$table); 
            $TableMLine     =   $res->fetch_row();
            $content        = (!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n\n";

            for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0) 
            {
                while($row = $result->fetch_row())  
                { //when started (and every after 100 command cycle):
                    if ($st_counter%100 == 0 || $st_counter == 0 )  
                    {
                            $content .= "\nINSERT INTO ".$table." VALUES";
                    }
                    $content .= "\n(";
                    for($j=0; $j<$fields_amount; $j++)  
                    { 
                        $row[$j] = str_replace("\n","\\n", addslashes($row[$j]) ); 
                        if (isset($row[$j]))
                        {
                            $content .= '"'.$row[$j].'"' ; 
                        }
                        else 
                        {   
                            $content .= '""';
                        }     
                        if ($j<($fields_amount-1))
                        {
                                $content.= ',';
                        }      
                    }
                    $content .=")";
                    //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
                    if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num) 
                    {   
                        $content .= ";";
                    } 
                    else 
                    {
                        $content .= ",";
                    } 
                    $st_counter=$st_counter+1;
                }
            } $content .="\n\n\n";
        }
        $backup_name = $backup_name ? $backup_name : $name.".sql";
        
        $content = "SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';SET AUTOCOMMIT = 0;START TRANSACTION;SET time_zone = '+00:00';\n\n" . $content;
        
        $file_handle = fopen($backup_name, 'w+');
        fwrite($file_handle, $content);
        fclose($file_handle);
        
        return response()->download($backup_name);
    }
}