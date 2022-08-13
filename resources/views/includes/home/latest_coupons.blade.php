
@if($latest_coupons->count())
<div id="featured-coupons-wrapper" class="container-fluid latest">

    <div id="featured-coupons" class='latest'>
        <header class="section-header text-center">
            <h2 class="section-header__title">Today Verified Promo codes</h2>
            <h3 class="section-header__title">Discount codes, Sales and Offers in real time</h3>
        </header>
        
        @forelse($latest_coupons as $coupon)
        <div id='c_{{ $coupon->id }}' class="col-md-3 col-sm-6 col-xs-12 featured-coupon-col latest">
            
            <div class="featured-coupon text-center latest">
                    <figure class="of__logo coupon-logo latest">
                        @if($coupon->store && $coupon->store->image)
                        <img 
                            title='{{ $coupon->store->image ? $coupon->store->image->title : '' }}'
                            alt='{{ $coupon->store->image ? $coupon->store->image->alt : '' }}'
                            class="of__img img--responsive" 
                            data-src="{{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }}" 
                            loading="lazy" 
                            data-srcset="{{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 1x, {{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 2x, {{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 3x" 
                            height="75" 
                            width="100" 
                            src="{{($coupon->store->image) ? asset('storage/images/markets/'.$coupon->store->image->path) : "" }}" 
                            srcset="{{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 1x, {{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }} 3x">
                        @endif
                    </figure>
    
                    <div class="of__content">
                        @if($coupon->store)
                            <h4 class="of__title">
                                <a 
                                rel="follow"
                                href="{{ route('stores_events.show', $coupon->store->slug) }}"
                                class="of__link" 
                                title="{{ $coupon->description }}">{{ $coupon->description }}
                                </a>
                            </h4>
                        @else
                            <h4 class="of__title">
                                <a 
                                rel="follow"
                                href="{{ $coupon->link ?? $coupon->store->aff_link }}"
                                class="of__link" 
                                title="{{ $coupon->description }}">{{ $coupon->description }}
                                </a>
                            </h4>
                        @endif
                    </div>
                    
                    @if($coupon->store)
                        <x-coupons.coupon-button :link="$coupon->store->aff_link" :id="$coupon->id" :type="$coupon->offer ? 'offer' : 'coupon'" :code="$coupon->code"/>
                    @else
                        <x-coupons.coupon-button :link="$coupon->link" :id="$coupon->id" :type="$coupon->offer ? 'offer' : 'coupon'" :code="$coupon->code"/>
                    @endif
                    
                    @if($coupon->store)
                        <div class='home-coupons-see-all'>
                            <a 
                            rel="follow"
                            title="altri coupon {{ $coupon->store->name }}"
                            href="{{ route('stores_events.show', $coupon->store->slug) }}">other promo codes {{ $coupon->store->name }} </a>
                        </div>
                    @endif
            </div>
        </div>
        @empty
        <p class='lead text-muted text-center'>No Promo Codes available at this moment.</p>
        @endforelse
    </div>   
</div>
@endif