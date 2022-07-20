
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
                <div class="breadcrumb-title pe-3">Footer Links</div>

                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Footer Links</li>
                        </ol>
                    </nav>
                </div>
            </div>
                  
            <div class="card">
                <div class="card-body p-4">

                    <div class="success-message d-none card bg-info bg-gradient text-center">
                        <div class="p-4 text-white rounded fw-bold"></div>
                    </div>

                    <form action="{{ route('admin.setting.updatefooter') }}" method='POST'>
                        @csrf
                        
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded links-container">

                                        <h4>Footer Links</h4><hr class='bg-primary'>
                                        
                                        @foreach($footer_links as $link)
                                        <div class='row'>
                                            <a href='#' class='text-danger btn-lg delete-link-row'><i class="bx bx-minus-circle"></i></a>
                                            <div class='col-md-4'>
                                                <x-admin.form.input value="{{ old('text', $link->text) }}" name='text[]' label='Link Text' id='text'/>
                                                @error('text')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class='col-md-4'>
                                                <x-admin.form.input type='url' value="{{ old('link', $link->link) }}" id='link' name='link[]' label='Link'/>
                                                @error('link')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class='col-md-2'>
                                                <x-admin.form.input type='number' value="{{ old('link_order', $link->link_order) }}" id='link_order' name='link_order[]' label='Link Order'/>
                                                @error('link_order')
                                                    <p class='text-danger'>{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                            <div class='col-md-2'>
                                                <div class="form-check form-switch mt-3">
                                                    <input {{ $link->active ? 'checked' : '' }} class="form-check-input" type="checkbox" name='active[]' id="active_checkbox">
                                                    <label class="form-check-label" for="active_checkbox">Active</label>
                                                
                                                    @error('active')
                                                        <p class='text-danger'>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                    
                                    <a href="#" class='btn btn-info form-control new-link mb-2'>
                                        <i class="bx bx-plus-circle"></i> Add Link
                                    </a>
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
    <script>
    $(function(){
        $(document).on("click", ".delete-link-row", (e) => {
            e.preventDefault();
            $(e.target).closest(".row").remove();
        });
        
        $(document).on("click", ".new-link", (e) => {
            e.preventDefault();
            let html = `
            <div class='row'>
                <a href='#' class='text-danger btn-lg delete-link-row'><i class="bx bx-minus-circle"></i></a>
                <div class='col-md-4'>
                    <x-admin.form.input name='text[]' label='Link Text' id=''/>
                    @error('text')
                        <p class='text-danger'>{{ $message }}</p>
                    @enderror
                </div>
                
                <div class='col-md-4'>
                    <x-admin.form.input type='url' id='' name='link[]' label='Link'/>
                    @error('link')
                        <p class='text-danger'>{{ $message }}</p>
                    @enderror
                </div>
                
                <div class='col-md-2'>
                    <x-admin.form.input type='number' id='' name='link_order[]' label='Link Order'/>
                    @error('link_order')
                        <p class='text-danger'>{{ $message }}</p>
                    @enderror
                </div>
                
                <div class='col-md-2'>
                    <div class="form-check form-switch mt-3">
                        <input checked class="form-check-input" type="checkbox" name='active[]' id="">
                        <label class="form-check-label" for="">Active</label>
                    
                        @error('active')
                            <p class='text-danger'>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            `;
            
            $(".links-container").append(html);
        });
    });
    </script>
@endsection