<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallationController extends Controller
{
    public function installView()
    {
        $path = base_path('.env');
        $en = file_get_contents($path);
        file_put_contents(
            $path, str_replace('APP_ENV=production', 'APP_ENV=local', $en)
        );
        $en = file_get_contents($path);
        file_put_contents(
            $path, str_replace('APP_DEBUG=false', 'APP_DEBUG=true', $en)
        );
        return view('installation.install');
    }
    
    public function install(Request $request)
    {
        $dbuername = request()->input('dbusername');
        $password = request()->input('password');
        $dbname = request()->input('dbname');
        $dbhost = request()->input('dbhost');
           
        $database_name_key = "DB_DATABASE";
        $database_username_key = "DB_USERNAME";
        $database_password_key = "DB_PASSWORD";
        $database_host_key = "DB_HOST";
        
        $path = base_path('.env');
        // rewrite file content with changed data
        $old_database_name = env($database_name_key);
        $old_database_username = env($database_username_key);
        $old_database_password = env($database_password_key);
        $old_database_host = env($database_host_key);
    
        if (file_exists($path)) {
            // replace current value with new value 
            $en = file_get_contents($path); 
            file_put_contents(
                $path, 
                str_replace($database_name_key.'='.$old_database_name,$database_name_key.'='.$dbname, $en)
            );
            $en = file_get_contents($path); 
            file_put_contents(
                $path, str_replace($database_username_key.'='.$old_database_username,$database_username_key.'='.$dbuername, $en)
            );
            $en = file_get_contents($path); 
            file_put_contents(
                $path, str_replace($database_password_key.'='.$old_database_password,$database_password_key.'='.$password, $en)
            );
            $en = file_get_contents($path); 
            file_put_contents(
                $path, str_replace($database_host_key.'='.$old_database_host,$database_host_key.'='.$dbhost, $en)
            );
        }
        
        $request->session()->flash('message','Database credential has been changed, Import data from here'); 
        return view("installation.import_db");
    }
    
    public function importDB(Request $request)
    {
        try
        {
            \DB::connection()->getPdo();
        }
        catch(\PDOException $e){
            $request->session()->flash('message','Can not Connect with your database, try again.');
            return redirect()->back();
        }
        
        if($request->file('db_file'))
        {
            $filename = $request->file('db_file')->getClientOriginalName() . time();
            $filepath = $request->file('db_file')->store('public/files/');
            $filepath_exploded = explode('/', $filepath);
            $path = 'files/' . $filepath_exploded[ count($filepath_exploded) - 1 ];
            \DB::unprepared(file_get_contents( base_path() . "/storage/app/public/".$path));
            
            $path = base_path('.env');
            $en = file_get_contents($path);
            file_put_contents(
                $path, str_replace('APP_ENV=local', 'APP_ENV=production', $en)
            );
            $en = file_get_contents($path);
            file_put_contents(
                $path, str_replace('APP_DEBUG=true', 'APP_DEBUG=false', $en)
            );
            return redirect()->route('home.index');
        }
        else 
        {
            $request->session()->flash('message','Database file is missing, try again.');
            return redirect()->back();
        }
    }
}