@props(['buttonType', 'coupon'])

<div id='c_{{ $coupon->id }}' class="coupon-wrapper coupon-single {{ $coupon->offer == '1' ? 'offer' : 'coupon' }}">
    
    <div class="row cursor-pointer">
        <a class='store-link' href="{{ $coupon->link != '' ? $coupon->link : $coupon->store->link }}"></a>

        <div class="coupon-data col-sm-3 text-center">
            <div class="savings text-center">
                @if($coupon->discount)
                <div class="large">{{ $coupon->discount . $coupon->preference }}</div>
                @else
                <img 
                style="margin:auto;"
                alt='Coupon {{ $coupon->store->name }}' 
                class='img-responsive' 
                src="{{ $coupon->store->image ? asset('storage/images/markets/'.$coupon->store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }}" width="160" height="120">
                @endif
                <div class="type">{{ $buttonType == 'coupon' ? 'COUPON' : 'PROMO' }}</div>
            </div>
        </div>

        <div class="coupon-contain col-sm-5">

            @if( $coupon->verified )
            <ul class="list-inline list-unstyled top-list">
                <li><span class="verified text-warning"><i class="ti-check"></i> VERIFICATO</span> </li>
            </ul>
            @endif
            <h3 class="coupon-title">
                {{ $coupon->title }}
            </h3>
            <p class='coupon-desc'>{!! \Str::limit( $coupon->description, 300) !!}</p>
        </div>
        
        <div class="button-contain col-sm-4 text-center">
            <x-coupons.coupon-button :link="$coupon->store->aff_link" :id="$coupon->id" :type="$buttonType" :code="$coupon->code"/>
        </div>
    </div>
    
    <x-coupons.coupon-terms :thecoupon="$coupon"/>
</div>