<div id='store-featured' class='featured'>
    @foreach($category_coupons_featured as $coupon)
        <x-coupons.single-coupon :coupon="$coupon" :buttonType="$coupon->offer == 1 ? 'offer' : 'coupon'"/>
    @endforeach
</div>