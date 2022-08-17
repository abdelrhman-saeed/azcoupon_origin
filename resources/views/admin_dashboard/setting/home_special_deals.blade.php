
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
                <div class="breadcrumb-title pe-3">Home Deals Setting</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Home Deals</li>
                        </ol>
                    </nav>
                </div>
            </div>
                  
            <div class="card">
                <div class="card-body p-4">

                    <div class="success-message d-none card bg-info bg-gradient text-center">
                        <div class="p-4 text-white rounded fw-bold"></div>
                    </div>

                    <form action="{{ route('admin.setting.updatehomedeals') }}" method='POST'>
                        @csrf
                        
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <h4>Home Special Deals</h4><hr class='bg-primary'>
                                        
                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label class='form-label' for="related_store_id">Related Store</label>
                                                <div class="input-group">
                                                    <select name='related_store_id' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        @foreach($stores as $key => $store)
                                                            <option {{ $key == $home_special_deals?->related_store_id ? 'selected' : '' }} value='{{ $key }}'>{{ $store }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('related_store_id')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <x-admin.form.input value="{{ old('deal_1_title', $home_special_deals?->deal_1_title) }}" name='deal_1_title' label='Deal 1 title' id='setting_deal_1_title'/>
                                        <small class='error text-danger error-deal-1-title'></small>
                                        
                                        <x-admin.form.input type='url' value="{{ old('deal_1_link', $home_special_deals?->deal_1_link) }}" name='deal_1_link' label='Deal 1 link' id='setting_deal_1_link'/>
                                        <small class='error text-danger error-deal-1-link'></small>
                                        
                                        <div class="card">
                                            <div class="card-body p-4">
                                                
                                                <div class='row'>
                                                    <div class='col-md-8'>
                                                        <x-admin.form.input name='deal_1_thumbnail' type='file' label='Deal 1 Thumbnail' id='deal_1_thumbnail'/>
                                                    </div>
                                                    @if($home_special_deals?->deal_1_thumbnail)
                                                        <div class='col-md-4 text-center'>
                                                            <img width='200' src="{{ asset('storage/' . $home_special_deals?->deal_1_thumbnail) }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <x-admin.form.input value="{{ old('deal_2_title', $home_special_deals?->deal_2_title) }}" name='deal_2_title' label='Deal 2 title' id='setting_deal_2_title'/>
                                        <small class='error text-danger error-deal-2-title'></small>
                                        
                                        <x-admin.form.input type='url' value="{{ old('deal_2_link', $home_special_deals?->deal_2_link) }}" name='deal_2_link' label='Deal 2 link' id='setting_deal_2_link'/>
                                        <small class='error text-danger error-deal-2-link'></small>
                                        
                                        <div class="card">
                                            <div class="card-body p-4">
                                                
                                                <div class='row'>
                                                    <div class='col-md-8'>
                                                        <x-admin.form.input name='deal_2_thumbnail' type='file' label='Deal 2 Thumbnail' id='deal_2_thumbnail'/>
                                                    </div>
                                                    @if($home_special_deals?->deal_2_thumbnail)
                                                        <div class='col-md-4 text-center'>
                                                            <img width='200' src="{{ asset('../mycoupons.hk_core/storage/app/public/' . $home_special_deals?->deal_2_thumbnail) }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <x-admin.form.input value="{{ old('deal_3_title', $home_special_deals?->deal_3_title) }}" name='deal_3_title' label='Deal 3 title' id='setting_deal_3_title'/>
                                        <small class='error text-danger error-deal-3-title'></small>
                                        
                                        <x-admin.form.input type='url' value="{{ old('deal_3_link', $home_special_deals?->deal_3_link) }}" name='deal_3_link' label='Deal 3 link' id='setting_deal_3_link'/>
                                        <small class='error text-danger error-deal-3-link'></small>
                                        
                                        <div class="card">
                                            <div class="card-body p-4">
                                                
                                                <div class='row'>
                                                    <div class='col-md-8'>
                                                        <x-admin.form.input name='deal_3_thumbnail' type='file' label='Deal 3 Image' id='deal_3_thumbnail'/>
                                                    </div>
                                                    @if($home_special_deals?->deal_3_thumbnail)
                                                        <div class='col-md-4 text-center'>
                                                            <img width='200' src="{{ asset('../mycoupons.hk_core/storage/app/public/' . $home_special_deals?->deal_3_thumbnail) }}" alt="">
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>

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

            let related_store_id = $(this).parents("form").find("select[name='related_store_id']").val();
            let deal_1_title = $(this).parents("form").find("input[name='deal_1_title']").val();
            let deal_2_title = $(this).parents("form").find("input[name='deal_2_title']").val();
            let deal_3_title = $(this).parents("form").find("input[name='deal_3_title']").val();
            
            let deal_1_link = $(this).parents("form").find("input[name='deal_1_link']").val();
            let deal_2_link = $(this).parents("form").find("input[name='deal_2_link']").val();
            let deal_3_link = $(this).parents("form").find("input[name='deal_3_link']").val();
            
            let file1 = $(this).parents("form").find("input[type='file']")[0].files;
            let file2 = $(this).parents("form").find("input[type='file']")[1].files;
            let file3 = $(this).parents("form").find("input[type='file']")[2].files;

            let formdata = new FormData();
            
            if( file1.length > 0 )
                formdata.append( 'deal_1_thumbnail',file1[0] );
            if( file2.length > 0 )
                formdata.append( 'deal_2_thumbnail',file2[0] );
            if( file3.length > 0 )
                formdata.append( 'deal_3_thumbnail',file3[0] );

            formdata.append('related_store_id', related_store_id);
            formdata.append('deal_1_title', deal_1_title);
            formdata.append('deal_2_title', deal_2_title);
            formdata.append('deal_3_title', deal_3_title);
            
            formdata.append('deal_1_link', deal_1_link);
            formdata.append('deal_2_link', deal_2_link);
            formdata.append('deal_3_link', deal_3_link);
            
            formdata.append('_token', CSRF_TOKEN);
            
            $.ajax({
                url: "{{ route('admin.setting.updatehomedeals') }}",
                method: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response){
                    if(response.success == 1){
                        
                        update_setting_btn.parents("form").find("select[name='related_store_id']").val(related_store_id)
                        update_setting_btn.parents("form").find("input[name='deal_1_title']").val(deal_1_title)
                        update_setting_btn.parents("form").find("input[name='deal_2_title']").val(deal_2_title)
                        update_setting_btn.parents("form").find("input[name='deal_3_title']").val(deal_3_title)
                        
                        update_setting_btn.parents("form").find("input[name='deal_1_link']").val(deal_1_link)
                        update_setting_btn.parents("form").find("input[name='deal_2_link']").val(deal_2_link)
                        update_setting_btn.parents("form").find("input[name='deal_3_link']").val(deal_3_link)
                        
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

                        update_setting_btn.parents("form").find(".error-related-store_-id").text( errors.related_store_id );
                        update_setting_btn.parents("form").find(".error-deal-1-title").text( errors.deal_1_title );
                        update_setting_btn.parents("form").find(".error-deal-2-title").text( errors.deal_2_title );
                        update_setting_btn.parents("form").find(".error-deal-3-title").text( errors.deal_3_title );
                        
                        update_setting_btn.parents("form").find(".error-deal-1-link").text( errors.deal_1_link );
                        update_setting_btn.parents("form").find(".error-deal-2-link").text( errors.deal_2_link );
                        update_setting_btn.parents("form").find(".error-deal-3-link").text( errors.deal_3_link );
                        
                        update_setting_btn.parents("form").find(".error-deal-1-thumbnail").text( errors.deal_1_thumbnail );
                        update_setting_btn.parents("form").find(".error-deal-2-thumbnail").text( errors.deal_2_thumbnail );
                        update_setting_btn.parents("form").find(".error-deal-3-thumbnail").text( errors.deal_3_thumbnail );
                    }
                }
            })
        })
    })
</script>

@endsection