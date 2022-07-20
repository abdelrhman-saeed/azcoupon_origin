<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Permission;

class UserController extends Controller
{   
    public function index()
    {
        $search_word = request()->input('q');
        if($search_word != null) {
            return view('admin_dashboard.users.index', [
                'users' => User::latest()
                    ->where('name', 'like', "%$search_word%")
                    ->orWhere('email', 'like', "%$search_word%")
                    ->paginate(50)
            ]);
        }
        
        return view('admin_dashboard.users.index', [
            'users' => User::latest()->where('id', '!=', auth()->id())->paginate(50)
        ]);
    }
    
    public function create()
    {
        return view('admin_dashboard.users.create', 
        [
            'permissions' => Permission::all()
        ]);
    }
    
    public function show(User $user)
    {
        return view('admin_dashboard.users.show', [
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:20',
            'avatar' => 'nullable|image|mimes:jpg,svg,webp,png' // |dimensions:max_width=120,max_height=120'
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['password'] = Hash::make($request->input('password'));

        if(! $request->file('avatar'))
        {
            $validated['avatar'] = '';
        }else 
        {
            $filename = $request->file('avatar')->getClientOriginalName();
            $filepath = $request->file('avatar')->store('public/images/users');
            
            $filepath_exploded = explode('/', $filepath);
            $path = 'images/users/' . $filepath_exploded[ count($filepath_exploded) - 1 ];

            $validated['avatar'] = $path;
        }
        
        $user = User::create($validated);

        $permissions_ids = [];
        foreach(Permission::all() as $permission)
        {
            $key = 'permission_' . $permission->id;
            $value = $request->$key;

            if($value)
                $permissions_ids[] = $permission->id;
        }
        
        $user->permissions()->sync( $permissions_ids );

        return redirect()->route('admin.users.create')->with('success', 'User has been created.');
    }
    
    public function edit(User $user)
    {
        return view('admin_dashboard.users.edit', [
            'user' => $user,
            'permissions' => Permission::all()
        ]);
    }
    
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user)],
            'password' => 'nullable|min:8|max:20',
            'avatar' => 'nullable|image|mimes:jpg,svg,webp,png' // |dimensions:max_width=120,max_height=120'
        ]);

        if($request->has('password') && $validated['password'] !== null)
        {
            $validated['password'] = Hash::make($request->input('password'));
        }else { unset( $validated['password'] ); }

        if($request->file('avatar'))
        {
            $filename = $request->file('avatar')->getClientOriginalName();
            $filepath = $request->file('avatar')->store('public/images/users');
            
            $filepath_exploded = explode('/', $filepath);
            $path = 'images/users/' . $filepath_exploded[ count($filepath_exploded) - 1 ];

            if($user->avatar !== "admin_assets/images/avatars/avatar.png" && \File::exists(public_path(  $user->avatar ))){
                \File::delete(public_path( $user->avatar ));
            }
            $validated['avatar'] = $path;
        }
        $user->update($validated);

        $permissions_ids = [];
        foreach(Permission::all() as $permission)
        {
            $key = 'permission_' . $permission->id;
            $value = $request->$key;

            if($value)
                $permissions_ids[] = $permission->id;
        }

        if(count($permissions_ids) > 0)
            $user->permissions()->sync( $permissions_ids );

        return redirect()->route('admin.users.edit', $user)->with('success', 'User has been updated.');
    }
    
    public function destroy(User $user)
    {
        if($user->id === auth()->id())
            return redirect()->route('admin.users.edit', $user)->with('error', 'You can not delete yourself.');

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User has been deleted.');
    }
}