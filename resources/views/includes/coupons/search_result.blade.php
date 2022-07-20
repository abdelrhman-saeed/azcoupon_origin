<div id='expired-coupons-last-added'>
    
    @foreach($result as $coupon)
        @if(!$coupon->featured)
            <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
        @endif
    @endforeach

</div>