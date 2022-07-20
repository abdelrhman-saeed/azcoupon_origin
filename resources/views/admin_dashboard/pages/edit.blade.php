@extends("admin_dashboard.layouts.app")

@section("style")
    <!--Editor-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js" integrity="sha512-XNYSOn0laKYg55QGFv1r3sIlQWCAyNKjCa+XXF5uliZH+8ohn327Ewr2bpEnssV9Zw3pB3pmVvPQNrnCTRZtCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    	tinymce.init({
            selector: '#content',
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
                xhr.open('POST', "{{ route('admin.upload_tiny_image', 'tiny_static_pages') }}");
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

                <div class="breadcrumb-title pe-3">{{ $page->label }}</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $page->label }} Page</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">{{ $page->label }} Page</h5>
                  <hr/>
                    <form action="{{ route('admin.pages.update', $page) }}" method='POST'>
                        @csrf
                        @method('PUT')
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        
                                        <x-admin.form.input value="{!! old('label', $page->label) !!}" name='label' label='Page Label' id='page_label'/>
                                        
                                        <x-admin.form.input value="{!! old('slug', $page->slug) !!}" required name='slug' label='Page Slug' id='page_slug'/>
                                        
                                        <x-admin.form.input value="{!! old('title', $page->title) !!}" name='title' label='Page Title' id='title'/>
                                        
                                        <x-admin.form.textarea value="{!! old('description', $page->description) !!}" name='description' label='Page Description' id='page_description'/>
                                        
                                        <x-admin.form.textarea value="{!! old('content', $page->content) !!}" name='content' label='Page Content' id='content' rows="6"/>
                                        
                                        <div class='row'>
                                            <div class='col-md-4'>

                                                <div class="form-check form-switch">
                                                    <input {{ $page->active ? 'checked' : '' }} name='active' class="form-check-input" type="checkbox" id="active_checkbox">
                                                    <label class="form-check-label" for="active_checkbox">Active</label>
                                                </div>

                                            </div>
                                        </div>
                                    
                                        <x-admin.form.button type='btn-primary'>Update</x-admin.form.button>
                                        
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
        $(document).on('input', '#page_label', () => {
            let name = $("#page_label").val();
            let slug = name.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
            $('#page_slug').val( slug );
        })
    </script>
@endsection