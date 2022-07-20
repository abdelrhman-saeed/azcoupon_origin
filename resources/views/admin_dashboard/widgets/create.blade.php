
@extends("admin_dashboard.layouts.app")


@section("style")

    <style>
        .related-event-col, .related-store-col, .related-category-col { display: none; }
    </style>
    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet">

    <!--Editor-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
	tinymce.init({
        selector: '#widget_description',
        resize :true,
        image_class_list: [ {title: 'img-responsive', value: 'img-responsive'}],
        height: 500,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
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
            xhr.open('POST', "{{ route('admin.upload_tiny_image', 'tiny_widgets') }}");
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
  </script>
@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
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
                            <li class="breadcrumb-item active" aria-current="page">New Widget</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Add New Widget</h5>
                  <hr/>
                    <form action="{{ route('admin.widgets.store') }}" method='POST'>
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <x-admin.form.input value="{{ old('title') }}" required name='title' label='Widget Title' id='widget_title'/>
                                        
                                        <x-admin.form.textarea value="{!! old('description') !!}" name='description' label='Widget Description' id='widget_description' rows="3"/>
                                        
                                        <x-admin.form.input type='number' value="{{ old('order') }}" name='order' label='Widget Order' id='widget_order'/>
                                        
                                        <div class="row mb-3">
                                            <div class="col-lg-6 mt-4">
                                                <div class="mb-3">
                                                    <label class='form-label' for="related_sidebar">Related Sidebar</label>
                                                    <div class="input-group">
                                                        <select id='related_sidebar' name='related_sidebar' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                            
                                                            <option value='Topcoupons'>Top Coupons</option>
                                                            <option value='Expiresoon'>Expire Soon Coupons</option>
                                                            <option value='Store'>Store</option>
                                                            <option value='Event'>Event</option>
                                                            <option value='Category'>Category</option>
                                                            
                                                            <option value='Search'>Search Result Page</option>
                                                            
                                                        </select>

                                                        @error('related_sidebar')
                                                            <p class='text-danger'>{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-6 mt-4 related-store-col">
                                                <label class='form-label' for="store_id">Related Store</label>
                                                <div class="input-group">
                                                    <select name='store_id' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        @foreach($stores as $key => $store)
                                                            <option value='{{ $key }}'>{{ $store }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('store_id')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-4 related-event-col">
                                                <label class='form-label' for="event_id">Related Event</label>
                                                <div class="input-group">
                                                    <select name='event_id' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        @foreach($events as $key => $event)
                                                            <option value='{{ $key }}'>{{ $event }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('event_id')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-4 related-category-col">
                                                <label class='form-label' for="category_id">Related Category</label>
                                                <div class="input-group">
                                                    <select name='category_id' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        @foreach($categories as $key => $category)
                                                            <option value='{{ $key }}'>{{ $category }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('category_id')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <x-admin.form.button type='btn-primary'>Add Widget</x-admin.form.button>
                                        
                                    </div>
                                </div>
                        
                            </div>
                        </div>
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
        $(function(){

            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });

            $("#related_sidebar").on("change", (e) => {
                let selected_related_sidebar = $(e.target).val();
                if( selected_related_sidebar === 'Store')
                {
                    $(".related-store-col").fadeIn();

                    $(".related-event-col").fadeOut();
                    $(".related-category-col").fadeOut();
                }
                else if( selected_related_sidebar === 'Event')
                {
                    $(".related-event-col").fadeIn();

                    $(".related-store-col").fadeOut();
                    $(".related-category-col").fadeOut();
                }
                else if( selected_related_sidebar === 'Category')
                {
                    $(".related-category-col").fadeIn();

                    $(".related-event-col").fadeOut();
                    $(".related-store-col").fadeOut();
                }
            });

        });
    </script>
@endsection