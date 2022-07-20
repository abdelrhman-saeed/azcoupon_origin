
@if(count($store_coupons_at_sepcific_month))
<div id='store-last-added'>
    <h2>Coupons {{ $store->name }} {{ ucfirst(\Carbon\Carbon::parse($store_coupons_specific_month)->translatedFormat('F Y')) }}</h2>

    @foreach($store_coupons_at_sepcific_month as $coupon)
        <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
    @endforeach
</div>
@endif