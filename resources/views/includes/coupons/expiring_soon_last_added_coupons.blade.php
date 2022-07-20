<div id='expired-coupons-last-added'>
    
    @foreach($expired_soon_coupons_with_setted_by_admin as $coupon)
        <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
    @endforeach

</div>