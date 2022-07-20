
@extends("admin_dashboard.layouts.app")

@section("style")
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let loadingTinyMCE = (element_selected, images_folder) => {

        tinymce.init({
            selector: element_selected,
            resize :true,
            image_class_list: [ {title: 'img-responsive', value: 'img-responsive'}],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                'advlist autolink lists link image charmap print preview anchor code',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste imagetools wordcount'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code | rtl ltr',
            toolbar_mode: 'floating',

            image_title: true,
            automatic_uploads: true,
        
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                let route = "{{ route('admin.upload_tiny_image', ':images_folder') }}";
                route = route.replace(':images_folder', images_folder);

                xhr.open('POST', route);
                
                xhr.onload = function() {
                    var json;
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
                    json = JSON.parse(xhr.responseText);
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
                    success( json.location );
                };
                formData = new FormData();
                formData.append('_token', document.querySelector("[name='_token']").value);
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        });
    };
    
    loadingTinyMCE('#about_store', 'about_stores');
    loadingTinyMCE('.widget_description', 'tiny_widgets');
</script>
@endsection

    
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
                            <li class="breadcrumb-item active" aria-current="page">Events</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
            <x-admin.flashes.success :status="'error'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Edit Event</h5>
                  <hr/>
                    <form action="{{ route('admin.events.update', $event) }}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        @method('PATCH')

                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                    <x-admin.form.input value="{!! old('name', $event->name) !!}" required name='name' label='Event Name' id='event_name'/>
                                        <x-admin.form.input value="{{ old('slug', $event->slug) }}" name='slug' required label='Event Slug' id='event_slug'/>
                                        
                                        <x-admin.form.input value="{!! old('seo_title', $event->seo_title) !!}" name='seo_title' label='Event Seo Title' id='event_seo_title'/>
                                        <x-admin.form.textarea value="{!! old('seo_description', $event->seo_description) !!}" name='seo_description' label='Event Seo Description' id='event_seo_description'/>
                                        <x-admin.form.textarea value="{{ old('description', $event->description) }}" name='description' label='Event Description' id='event_description'/>
                                        <x-admin.form.textarea value="{{ old('another_description', $event->another_description) }}" name='another_description' label='another Event Description' id='another_event_description'/>
                                        
                                        <x-admin.form.input name='banner' type='file' label='Event Banner (1200 x 250)' id='event_banner'/>
                                        
                                        <div class='banner mb-3'>
                                            <img src="{{ strlen($event->banner) == 0 || $event->banner == '' ? asset("admin_assets/images/banners/banner.webp") : asset("storage/" . $event->banner) }}" alt="Event Banner" class='img-fluid'>
                                        </div>

                                        <x-admin.form.input value="{!! old('banner_title', $event->banner_title) !!}" name='banner_title' label='Event Banner Title' id='event_banner_title'/>
                                        <x-admin.form.input value="{!! old('banner_subtitle', $event->banner_subtitle) !!}" name='banner_subtitle' label='Event Banner Subtitle' id='event_banner_subtitle'/>

                                        <div class='row'>
                                            <div class="col-lg-6">
                                                <label for="single_event">Single Event or Special Event</label>
                                                <small class='text-info d-block mb-3'>Please Note: Just one event can be single event in the front navbar. if you add a single event you will overrite the old one.</small>
                                            </div>

                                            <div class="col-lg-6">

                                                <div class="input-group" >

                                                    <select name='single_event' id='single_event' class="form-control">
                                                        <option {{ $event->single_event ? '' : 'selected' }} value='0'>Special Event</option>
                                                        <option {{ $event->single_event ? 'selected' : '' }} value='1'>Single Event</option>
                                                    </select>

                                                    @error('single_event')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>


                                        <p class='text-center'>
                                            <button class="btn btn-info form-control open-wedget-area-btn1" type="button" data-toggle="collapse" data-target="#widget-area" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="bx bx-plus-circle"></i> Add Widget
                                            </button>
                                        </p>

                                        <div id="widget-area1" class='d-none'>
                                            <div class="card card-body">

                                                <x-admin.form.input name='w_title[]' label='Widget Title' id='widget_title'/>
                                            
                                                <x-admin.form.textarea name='w_description[]' label='Widget Description' class='widget_description'  id='widget_description1' rows="3"/>
                                                
                                                <x-admin.form.input type='number' name='w_order[]' label='Widget Order' id='widget_order'/>
                                            
                                            </div>

                                            <a href="#" class='btn btn-info form-control open-wedget open-wedget-area-btn2 mb-2'>
                                                <i class="bx bx-plus-circle"></i> Add Widget
                                            </a>

                                        </div>

                                        <div id="widget-area2" class='d-none'>
                                            <div class="card card-body">

                                                <x-admin.form.input name='w_title[]' label='Widget Title' id='widget_title'/>
                                            
                                                <x-admin.form.textarea name='w_description[]' label='Widget Description' class='widget_description' id='widget_description2' rows="3"/>
                                                
                                                <x-admin.form.input type='number' name='w_order[]' label='Widget Order' id='widget_order'/>
                                            
                                            </div>

                                            <a href="#" class='btn btn-info form-control open-wedget open-wedget-area-btn3 mb-2'>
                                                <i class="bx bx-plus-circle"></i> Add Widget
                                            </a>

                                        </div>

                                        <div id="widget-area3" class='d-none'>
                                            <div class="card card-body">

                                                <x-admin.form.input name='w_title[]' label='Widget Title' id='widget_title'/>
                                            
                                                <x-admin.form.textarea name='w_description[]' label='Widget Description' class='widget_description' id='widget_description3' rows="3"/>
                                                
                                                <x-admin.form.input type='number' name='w_order[]' label='Widget Order' id='widget_order'/>
                                            
                                            </div>

                                        </div>

                                        <x-admin.form.button type='btn-primary'>Update Event</x-admin.form.button>
                                        
                                        <a href='#' 
                                        onclick="
                                            if( confirm('You are gonna delete event permanently, proceed ?') == true ) { event.preventDefault();document.getElementById('delete_event_form').submit(); }" 
                                            class='btn btn-danger px-5'>Delete Event</a>
                                            
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                    </form>

                    <form class='hidden' id='delete_event_form' action="{{ route('admin.events.destroy', $event) }}" method='POST'>
                        @csrf @method('DELETE')
                    </form>


                    <!-- Event Widgets -->


                    <div class="row row-cols-1 row-cols-md-1 row-cols-xl-1">
                        <h6 class='m-2 mb-4'>Event Widgets</h6>
                        @foreach($event->widgets as $widget)
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
                                                    <p>{!! str_replace( '../../', '../../../', $widget->description) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <hr>

                                    <div class='actions'>

                                        <a target='_blank' href="{{ route('admin.widgets.edit', $widget) }}" class='btn btn-primary btn-sm'>Edit</a>
                                        
                                        <a 
                                        onclick="
                                            if( confirm('You are gonna delete widget permanently, proceed ?') == true ) { event.preventDefault();document.querySelector('#widget_delete_form_{{ $widget->id }}').submit(); }" 
                                        href="#" 
                                        class="ms-1 text-white btn btn-danger btn-sm">Delete</a>
                                    
                                        <form method='POST' action="{{ route('admin.widgets.destroy', $widget) }}" class='hidden' id='widget_delete_form_{{$widget->id}}'>
                                            @csrf
                                            @method('DELETE')

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section("script")
    <script>
        $(document).on('input', '#event_name', () => {
            let name = $("#event_name").val();
            let slug = name.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
            $('#event_slug').val( slug );
        })

        $(".open-wedget-area-btn1").on("click", (e) => {
            if( $("#widget-area1").hasClass('d-none') ) {
                $("#widget-area1").removeClass('d-none');
                $(e.target).find(".bx-plus-circle").removeClass('bx-plus-circle').addClass("bx-minus-circle");
            }
            else { 
                $("#widget-area1").addClass('d-none');
                $(e.target).find(".bx-minus-circle").removeClass('bx-minus-circle').addClass("bx-plus-circle");
            }
        });

        $(".open-wedget-area-btn2").on("click", (e) => {
            if( $("#widget-area2").hasClass('d-none') ) {
                $("#widget-area2").removeClass('d-none');
                $(e.target).find(".bx-plus-circle").removeClass('bx-plus-circle').addClass("bx-minus-circle");
            }
            else { 
                $("#widget-area2").addClass('d-none');
                $(e.target).find(".bx-minus-circle").removeClass('bx-minus-circle').addClass("bx-plus-circle");
            }
        });

        $(".open-wedget-area-btn3").on("click", (e) => {
            if( $("#widget-area3").hasClass('d-none') ) {
                $("#widget-area3").removeClass('d-none');
                $(e.target).find(".bx-plus-circle").removeClass('bx-plus-circle').addClass("bx-minus-circle");
            }
            else { 
                $("#widget-area3").addClass('d-none');
                $(e.target).find(".bx-minus-circle").removeClass('bx-minus-circle').addClass("bx-plus-circle");
            }
        });

        $(".open-wedget").on("click", (e) => {
            e.preventDefault();
        });
    </script>
@endsection