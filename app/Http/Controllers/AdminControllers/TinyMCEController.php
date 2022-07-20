<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinyMCEController extends Controller
{
    public function upload_tiny_image( $folder )
    {   
        $path = request()->file('file')->store("images/$folder", 'public');
        return response()->json([ 'location' => "/../glam_core/storage/app/public/$path"]);
    }
}