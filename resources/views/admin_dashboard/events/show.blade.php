@extends("admin_dashboard.layouts.app")

@section('style')
<style>
    .event-image { margin-top: 25%; }
</style>
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">

                            <li class="breadcrumb-item">
                                <a href="javascript:;">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>

                            <li class="breadcrumb-item" aria-current="page">
                                <a href="{{ route('admin.events.index') }}">Events</a>
                            </li>
                            
                            <li class="breadcrumb-item active" aria-current="page">{{ $event->name }}</li>

                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row g-0">

                    <div class="col-md-8 border-end text-center p-3 py-5">
						<img class='img-fluid' src="{{ $event->getImage() }}" class="img-fluid" alt="...">
                    </div>
                    
                    <div class="col-md-4">
                    
                    <div class="card-body">
                        <h4 class="card-title">{{ $event->name }}</h4>

                        <div class="d-flex gap-3 py-3">
                            
                            <div>
                                <i class="lni lni-user"></i> {{ $event->user->name }}
                            </div>

                        </div>
                        
                        <dl class="row">
                            <dt class="col-sm-3">ID#</dt>
                            <dd class="col-sm-9">{{ $event->id }}</dd>
                            
                            <dt class="col-sm-3">SLUG</dt>
                            <dd class="col-sm-9">{{ $event->slug }}</dd>
                            
                            <dt class="col-sm-3">NUM OF COUPONS</dt>
                            <dd class="col-sm-9">{{ count($event->coupons) }}</dd>

                            <dt class="col-sm-3">Event Type</dt>
                            <dd class="col-sm-9"><span class="{{ $event->single_event ? 'text-success' : 'text-info' }}">{{ $event->single_event ? 'Single Event' : 'Special Event' }}</span></dd>
                        </dl>

                        <hr>
                        
                        <div class="d-flex gap-3 mt-3">
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-primary">Edit Event <i class='bx bxs-edit'></i></a>
                            <a 
                            onclick="
                                if( confirm('You are gonna delete event permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('event_delete_form').submit(); }"
                            href="#" 
                            class="btn btn-outline-danger">
                                <span class="text">Delete Event</span> <i class='bx bxs-trash'></i>
                            </a>

                            <form id='event_delete_form' action="{{ route('admin.events.destroy', $event) }}" method='POST'>
                                @csrf
                                @method('DELETE')

                            </form>
                        </div>
                    
                    </div>
                    </div>
                </div>
            </div>

            <h6 class="text-uppercase mb-0">Related Coupons</h6>
            <hr/>

            <div class="row row-cols-1 row-cols-lg-3">
                @forelse($related_coupons as $coupon)
                <div class="col">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-12">

                                <div class="card-body" style='min-height: 150px;'>

                                    <h6 class="card-title">
                                        <a href="{{ route('admin.coupons.show', $coupon) }}">{{ \Str::limit($coupon->title, 30) }}</a>
                                    </h6>
                                    
                                    <div class="clearfix">
                                        <p class="mb-0 float-start fw-bold">{{ \Str::limit($coupon->description, 50) }}</p>
                                    </div>

                                    <div class="clearfix">
                                        <p class="">
                                            <a class='btn btn-primary btn-sm' href="{{ route('admin.coupons.edit', $coupon) }}">Edit</a>

                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete coupon permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('coupon_delete_form_{{ $coupon->id }}').submit(); }"
                                            href="#" 
                                            class="btn btn-danger btn-sm">
                                                <span class="text">Delete</span>
                                            </a>

                                            <form id='coupon_delete_form_{{ $coupon->id }}' action="{{ route('admin.coupons.destroy', $coupon) }}" method='POST'>
                                                @csrf
                                                @method('DELETE')

                                            </form>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class='muted'>Event has not Coupons</p>
                @endforelse
            </div>



            <h6 class="text-uppercase mb-0">Related Offers</h6>
            <hr/>

            <div class="row row-cols-1 row-cols-lg-3">
                @forelse($related_offers as $coupon)
                <div class="col">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-12">

                                <div class="card-body" style='min-height: 150px;'>

                                    <h6 class="card-title">
                                        <a href="{{ route('admin.coupons.show', $coupon) }}">{{ \Str::limit($coupon->title, 30) }}</a>
                                    </h6>
                                    
                                    <div class="clearfix">
                                        <p class="mb-0 float-start fw-bold">{{ \Str::limit($coupon->description, 50) }}</p>
                                    </div>

                                    <div class="clearfix">
                                        <p class="">
                                            <a class='btn btn-primary btn-sm' href="{{ route('admin.coupons.edit', $coupon) }}">Edit</a>

                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete offer permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('coupon_delete_form_{{ $coupon->id }}').submit(); }"
                                            href="#" 
                                            class="btn btn-danger btn-sm">
                                                <span class="text">Delete</span>
                                            </a>

                                            <form id='coupon_delete_form_{{ $coupon->id }}' action="{{ route('admin.coupons.destroy', $coupon) }}" method='POST'>
                                                @csrf
                                                @method('DELETE')

                                            </form>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p class='muted'>Event has not Offers</p>
                @endforelse
            </div>
            
            <h6 class="text-uppercase mb-0">Latest Events</h6>
            <hr/>

            <div class="row row-cols-1 row-cols-lg-6">
                @foreach($latest_added as $levent)

                <div class="col">
                    <div class="card">
                        <div class="row g-0">
                            
                            <div class="col-md-12">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $levent->name }}</h6>

                                    <div class='my-2'>
                                        <p>
                                        <span class='text-success'>{{ $levent->single_event ? 'Single Event' : 'Special Event' }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>


                            <div class="clearfix m-3 mb-0 mt-0">
                                <p class="">
                                    <a class='btn btn-primary btn-sm' href="{{ route('admin.events.edit', $levent) }}">Edit</a>

                                    <a 
                                    onclick="
                                        if( confirm('You are gonna delete store permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('event_delete_form_{{ $levent->id }}').submit(); }"
                                    href="#" 
                                    class="btn btn-danger btn-sm">
                                        <span class="text">Delete</span>
                                    </a>

                                    <form id='event_delete_form_{{ $levent->id }}' action="{{ route('admin.events.destroy', $levent) }}" method='POST'>
                                        @csrf
                                        @method('DELETE')

                                    </form>
                                </p>
                            </div>
                        </div>
                            
                    </div>
                </div>
                
                @endforeach
            </div>
            
        </div>
            
    </div>
</div>
    <!--end page wrapper -->
    @endsection