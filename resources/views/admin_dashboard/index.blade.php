@extends("admin_dashboard.layouts.app")
@section("style")
    <link href="{{ asset('admin_assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
@endsection

@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Coupons</p>
                                    <h4 class="my-1 text-info">{{ $coupons_count }}</h4>
                                    <p class="mb-0 font-13">+2.5% from last week</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                    <i class='bx bxs-cart'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Categories</p>
                                    <h4 class="my-1 text-danger">{{ $categories_count }}</h4>
                                    <p class="mb-0 font-13">+5.4% from last week</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bxs-wallet'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Stores</p>
                                    <h4 class="my-1 text-success">{{ $stores_count }}</h4>
                                    <p class="mb-0 font-13">-4.5% from last week</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-bar-chart-alt-2' ></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">Total Offers</p>
                                    <h4 class="my-1 text-warning">{{ $offers_count }}</h4>
                                    <p class="mb-0 font-13">+8.4% from last week</p>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-bell-plus'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <a href="{{'subscribers/xlsx'}}" target="_blank">
                                        <h4 class="my-1 text-info">Get Whatsapp Subscribers</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end row-->

            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Recent Coupons/Offers</h6>
                        </div>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Code</th>
                                    <th>Activity</th>
                                    <th>Amount of Discount</th>
                                    <th>Created at</th>
                                    <th>Expire at</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($recent_coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->title }}</td>
                                <td>{{ $coupon->offer == 1 ? 'Offer' : 'Coupon' }}</td>
                                <td>{{ $coupon->code }}</td>
                                <td>
                                    <span class="badge {{ $coupon->expired() ? 'bg-danger' : 'bg-gradient-quepal' }} text-white shadow-sm w-100">{{ $coupon->expired() ? 'Expired' : 'Active' }}</span>
                                </td>
                                <td>
                                    <span> {{ $coupon->discount ?: 0 }} </span>
                                    <span> {{ $coupon->preference }} </span>
                                </td>
                                <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                <td>{{ $coupon->expire_date }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12 col-lg-6 col-xl-6 d-flex">
                    <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Coupons Summary</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container-1">
                                    <canvas id="chart4"></canvas>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush coupons-summery">
                                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center active-coupons">Active Coupons <span class="badge bg-gradient-quepal rounded-pill num">{{ $active_coupons }}</span>
                                </li>
                                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center offers">Offers <span class="badge bg-gradient-deepblue rounded-pill num">{{ $offers_count }}</span>
                                </li>
                                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center expired">Expired <span class="badge bg-gradient-ibiza rounded-pill num">{{ $expired_coupons }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-6 d-flex">
                    <div class="card w-100 radius-10">
                        <div class="card-body">
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Total Coupons</p>
                                            <h4 class="my-1">{{ ($coupons_count + $offers_count) }}</h4>
                                            <p class="mb-0 font-13">+6.2% from last week</p>
                                        </div>
                                        <div class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"><i class='bx bxs-heart-circle'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card radius-10 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Categories</p>
                                            <h4 class="my-1">{{ $categories_count }}</h4>
                                            <p class="mb-0 font-13">+3.7% from last week</p>
                                        </div>
                                        <div class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"><i class='bx bxs-comment-detail'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card radius-10 mb-0 border shadow-none">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary"> Stores</p>
                                            <h4 class="my-1">{{ $stores_count }}</h4>
                                            <p class="mb-0 font-13">+4.6% from last week</p>
                                        </div>
                                        <div class="widgets-icons-2 bg-gradient-moonlit text-white ms-auto"><i class='bx bxs-share-alt'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div><!--end row-->
            
        </div>
    </div>
@endsection

@section("script")
    <script src="{{ asset('admin_assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('admin_assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('admin_assets/js/index.js') }}"></script>
@endsection