
@extends("admin_dashboard.layouts.app")

@section("style")
	<link rel="stylesheet" href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet">
@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="breadcrumb-title pe-3">Coupons</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Edit Coupon</h5>
                  <hr/>
                    <form action="{{ route('admin.coupons.update', $coupon) }}" method='POST'>
                        @csrf
                        @method('PUT')

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <x-admin.form.input value="{!! old('title', $coupon->title) !!}" required name='title' label='Coupon Title' id='coupon_title'/>

                                        <x-admin.form.textarea value="{!! old('description', $coupon->description) !!}" name='description' label='Coupon Description' id='coupon_description' rows="3"/>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <x-admin.form.input value="{{ old('code', $coupon->code) }}" name='code' label='Coupon Code' id='coupon_code'/>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <x-admin.form.input step="any" value="{{ old('discount', $coupon->discount) }}" name='discount' type="number" label='Coupon Discount' id='coupon_discount'/>
                                            </div>

                                            <div class="col-lg-2 mt-2">
                                                <label class='form-label'></label>
                                                <select name='preference' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                    <option {{ $coupon->preference == '%' ? 'selected' : '' }} value='%'>%</option>
                                                    <option {{ $coupon->preference == '$' ? 'selected' : '' }} value='$'>$</option>
                                                </select>
                                            </div>
                                        </div>

                                        <x-admin.form.input type='url' value="{{ old('link', $coupon->link) }}" name='link' label='Coupon Link' id='coupon_link'/>

                                        <div class='row'>
                                            <div class='col-lg-6'>
                                                <x-admin.form.date value="{{ old('expire_date', $coupon->expire_date == '0000-00-00' ? '' : $coupon->expire_date) }}" name='expire_date' label='Expire date' id='date' placeholder="2021-09-09" data-dtp="dtp_Usa8T"/>
                                            </div>

                                            <div class='col-md-6 mt-4 p-2'>
                                                <div class="mb-3">

                                                    <div class='row'>
                                                        <div class='col-md-4'>

                                                            <div class="form-check form-switch">
                                                                <input {{ $coupon->featured ? 'checked' : '' }} name='featured' class="form-check-input" type="checkbox" id="featured_checkbox">
                                                                <label class="form-check-label" for="featured_checkbox">Featured</label>
                                                            </div>

                                                        </div>

                                                        <div class='col-md-4'>

                                                            <div class="form-check form-switch">
                                                                <input {{ $coupon->verified ? 'checked' : '' }} name='verified' class="form-check-input" type="checkbox" id="verified_checkbox">
                                                                <label class="form-check-label" for="verified_checkbox">Verified</label>
                                                            </div>

                                                        </div>

                                                        <div class='col-md-4'>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" {{ $coupon->online ? 'checked' : '' }} name='online' id="online_checkbox">
                                                                <label class="form-check-label" for="online_checkbox">Online</label>
                                                            
                                                                @error('online')
                                                                    <p class='text-danger'>{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class='mb-3'>
                                            <div class='row'>
                                                <div class='col-md-4'>
    
                                                    <div class="form-check form-switch">
                                                        <input {{ $coupon->top_coupon ? 'checked' : '' }} class="form-check-input" type="checkbox" name='top_coupon' id="top_coupon_checkbox">
                                                        <label class="form-check-label" for="top_coupon_checkbox">In Top Coupon Page</label>
                                                    
                                                        @error('top_coupon')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                    </div>
    
                                                </div>
    
                                                <div class='col-md-4'>
    
                                                    <div class="form-check form-switch">
                                                        <input {{ $coupon->expire_soon ? 'checked' : '' }} class="form-check-input" type="checkbox" name='expire_soon' id="expire_soon_checkbox">
                                                        <label class="form-check-label" for="expire_soon_checkbox">In Expire Soon Page</label>
                                                    
                                                        @error('expire_soon')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                    </div>
    
                                                </div>
                                                
                                                <div class='col-md-4'>
    
                                                    <div class="form-check form-switch">
                                                        <input {{ $coupon->super_featured ? "checked" : "" }} class="form-check-input" type="checkbox" name="super_featured" id="super_featured_checkbox">
                                                        <label class="form-check-label" for="super_featured_checkbox">Super Featured</label>
                                                    
                                                        @error('super_featured')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                        <br>
                                                        <small class='text-info'>will be at the bottom of every page</small>
                                                    </div>
    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label class='form-label' for="store_id">Store</label>
                                                <div class="input-group">
                                                    <select name='store_id' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        @foreach($stores as $key => $store)
                                                            <option {{ $coupon->store_id == $key ? 'selected' : '' }} value='{{ $key }}'>{{ $store }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('store_id')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4">
                                                <label class='form-label' for="category_ids">Category</label>
                                                <div class="input-group" >
                                                    <select multiple name='category_ids[]' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        <option value='All'>All Categories</option>
                                                        @foreach($categories as $key => $category)
                                                            <option {{ $coupon->categories->contains($key) ? 'selected' : '' }} value='{{ $key }}'>{{ $category }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('category_ids')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <label class='form-label' for="event_ids[]">Event</label>
                                                <div class="input-group" >
                                                    <select multiple name='event_ids[]' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        @foreach($events as $key => $event)
                                                            <option {{ $coupon->events->contains($key) ? 'selected' : '' }} value='{{ $key }}'>{{ $event }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('event_ids')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row mb-3 publish-row">
                                            <div class="col-lg-2">
                                                <label class='form-label' for="publish_type">Publish Type</label>
                                                <div class="input-group">
                                                    <select name='publish_type' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        <option {{ $coupon->publish_type == 'now' ? 'selected' : '' }} value='now'>Now</option>
                                                        <option {{ $coupon->publish_type == 'schedule' ? 'selected' : '' }} value='schedule'>Schedule</option>
                                                    </select>

                                                    @error('publish_type')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-5 schedule_from_col {{ $coupon->publish_type == 'now' ? 'd-none':'' }}">
                                                
                                                <x-admin.form.date value="{{ old('schedule_from', $coupon->schedule_from) }}" name='schedule_from' label='Schedule From Date' id='schedule_from' placeholder="2021-09-09" data-dtp="dtp_Usa8T"/>
                                                
                                                @error('schedule_from')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                                    
                                            </div>

                                            <div class="col-lg-5 schedule_to_col {{ $coupon->publish_type == 'now' ? 'd-none':'' }}">
                                                    
                                                <x-admin.form.date value="{{ old('schedule_to', $coupon->schedule_to) }}" name='schedule_to' label='Schedule To Date' id='schedule_to' placeholder="2021-09-09" data-dtp="dtp_Usa8T"/>
                                                
                                                @error('schedule_to')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <hr>
                                        <h6>Store Coupon Code Terms and Conditions: <small class='text-info'>Will appear under each coupon</small></h6>

                                        @forelse($coupon->couponterms as $term)
                                        <div class="row mb-3">
                                            <div class="col-lg-10">
                                                <x-admin.form.input value='{{ $term->term }}' type='text' name='terms[]' label='Coupon Term' id=''/>
                                            </div>
                                            <div class="col-lg-2 mt-4 p-1">

                                                <a class='add-term btn btn-info text-white' href='#'>
                                                    <i class="bx bx-plus"></i>
                                                </a>

                                                <a class='remove-term btn btn-danger text-white' href='#'>
                                                    <i class="bx bx-minus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @empty
                                        <div class="row mb-3">
                                            <div class="col-lg-10">
                                                <x-admin.form.input type='text' name='terms[]' label='Coupon Term' id=''/>
                                            </div>
                                            <div class="col-lg-2 mt-4 p-1">

                                                <a class='add-term btn btn-info text-white' href='#'>
                                                    <i class="bx bx-plus"></i>
                                                </a>

                                                <a class='remove-term btn btn-danger text-white' href='#'>
                                                    <i class="bx bx-minus"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforelse
                                        
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                <x-admin.form.button type='btn-primary'>Update Coupon</x-admin.form.button>

                                                <a href='#' 
                                                onclick="
                                                if( confirm('You are gonna delete coupon permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('delete_coupon_form').submit(); }" 
                                                class='btn btn-danger px-5'>Delete Coupon</a>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                        
                            </div>
                        </div>
                    </form>

                    <form class='hidden' id='delete_coupon_form' action="{{ route('admin.coupons.destroy', $coupon) }}" method='POST'>
                        @csrf @method('DELETE')
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section("script")

    <script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/datetimepicker/js/legacy.js"></script>
	<script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/datetimepicker/js/picker.js"></script>
	<script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/datetimepicker/js/picker.time.js"></script>
	<script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/datetimepicker/js/picker.date.js"></script>
	<script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
	<script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>


    <script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/js/select2.min.js"></script>

	<script>
		$(function () {
			$('#date, #schedule_from, #schedule_to').bootstrapMaterialDatePicker({
				time: false
			});
		
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

            $(document).on("click", ".add-term", (e) => {
                e.preventDefault();
                let the_term = $(e.target).closest(".row");
                let new_term = the_term.clone();
                new_term.find("input").val('')
                new_term.insertAfter( $(e.target).closest(".row") );
            });

            $(document).on("click", ".remove-term", (e) => {
                e.preventDefault();
                if($(".remove-term").length > 1)
                    $(e.target).closest(".row").remove();
            });
            
            $(document).on("change", ".publish-row select[name='publish_type']", (e) => {
                if($(e.target).val() !== 'now') {
                    $(".publish-row .d-none").removeClass("d-none");
                }else 
                {
                    $(".publish-row .schedule_from_col input, .publish-row .schedule_to_col input").val('');
                    $(".publish-row .schedule_from_col, .publish-row .schedule_to_col").addClass("d-none");
                }
            });

        });
	</script>

@endsection