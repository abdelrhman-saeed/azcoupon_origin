
@if(count($store_featured_coupons))
<div id='store-featured' class='featured'>
    @foreach($store_featured_coupons as $coupon)
        <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
    @endforeach
</div>

@endif