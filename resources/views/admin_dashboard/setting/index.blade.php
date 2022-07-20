
@extends("admin_dashboard.layouts.app")

@section("style")
    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet">
@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Setting</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Setting</li>
                        </ol>
                    </nav>
                </div>
            </div>
                  
            <div class="card">
                <div class="card-body p-4">

                    <div class="success-message d-none card bg-info bg-gradient text-center">
                        <div class="p-4 text-white rounded fw-bold"></div>
                    </div>

                    <form action="{{ route('admin.setting.update') }}" method='POST'>
                        @csrf

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Home Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.input value="{{ old('meta_title', $setting->meta_title) }}" required name='meta_title' label='Meta Title' id='setting_meta_title'/>
                                        <small class='error text-danger error-meta-title'></small>

                                        <x-admin.form.input value="{{ old('meta_description', $setting->meta_description) }}" required name='meta_description' label='Meta Description' id='meta_description'/>
                                        <small class='error text-danger error-meta-description'></small>

                                        <x-admin.form.input value="{{ old('title', $setting->title) }}" required name='title' label='Title' id='setting_title'/>
                                        <small class='error text-danger error-title'></small>

                                        <x-admin.form.input value="{{ old('subtitle', $setting->subtitle) }}" required name='subtitle' label='Subtitle' id='subtitle'/>
                                        <small class='error text-danger error-subtitle'></small>

                                        <x-admin.form.input type='number' value="{{ old('special_events_num', $setting->special_events_num) }}" required name='special_events_num' label='Special events number' id='setting_special_events_num'/>
                                        <small class='error text-danger error-special-events-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('latest_stores_num', $setting->latest_stores_num) }}" required name='latest_stores_num' label='Latest stores number' id='setting_latest_stores_num'/>
                                        <small class='error text-danger error-latest-stores-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('featured_brands_num', $setting->featured_brands_num) }}" required name='featured_brands_num' label='Featured brands number' id='featured_brands_num'/>
                                        <small class='error text-danger error-featured-brands-number'></small>

                                        <x-admin.form.input type='number' value="{{ old('featured_coupons_num', $setting->featured_coupons_num) }}" required name='featured_coupons_num' label='Featured coupons number' id='featured_coupons_num'/>
                                        <small class='error text-danger error-featured-coupons-number'></small>

                                        <x-admin.form.input type='number' value="{{ old('latest_coupons_num', $setting->latest_coupons_num) }}" required name='latest_coupons_num' label='Latest coupons number' id='latest_coupons_num'/>
                                        <small class='error text-danger error-latest-coupons-number'></small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Slider Setting</h4><hr class='bg-primary'>
                                        
                                        <div class='row'>
                                            <div class='col-md-6'>
                                                <x-admin.form.input value="{{ old('slider_link_1_title', $setting->slider_link_1_title) }}" required name='slider_link_1_title' label='slider link 1 title' id='setting_slider_link_1_title'/>
                                            </div>
                                            
                                            <div class='col-md-6'>
                                                <x-admin.form.input type='url' value="{{ old('slider_link_1_link', $setting->slider_link_1_link) }}" required name='slider_link_1_link' label='slider link 1 link' id='setting_slider_link_1_link'/>
                                            </div>
                                            
                                            <div class='col-md-6'>
                                                <x-admin.form.input value="{{ old('slider_link_2_title', $setting->slider_link_2_title) }}" required name='slider_link_2_title' label='slider link 2 title' id='setting_slider_link_2_title'/>
                                            </div>
                                            
                                            <div class='col-md-6'>
                                                <x-admin.form.input type='url' value="{{ old('slider_link_2_link', $setting->slider_link_2_link) }}" required name='slider_link_2_link' label='slider link 2 link' id='setting_slider_link_2_link'/>
                                            </div>

                                            <div class='col-md-6'>
                                                <x-admin.form.input value="{{ old('slider_link_3_title', $setting->slider_link_3_title) }}" required name='slider_link_3_title' label='slider link 3 title' id='setting_slider_link_3_title'/>
                                            </div>

                                            <div class='col-md-6'>
                                                <x-admin.form.input type='url' value="{{ old('slider_link_3_link', $setting->slider_link_3_link) }}" required name='slider_link_3_link' label='slider link 3 link' id='setting_slider_link_3_link'/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Contact Page Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.input value="{{ old('contact_meta_title', $setting->contact_meta_title) }}" required name='contact_meta_title' label='Contact Meta Title' id='setting_contact_meta_title'/>
                                        <small class='error text-danger error-contact-meta-title'></small>

                                        <x-admin.form.input value="{{ old('contact_meta_description', $setting->contact_meta_description) }}" required name='contact_meta_description' label='Contact Meta Description' id='contact_meta_description'/>
                                        <small class='error text-danger error-contact-meta-description'></small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Coupons Lists Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.input type='number' value="{{ old('top_coupons_featured_num', $setting->top_coupons_featured_num) }}" required name='top_coupons_featured_num' label='Top coupons featured number' id='setting_top_coupons_featured_num'/>
                                        <small class='error text-danger error-top-coupons-featured-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('top_coupons_num', $setting->top_coupons_num) }}" required name='top_coupons_num' label='Top coupons number' id='top_coupons_num'/>
                                        <small class='error text-danger error-top-coupons-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('expiring_soon_coupons_featured_num', $setting->expiring_soon_coupons_featured_num) }}" required name='expiring_soon_coupons_featured_num' label='Expiring soon coupons featured number' id='expiring_soon_coupons_featured_num'/>
                                        <small class='error text-danger error-expiring-soon-coupons-featured-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('expiring_soon_coupons_num', $setting->expiring_soon_coupons_num) }}" required name='expiring_soon_coupons_num' label='Expiring soon coupons number' id='expiring_soon_coupons_num'/>
                                        <small class='error text-danger error-latest-stores-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('single_event_featured_coupons_num', $setting->single_event_featured_coupons_num) }}" required name='single_event_featured_coupons_num' label='Single event featured coupons number' id='single_event_featured_coupons_num'/>
                                        <small class='error text-danger error-single-event-featured-coupons-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('single_event_last_added_coupons_num', $setting->single_event_last_added_coupons_num) }}" required name='single_event_last_added_coupons_num' label='Single event last added coupons number' id='single_event_last_added_coupons_num'/>
                                        <small class='error text-danger error-single-event-last-added-coupons-num'></small>                                            
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Store Coupons Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.input type='number' value="{{ old('store_coupons_featured_num', $setting->store_coupons_featured_num) }}" required name='store_coupons_featured_num' label='store coupons featured number' id='store_coupons_featured_num'/>
                                        <small class='error text-danger error-store-coupons-featured-num'></small>

                                        <x-admin.form.input type='month' value="{{ old('store_coupons_specific_month', $setting->store_coupons_specific_month) }}" required name='store_coupons_specific_month' label='Store coupons specific month' id='store_coupons_specific_month'/>
                                        <small class='error text-danger error-store-coupons-specific-month'></small>

                                        <x-admin.form.input type='number' value="{{ old('store_specific_month_coupons_num', $setting->store_specific_month_coupons_num) }}" required name='store_specific_month_coupons_num' label='store specific month coupons number' id='store_specific_month_coupons_num'/>
                                        <small class='error text-danger error-store-specific-month-coupons-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('store_latest_coupons_offers_num', $setting->store_latest_coupons_offers_num) }}" required name='store_latest_coupons_offers_num' label='Store latest coupons offers number' id='store_latest_coupons_offers_num'/>
                                        <small class='error text-danger error-store-latest-coupons-offers-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('store_expired_coupons_num', $setting->store_expired_coupons_num) }}" required name='store_expired_coupons_num' label='Store expired coupons number' id='store_expired_coupons_num'/>
                                        <small class='error text-danger error-store-expired-coupons-num'></small>
                                        
                                        
                                        <div class="col-lg-12">
                                            <label class='form-label' for="top_stores_ids">TOP NEGOZI</label>
                                            <div class="input-group" >
                                                <select multiple name='top_stores_ids[]' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                    @foreach($stores as $key => $store)
                                                        <option {{ in_array($key, explode(',', $setting->top_stores_ids)) ? 'selected' : '' }} value='{{ $key }}'>{{ $store }}</option>
                                                    @endforeach
                                                </select>

                                                @error('top_stores_ids')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Category Coupons Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.input type='number' value="{{ old('category_coupons_featured_num', $setting->category_coupons_featured_num) }}" required name='category_coupons_featured_num' label='Category coupons featured number' id='category_coupons_featured_num'/>
                                        <small class='error text-danger error-store-coupons-featured-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('category_coupons_num', $setting->category_coupons_num) }}" required name='category_coupons_num' label='Category coupons num' id='category_coupons_num'/>
                                        <small class='error text-danger error-category-coupons-num'></small>
                                        
                                        
                                        <div class="row">
                                            
                                            <div class="col-lg-6">
                                                <label class='form-label' for="navbar_categories_order_by">Navbar Categories Order By</label>
                                                <div class="input-group" >
                                                    <select name='navbar_categories_order_by' class="form-control" aria-hidden="true">
                                                        
                                                        <option {{ $setting->navbar_categories_order_by == 'id' ? 'selected' : '' }} value='id'>Category ID</option>
                                                        <option {{ $setting->navbar_categories_order_by == 'name' ? 'selected' : '' }} value='name'>Category Name</option>
                                                        <option {{ $setting->navbar_categories_order_by == 'created_at' ? 'selected' : '' }} value='created_at'>Last Created</option>
                                                        <option {{ $setting->navbar_categories_order_by == 'updated_at' ? 'selected' : '' }} value='updated_at'>Last Updated</option>
                                                            
                                                    </select>
    
                                                    @error('navbar_categories_order_by')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
    
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <label class='form-label' for="navbar_categories_order_type">Navbar Categories Order Type</label>
                                                <div class="input-group" >
                                                    <select name='navbar_categories_order_type' class="form-control" aria-hidden="true">
                                                        
                                                        <option {{ $setting->navbar_categories_order_type == 'ASC' ? 'selected' : '' }} value='ASC'>ASC</option>
                                                        <option {{ $setting->navbar_categories_order_type == 'DESC' ? 'selected' : '' }} value='DESC'>DESC</option>
                                                            
                                                    </select>
    
                                                    @error('navbar_categories_order_type')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Sidebar Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.input type='number' value="{{ old('sidebar_related_categories_num', $setting->sidebar_related_categories_num) }}" required name='sidebar_related_categories_num' label='Sidebar related categories number' id='sidebar_related_categories_num'/>
                                        <small class='error text-danger error-sidebar-related-categories-num'></small>

                                        <x-admin.form.input type='number' value="{{ old('sidebar_featured_stores_num', $setting->sidebar_featured_stores_num) }}" required name='sidebar_featured_stores_num' label='Sidebar featured stores num' id='sidebar_featured_stores_num'/>
                                        <small class='error text-danger error-sidebar-featured-stores-num'></small>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Top Coupon Page Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.textarea value="{!! old('top_coupon_page_seo_title', $setting->top_coupon_page_seo_title) !!}" required name='top_coupon_page_seo_title' label='Top Coupon Page Seo Title' id='top_coupon_page_seo_title'/>
                                        <small class='error text-danger error-top-coupon-page-seo-title'></small>

                                        <x-admin.form.textarea value="{!! old('top_coupon_page_seo_description', $setting->top_coupon_page_seo_description) !!}" required name='top_coupon_page_seo_description' label='Top Coupon Page Seo Description' id='top_coupon_page_seo_description'/>
                                        <small class='error text-danger error-top-coupon-page-seo-description'></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Expire Soon Coupon Page Setting</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.textarea value="{!! old('expired_coupon_page_seo_title', $setting->expired_coupon_page_seo_title) !!}" required name='expired_coupon_page_seo_title' label='Expired Coupon Page Seo Title' id='expired_coupon_page_seo_title'/>
                                        <small class='error text-danger error-expired-coupon-page-seo-title'></small>

                                        <x-admin.form.textarea value="{!! old('expired_coupon_page_seo_description', $setting->expired_coupon_page_seo_description) !!}" required name='expired_coupon_page_seo_description' label='Expired Coupon Page Seo Description' id='expired_coupon_page_seo_description'/>
                                        <small class='error text-danger error-expired-coupon-page-seo-description'></small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Additional Scripts</h4><hr class='bg-primary'>
                                        
                                        <x-admin.form.textarea value="{!! old('global_site_tag', $setting->global_site_tag) !!}" required name='global_site_tag' label='Header Scripts' rows='10' id='global_site_tag'/>
                                        <small class='error text-danger error-global-site-tag'></small>
                                        
                                        <x-admin.form.textarea rows='10' value="{!! old('push_engage_notifications', $setting->push_engage_notifications) !!}" required name='push_engage_notifications' label='Footer Scripts' id='push_engage_notifications'/>
                                        <small class='error text-danger error-push-engage-notifications'></small>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <x-admin.form.button extraclasses='update_setting mt-3' type='btn-primary'>Update Setting</x-admin.form.button>
                    </form>
                        
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section("script")

<script src="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/js/select2.min.js"></script>
<script>
    $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
    });
</script>

<script>

    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    $(document).ready(function(){
        $(document).on("click", ".update_setting", function(e){
            e.preventDefault();
            let update_setting_btn = $(this);

            let title = $(this).parents("form").find("input[name='title']").val();
            let subtitle = $(this).parents("form").find("input[name='subtitle']").val();

            let meta_title = $(this).parents("form").find("input[name='meta_title']").val();
            let meta_description = $(this).parents("form").find("input[name='meta_description']").val();

            let special_events_num = $(this).parents("form").find("input[name='special_events_num']").val();
            let latest_stores_num = $(this).parents("form").find("input[name='latest_stores_num']").val();

            let featured_brands_num = $(this).parents("form").find("input[name='featured_brands_num']").val();
            let featured_coupons_num = $(this).parents("form").find("input[name='featured_coupons_num']").val();
            let latest_coupons_num = $(this).parents("form").find("input[name='latest_coupons_num']").val();

            let contact_meta_title = $(this).parents("form").find("input[name='contact_meta_title']").val();
            let contact_meta_description = $(this).parents("form").find("input[name='contact_meta_description']").val();
            
            let top_coupons_featured_num = $(this).parents("form").find("input[name='top_coupons_featured_num']").val();
            let top_coupons_num = $(this).parents("form").find("input[name='top_coupons_num']").val();
            let expiring_soon_coupons_featured_num = $(this).parents("form").find("input[name='expiring_soon_coupons_featured_num']").val();
            let expiring_soon_coupons_num = $(this).parents("form").find("input[name='expiring_soon_coupons_num']").val();
            let single_event_featured_coupons_num = $(this).parents("form").find("input[name='single_event_featured_coupons_num']").val();
            let single_event_last_added_coupons_num = $(this).parents("form").find("input[name='single_event_last_added_coupons_num']").val();

            let store_coupons_featured_num = $(this).parents("form").find("input[name='store_coupons_featured_num']").val();
            let store_coupons_specific_month = $(this).parents("form").find("input[name='store_coupons_specific_month']").val();
            let store_specific_month_coupons_num = $(this).parents("form").find("input[name='store_specific_month_coupons_num']").val();
            let store_latest_coupons_offers_num = $(this).parents("form").find("input[name='store_latest_coupons_offers_num']").val();
            let store_expired_coupons_num = $(this).parents("form").find("input[name='store_expired_coupons_num']").val();
            let top_stores_ids = $(this).parents("form").find("select[name='top_stores_ids[]']").val();

            let category_coupons_featured_num = $(this).parents("form").find("input[name='category_coupons_featured_num']").val();
            let category_coupons_num = $(this).parents("form").find("input[name='category_coupons_num']").val();
            
            let navbar_categories_order_by = $(this).parents("form").find("select[name='navbar_categories_order_by']").val();
            let navbar_categories_order_type = $(this).parents("form").find("select[name='navbar_categories_order_type']").val();
            
            let sidebar_related_categories_num = $(this).parents("form").find("input[name='sidebar_related_categories_num']").val();
            let sidebar_featured_stores_num = $(this).parents("form").find("input[name='sidebar_featured_stores_num']").val();
            
            let top_coupon_page_seo_title = $(this).parents("form").find("textarea[name='top_coupon_page_seo_title']").val();
            let top_coupon_page_seo_description = $(this).parents("form").find("textarea[name='top_coupon_page_seo_description']").val();
            
            let expired_coupon_page_seo_title = $(this).parents("form").find("textarea[name='expired_coupon_page_seo_title']").val();
            let expired_coupon_page_seo_description = $(this).parents("form").find("textarea[name='expired_coupon_page_seo_description']").val();
            
            let global_site_tag = $(this).parents("form").find("textarea[name='global_site_tag']").val();
            let push_engage_notifications = $(this).parents("form").find("textarea[name='push_engage_notifications']").val();
            
            let slider_link_1_title = $(this).parents("form").find("input[name='slider_link_1_title']").val();
            let slider_link_1_link = $(this).parents("form").find("input[name='slider_link_1_link']").val();
            let slider_link_2_title = $(this).parents("form").find("input[name='slider_link_2_title']").val();
            let slider_link_2_link = $(this).parents("form").find("input[name='slider_link_2_link']").val();
            let slider_link_3_title = $(this).parents("form").find("input[name='slider_link_3_title']").val();
            let slider_link_3_link = $(this).parents("form").find("input[name='slider_link_3_link']").val();

            let formdata = new FormData();

            formdata.append('meta_title', meta_title);
            formdata.append('meta_description', meta_description);

            formdata.append('title',title);
            formdata.append('subtitle',subtitle);
            formdata.append('special_events_num',special_events_num);
            formdata.append('latest_stores_num',latest_stores_num);
            formdata.append('featured_brands_num',featured_brands_num);
            formdata.append('featured_coupons_num',featured_coupons_num);
            formdata.append('latest_coupons_num',latest_coupons_num);
            
            formdata.append('contact_meta_title',contact_meta_title);
            formdata.append('contact_meta_description',contact_meta_description);
            
            formdata.append('top_coupons_featured_num',top_coupons_featured_num);
            formdata.append('top_coupons_num',top_coupons_num);
            formdata.append('expiring_soon_coupons_featured_num',expiring_soon_coupons_featured_num);
            formdata.append('expiring_soon_coupons_num',expiring_soon_coupons_num);
            formdata.append('single_event_featured_coupons_num',single_event_featured_coupons_num);
            formdata.append('single_event_last_added_coupons_num',single_event_last_added_coupons_num);
            
            formdata.append('store_coupons_featured_num',store_coupons_featured_num);
            formdata.append('store_coupons_specific_month',store_coupons_specific_month);
            formdata.append('store_specific_month_coupons_num',store_specific_month_coupons_num);
            formdata.append('store_latest_coupons_offers_num',store_latest_coupons_offers_num);
            formdata.append('store_expired_coupons_num',store_expired_coupons_num);
            formdata.append('top_stores_ids',top_stores_ids);

            formdata.append('category_coupons_featured_num',category_coupons_featured_num);
            formdata.append('category_coupons_num',category_coupons_num);
            
            formdata.append('navbar_categories_order_by',navbar_categories_order_by);
            formdata.append('navbar_categories_order_type',navbar_categories_order_type);
            
            formdata.append('sidebar_related_categories_num',sidebar_related_categories_num);
            formdata.append('sidebar_featured_stores_num',sidebar_featured_stores_num);
            
            formdata.append('top_coupon_page_seo_title',top_coupon_page_seo_title);
            formdata.append('top_coupon_page_seo_description',top_coupon_page_seo_description);
            
            formdata.append('expired_coupon_page_seo_title',expired_coupon_page_seo_title);
            formdata.append('expired_coupon_page_seo_description',expired_coupon_page_seo_description);
            
            formdata.append('global_site_tag',global_site_tag);
            formdata.append('push_engage_notifications',push_engage_notifications);
            
            formdata.append('slider_link_1_title',slider_link_1_title);
            formdata.append('slider_link_1_link',slider_link_1_link);
            formdata.append('slider_link_2_title',slider_link_2_title);
            formdata.append('slider_link_2_link',slider_link_2_link);
            formdata.append('slider_link_3_title',slider_link_3_title);
            formdata.append('slider_link_3_link',slider_link_3_link);

            formdata.append('_token',CSRF_TOKEN);
            
            $.ajax({
                url: "{{ route('admin.setting.update') }}",
                method: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response){
                    if(response.success == 1){
                        update_setting_btn.parents("form").find("input[name='meta_title']").val(meta_title)
                        update_setting_btn.parents("form").find("input[name='meta_description']").val(meta_description)

                        update_setting_btn.parents("form").find("input[name='title']").val(title)
                        update_setting_btn.parents("form").find("input[name='subtitle']").val(subtitle)
                        update_setting_btn.parents("form").find("input[name='special_events_num']").val(special_events_num)
                        update_setting_btn.parents("form").find("input[name='latest_stores_num']").val(latest_stores_num)
                        update_setting_btn.parents("form").find("input[name='featured_brands_num']").val(featured_brands_num)
                        update_setting_btn.parents("form").find("input[name='featured_coupons_num']").val(featured_coupons_num)
                        update_setting_btn.parents("form").find("input[name='latest_coupons_num']").val(latest_coupons_num)
                        
                        update_setting_btn.parents("form").find("input[name='contact_meta_title']").val(contact_meta_title)
                        update_setting_btn.parents("form").find("input[name='contact_meta_description']").val(contact_meta_description)

                        update_setting_btn.parents("form").find("input[name='top_coupons_featured_num']").val(top_coupons_featured_num)
                        update_setting_btn.parents("form").find("input[name='top_coupons_num']").val(top_coupons_num)
                        update_setting_btn.parents("form").find("input[name='expiring_soon_coupons_featured_num']").val(expiring_soon_coupons_featured_num)
                        update_setting_btn.parents("form").find("input[name='expiring_soon_coupons_num']").val(expiring_soon_coupons_num)
                        update_setting_btn.parents("form").find("input[name='single_event_featured_coupons_num']").val(single_event_featured_coupons_num)
                        update_setting_btn.parents("form").find("input[name='single_event_last_added_coupons_num']").val(single_event_last_added_coupons_num)
                        
                        update_setting_btn.parents("form").find("input[name='store_coupons_featured_num']").val(store_coupons_featured_num)
                        update_setting_btn.parents("form").find("input[name='store_coupons_specific_month']").val(store_coupons_specific_month)
                        update_setting_btn.parents("form").find("input[name='store_specific_month_coupons_num']").val(store_specific_month_coupons_num)
                        update_setting_btn.parents("form").find("input[name='store_latest_coupons_offers_num']").val(store_latest_coupons_offers_num)
                        update_setting_btn.parents("form").find("input[name='store_expired_coupons_num']").val(store_expired_coupons_num)
                        
                        update_setting_btn.parents("form").find("input[name='category_coupons_featured_num']").val(category_coupons_featured_num)
                        update_setting_btn.parents("form").find("input[name='category_coupons_num']").val(category_coupons_num)
                        update_setting_btn.parents("form").find("select[name='navbar_categories_order_by']").val(navbar_categories_order_by)
                        update_setting_btn.parents("form").find("select[name='navbar_categories_order_type']").val(navbar_categories_order_type)
                        update_setting_btn.parents("form").find("input[name='sidebar_related_categories_num']").val(sidebar_related_categories_num)
                        update_setting_btn.parents("form").find("input[name='sidebar_featured_stores_num']").val(sidebar_featured_stores_num)
                        
                        update_setting_btn.parents("form").find("textarea[name='top_coupon_page_seo_title']").val(top_coupon_page_seo_title)
                        update_setting_btn.parents("form").find("textarea[name='top_coupon_page_seo_description']").val(top_coupon_page_seo_description)
                        
                        update_setting_btn.parents("form").find("textarea[name='expired_coupon_page_seo_title']").val(expired_coupon_page_seo_title)
                        update_setting_btn.parents("form").find("textarea[name='expired_coupon_page_seo_description']").val(expired_coupon_page_seo_description)
                        
                        update_setting_btn.parents("form").find("textarea[name='global_site_tag']").val(global_site_tag)
                        update_setting_btn.parents("form").find("textarea[name='push_engage_notifications']").val(push_engage_notifications)
                        
                        // message success message
                        let message = response.message;
                        $(".success-message").removeClass('d-none').find("div").text(message);
                        update_setting_btn.parents("form").find(".error").text('');

                        setTimeout(() => {
                            $(".success-message").addClass('d-none').find("div").text("");
                        }, 3000);

                        $("html, body").animate({
                            scrollTop: 0
                        }, 600), !1
		
                    }else if(response.success == 0){ 
                        
                        let errors = response.errors;

                        update_setting_btn.parents("form").find(".error-meta-title").text( errors.meta_title );
                        update_setting_btn.parents("form").find(".error-meta-description").text( errors.meta_description );

                        update_setting_btn.parents("form").find(".error-title").text( errors.title );
                        update_setting_btn.parents("form").find(".error-subtitle").text( errors.subtitle );
                        update_setting_btn.parents("form").find(".error-special-events-num").text( errors.special_events_num );
                        update_setting_btn.parents("form").find(".error-latest-stores-num").text( errors.latest_stores_num );
                        update_setting_btn.parents("form").find(".error-featured-brands-num").text( errors.featured_brands_num );
                        update_setting_btn.parents("form").find(".error-featured-coupons-num").text( errors.featured_coupons_num );
                        update_setting_btn.parents("form").find(".error-latest-coupons-num").text( errors.latest_coupons_num );
                        update_setting_btn.parents("form").find(".error-contact-meta-title").text( errors.contact_meta_title );
                        update_setting_btn.parents("form").find(".error-contact-meta-description").text( errors.contact_meta_description );

                        update_setting_btn.parents("form").find(".error-top-coupons-featured-num").text( errors.top_coupons_featured_num );
                        update_setting_btn.parents("form").find(".error-top-coupons-num").text( errors.top_coupons_num );
                        update_setting_btn.parents("form").find(".error-expiring-soon-coupons-featured-num").text( errors.expiring_soon_coupons_featured_num );
                        update_setting_btn.parents("form").find(".error-expiring-soon-coupons-num").text( errors.expiring_soon_coupons_num );
                        update_setting_btn.parents("form").find(".error-single-event-featured-coupons-num").text( errors.single_event_featured_coupons_num );
                        update_setting_btn.parents("form").find(".error-single-event-last-added-coupons-num").text( errors.single_event_last_added_coupons_num );
                        
                        update_setting_btn.parents("form").find(".error-store-coupons-featured-num").text( errors.store_coupons_featured_num );
                        update_setting_btn.parents("form").find(".error-store-coupons-specific-month").text( errors.store_coupons_specific_month );
                        update_setting_btn.parents("form").find(".error-store-specific-month-coupons-num").text( errors.store_specific_month_coupons_num );
                        update_setting_btn.parents("form").find(".error-store-latest-coupons-offers-num").text( errors.store_latest_coupons_offers_num );
                        update_setting_btn.parents("form").find(".error-store-expired-coupons-num").text( errors.store_expired_coupons_num );

                        update_setting_btn.parents("form").find(".error-category-coupons-featured-num").text( errors.category_coupons_featured_num );
                        update_setting_btn.parents("form").find(".error-category-coupons-num").text( errors.category_coupons_num );
                        
                        update_setting_btn.parents("form").find(".error-navbar-categories-order-by").text( errors.navbar_categories_order_by );
                        update_setting_btn.parents("form").find(".error-navbar-categories-order-type").text( errors.navbar_categories_order_type );
                        
                        update_setting_btn.parents("form").find(".error-sidebar-related-categories-num").text( errors.sidebar_related_categories_num );
                        update_setting_btn.parents("form").find(".error-sidebar-featured-stores-num").text( errors.sidebar_featured_stores_num );
                        
                    }
                }
            })
        })
    })
</script>
@endsection