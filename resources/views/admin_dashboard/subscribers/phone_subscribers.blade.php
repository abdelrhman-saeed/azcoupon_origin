@extends("admin_dashboard.layouts.app")

    @section('style')
        <link href="{{ asset('admin_assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    @endsection

    @section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Phone Subscribers</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Phone Subscribers </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Visitor Phone</th>
                                    <th>Store Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tel_subscribers as $subscriber)

                                @foreach($subscriber->stores as $subscriber_store)
                                
                                <tr>
                                    <td>{{ $subscriber->id }}</td>
                                    <td>{{ $subscriber->visitor_phone }}</td>
                                    <td>{{ $subscriber_store->name }}</td>
                                    <td>{{ $subscriber->date }}</td>
                                </tr>

                                @endforeach
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
                    
    </div>
    <!--end page wrapper -->
    @endsection
	
    @section('script')

    <script src="{{ asset('admin_assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin_assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	
    <script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: ['excel', 'pdf']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>

    @endsection