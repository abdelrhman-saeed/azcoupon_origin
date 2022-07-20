@extends("admin_dashboard.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Static Pages</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Static Pages </li>
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
                                <form autocomplete='off' method='GET' action="{{ route('admin.pages.index') }}" class='page_search_form'>
                                    <div class='form-group'>
                                        <input 
                                        value="{{ request()->input('q')??'' }}"
                                        placeholder='Search Page' 
                                        type='text' 
                                        name='q' 
                                        class='form-control'>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="col-sm-2">
                                <a href='#' 
                                class='btn btn-primary form-control'
                                onclick="event.preventDefault();document.querySelector('.page_search_form').submit();">GO</a>
                            </div>
                            
                            <div class="col-sm-6" style="text-align:right;">
                                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                                    <i class="bx bxs-plus-square"></i>Add New Page
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <!--<table class="table mb-0">-->
                        <table class="table table-bordered yajra-datatable">
                            <thead class="table-light">
                                <tr>
                                    <th>Page#</th>
                                    <th>Page Label</th>
                                    <th>Page Title</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse($pages as $page)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#{{$page->id}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td>{{ $page->label }}</td>
                                    <td>{{ $page->title }}</td>
                                    <td>{!! $page->active ? '<strong class="text-success">Active</strong>' : '<strong class="text-danger">Not Active</strong>' !!}</td>
                                    <td>
                                        <div class="d-flex order-actions">

                                            <a href="{{ route('admin.pages.edit', $page) }}" class="text-info"><i class='bx bxs-edit'></i></a>
                                            
                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete page permanently, proceed ?') == true ) { event.preventDefault();document.querySelector('#page_delete_form_{{ $page->id }}').submit(); }" 
                                            href="#" 
                                            class="ms-3 text-white bg-danger">
                                                <i class='bx bxs-trash'></i>
                                            </a>
                                        
                                            <form method='POST' action="{{ route('admin.pages.destroy', $page) }}" class='hidden' id='page_delete_form_{{$page->id}}'>
                                                @csrf
                                                @method('DELETE')

                                            </form>
                                            
                                            <a target='_blank' href="{{ route('stores_events.show', $page->slug) }}" class="ms-3 bg-warning">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                @empty
                                    <p>No Pages To Show.</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection