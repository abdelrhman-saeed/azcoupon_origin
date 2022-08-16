@extends("admin_dashboard.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Categories</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Categories </li>
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
                                <form autocomplete='off' method='GET' action="{{ route('admin.categories.index') }}" class='category_search_form'>
                                    <div class='form-group'>
                                        <input 
                                        value="{{ request()->input('q')??'' }}"
                                        placeholder='Search Category' 
                                        type='text' 
                                        name='q' 
                                        class='form-control'>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="col-sm-2">
                                <a href='#' 
                                class='btn btn-primary form-control'
                                onclick="event.preventDefault();document.querySelector('.category_search_form').submit();">GO</a>
                            </div>
                            
                            <div class="col-sm-6" style="text-align:right;">
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                                    <i class="bx bxs-plus-square"></i>Add New Category
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered yajra-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Category#</th>
                                    <th>Category Image</th>
                                    <th>Category Seo Title</th>
                                    <th>Category Name</th>
                                    <th>View Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#C-{{$category->id}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        @if($category->image)
                                            <img width='50' height='50' src="{{ asset('storage/' . $category->image->path ) }}" class="category-img" alt="category img">
                                        @else
                                            <p class='text-muted'>No Attachement</p>
                                        @endif
                                    </td>
                                    
                                    <td>{{ \Str::limit($category->seo_title, 100) }}</td>

                                    <td>{{ \Str::limit($category->name, 40) }}</td>
                                    
                                    <td>
                                        <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-primary btn-sm radius-30 px-4">View Details</a>
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex order-actions">

                                            <a href="{{ route('admin.categories.edit', $category) }}" class="text-info"><i class='bx bxs-edit'></i></a>
                                            
                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete category permanently, proceed ?') == true ) { event.preventDefault();document.querySelector('#category_delete_form_{{ $category->id }}').submit(); }" 
                                            href="#" 
                                            class="ms-3 text-white bg-danger">
                                                <i class='bx bxs-trash'></i>
                                            </a>
                                        
                                            <form method='POST' action="{{ route('admin.categories.destroy', $category) }}" class='hidden' id='category_delete_form_{{$category->id}}'>
                                                @csrf
                                                @method('DELETE')

                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                @empty
                                    <p>No Categories To Show.</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    
                    <div class='m-3'>

                        {{ $categories->links() }}

                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection