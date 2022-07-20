
@extends("admin_dashboard.layouts.app")

@section("style")


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
    loadingTinyMCE('#content', 'top_voucher_codes');

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
                            <li class="breadcrumb-item active" aria-current="page">Top Voucher Codes</li>
                        </ol>
                    </nav>
                </div>
            </div>
            
            <x-admin.flashes.success :status="'success'" />
                  
            <div class="card">
              <div class="card-body p-4">
                  <h5 class="card-title">Top Voucher Codes</h5>
                  <hr/>
                    <form action="{{ route('admin.setting.updatetopvouchercodes') }}" method='POST' enctype='multipart/form-data'>
                        @csrf
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        
                                        <x-admin.form.input value="{{ old('title', $topvouchercodes?->title) }}" name='title' label='Title' id='title'/>
                                        <x-admin.form.textarea value="{!! old('content', $topvouchercodes?->content) !!}" name='content' label='Content' id='content' rows="4"/>

                                        <x-admin.form.button type='btn-primary'>Update Top Voucher Codes</x-admin.form.button>
                                        
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


@endsection