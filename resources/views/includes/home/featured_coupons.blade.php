
<div id="featured-coupons-wrapper" class="container-fluid">
    <div id="featured-coupons">
        <header class="section-header text-center">
            <h2 class="section-header__title">Today Editors Pick promo codes</h2>
            <h3 class="section-header__title">Our selection of discount codes you can't miss</h3>
        </header>
        @forelse($featured_coupons as $coupon)
        <div id='c_{{ $coupon->id }}' class="col-md-3 col-sm-6 col-xs-12 featured-coupon-col">
            
            <div class="featured-coupon text-center">
                
                    <figure class="of__logo coupon-logo">
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
                            src="{{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }}" 
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
                                href="/ar/#cid=50448" 
                                title="{{ $coupon->description }}">{{ $coupon->description }}
                            </a>
                        </h4>
                        @else
                        <h4 class="of__title">
                            <a 
                                rel="nofollow"
                                href="{{ $coupon->link ?? $coupon->store->aff_link }}"
                                class="of__link" 
                                title="{{ $coupon->description }}">{{ $coupon->description }}
                            </a>
                        </h4>
                        @endif
                    </div>
                    
                    @if($coupon->store)
                    
                    <x-coupons.coupon-button :link="$coupon->store->aff_link" :id="$coupon->id" :type="$coupon->offer ? 'offer' : 'coupon'" :code="$coupon->offer ? '' : $coupon->code"/>
                    
                    @else
                    <x-coupons.coupon-button :link="$coupon->link" :id="$coupon->id" :type="$coupon->offer ? 'offer' : 'coupon'" :code="$coupon->offer ? '' : $coupon->code"/>
                    @endif
                    
                
            </div>
        </div>
        @empty
        <p class='lead text-muted text-center'>No promo codes available for today</p>
        @endforelse
    </div>
</div>