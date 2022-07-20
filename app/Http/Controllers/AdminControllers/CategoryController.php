<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Image;
use App\Models\Category;
use App\Models\Widget;
use App\Models\Coupon;

class CategoryController extends Controller
{
    public function index()
    {
        $search_word = request()->input('q');
        if($search_word != null) {
            return view('admin_dashboard.categories.index', [
                'categories' => Category::latest()
                    ->where('name', 'like', "%$search_word%")
                    ->orWhere('seo_title', 'like', "%$search_word%")
                    ->orWhere('description', 'like', "%$search_word%")
                    ->paginate(20)
            ]);
        }

        return view('admin_dashboard.categories.index', [
            'categories' => Category::latest()->paginate(20)
        ]);
    }

    public function create()
    {
        return view('admin_dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'seo_title' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'side_title' => 'nullable',
            'side_description' => 'nullable',
            'image_alt' => 'nullable',
            'image_title' => 'nullable',
            'image' => 'required|image|mimes:jpg,svg,webp,png' // |dimensions:max_width=120,max_height=120'
        ]);

        $validated['user_id'] = auth()->user()->id;
        $category = Category::create($validated);

        if($request->file('image'))
        {
            $filename = $request->file('image')->getClientOriginalName();
            $filepath = $request->file('image')->store('public/images/categories');

            $filepath_exploded = explode('/', $filepath);
            $path = 'images/categories/' . $filepath_exploded[ count($filepath_exploded) - 1 ];

            Image::create([
                'name' => $filename,
                'path' => $path,
                'imageable_id' => $category->id,
                'imageable_type' => 'App\Models\Category',
                'alt' => $validated['image_alt'],
                'title' => $validated['image_title']
            ]);
        }

        if($request->input('w_title'))
        {
            $w_category_id = $category->id;
            $w_user_id = auth()->id();
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
                        'updated_by' => $w_user_id,
                        'related_sidebar' => 'Category',
                        'store_id' => 0,
                        'event_id' => 0,
                        'category_id' => $w_category_id,
                        'order' => $w_order
                    ]);
                }
            }
        }
        return redirect()->route('admin.categories.create')->with('success', 'Category has been created.');
    }

    public function show(Category $category)
    {
        $related_coupons = $category->coupons()->where('offer', 0)->get();
        $related_offers = $category->offers()->get();

        $latest_added = Category::latest()->where('id', '!=', $category->id)->take(6)->get();
        return view('admin_dashboard.categories.show', [
            'category' => $category,
            'latest_added' => $latest_added,
            'related_coupons' => $related_coupons,
            'related_offers' => $related_offers

        ]);
    }

    public function edit(Category $category)
    {
        return view('admin_dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'seo_title' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'side_title' => 'nullable',
            'side_description' => 'nullable',
            'image_alt' => 'nullable',
            'image_title' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,svg,webp,png' // |dimensions:max_width=120,max_height=120'
        ]);

        $category->update($validated);

        if($request->file('image'))
        {
            $filename = $request->file('image')->getClientOriginalName();
            $filepath = $request->file('image')->store('public/images/categories');

            $filepath_exploded = explode('/', $filepath);
            $path = 'images/categories/' . $filepath_exploded[ count($filepath_exploded) - 1 ];

            if($category->image && \File::exists(public_path( 'storage/' . $category->image->path ))){
                \File::delete(public_path( 'storage/' . $category->image->path ));
            }

            $category->image()->delete();

            $image = Image::create([
                'name' => $filename,
                'path' => $path,
                'imageable_id' => $category->id,
                'imageable_type' => 'App\Models\Category',
                'alt' => $validated['image_alt'],
                'title' => $validated['image_title']
            ]);
        }

        if($request->input('w_title'))
        {
            $w_category_id = $category->id;
            $w_user_id = auth()->id();
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
                        'updated_by' => $w_user_id,
                        'related_sidebar' => 'Category',
                        'store_id' => 0,
                        'event_id' => 0,
                        'category_id' => $w_category_id,
                        'order' => $w_order
                    ]);
                }
            }
        }
        return redirect()->route('admin.categories.edit', $category)->with('success', 'Category has been updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category has been deleted.');
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
