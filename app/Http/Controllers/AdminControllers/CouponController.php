<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Event;

class CouponController extends Controller
{
    private $rules = [
        'title' => 'required',
        'description' => 'nullable',
        'code' => 'required|max:50',
        'discount' => 'numeric',
        'preference' => 'required|min:1|max:1',
        'link' => 'nullable|url',
        'expire_date' => 'nullable|date',
        'store_id' => 'required|numeric|min:1',
        'publish_type' => 'required|in:now,schedule',
        'schedule_from' => 'nullable',
        'schedule_to' => 'nullable'
    ];

    public function index()
    {
        $search_word = request()->input('q');
        if($search_word != null) {
            return view('admin_dashboard.coupons.index', [
                'coupons' => Coupon::latest()
                    ->with('store')
                    ->where('offer', 0)
                    ->orWhere('title', 'like', "%$search_word%")
                    ->orWhere('description', 'like', "%$search_word%")
                    ->orWhere('code', 'like', "%$search_word%")
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(20)
            ]);
        }
        
        return view('admin_dashboard.coupons.index', [
            'coupons' => Coupon::latest()
            ->with('store')
            ->where('offer', 0)
            ->orderBy('updated_at', 'DESC')
            ->paginate(20)
        ]);
    }
    
    public function create()
    {
        return view('admin_dashboard.coupons.create', [
            'categories' => Category::pluck('name', 'id'),
            'stores' => Store::pluck('name', 'id'),
            'events' => Event::pluck('name', 'id')
        ]);
    }

    public function attach_coupons(Request $request)
    {  
        $coupon_id = $request->input('coupon_id');
        if($coupon_id == null)
            $coupon_id = $request->input('offer_id');
    
        $single_event = Event::where('single_event', 1)->take(1)->get();
        $single_event[0]->coupons()->syncWithoutDetaching( [$coupon_id] );
        return redirect()->back();
    }
    
    public function store(Request $request)
    {
        // if no code value -> unset its rules cause its offer
        $code = $request->input('code') === null;
        if($code) { unset($this->rules['code']); }

        // check preference if percent set max: 100 else make it open
        if($request->input('preference') == '%')
            $this->rules['discount'] = 'nullable|numeric|max:100';

        $terms = $request->input("terms");
        $validated = $request->validate($this->rules);
        
        $validated['offer'] = $code;
        $validated['featured'] = $request->input('featured') !== null;
        $validated['super_featured'] = $request->input('super_featured') !== null;
        $validated['verified'] = $request->input('verified') !== null;
        $validated['online'] = $request->input('online') !== null;
        
        $validated['top_coupon'] = $request->input('top_coupon') !== null;
        $validated['expire_soon'] = $request->input('expire_soon') !== null;
        
        $validated['updated_by'] = auth()->id();
        $validated['user_id'] = auth()->id();
        
        $coupon = Coupon::create($validated);
        
        if( $request->input('link') == '' ) {
            $coupon->link = $coupon->store->aff_link;
            $coupon->save();
        }
        
        if( $request->input('super_featured') )
        {
            Coupon::where('super_featured', 1)
            ->where('id', '!=', $coupon->id)
            ->update(['super_featured' => 0]);
        }
        
        // Update store and related categories ( updated at )
        $coupon->store->updated_at = $coupon->updated_at;
        $coupon->store->save();
        
        $coupon->categories()->update(['updated_at' => $coupon->updated_at]);
        $coupon->events()->update(['updated_at' => $coupon->updated_at]);

        foreach($terms as $term)
        {
            if($term !== null)
                $coupon->couponterms()->create( ['term' => $term] );
        }

        $coupon->events()->sync( $request->input('event_ids'));
        $coupon->categories()->sync(
            in_array('All', $request->category_ids) ? Category::all()->pluck('id') : $request->category_ids
        );

        if($code)
            return redirect()->route('admin.coupons.createoffer')->with('success', 'Offer has been created.');
        else
            return redirect()->route('admin.coupons.create')->with('success', 'Coupon has been created.');
    }
    
    public function show(Coupon $coupon)
    {
        $cat_ids = count($coupon->categories) ? $coupon->categories->pluck('id') : [0];
        return view('admin_dashboard.coupons.show', [
            'coupon' => $coupon,
            'related_coupons' => Coupon::whereHas('categories', function($query) use ($cat_ids){
                $query->whereIn('category_coupon.category_id', $cat_ids);
            })->take(6)->get()
        ]);
    }
    
    public function edit(Coupon $coupon)
    {
        if($coupon->offer === 1)
            abort(404);
            
        return view('admin_dashboard.coupons.edit', [
            'coupon' => $coupon,
            'categories' => Category::pluck('name', 'id'),
            'stores' => Store::pluck('name', 'id'),
            'events' => Event::pluck('name', 'id')
        ]);
    }

    public function editoffer(Coupon $offer)
    {
        if($offer->offer === 0)
            abort(404);
            
        return view('admin_dashboard.coupons.editoffer', [
            'offer' => $offer,
            'categories' => Category::pluck('name', 'id'),
            'stores' => Store::pluck('name', 'id'),
            'events' => Event::pluck('name', 'id')
        ]);
    }
    
    public function update(Request $request, Coupon $coupon)
    {
        // if no code value -> unset its rules cause its offer
        $code = $request->input('code') === null;
        if($code) { unset($this->rules['code']); }
        
        // check preference if percent set max: 100 else make it open
        if($request->input('preference') == '%')
            $this->rules['discount'] = 'nullable|numeric|max:100';

        $terms = $request->input("terms");
        $validated = $request->validate($this->rules);
        
        $validated['offer'] = $code;
        $validated['featured'] = $request->input('featured') !== null;
        $validated['super_featured'] = $request->input('super_featured') !== null;
        $validated['verified'] = $request->input('verified') !== null;
        $validated['online'] = $request->input('online') !== null;
        $validated['top_coupon'] = $request->input('top_coupon') !== null;
        $validated['expire_soon'] = $request->input('expire_soon') !== null;
        
        $validated['updated_by'] = auth()->id();
        $coupon->update($validated);
        
        if( $request->input('link') == '' ) {
            $coupon->link = $coupon->store->aff_link;
            $coupon->save();
        }
        
        if( $request->input('super_featured') )
        {
            Coupon::where('super_featured', 1)
            ->where('id', '!=', $coupon->id)
            ->update(['super_featured' => 0]);
        }
        
        $coupon->store->updated_at = $coupon->updated_at;
        $coupon->store->save();
        
        $coupon->categories()->update(['updated_at' => $coupon->updated_at]);
        $coupon->events()->update(['updated_at' => $coupon->updated_at]);

        $coupon->couponterms()->delete();
        foreach($terms as $term)
        {
            if($term !== null)
                $coupon->couponterms()->create( ['term' => $term] );
        }

        $coupon->events()->sync( $request->input('event_ids'));
        $coupon->categories()->sync(
            in_array('All', $request->category_ids) ? Category::all()->pluck('id') : $request->category_ids
        );
        
        if($coupon->offer == 1)
            return redirect()->route('admin.coupons.editoffer', $coupon)->with('success', 'Offer has been updated.');
        else 
            return redirect()->route('admin.coupons.edit', $coupon)->with('success', 'Coupon has been updated.');
    }
    
    public function destroy(Coupon $coupon)
    {
        $isOffer = $coupon->offer;
        $coupon->delete();

        if($isOffer)
            return redirect()->route('admin.coupons.offers')->with('success', 'Offer has been deleted.');
        else
            return redirect()->route('admin.coupons.index')->with('success', 'Coupon has been deleted.');
    }

    public function createoffer()
    {
        return view('admin_dashboard.coupons.createoffer', [
            'categories' => Category::pluck('name', 'id'),
            'stores' => Store::pluck('name', 'id'),
            'events' => Event::pluck('name', 'id')
        ]);
    }

    public function offers()
    {
        $search_word = request()->input('q');
        if($search_word != null) {
            return view('admin_dashboard.coupons.offers', [
                'offers' => Coupon::latest()
                    ->with('store')
                    ->where('offer', 1)
                    ->where(function($query) use ( $search_word ) {
                        $query->where('title', 'like', "%$search_word%")
                        ->orWhere('description', 'like', "%$search_word%");
                    })
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(20)
            ]);
        }
        
        return view('admin_dashboard.coupons.offers', [
            'offers' => Coupon::with('store')
            ->where('offer', 1)
            ->orderBy('updated_at', 'DESC')
            ->paginate(20)
        ]);
    }

    public function online_change(Coupon $coupon)
    {
        $coupon->online == 1 ? $coupon->update(['online' => 0]) : $coupon->update(['online' => 1]);
        return redirect()->back();
    }

}