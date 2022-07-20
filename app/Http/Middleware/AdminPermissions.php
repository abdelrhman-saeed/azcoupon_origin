<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
class AdminPermissions
{
    public function handle(Request $request, Closure $next)
    {
        $user_permissions = auth()->user()->permissions->map(function($permission){
            return $permission->path;
        })->toArray();

        $path_splitted = explode('/', $request->path());
//        $path = $path_splitted[count($path_splitted) - 1];

        if ($request->is('admin/*', 'admin')) {
            return $next($request);
        }
//        if(
//            $request->path() === 'admin/upload_tiny_image/tiny_widgets'
//            || $request->path() === 'admin/upload_tiny_image/top_voucher_codes'
//            || $request->path() === 'admin/upload_tiny_image/about_stores'
//            || $request->path() === 'admin/upload_tiny_image/tiny_static_pages'
//            || $request->path() === 'admin/attach_coupons'
//            || $request->path() === 'admin/export_db' )
//            return $next( $request);

//        if($request->path() === 'admin/stores/online_change' || $request->path() === 'admin/coupons/online_change')
//            return $next($request);
                    
//        if($path === 'admin' || ( $request->path() === 'admin/users/'. auth()->id() || $request->path() === 'admin/users/'. auth()->id() .'/edit'))
//            return $next($request);

        foreach( $user_permissions as $user_permission ) {
            if( in_array( $user_permission, $path_splitted))
                return $next($request);
        }
        abort(403, 'Sorry, You Do not Have Permission to Manage This Page');
    }
}