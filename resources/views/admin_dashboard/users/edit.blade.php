
@extends("admin_dashboard.layouts.app")

@section("style")
	
@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="breadcrumb-title pe-3">Users</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
            <x-admin.flashes.success :status="'error'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Edit User</h5>
                  <hr/>
                    <form action="{{ route('admin.users.update', $user) }}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        @method('PUT')

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <x-admin.form.input value="{{ old('name', $user->name) }}" required name='name' label='Name' id='user_title'/>

                                        <x-admin.form.input type='email'  value="{{ old('email', $user->email) }}" required name='email' label='Email' id='user_email'/>

                                        <x-admin.form.input name='password' type='password' label='Password' id='user_password'/>

                                        <div class="row">
                                            <div class="col-lg-8">
                                                <x-admin.form.input type='file' name='avatar' label='Avatar (120 x 120)' id='user_avatar'/>
                                            </div>
                                            
                                            <div class="col-lg-4 text-center">
                                                <img 
                                                class='img-fluid rounded' 
                                                src="{{ $user->avatar == '' || strlen($user->avatar) == 0 ? asset("admin_assets/images/avatars/avatar.png") : asset('storage//' . $user->avatar) }}" 
                                                alt="{{ $user->name }}" 
                                                width='100' 
                                                height='100'>
                                            </div>
                                        </div>

                                        @if(auth()->id() === 1)

                                        <div class="mb-3">
                                            <label class="form-label mb-3">Permissions</label> <br><br>

                                            @foreach($permissions as $permission)
                                            <div class='row'>
                                                <div class='col-md-3'>
                                                    <label class="form-label">{{ $permission->title }} </label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <label class="form-label">YES <input {{ $user->permissions->contains($permission->id) ? 'checked' : '' }} name='permission_{{ $permission->id }}' value='1' type="radio"></label>
                                                    <label class="form-label">NO <input {{ $user->permissions->contains($permission->id) ? '' : 'checked' }} name='permission_{{ $permission->id }}' value='0' type="radio"></label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        @endif


                                        <div class="mb-3">

                                            <x-admin.form.button type='btn-primary'>Update User</x-admin.form.button>

                                            <a href='#' 
                                            onclick="
                                                if( confirm('You are gonna delete store permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('delete_user_form').submit(); }" 
                                            class='btn btn-danger px-5'>Delete User</a>
                                        
                                        </div>

                                    </div>
                                </div>
                        
                            </div>
                        </div>
                    </form>

                    <form class='hidden' id='delete_user_form' action="{{ route('admin.users.destroy', $user) }}" method='POST'>
                        @csrf @method('DELETE')
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section("script")

@endsection