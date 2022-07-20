
@extends("admin_dashboard.layouts.app")

@section("style")
	
@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="breadcrumb-title pe-3">Admins</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">New Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Add New Admin</h5>
                  <hr/>
                    <form action="{{ route('admin.users.store') }}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <x-admin.form.input value="{{ old('name') }}" required name='name' label='Name' id='user_name'/>

                                        <x-admin.form.input value="{{ old('email') }}" type='email' required name='email' label='Email' id='user_email'/>
                                        
                                        <x-admin.form.input required type='password' name='password' label='Password' id='user_password'/>

                                        <x-admin.form.input type='file' name='avatar' label='Avatar (120 x 120)' id='user_avatar'/>

                                        <div class="mb-3">
                                            <label class="form-label mb-3">Permissions</label> <br><br>

                                            @foreach($permissions as $permission)
                                            <div class='row'>
                                                <div class='col-md-3'>
                                                    <label class="form-label">{{ $permission->title }} </label>
                                                </div>
                                                <div class='col-md-3'>
                                                    <label class="form-label">YES <input name='permission_{{ $permission->id }}' value='1' type="radio"></label>
                                                    <label class="form-label">NO <input checked name='permission_{{ $permission->id }}' value='0' type="radio"></label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <x-admin.form.button type='btn-primary'>Add Admin</x-admin.form.button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")

@endsection