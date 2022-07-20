<div id='category-coupons-offers'>
    @foreach($event_coupons as $coupon)
    <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
    @endforeach
</div>