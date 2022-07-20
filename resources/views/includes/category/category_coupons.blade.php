<div id='category-coupons-offers'>
    @foreach($category_coupons as $coupon)
        <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
        
        @if($loop->index == floor( ( count($category_coupons) * 3 ) / 4 ))
            @include('includes.store.store_alets_subscribe')
        @endif
        
    @endforeach
</div>