@extends("admin_dashboard.layouts.app")
		
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper" id="all-widgets">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Widgets</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Widgets </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            
            <x-admin.flashes.success :status="'success'" />

            <div class="card">
                <div class="card-body">
                    <div class="align-items-center mb-4 gap-4">
                        <div class='row'>
                            <div class='col-sm-4'>
                                <form autocomplete='off' method='GET' action="{{ route('admin.widgets.index') }}" class='widget_search_form'>
                                    <div class='form-group'>
                                        <input 
                                        value="{{ request()->input('q')??'' }}"
                                        placeholder='Search Widget' 
                                        type='text' 
                                        name='q' 
                                        class='form-control'>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="col-sm-2">
                                <a href='#' 
                                class='btn btn-primary form-control'
                                onclick="event.preventDefault();document.querySelector('.widget_search_form').submit();">GO</a>
                            </div>
                            
                            <div class="col-sm-6" style="text-align:right;">
                                <a href="{{ route('admin.widgets.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                                    <i class="bx bxs-plus-square"></i>Add New Widget
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="row row-cols-1 row-cols-md-1 row-cols-xl-1">

                        @foreach($widgets as $widget)
                            @if( $widget->title ) 
                            <div class="col">
                                <div class="card radius-10 ">
                                    <div class="card-body" style="position: relative;">
                                        
                                        <div class="accordion" id="accordion_{{ $widget->id }}">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading_{{ $widget->id }}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $widget->id }}" aria-expanded="false" aria-controls="collapse_{{ $widget->id }}">
                                                        {{ \Str::limit($widget->title, 50) }}
                                                    </button>
                                                </h2>
                                                <div id="collapse_{{ $widget->id }}" class="accordion-collapse collapse" aria-labelledby="heading_{{ $widget->id }}" data-bs-parent="#accordion_{{ $widget->id }}">
                                                    <div class="accordion-body">
                                                        <p>{!! $widget->description !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class='actions'>
                                            <a href="{{ route('admin.widgets.edit', $widget) }}" class='btn btn-primary btn-sm'>Edit</a>
                                            
                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete widget permanently, proceed ?') == true ) { event.preventDefault();document.querySelector('#widget_delete_form_{{ $widget->id }}').submit(); }" 
                                            href="#" 
                                            class="ms-1 text-white btn btn-danger btn-sm">
                                                Delete
                                            </a>
                                        
                                            <form method='POST' action="{{ route('admin.widgets.destroy', $widget) }}" class='hidden' id='widget_delete_form_{{$widget->id}}'>
                                                @csrf
                                                @method('DELETE')
    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                    
                    <div class='m-3'>

                        {{ $widgets->links() }}

                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @endsection