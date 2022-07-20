<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Widget;
use App\Models\Store;
use App\Models\Event;
use App\Models\Category;

class WidgetController extends Controller
{
    private $rules = [
        'title' => 'required|min:3|max:100',
        'description' => 'required|min:50',
        'order' => 'required|numeric|min:1',
        'related_sidebar' => 'required|in:Event,Store,Category,Topcoupons,Expiresoon,Search',
    ];

    public function index()
    {
        $related_sidebar = request()->input('related_sidebar');
        $search_word = request()->input('q');
        
        $result = Widget::latest();
        
        if($search_word != null) {
            return view('admin_dashboard.widgets.index', [
                'widgets' => $result
                    ->where('title', 'like', "%$search_word%")
                    ->orWhere('description', 'like', "%$search_word%")
                    ->paginate(20)
            ]);
        }
        
        if($related_sidebar == null) {
            return view('admin_dashboard.widgets.index', [
                'widgets' => $result->paginate(20)
            ]);
        }else {
            return view('admin_dashboard.widgets.index', [
                'widgets' => $result->where('related_sidebar', $related_sidebar)->paginate(20)
            ]);
        }
    }
    
    public function create()
    {
        return view('admin_dashboard.widgets.create', [
            'stores' => Store::pluck('name', 'id'),
            'events' => Event::pluck('name', 'id'),
            'categories' => Category::pluck('name', 'id'),
        ]);
    }
    
    public function store(Request $request)
    {
        if($request->input('related_sidebar') === 'Category')
        {
            $this->rules['category_id'] = 'required|numeric|min:1';
        }
        else if($request->input('related_sidebar') === 'Event')
        {
            $this->rules['event_id'] = 'required|numeric|min:1';
        }
        else if($request->input('related_sidebar') === 'Store')
        {
            $this->rules['store_id'] = 'required|numeric|min:1';
        }

        $attributes = $request->validate($this->rules);
        $attributes['user_id'] = auth()->id();
        $attributes['updated_by'] = auth()->id();
        $widget = Widget::create( $attributes );
        
        
        if($request->input('related_sidebar') === 'Category') {
            $widget->category->updated_at = $widget->updated_at;
            $widget->category->save();
        }
            
        if($request->input('related_sidebar') === 'Store') {
            $widget->store->updated_at = $widget->updated_at;
            $widget->store->save();
        }
            
        if($request->input('related_sidebar') === 'Event') {
            $widget->event->updated_at = $widget->updated_at;
            $widget->event->save();
        }
        return redirect()->route('admin.widgets.create')->with('success', 'Widget has been created.');
    }

    public function edit(Widget $widget)
    {
        return view('admin_dashboard.widgets.edit', [
            'widget' => $widget,
            'stores' => Store::pluck('name', 'id'),
            'events' => Event::pluck('name', 'id'),
            'categories' => Category::pluck('name', 'id'),
        ]);
    }
    
    public function update(Request $request, Widget $widget)
    {
        if($request->input('related_sidebar') === 'Category')
        {
            $this->rules['category_id'] = 'required|numeric|min:1';
            
            $category_id = $request->input('category_id');
            $event_id = 0;
            $store_id = 0;
        }
        else if($request->input('related_sidebar') === 'Event')
        {
            $this->rules['event_id'] = 'required|numeric|min:1';

            $event_id = $request->input('event_id');
            $category_id = 0;
            $store_id = 0;
        }
        else if($request->input('related_sidebar') === 'Store')
        {
            $this->rules['store_id'] = 'required|numeric|min:1';

            $store_id = $request->input('store_id');
            $category_id = 0;
            $event_id = 0;
        }else 
        {
            $store_id = 0;
            $event_id = 0;
            $category_id = 0;
        }

        $attributes = $request->validate($this->rules);

        $attributes['store_id'] = $store_id;
        $attributes['event_id'] = $event_id;
        $attributes['category_id'] = $category_id;

        $widget->update( $attributes );
        
        if($request->input('related_sidebar') === 'Store') {
            $widget->store->updated_at = $widget->updated_at;
            $widget->store->save();
        }
        
        return redirect()->route('admin.widgets.edit', $widget)->with('success', 'Widget has been updated.');
    }
    
    public function destroy(Widget $widget)
    {
        $widget->delete();
        return redirect()->route('admin.widgets.index')->with('success', 'Widget has been deleted.');
    }    
}