
@extends("admin_dashboard.layouts.app")

@section("style")

    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="https://creatantech.com/demos/codervent/rocker/vertical/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet">
    
	<style>
        .form-check-label { font-size: 18px; margin-left: .5em;}
        #featured_checkbox, #online_checkbox { width: 3em; }
        .form-check-input {
            height: 1.5em!important;
        }
    </style>
    <!--Editor-->
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
    
    loadingTinyMCE('#about_store_1_description', 'about_stores');
    loadingTinyMCE('#about_store_2_description', 'about_stores');
    loadingTinyMCE('#about_store_3_description', 'about_stores');
    loadingTinyMCE('#about_store_4_description', 'about_stores');
    loadingTinyMCE('#about_store_5_description', 'about_stores');
    loadingTinyMCE('#about_store_6_description', 'about_stores');
    loadingTinyMCE('#about_store_7_description', 'about_stores');
    loadingTinyMCE('#about_store_8_description', 'about_stores');
    loadingTinyMCE('.widget_description', 'tiny_widgets');

</script>
@endsection


    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">

                <div class="breadcrumb-title pe-3">Stores</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">New Store</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Add New Store</h5>
                  <hr/>
                    <form action="{{ route('admin.stores.store') }}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        
                                        <div class='row'>
                                            <div class='col-md-10'>
                                                <x-admin.form.input
                                                            notes='To Add DATE in your SEO Title Just Add phrase "(v_date)" at any place you want'
                                                            value="{{ old('seo_title') }}" required
                                                            name='seo_title'
                                                            label='Store SEO Title'
                                                            id='store_seo_title'/>
                                            </div>
                                            <div class='col-md'>
                                                <label class='d-block mb-4'></label>
                                                <button class='btn btn-success btn-sm add-v-date for-title'>V Date</button>
                                            </div>
                                        </div>
                                        
                                        <div class='row'>
                                            <div class='col-md-10'>
                                                <x-admin.form.textarea notes='To Add DATE in your SEO Description Just Add phrase "(v_date)" at any place you want' value="{{ old('seo_description') }}" required name='seo_description' label='Store SEO Description' rows="3" id='store_seo_description'/>
                                            </div>
                                            <div class='col-md'>
                                                <label class='d-block mb-4'></label>
                                                <button class='btn btn-success btn-sm add-v-date for-description'>V Date</button>
                                            </div>
                                        </div>

                                        <x-admin.form.input value="{{ old('name') }}" required name='name' label='Store Name' id='store_name'/>
                                        
                                        <x-admin.form.input value="{{ old('slug') }}" name='slug' required label='Store Slug' id='store_slug'/>

                                        <div class='row'>
                                            <div class='col-md-10'>
                                                <x-admin.form.input
                                                            notes='To Add DATE in your Store Title Just Add phrase "(v_date)" at any place you want'
                                                            value="{{ old('title') }}"
                                                            name='title' required
                                                            label='Store Title'
                                                            id='store_title'/>
                                            </div>
                                            <div class='col-md'>
                                                <label class='d-block mb-4'></label>
                                                <button class='btn btn-success btn-sm add-v-date for-title'>V Date</button>
                                            </div>
                                        </div>

                                        <x-admin.form.input value="{{ old('aff_link') }}" name='aff_link' type='url' label='Store Affiliate Link' id='store_aff_link'/>
                                        
                                        <x-admin.form.input value="{{ old('link') }}" name='link' type='url' label='Store Link' id='store_link'/>

                                        <div class="row mb-3">
                                            
                                            <div class="col-lg-4">
                                                <label class='form-label' for="store_degree">Store Degree</label>
                                                <div class="input-group">
                                                    
                                                    <select name='store_degree' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                        <option value='premium'>Premium</option>
                                                        <option value='medium'>Medium</option>
                                                        <option value='lower'>Lower</option>
                                                    </select>

                                                    @error('store_degree')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-8">
                                                <label class='form-label' for="store_degree">Store Categories</label>
                                                
                                                <div class="input-group" >
                                                    <select required multiple name='category_ids[]' class="single-select form-select select2-hidden-accessible" aria-hidden="true">
                                                            <option value='All'>All Categories</option>
                                                    @foreach($categories as $key => $category)
                                                            category_ids
                                                            <option value='{{ $key }}'>{{ $category }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('category_ids')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror

                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="card">
                                            <div class="card-body p-4">
                                        
                                                <div class="row mb-3">
                                                    
                                                    <div class="col-lg-12">
                                                        
                                                        <x-admin.form.input name='image' type='file' required label='Store Image ( Recommended: 100 x 100 )' id='store_image'/>
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                        <x-admin.form.input name='image_alt' type='text' label='Image Alt' id='image_alt'/>
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                        <x-admin.form.input name='image_title' type='text' label='Image Title' id='image_title'/>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <x-admin.form.input value="{{ old('about_store_1_title') }}" name='about_store_1_title' label='About Store title (1)' id='about_store_1_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_1_description') }}" name='about_store_1_description' label='About Store Description (1)' id='about_store_1_description' rows="4"/>
                                        
                                        <x-admin.form.input value="{{ old('about_store_2_title') }}" name='about_store_2_title' label='About Store title (2)' id='about_store_2_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_2_description') }}" name='about_store_2_description' label='About Store Description (2)' id='about_store_2_description' rows="4"/>
                                        
                                        <x-admin.form.input value="{{ old('about_store_3_title') }}" name='about_store_3_title' label='About Store title (3)' id='about_store_3_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_3_description') }}" name='about_store_3_description' label='About Store Description (3)' id='about_store_3_description' rows="4"/>
                                        
                                        <x-admin.form.input value="{{ old('about_store_4_title') }}" name='about_store_4_title' label='About Store title (4)' id='about_store_4_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_4_description') }}" name='about_store_4_description' label='About Store Description (4)' id='about_store_4_description' rows="4"/>
                                        
                                        <x-admin.form.input value="{{ old('about_store_5_title') }}" name='about_store_5_title' label='About Store title (5)' id='about_store_5_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_5_description') }}" name='about_store_5_description' label='About Store Description (5)' id='about_store_5_description' rows="4"/>
                                        
                                        <x-admin.form.input value="{{ old('about_store_6_title') }}" name='about_store_6_title' label='About Store title (6)' id='about_store_6_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_6_description') }}" name='about_store_6_description' label='About Store Description (6)' id='about_store_6_description' rows="4"/>
                                        
                                        <x-admin.form.input value="{{ old('about_store_7_title') }}" name='about_store_7_title' label='About Store title (7)' id='about_store_7_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_7_description') }}" name='about_store_7_description' label='About Store Description (7)' id='about_store_7_description' rows="4"/>
                                        
                                        <x-admin.form.input value="{{ old('about_store_8_title') }}" name='about_store_8_title' label='About Store title (8)' id='about_store_8_title'/>
                                        <x-admin.form.textarea value="{{ old('about_store_8_description') }}" name='about_store_8_description' label='About Store Description (8)' id='about_store_8_description' rows="4"/>

                                        <div class="row mb-3">
                                            
                                            <div class='col-md-4'>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name='featured' id="featured_checkbox">
                                                    <label class="form-check-label" for="featured_checkbox">Featured</label>
                                                
                                                    @error('featured')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class='col-md-4'>

                                                <div class="form-check form-switch">
                                                    <input checked class="form-check-input" type="checkbox" name='online' id="online_checkbox">
                                                    <label class="form-check-label" for="online_checkbox">Online</label>
                                                
                                                    @error('online')
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

                                        <x-admin.form.button type='btn-primary'>Add Store</x-admin.form.button>
                                        
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
        $(document).on('input', '#store_name', () => {
            let name = $("#store_name").val();
            let slug = name.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
            $('#store_slug').val( slug );
        });

        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
            
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
        
        $(".add-v-date").on("click", (e) => {
            e.preventDefault();

            let $this = e.target;
            if( $($this).hasClass('for-title') ) {
                insertAtCaret($this.parentElement.parentElement.getElementsByTagName('input')[0].id, " (v_date) ");
                return false
            }
            insertAtCaret("store_seo_description", " (v_date) ");
        });
        
        function insertAtCaret(id, text) {
          var txtarea = document.getElementById(id);
            if (!txtarea) {
                return;
            }
            console.log(txtarea)

            var scrollPos = txtarea.scrollTop;
            var strPos = 0;
          var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
            "ff" : (document.selection ? "ie" : false));
          if (br == "ie") {
            txtarea.focus();
            var range = document.selection.createRange();
            range.moveStart('character', -txtarea.value.length);
            strPos = range.text.length;
          } else if (br == "ff") {
            strPos = txtarea.selectionStart;
          }
        
          var front = (txtarea.value).substring(0, strPos);
          var back = (txtarea.value).substring(strPos, txtarea.value.length);
          txtarea.value = front + text + back;
          strPos = strPos + text.length;
          if (br == "ie") {
            txtarea.focus();
            var ieRange = document.selection.createRange();
            ieRange.moveStart('character', -txtarea.value.length);
            ieRange.moveStart('character', strPos);
            ieRange.moveEnd('character', 0);
            ieRange.select();
          } else if (br == "ff") {
            txtarea.selectionStart = strPos;
            txtarea.selectionEnd = strPos;
            txtarea.focus();
          }
          txtarea.scrollTop = scrollPos;
        }
        
        
    </script>
@endsection