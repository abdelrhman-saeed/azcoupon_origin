<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;

use App\Models\Event;
use App\Models\Widget;

class EventController extends Controller
{
    protected $rules = [
        'name' => 'required|min:3|max:30',
        
        'seo_title' => 'nullable',
        'seo_description' => 'nullable',
        'description' => 'nullable',
        'another_description' => 'nullable',

        'single_event' => 'required|boolean',
        'banner' => 'nullable|image|mimes:jpg,svg,webp,png|dimensions:max_width=1250,max_height=250',
        'banner_title' => 'nullable|max:100',
        'banner_subtitle' => 'nullable'
    ];

    public function index()
    {
        $search_word = request()->input('q');
        $events = Event::latest();

        if($search_word != null) {
            $events = $events->where('name', 'like', "%$search_word%")
                                ->orWhere('banner_title', 'like', "%$search_word%")
                                ->orWhere('banner_subtitle', 'like', "%$search_word%")
                                ->orderBy('updated_at', 'DESC');
        }

        return view('admin_dashboard.events.index', [ 'events' => $events->paginate(20) ]);
    }
    
    public function create()
    {
        return view('admin_dashboard.events.create');
    }
    
    public function store(Request $request)
    {
        $this->rules['slug'] = ['required', Rule::unique('events')];
        $validated = $request->validate($this->rules);
        
        $validated['updated_by'] = auth()->id();
        $validated['user_id'] = auth()->id();

        $validated['banner'] = '';

        if($request->file('banner'))  {
            $filepath = $request->file('banner')->store('public/images/banners');
            $filepath_exploded = explode('/', $filepath);
            $validated['banner'] = 'images/banners/' . $filepath_exploded[ count($filepath_exploded) - 1 ];
        }
        $event = Event::create($validated);
        
        if($event->single_event) {
            Event::whereNotIn('id', [$event->id])->update(['single_event' => false]);
        }

        if($request->input('w_title'))
        {
            $w_event_id = $event->id;
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
                        'related_sidebar' => 'Event',
                        'store_id' => 0,
                        'event_id' => $w_event_id,
                        'category_id' => 0,
                        'order' => $w_order
                    ]);
                }
            }
        }
        return redirect()->route('admin.events.create')->with('success', 'Event has been created.');
    }
    
    public function show(Event $event)
    {
        [ $related_coupons, $related_offers ] =
                $event->coupons()->orderByDesc('created_at')->get()->groupBy('offer');

        return view('admin_dashboard.events.show', [
            'event' => $event,
            'latest_added' => Event::latest()->where('id', '!=', $event->id)->take(6)->get(),
            'related_coupons' => $related_coupons,
            'related_offers' => $related_offers,
        ]);
    }
    
    public function edit(Event $event)
    {
        return view('admin_dashboard.events.edit', [
            'event' => $event
        ]);
    }
    
    public function update(Request $request, Event $event)
    {
        $this->rules['slug'] = ['required', Rule::unique('events')->ignore($event)];

        $validated = $request->validate($this->rules);
        
        if($request->file('banner'))  {

            $filepath = $request->file('banner')->store('public/images/banners');
            
            $filepath_exploded = explode('/', $filepath);
            $path = 'images/banners/' . $filepath_exploded[ count($filepath_exploded) - 1 ];

            if($event->banner !== 'admin_assets/images/banners/banner.jpg' && \File::exists(public_path( $event->banner ))){
                \File::delete(public_path( $event->banner ));
            }
            $validated['banner'] = $path;
        }

        if(! $request->input('single_event') ) {

            if(Event::where('single_event', 1)->where('id', '!=', $event->id)->count() === 0)
                return redirect()->route('admin.events.edit', $event)->with('error', 'You can not change Single Event, You must have one single event.');
        }
        
        $validated['updated_by'] = auth()->id();
        $event->update($validated);

        if($event->single_event) {
            DB::table('events')
              ->where('id', '!=', $event->id)
              ->update(['single_event' => false]);
        }

        if($request->input('w_title'))
        {
            $w_event_id = $event->id;
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
                        'related_sidebar' => 'Event',
                        'store_id' => 0,
                        'event_id' => $w_event_id,
                        'category_id' => 0,
                        'order' => $w_order
                    ]);
                }
            }
        }

        return redirect()->route('admin.events.edit', $event)->with('success', 'Event has been updated.');
    }
    
    public function destroy(Event $event)
    {
        if($event->single_event)
            return redirect()->route('admin.events.index', $event)->with('error', 'You can not delete the single event.');

        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event has been deleted.');
    }
}