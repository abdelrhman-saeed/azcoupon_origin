@extends("admin_dashboard.layouts.app")
		
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Events</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Events </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            
            <x-admin.flashes.success :status="'success'" />
            <x-admin.flashes.success :status="'error'" />

            <div class="card">
                <div class="card-body">
                    <div class="align-items-center mb-4 gap-3">
                        
                        <div class='row'>
                            <div class='col-sm-4'>
                                <form autocomplete='off' method='GET' action="{{ route('admin.events.index') }}" class='event_search_form'>
                                    <div class='form-group'>
                                        <input 
                                        value="{{ request()->input('q')??'' }}"
                                        placeholder='Search Event' 
                                        type='text' 
                                        name='q' 
                                        class='form-control'>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="col-sm-2">
                                <a href='#' 
                                class='btn btn-primary form-control'
                                onclick="event.preventDefault();document.querySelector('.event_search_form').submit();">GO</a>
                            </div>
                            
                            <div class="col-sm-6" style="text-align:right;">
                                <a href="{{ route('admin.events.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                                    <i class="bx bxs-plus-square"></i>Add New Event
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Event#</th>
                                    <th>Event Banner</th>
                                    <th>Event Name</th>
                                    <th>Event Type</th>
                                    <th>Last Update</th>
                                    <th>View Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($events as $event)
                                <tr>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <input class="form-check-input me-3" type="checkbox" value="" aria-label="...">
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#E-{{$event->id}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>

                                        <img width='500' height='100' src="{{ $event->getImage() }}" class="event-img" alt="Event Image"></td>

                                    </td>

                                    <td>{{ \Str::limit($event->name, 40) }}</td>

                                    <td>
                                        <div class="badge rounded-pill {{ !$event->single_event ? 'text-info bg-light-info' : 'text-success bg-light-success' }} p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle me-1'></i> {{ !$event->single_event ? 'Special Event' : 'Single Event' }}
                                        </div>
                                    </td>
                                    
                                    <td>
                                        {{ \Carbon\Carbon::parse($event->updated_at)->translatedFormat('d M Y h:i') }} By {{ $event->updated_by_who->name }}
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.events.show', $event) }}" class="btn btn-primary btn-sm radius-30 px-4">View Details</a>
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex order-actions">
                                            
                                            <a href="{{ route('admin.events.edit', $event) }}" class="text-info"><i class='bx bxs-edit'></i></a>
                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete event permanently, proceed ?') == true ) { event.preventDefault();document.querySelector('#event_delete_form_{{ $event->id }}').submit(); }" 
                                            href="#" 
                                            class="ms-2 text-white bg-danger">
                                                <i class='bx bxs-trash'></i>
                                            </a>
                                            <form method='POST' action="{{ route('admin.events.destroy', $event) }}" class='hidden' id='event_delete_form_{{$event->id}}'>
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                @empty
                                    <p>No Events To Show.</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    
                    <div class='m-3'>

                        {{ $events->links() }}

                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
    @endsection