
@if(count($store_expired_coupons_offers))
<div id='expired-coupons-offers'>
    <h2> Expired or to verify {{ $store->name }} promo codes and Sales</h2>
    @foreach($store_expired_coupons_offers as $coupon)
        <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
    @endforeach
</div>
@endif