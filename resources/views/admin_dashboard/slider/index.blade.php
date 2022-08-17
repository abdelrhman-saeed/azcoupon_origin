
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
                <div class="breadcrumb-title pe-3">Slider</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Home Slider</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                    
                        @csrf
                        @method('PATCH')
                        
                        @foreach($slider as $key => $slide)
                        <form action="{{ route('admin.slider.update') }}" method='POST' enctype='multipart/form-data'>
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">

                                            <div class="form-check mb-3">
                                                <input class="form-check-input" name='enabled' type="checkbox" {{ $slide->enabled ? 'checked' : '' }} id="enable_{{ $slide->id }}">
                                                <label class="form-check-label" for="enable_{{ $slide->id }}">Enable Slide</label>
                                            </div>

                                            <input type="hidden" name='slide_id' value="{{ $slide->id }}">
                                            
                                            <x-admin.form.input value="{{ old('title', $slide->title) }}" required name='title' label='Title' id='slide_title'/>
                                            <small class='error text-danger error-title'></small>

                                            <x-admin.form.input value="{{ old('excerpt', $slide->excerpt) }}" required name='excerpt' label='Excerpt' id='slide_excerpt'/>
                                            <small class='error text-danger error-excerpt'></small>

                                            <x-admin.form.input type='url' value="{{ old('link', $slide->link) }}" required name='link' label='link' id='slide_link'/>
                                            <small class='error text-danger error-link'></small>

                                            <x-admin.form.input type='file' name='slide' label='Slide (300 x 250)' id='slide_slide'/>
                                            <small class='error text-danger error-slide'></small>
                                            
                                            <div class="mb-3">
                                                <label class='form-label' for="related_store">Store</label>
                                                <div class="input-group">
                                                    <select name='related_store' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        @foreach($stores as $key => $store)
                                                            <option {{ $slide->related_store == $key ? 'selected' : '' }} value='{{ $key }}'>{{ $store }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('related_store')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <small class='error text-danger related-store'></small>
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class='success-message'>

                                            </div>
                                            <img 
                                            width='300' 
                                            height='250' 
                                            src="{{ asset("storage/" . $slide->slide) }}" alt="Slider Image" class='img-fluid slide-image'>
                                        
                                            <div class='mt-3'>
                                                <button type="submit" class="btn btn-primary px-5 update_slider form-control">Update Slider</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    

                            
                                </div>
                            </div>

                        </form>
                        @endforeach
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
    
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    $(document).ready(function(){
        $(document).on("click", ".update_slider", function(e){
            e.preventDefault();
            let current_slider = $(this);

            let id = $(this).parents("form").find("input[name='slide_id']").val();

            let title = $(this).parents("form").find("input[name='title']").val();
            let excerpt = $(this).parents("form").find("input[name='excerpt']").val();
            let link = $(this).parents("form").find("input[name='link']").val();
            let related_store = $(this).parents("form").find("select[name='related_store']").val();
            let enabled = $(this).parents("form").find("input[name='enabled']").prop('checked');
            let files = $(this).parents("form").find("input[type='file']")[0].files;

            let formdata = new FormData();

            formdata.append('id',id);
            formdata.append('title',title);
            formdata.append('excerpt',excerpt);
            formdata.append('link',link);
            formdata.append('related_store',related_store);
            formdata.append('enabled', enabled ? '1' : '0');
            formdata.append('_token',CSRF_TOKEN);

            if(files.length > 0){
                formdata.append('slide',files[0]);
            }

            $.ajax({
                url: "{{ route('admin.slider.update') }}",
                method: 'post',
                data: formdata,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response){
                    if(response.success == 1){
                        // change data
                        let filepath = response.filepath;
                        current_slider.parents("form").find("input[name='title']").val(title)
                        current_slider.parents("form").find("input[name='excerpt']").val(excerpt)
                        current_slider.parents("form").find("input[name='link']").val(link)
                        current_slider.parents("form").find("select[name='related_store']").val(related_store)
                        
                        if(filepath)
                            current_slider.parents("form").find(".slide-image").attr('src', '/../mycoupons.hk_core/storage/app/public/' + filepath)
                            
                        // message success message
                        let message = response.message;
                        current_slider.parents("form").find(".success-message").addClass('alert alert-success').text(message);
                        
                        current_slider.parents("form").find(".error").text('');

                        setTimeout(() => {
                            current_slider.parents("form").find(".success-message").removeClass('alert alert-success').text("");
                        }, 3000);

                    }else if(response.success == 0){ 
                        
                        let errors = response.errors;

                        current_slider.parents("form").find(".error-title").text( errors.title );
                        current_slider.parents("form").find(".error-excerpt").text( errors.excerpt );
                        current_slider.parents("form").find(".error-link").text( errors.link );
                        current_slider.parents("form").find(".error-related-store").text( errors.related_store );
                        current_slider.parents("form").find(".error-slide").text( errors.slide );

                    }
                    if(response.global_warning)
                    {
                        $(".global-message").text(response.global_warning)
                        $(".global-message").addClass("alert alert-warning")
                        $(".global-message").fadeIn();

                        setTimeout(() => {
                            $(".global-message").fadeOut();
                        }, 10000);
                    }
                }
            })
        })
    })
</script>
@endsection