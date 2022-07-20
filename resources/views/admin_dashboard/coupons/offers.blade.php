@extends("admin_dashboard.layouts.app")

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Offers</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.index') }}"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Offers </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            
            <x-admin.flashes.success :status="'success'" />

            <div class="card">
                <div class="card-body">
                    <div class=" align-items-center mb-4 gap-3">
                        
                        <div class='row'>
                            <div class='col-sm-4'>
                                <form autocomplete='off' method='GET' action="{{ route('admin.coupons.offers') }}" class='offer_search_form'>
                                    <div class='form-group'>
                                        <input 
                                        value="{{ request()->input('q')??'' }}"
                                        placeholder='Search Offer' 
                                        type='text' 
                                        name='q' 
                                        class='form-control'>
                                    </div>
                                    
                                </form>
                            </div>
                            
                            <div class="col-sm-2">
                                <a href='#' 
                                class='btn btn-primary form-control'
                                onclick="event.preventDefault();document.querySelector('.offer_search_form').submit();">GO</a>
                            </div>
                            
                            <div class="col-sm-6" style="text-align:right;">
                                <a href="{{ route('admin.coupons.createoffer') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0">
                                    <i class="bx bxs-plus-square"></i>Add New Offer
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Offers#</th>
                                    <th>Offer title</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Store</th>
                                    <th>Discount</th>
                                    <th>Last Update</th>
                                    <th>Expire Date</th>
                                    <th>View Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($offers as $offer)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-2">
                                                <h6 class="mb-0 font-14">#O-{{$offer->id}}</h6>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ \Str::limit($offer->title, 30) }}</td>

                                    <td>
                                        <i class='bx bxs-star me-1 {{ $offer->featured ? "text-warning" : "" }} '></i>
                                    </td>

                                    <td>
                                        <div class="badge rounded-pill {{ $offer->expired() ? 'text-danger bg-light-danger' : 'text-success bg-light-success' }} p-2 text-uppercase px-3">
                                            <i class='bx bxs-circle me-1'></i> {{ $offer->expired() ? 'EXPIRED' : 'ACTIVE' }}
                                        </div>
                                    </td>

                                    <td>{{ $offer->store?->name }}</td>

                                    <td>
                                        <span>{{ $offer->discount ?: '0'}}</span>
                                        <span>{{ $offer->preference }}</span>

                                    </td>
                                    
                                    <td>
                                        {{ \Carbon\Carbon::parse($offer->updated_at)->translatedFormat('d M Y h:i') }} By {{ $offer->updated_by_who->name }}
                                    </td>

                                    <td>{{ $offer->expire_date }}</td>

                                    <td>
                                        <a href="{{ route('admin.coupons.show', $offer) }}" class="btn btn-primary btn-sm radius-30 px-4">View Details</a>
                                    </td>
                                    
                                    <td>
                                        <div class="d-flex order-actions">

                                            <a href="{{ route('admin.coupons.editoffer', $offer) }}" class="text-info"><i class='bx bxs-edit'></i></a>
                                            
                                            <a 
                                            onclick="
                                                if( confirm('You are gonna delete offer permanently, proceed ?') == true ) { event.preventDefault();document.querySelector('#offer_delete_form_{{ $offer->id }}').submit(); }" href="#" class="ms-2 text-white bg-danger"><i class='bx bxs-trash'></i></a>
                                        
                                            <form method='POST' action="{{ route('admin.coupons.destroy', $offer) }}" class='hidden' id='offer_delete_form_{{$offer->id}}'>
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            
                                            <form method='POST' action="{{ route('admin.coupons.attach_coupons') }}">
                                                @csrf
                                                <input name='offer_id' value='{{ $offer->id }}' type='hidden'>
                                                <button class="btn btn-info btn-sm ms-2 text-white text-xs bg-info" type='submit'>Attach to Single Event</button>
                                            </form>

                                            <a 
                                            href='#'
                                            onclick="event.preventDefault(); document.getElementById('online_change_{{ $offer->id }}').submit();"
                                            class="ms-2 text-white bg-warning">
                                                @if($offer->online)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off text-white"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-white"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                @endif
                                            </a>

                                            <form method='post' action="{{ route('admin.coupons.online_change', $offer) }}" id='online_change_{{ $offer->id }}'>@csrf
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                @empty
                                    <p>No Offer To Show.</p>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    
                    <div class='mb-3'>
                        {{ $offers->links() }}
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection