<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Store;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin_dashboard.slider.index', [
            'slider' => Slider::all(),
            'stores' => Store::pluck('name', 'id')
        ]);
    }

    public function update(Request $request)
    {
        $data = array();
        
        $rules = [
            'id' => 'required|numeric',
            'title' => 'required|max:100',
            'excerpt' => 'required|max:100',
            'link' => 'nullable|url',
            'related_store' => 'required|numeric',
            'enabled' => 'required|boolean',
            'slide' => 'mimes:webp,svg,png,jpg,jpeg'
        ];

        $data['errors'] = array();
        $validator = Validator::make($request->all(), $rules);
        
        $slider = Slider::find( $request->input('id') );
        if ($validator->fails()) {

            $data['success'] = 0;
            $data['errors']['title'] = $validator->errors()->first('title');
            $data['errors']['excerpt'] = $validator->errors()->first('excerpt');
            $data['errors']['link'] = $validator->errors()->first('link');
            $data['errors']['related_store'] = $validator->errors()->first('related_store');
            $data['errors']['enabled'] = $validator->errors()->first('enabled');
            $data['errors']['slide'] = $validator->errors()->first('slide');

            return response()->json($data);
        }else{
            $attributes = $validator->valid();
            
            if($request->file('slide')) {
                $file = $request->file('slide');

                $filename = $file->getClientOriginalName();
                $filepath = $file->store('public/images/slider');
                
                $filepath_exploded = explode('/', $filepath);
                $path = 'images/slider/' . $filepath_exploded[ count($filepath_exploded) - 1 ];

                $data['filepath'] = $path;

                $attributes['slide'] = $path;
            }
            $data['message'] = 'Slide has been updated';
            $data['success'] = 1;
            $slider->update( $attributes );

            if( Slider::where('enabled', 1)->count() == 2 )
            {
                $data['global_warning'] = 'You have 2 active slides, You must have 3 slides at least, Check You Home page.';
            }

        }
        return response()->json($data);
    }
   
}