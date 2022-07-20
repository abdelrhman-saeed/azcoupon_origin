<div id='expired-coupons-offers-all' class='featured'>
    @foreach($expired_soon_coupons_featured as $coupon)
        <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
    @endforeach
</div>