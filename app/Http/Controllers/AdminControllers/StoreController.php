<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\Image;
use App\Models\Widget;
use App\Models\Coupon;
use App\Models\Category;

class StoreController extends Controller
{
    private $rules = [
        'seo_title' => 'required|max:250',
        'seo_description' => 'required',
        'name' => 'required',
        'slug' => 'required',
        'aff_link' => 'nullable|url',
        'link' => 'nullable|url',
        'title' => 'nullable',
        
        'image_title' => 'nullable',
        'image_alt' => 'nullable',
        
        'about_store_1_title' => 'nullable',
        'about_store_1_description' => 'nullable',
        'about_store_2_title' => 'nullable',
        'about_store_2_description' => 'nullable',
        'about_store_3_title' => 'nullable',
        'about_store_3_description' => 'nullable',
        'about_store_4_title' => 'nullable',
        'about_store_4_description' => 'nullable',
        'about_store_5_title' => 'nullable',
        'about_store_5_description' => 'nullable',
        'about_store_6_title' => 'nullable',
        'about_store_6_description' => 'nullable',
        'about_store_7_title' => 'nullable',
        'about_store_7_description' => 'nullable',
        'about_store_8_title' => 'nullable',
        'about_store_8_description' => 'nullable',
        
        'store_degree' => 'required|in:premium,medium,lower'
    ];

    public function index()
    {
        
        $search_word = request()->input('q');
        if($search_word != null) {
            return view('admin_dashboard.stores.index', [
                'stores' => Store::latest()
                    ->where('name', 'like', "%$search_word%")
                    ->orWhere('title', 'like', "%$search_word%")
                    ->orWhere('seo_title', 'like', "%$search_word%")
                    ->orWhere('seo_description', 'like', "%$search_word%")
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(20)
            ]);
        }
        
        $store_degree = request()->input('store_degree');
        $result = Store::latest();
        
        if($store_degree == null) {
            return view('admin_dashboard.stores.index', [
                'stores' => $result->orderBy('updated_at', 'DESC')->paginate(20)
            ]);
        }else {
            return view('admin_dashboard.stores.index', [
                'stores' => $result->where('store_degree', $store_degree)->orderBy('updated_at', 'DESC')->paginate(20)
            ]);
        }
    }
    
    public function create()
    {
        return view('admin_dashboard.stores.create', [
            'categories' => Category::pluck('name', 'id')
        ]);
    }
    
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->rules['image'] = 'required|image|mimes:jpg,svg,webp,png'; // |dimensions:max_width=120,max_height=120
        $validated = $request->validate($this->rules);

        $validated['updated_by'] = auth()->id();
        $validated['user_id'] = auth()->id();
        $validated['featured'] = $request->input('featured') !== null;
        $validated['online'] = $request->input('online') !== null;

        $store = Store::create($validated);

        $store->categories()->sync(
            in_array('All', $request->input('category_ids'))
                ? Category::all()->pluck('id') :  $request->input('category_ids')
        );

        if($request->file('image'))
        {
            $filename = $request->file('image')->getClientOriginalName();
            $filepath = $request->file('image')->store('public/images/markets');
            
            $filepath_exploded = explode('/', $filepath);
            $path = $filepath_exploded[ count($filepath_exploded) - 1 ];
            
            Image::create([
                'name' => $filename,
                'path' => $path, 
                'imageable_id' => $store->id,
                'imageable_type' => 'App\Models\Store',
                'alt' => $validated['image_alt'],
                'title' => $validated['image_title']
            ]);
        }

        if($request->input('w_title'))
        {
            $w_store_id = $store->id;
            $w_user_id = auth()->id();
            $w_updated_by_id = $w_user_id;
            
            for($i = 0; $i < 3; $i++)
            {
                $w_title = $request->input('w_title')[$i];
                $w_description = $request->input('w_description')[$i];
                $w_order = $request->input('w_order')[$i]??0;

                if($w_title !== null) {
                    Widget::create([
                        'title' => $w_title, 
                        'description' => $w_description, 
                        'user_id' => $w_user_id,
                        'updated_by' => $w_updated_by_id,
                        'related_sidebar' => 'Store',
                        'store_id' => $w_store_id,
                        'event_id' => 0,
                        'category_id' => 0,
                        'order' => $w_order
                    ]);
                }
            }
        }
        return redirect()->route('admin.stores.create')->with('success', 'Store has been created.');
    }
    
    public function show(Store $store)
    {
        $latest_added = Store::latest()->where('id', '!=', $store->id)->take(3)->get();
        return view('admin_dashboard.stores.show', [
            'store' => $store,
            'latest_added' => $latest_added,
            'store_coupons' => $store->coupons()->where('offer', 0)->orderBy('created_at', 'DESC')->get(),
            'store_offers' => $store->offers()->orderBy('created_at', 'DESC')->get(),
        ]);
    }
    
    public function edit(Store $store)
    {   
        return view('admin_dashboard.stores.edit', [
            'categories' => Category::pluck('name', 'id'),
            'store' => $store
        ]);
    }
    
    public function update(Request $request, Store $store)
    {
        $this->rules['image'] = 'nullable|image|mimes:jpg,svg,webp,png'; // |dimensions:max_width=120,max_height=120
        $validated = $request->validate($this->rules);
        
        $validated['updated_by'] = auth()->id();
        $validated['featured'] = $request->input('featured') !== null;
        $validated['online'] = $request->input('online') !== null;

        $store->update($validated);
        $store->image?->update([
            'alt' => $validated['image_alt'],
            'title' => $validated['image_title'],
        ]);
        
        $store->categories()->sync(
            in_array('All', $request->category_ids) ? Category::all()->pluck('id') : $request->category_ids
        );
        
        if($request->file('image'))
        {
            $filename = $request->file('image')->getClientOriginalName();
            $filepath = $request->file('image')->store('public/images/markets');
            
            $filepath_exploded = explode('/', $filepath);
            $path = $filepath_exploded[ count($filepath_exploded) - 1 ];

            if($store->image && \File::exists(public_path( 'storage/' . $store->image->path ))){
                \File::delete(public_path( 'storage/' . $store->image->path ));
            }

            $store->image()->delete();
            Image::create([
                'name' => $filename,
                'path' => $path, 
                'imageable_id' => $store->id,
                'imageable_type' => 'App\Models\Store',
                'alt' => $validated['image_alt'],
                'title' => $validated['image_title']
            ]);
        }

        if($request->input('w_title'))
        {
            $w_store_id = $store->id;
            $w_user_id = auth()->id();
            $w_updated_by_id = $w_user_id;
            $updated_at_widget = '';
            
            for($i = 0; $i < 3; $i++)
            {
                $w_title = $request->input('w_title')[$i];
                $w_description = $request->input('w_description')[$i];
                $w_order = $request->input('w_order')[$i]??0;
                if($w_title !== null) {
                    $widget = Widget::create([
                        'title' => $w_title, 
                        'description' => $w_description, 
                        'user_id' => $w_user_id,
                        'updated_by' => $w_updated_by_id,
                        'related_sidebar' => 'Store',
                        'store_id' => $w_store_id,
                        'event_id' => 0,
                        'category_id' => 0,
                        'order' => $w_order
                    ]);
                    $updated_at_widget = $widget->updated_at;
                }
            }
            if($updated_at_widget !== '') {
                $store->updated_at = $updated_at_widget;
                $store->save();
            }
        }
        return redirect()->route('admin.stores.edit', $store)->with('success', 'Store has been updated.');
    }
    
    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('admin.stores.index')->with('success', 'Store has been deleted.');
    }

    public function online_change(Store $store)
    {
        $store->online == 1 ? $store->update(['online' => 0]) : $store->update(['online' => 1]);
        return redirect()->back();
    }

    public function coupons_action()
    {
        $option = request()->input('coupons-option');
        return $this->takeAction($option);
    }

    public function offers_action()
    {
        $option = request()->input('offers-option');
        return $this->takeAction($option);
    }

    private function takeAction($option)
    {
        $coupons = request()->input('coupons_ids');
        if($option == null || $option == "0")
            return redirect()->back()->with('success', 'You Must Select Option');

        if($coupons == null)
            return redirect()->back()->with('success', 'No Coupons Was Selected');
        
        $coupons = Coupon::whereIn('id', explode(',', $coupons));

        if($option == 'remove')
        {
            $coupons->delete();
        }
        else if($option == 'offline')
        {
            $coupons->update(['online' => 0]);
        }else if($option == 'online')
        {
            $coupons->update(['online' => 1]);
        }
        return redirect()->back()->with('success', 'Success Operation.');
    }
}
