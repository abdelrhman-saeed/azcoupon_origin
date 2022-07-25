{{--@section('at-the-end-of-the-footer')--}}
<style>
    .additional_space::after {
        display: block;
        content: '';
        height: 100px;
    }
</style>
<div class="sticky-bar z-10 bg-dark m-0 p-1  row text-light justify-content-evenly align-items-center position-fixed w-100 bottom-0"
     style="font-size: 1vw; z-index: 1;">

    {{-- background image --}}
    <div class="position-absolute h-100 m-0 p-0" style="z-index: 0;">
        <img src="{{asset('assets/images/super_featured_coupon/background.webp')}}"
             class="img-fluid m-0 p-0 w-100 h-100">
    </div>
    {{-- background image --}}

    <div class="d-md-block col-2 p-0">
        <a
                class="sidebar__logo-link"
                data-shop="{{ $super_featured_coupon->store->name }}"
                href="{{ $super_featured_coupon->store->aff_link }}"
                rel="nofollow"
                target="_blank"
                data-element="SPL">

            <img
                    alt="{{ $super_featured_coupon->store->image->alt }}"
                    title="{{ $super_featured_coupon->store->image->title }}"
                    class="img-responsive"
                    height="80"
                    width="200" src="{{ $super_featured_coupon->store->getStoreImage() }}?width=200&amp;height=80"
                    style="min-width: 70px; min-height: 50px;"
            />
        </a>
    </div>

    <div class="col-6 col-sm-7 col-md-6  text-uppercase text-center fw-bolder">
        <h1 class="fw-bold" style="font-size: 1.3vw">
            {{$super_featured_coupon->title}}
        </h1>
    </div>

    <div class="col-3 col-sm-2 col-lg-2 p-0">
        <a
                class="btn"
                style="
                        background-color: #56c0ab;
                        font-size: 1.5vh;
                        min-width: 105px;
                        max-width: 150px;
                        max-height: 100px;
                    "
                data-coupon-id='{{ $super_featured_coupon->id }}'
                data-shop-name='{{ $super_featured_coupon->store->name }}'
                title='{{ $super_featured_coupon->title }}'
                data-coupon-url='{{ $super_featured_coupon->store?->aff_link }}'
                href='{{ route("open_coupon", $super_featured_coupon) }}'
                onclick="
                                    @if($super_featured_coupon->offer)
                                        window.location='{{$super_featured_coupon->link}}'
                                    @endif
                                "
                target='_blank'
                title="{{ $super_featured_coupon->description }}"
                data-index="1"
        >
            <span class="text-capitalize"> GET CODE </span>
        </a>

    </div>
    <button class="col-1 close-featured-coupon-ad bg-transparent border-0 text-white">
        <i class="bi bi-x-circle-fill lead fw-bold" style="font-size: 20px"></i>
    </button>
</div>
{{--@endsection--}}

@section('end_script')
    <script>
        $('body').addClass('additional_space');
        $('button.close-featured-coupon-ad').click( function () {
            $(this).parent().hide(200);
            $('body').removeClass('additional_space');
        });
    </script>
@endsection