
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
    loadingTinyMCE('.widget_description', 'tiny_widgets');
</script>
@endsection
    
    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="breadcrumb-title pe-3">Categories</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">New Category</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Add New Category</h5>
                  <hr/>
                    <form action="{{ route('admin.categories.store') }}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">

                                        <x-admin.form.input value="{!! old('seo_title') !!}" required name='seo_title' label='Category Seo Title' id='category_seo_title'/>
                                        
                                        <x-admin.form.input value="{!! old('name') !!}" required name='name' label='Category Name' id='category_name'/>
                                        
                                        <x-admin.form.input value="{{ old('slug') }}" name='slug' required label='Category Slug' id='category_slug'/>

                                        <x-admin.form.textarea value="{!! old('description') !!}" name='description' label='Category Description' id='category_description' rows="3"/>
                                        
                                        <x-admin.form.input value="{!! old('side_title') !!}" name='side_title' label='Category Side Title' id='category_side_title'/>
                                        <x-admin.form.textarea value="{!! old('side_description') !!}" name='side_description' label='Category Side Description' id='category_side_description' rows="3"/>
                                        
                                        <div class="card">
                                            <div class="card-body p-4">
                                                
                                                <x-admin.form.input name='image' type='file' required label='Category Image (100 x 100)' id='category_image'/>
                                                <div class='row'>
                                                    <div class='col-sm-6'>
                                                        <x-admin.form.input name='image_alt' type='text' label='Image Alt' id='image_alt'/>
                                                    </div>
                                                    <div class='col-sm-6'>
                                                        <x-admin.form.input name='image_title' type='text' label='Image Title' id='image_title'/>
                                                    </div>
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

                                                <x-admin.form.input name='w_title[]' label='Widget Title' id='widget_title1'/>
                                            
                                                <x-admin.form.textarea name='w_description[]' label='Widget Description' class='widget_description'  id='widget_description1' rows="3"/>
                                                
                                                <x-admin.form.input type='number' name='w_order[]' label='Widget Order' id='widget_order'/>
                                            
                                            </div>

                                            <a href="#" class='btn btn-info form-control open-wedget open-wedget-area-btn2 mb-2'>
                                                <i class="bx bx-plus-circle"></i> Add Widget
                                            </a>

                                        </div>

                                        <div id="widget-area2" class='d-none'>
                                            <div class="card card-body">

                                                <x-admin.form.input name='w_title[]' label='Widget Title' id='widget_title2'/>
                                            
                                                <x-admin.form.textarea name='w_description[]' label='Widget Description' class='widget_description' id='widget_description2' rows="3"/>
                                                
                                                <x-admin.form.input type='number' name='w_order[]' label='Widget Order' id='widget_order'/>
                                            
                                            </div>

                                            <a href="#" class='btn btn-info form-control open-wedget open-wedget-area-btn3 mb-2'>
                                                <i class="bx bx-plus-circle"></i> Add Widget
                                            </a>

                                        </div>

                                        <div id="widget-area3" class='d-none'>
                                            <div class="card card-body">

                                                <x-admin.form.input name='w_title[]' label='Widget Title' id='widget_title3'/>
                                            
                                                <x-admin.form.textarea name='w_description[]' label='Widget Description' class='widget_description' id='widget_description3' rows="3"/>
                                                
                                                <x-admin.form.input type='number' name='w_order[]' label='Widget Order' id='widget_order'/>
                                            
                                            </div>

                                        </div>

                                        <x-admin.form.button type='btn-primary'>Add Category</x-admin.form.button>
                                        
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
    <script>
        $(document).on('input', '#category_name', () => {
            let name = $("#category_name").val();
            let slug = name.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
            $('#category_slug').val( slug );
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