@if(count($featured_brands))

<div id="featured-coupons-wrapper" class="container-fluid">
    <div id="featured-coupons">
        
        <header class="section-header text-center">
            <h2 class="section-header__title">Top Shops with active Promo Codes</h2>
            <h3 class="section-header__title">Show all the Discount Codes from your preferred Shop</h3>
        </header>
        
        @forelse($featured_brands as $store)
        <div class="col-md-3 col-sm-6 col-xs-12 featured-coupon-col">
            
            <div class="featured-coupon text-center">
                <a  rel="follow" title='promo codes {{ $store->name }}' href='{{ route("stores_events.show", $store->slug) }}'>
                    <figure class="of__logo coupon-logo">
                       @if($store->image)
                       <img 
                            title='{{ $store->image ? $store->image->title : '' }}'
                            alt='{{ $store->image ? $store->image->alt : '' }}'
                            class="of__img img--responsive" 
                            data-src="{{ $store->image ? asset('storage/images/markets/'. $store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }}" 
                            loading="lazy" 
                            data-srcset="{{ $store->image ? asset('storage/images/markets/'. $store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 1x, {{ $store->image ? asset('storage/images/markets/'.$store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 2x, {{ $store->image ? asset('storage/images/markets/'.$store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 3x" 
                            height="75" 
                            width="100" 
                            src="{{ $store->image ? asset('storage/images/markets/'.$store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }}" 
                            srcset="{{ $store->image ? asset('storage/images/markets/'.$store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 1x, {{ $store->image ? asset('storage/images/markets/'. $store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 3x">
                       @endif
                    </figure>
                </a>
            </div>
        </div>
        @empty
        <p class='lead text-muted text-center'>Any store available</p>
        @endforelse
    </div>   
</div>
@endif