@extends("admin_dashboard.layouts.app")
		
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
                                <a href="{{ $coupon->offer == 1 ? route('admin.coupons.offers') : route('admin.coupons.index') }}">{{ $coupon->offer == 1 ? 'Offers' : 'Coupons' }}</a>
                            </li>
                            
                            <li class="breadcrumb-item active" aria-current="page">{{ $coupon->title }}</li>

                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row g-0">
                    
                    <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="card-title">{{ $coupon->title }}</h4>
                        <div class="d-flex gap-3 py-3">
                            
                            @if(count($coupon->categories))
                            <div>
                                @foreach($coupon->categories as $category)
                                <a href="{{ route('admin.categories.show', $category) }}">
                                    <i class="lni lni-tag"></i> {{ $category->name }}
                                </a>
                                @endforeach
                            </div>
                            @else
                            No Category Specified
                            @endif

                            @if($coupon->store)
                            <div class="">
                                <a href="{{ route('admin.stores.show', $coupon->store) }}">
                                    <i class='bx bxs-cart-alt align-middle'></i> {{ $coupon->store->name }}
                                </a> store
                            </div>
                            @else
                            No Store Specified
                            @endif

                        </div>
                        
                        <p class="card-text fs-6">{{ $coupon->description }}</p>

                        <dl class="row">
                            <dt class="col-sm-3">ID#</dt>
                            <dd class="col-sm-9">{{ $coupon->id }}</dd>
                            
                            <dt class="col-sm-3">CODE</dt>
                            <dd class="col-sm-9">{{ $coupon->code }}</dd>
                            
                            <dt class="col-sm-3">DISCOUNT</dt>
                            <dd class="col-sm-9">{{ $coupon->discount . $coupon->preference }}</dd>

                            <dt class="col-sm-3">LINK</dt>
                            <dd class="col-sm-9"><a target='_blank' href='{{ $coupon->link }}'>{{ $coupon->link }}</a></dd>
                        </dl>

                        <hr>
                        
                    <div class="d-flex gap-3 mt-3">
                        <a href="{{ $coupon->offer == 1 ? route('admin.coupons.editoffer', $coupon) : route('admin.coupons.edit', $coupon) }}" class="btn btn-primary">Edit {{ $coupon->offer == 1 ? 'Offer' : 'Coupon' }} <i class='bx bxs-edit'></i></a>
                        <a 
                        onclick="
                        if( confirm('You are gonna delete coupon permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('coupon_delete_form').submit(); }"
                        href="#" 
                        class="btn btn-outline-danger">
                            <span class="text">Delete {{ $coupon->offer == 1 ? 'Offer' : 'Coupon' }}</span> <i class='bx bxs-trash'></i>
                        </a>

                        <form id='coupon_delete_form' action="{{ route('admin.coupons.destroy', $coupon) }}" method='POST'>
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
                @foreach($related_coupons as $coupon)
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
                @endforeach
            </div>
            
        </div>
            
    </div>
</div>
    <!--end page wrapper -->
    @endsection