@extends("admin_dashboard.layouts.app")
		
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
                            <li class="breadcrumb-item active" aria-current="page">All Users </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            
            <x-admin.flashes.success :status="'success'" />

            <div class="card">
                <div class="card-body">
                    <div class="align-items-center mb-4 gap-3">
                        
                        <div class='row'>
                            <div class='col-sm-4'>
                                <form autocomplete='off' method='GET' action="{{ route('admin.users.index') }}" class='user_search_form'>
                                    <div class='form-group'>
                                        <input 
                                        value="{{ request()->input('q')??'' }}"
                                        placeholder='Search User' 
                                        type='text' 
                                        name='q' 
                                        class='form-control'>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="col-sm-2">
                                <a href='#' 
                                class='btn btn-primary form-control'
                                onclick="event.preventDefault();document.querySelector('.user_search_form').submit();">GO</a>
                            </div>
                            
                            <div class="col-sm-6" style="text-align:right;">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                                    <i class="bx bxs-plus-square"></i>Add New User
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>User#</th>
                                    <th>Avatar</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#U-{{$user->id}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <img 
                                        width='50' 
                                        heigth='50' 
                                        class='img-fluid rounded' 
                                        src="{{ $user->avatar == '' || strlen($user->avatar) == 0 ? asset("admin_assets/images/avatars/avatar.png") : asset("storage//" . $user->avatar) }}" alt="">
                                    </td>

                                    <td>{{ \Str::limit($user->name, 20) }}</td>

                                    <td>{{ $user->email }}</td>

                                    <td>{{ $user->role }}</td>

                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    
                                    <td>
                                        <div class="d-flex order-actions">

                                            <a href="{{ route('admin.users.edit', $user) }}" class="text-info"><i class='bx bxs-edit'></i></a>
                                            
                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete user permanently, proceed ?') == true ) { event.preventDefault();document.querySelector('#user_delete_form_{{ $user->id }}').submit(); }" 
                                            href="#" class="ms-3 text-white bg-danger"><i class='bx bxs-trash'></i></a>
                                        
                                            <form method='POST' action="{{ route('admin.users.destroy', $user) }}" class='hidden' id='user_delete_form_{{$user->id}}'>
                                                @csrf
                                                @method('DELETE')

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                @empty
                                    <p>No Users To Show.</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    
                    <div class='m-3'>

                        {{ $users->links() }}

                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @endsection