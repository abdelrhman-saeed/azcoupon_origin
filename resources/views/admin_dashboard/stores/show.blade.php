@extends("admin_dashboard.layouts.app")

@section('style')
<style>
    .store-image { margin-top: 50%; }
</style>
@endsection

@section("wrapper")

    @if(\Session::has('success'))
    <div class='global-message alert alert-info'>{{ \Session::get('success') }}</div>
    @endif

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
                                <a href="{{ route('admin.stores.index') }}">Stores</a>
                            </li>
                            
                            <li class="breadcrumb-item active" aria-current="page">{{ $store->name }}</li>

                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="row g-0">

                    <div class="col-md-2 border-end text-center">
						<img class='store-image' width='120' src="@if(!empty($store->image))  {{ asset('storage//images/markets/'.$store->image->path) }} @else {{asset('admin_assets/images/stores/store_placeholder.png')}} @endif" class="img-fluid" alt="...">
                    </div>
                    
                    <div class="col-md-10">
                    
                    <div class="card-body">
                        <h4 class="card-title">{{ $store->name }}</h4>

                        <div class="d-flex gap-3 py-3">
                            
                            <div>
                                
                                <i class="lni lni-user"></i> {{ $store->user->name }}
                            
                            </div>

                        </div>
                        
                        <p class="card-text fs-6">{{ $store->description }}</p>

                        <dl class="row">
                            <dt class="col-sm-3">ID#</dt>
                            <dd class="col-sm-9">{{ $store->id }}</dd>
                            
                            <dt class="col-sm-3">SLUG</dt>
                            <dd class="col-sm-9">{{ $store->slug }}</dd>
                            
                            <dt class="col-sm-3">NUM OF COUPONS/OFFERS</dt>
                            <dd class="col-sm-9">{{ count($store->coupons) }}</dd>

                            <dt class="col-sm-3">Affiliate Link</dt>
                            <dd class="col-sm-9"><a target='_blank' href="{{ $store->aff_link }}">{{ \Str::limit($store->aff_link, 60) }}</a></dd>
                            
                            <dt class="col-sm-3">Link</dt>
                            
                            <dd class="col-sm-9"><a target='_blank' href="{{ $store->image }}">{{ \Str::limit($store->link, 60) }}</a></dd>
                            
                            <dt class="col-sm-3">Store Degree</dt>
                            <dd class="col-sm-9">{{ $store->store_degree }}</dd>
                        </dl>

                        <hr>
                        
                        <div class="d-flex gap-3 mt-3">
                            <a href="{{ route('admin.stores.edit', $store) }}" class="btn btn-primary">Edit Store <i class='bx bxs-edit'></i></a>
                            <a 
                            onclick="
                            if( confirm('You are gonna delete store permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('store_delete_form').submit(); }"
                            href="#" 
                            class="btn btn-outline-danger">
                                <span class="text">Delete Store</span> <i class='bx bxs-trash'></i>
                            </a>

                            <form id='store_delete_form' action="{{ route('admin.stores.destroy', $store) }}" method='POST'>
                                @csrf
                                @method('DELETE')

                            </form>
                        </div>
                    
                    </div>
                    </div>
                </div>
            </div>
                
            
            <div class='show-store-coupons coupons-offers-container'>

                <div class='card p-2'>
                    <div class='row mb-2'>
                        <div class='col-md-8'>
                            <h6 class="text-uppercase mb-0">Store Coupons</h6>
                        </div>

                        <div class='col-md-4'>
                            <form method='POST' class='pluck-form' action="{{ route('admin.stores.coupons_action') }}">
                                @csrf

                                <div class='row'>

                                    <div class='col-md-3'>
                                        <button type='submit' class='btn btn-primary'>Submit</button>
                                    </div>

                                    <div class='col-md-9'>
                                        <div class='select-container'>
                                            <select name="coupons-option" class='form-control'>
                                                <option value="0">Select Option</option>
                                                <option value="offline">OFFLINE</option>
                                                <option value="online">ONLINE</option>
                                                <option disabled></option>
                                                <option value="remove">REMOVE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name='coupons_ids'>
                                    
                                </div>
                            </form>
                            
                        </div>
                    </div>

                    <div class='mb-2'>
                        <label for="coupons-check-all">
                            <input id='coupons-check-all' type="checkbox" class='' name='check-all'> Check All
                        </label>
                    </div>
                </div>
                
                <div class="row row-cols-1 row-cols-lg-3">
                
                    @forelse($store_coupons as $coupon)
                    <div class="col">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-12">

                                    <div class="card-body" style='min-height: 150px;'>

                                        <h6 class="card-title">
                                            <a href="{{ route('admin.coupons.show', $coupon) }}">{{ \Str::limit($coupon->title, 30) }}
                                                <input value='{{ $coupon->id }}' type="checkbox" name='coupons[]' style='float: right'>
                                            </a>
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
                                                
                                                <a 
                                                href='#'
                                                onclick="event.preventDefault(); document.getElementById('online_change_{{ $coupon->id }}').submit();"
                                                class="btn btn-sm ms-2 text-white bg-warning">
                                                    @if($coupon->online)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off text-white"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    @endif
                                                </a>

                                                <form id='coupon_delete_form_{{ $coupon->id }}' action="{{ route('admin.coupons.destroy', $coupon) }}" method='POST'>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <form method='post' action="{{ route('admin.coupons.online_change', $coupon) }}" id='online_change_{{ $coupon->id }}'>@csrf
                                                </form>

                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class='muted'>Store has no Coupons</p>
                    @endforelse
                </div>

            </div>
            

            <div class='show-store-offers coupons-offers-container'>

                <div class='card p-2'>
            
                    <div class='row mb-2'>
                        <div class='col-md-8'>
                            <h6 class="text-uppercase mb-0">Store Offers</h6>
                        </div>

                        <div class='col-md-4'>
                            <form method='POST' class='pluck-form' action="{{ route('admin.stores.offers_action') }}">
                                @csrf

                                <div class='row'>

                                    <div class='col-md-3'>
                                        <button type='submit' class='btn btn-primary'>Submit</button>
                                    </div>

                                    <div class='col-md-9'>
                                        <div class='select-container'>
                                            <select name="offers-option" class='form-control'>
                                                <option value="0">Select Option</option>
                                                <option value="offline">OFFLINE</option>
                                                <option value="online">ONLINE</option>
                                                <option disabled></option>
                                                <option value="remove">REMOVE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name='coupons_ids'>
                                    
                                </div>
                            </form>
                            
                        </div>
                    </div>

                    <div class='mb-2'>
                        <label for="offers-check-all">
                            <input id='offers-check-all' type="checkbox" class='' name='check-all'> Check All
                        </label>
                    </div>

                </div>

                <div class="row row-cols-1 row-cols-lg-3">
                    @forelse($store_offers as $coupon)
                    <div class="col">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-12">

                                    <div class="card-body" style='min-height: 150px;'>

                                        <h6 class="card-title">
                                            <a href="{{ route('admin.coupons.show', $coupon) }}">{{ \Str::limit($coupon->title, 30) }}
                                                <input value='{{ $coupon->id }}' type="checkbox" name='coupons[]' style='float: right'>
                                            </a>
                                        </h6>
                                        
                                        <div class="clearfix">
                                            <p class="mb-0 float-start fw-bold">{{ \Str::limit($coupon->description, 50) }}</p>
                                        </div>

                                        <div class="clearfix">
                                            <p class="">
                                                <a class='btn btn-primary btn-sm' href="{{ route('admin.coupons.editoffer', $coupon) }}">Edit</a>

                                                <a 
                                                onclick="
                                                if( confirm('You are gonna delete coupon permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('coupon_delete_form_{{ $coupon->id }}').submit(); }"
                                                href="#" 
                                                class="btn btn-danger btn-sm">
                                                    <span class="text">Delete</span>
                                                </a>

                                                <a 
                                                href='#'
                                                onclick="event.preventDefault(); document.getElementById('online_change_{{ $coupon->id }}').submit();"
                                                class="btn btn-sm ms-2 text-white bg-warning">
                                                    @if($coupon->online)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off text-white"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    @endif
                                                </a>

                                                <form id='coupon_delete_form_{{ $coupon->id }}' action="{{ route('admin.coupons.destroy', $coupon) }}" method='POST'>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <form method='post' action="{{ route('admin.coupons.online_change', $coupon) }}" id='online_change_{{ $coupon->id }}'>@csrf
                                                </form>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @empty
                        <p class='muted'>Store has no Offers</p>
                    @endforelse
                </div>
            </div>


            <h6 class="text-uppercase mb-0">Latest Stores</h6>
            <hr/>

            <div class="row row-cols-1 row-cols-lg-3">
                @foreach($latest_added as $store)

                <div class="col">
                    <div class="card">
                        <div class="row g-0">

                            <div class="col-md-4">
                                <img width='120' height='120' src="@if(!empty($store->image))  {{ asset('storage//images/markets/'.$store->image->path) }} @else asset('admin_assets/images/stores/store_placeholder.png') @endif" class="img-fluid p-3" alt="Store Image">
                            </div>

                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $store->name }}</h6>

                                    <div class='my-2'>
                                        <p>{{ \Str::limit($store->description, 30) }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix m-3">
                                <p class="">
                                    <a class='btn btn-primary btn-sm' href="{{ route('admin.stores.edit', $store) }}">Edit</a>

                                    <a 
                                    onclick="event.preventDefault();document.getElementById('store_delete_form_{{ $store->id }}').submit();"
                                    href="#" 
                                    class="btn btn-danger btn-sm">
                                        <span class="text">Delete</span>
                                    </a>

                                    <a 
                                    href='#'
                                    onclick="event.preventDefault(); document.getElementById('online_change_{{ $store->id }}').submit();"
                                    class="btn btn-sm ms-2 text-white bg-warning">
                                        @if($store->online)
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off text-white"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        @endif
                                    </a>

                                    <form id='store_delete_form_{{ $store->id }}' action="{{ route('admin.stores.destroy', $store) }}" method='POST'>
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <form method='post' action="{{ route('admin.stores.online_change', $store) }}" id='online_change_{{ $store->id }}'>@csrf
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

@section('script')
<script>
    $("#coupons-check-all, #offers-check-all").on('change', (e) => {
        let $this = $(e.target);

        if($this.prop('checked'))
        {
            $this.parents('.coupons-offers-container').find("input[name='coupons[]']").prop('checked', true);
            let coupons_ids = '';
            $this.parents('.coupons-offers-container').find("input[name='coupons[]']").each(function(index) {
                coupons_ids += $(this).val();
                if($this.parents('.coupons-offers-container').find("input[name='coupons[]']").length - 1 !== index)
                    coupons_ids += ',';
            });

            $this.parents(".coupons-offers-container").find("form.pluck-form input[name='coupons_ids']").val(coupons_ids);

        }else {
            $this.parents('.coupons-offers-container').find("input[name='coupons[]']").prop('checked', false);
            $this.parents('.coupons-offers-container').find("form.pluck-form input[name='coupons_ids']").val('');
        }
    });


    $("input[name='coupons[]']").on('change', (e) => {
        let $this = $(e.target);
        let coupon_id = $this.val();

        let coupons_ids = $this.parents('.coupons-offers-container').find("input[name='coupons_ids']").val();
        
        if($this.prop('checked'))
        {
            // check if the input is empty add without comma 
            if(coupons_ids == null || coupons_ids == '')
            {
                $this.parents('.coupons-offers-container').find("form.pluck-form input[name='coupons_ids']").val( coupon_id );
            }
            // else if not empty add comma first then the number
            else {
                coupons_ids += "," + coupon_id;
                $this.parents('.coupons-offers-container').find("form.pluck-form input[name='coupons_ids']").val( coupons_ids );
            }
        }
        else 
        {
            let coupons_arr = $this.parents('.coupons-offers-container').find("input[name='coupons_ids']").val().split(',');
            
            var index = coupons_arr.indexOf(coupon_id);
            if (index !== -1) {
                coupons_arr.splice(index, 1);
            }
            coupons_arr.join(',');
            $this.parents('.coupons-offers-container').find("form.pluck-form input[name='coupons_ids']").val(coupons_arr);
        }
    });

    setTimeout(() => {
        $(".global-message").fadeOut();
    }, 5000);

</script>
@endsection