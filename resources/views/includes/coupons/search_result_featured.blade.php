<div id='expired-coupons-offers-all' class='featured'>
    @foreach($result as $coupon)
        @if($coupon->featured)
            <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
        @endif
    @endforeach
</div>