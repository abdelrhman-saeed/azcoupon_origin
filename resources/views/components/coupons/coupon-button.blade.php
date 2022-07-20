@props(['type', 'code', 'id', 'link'])
<div 
    title="{{ $type == 'coupon' ? 'Scopri il Coupon' : 'Vai all\'Offerta' }}"
    class="coupon-tile-action open-modal {{ $type == 'offer' ? 'coupon-btn-complete' : '' }}" 
    onclick="
    @if($id)
        @if( $code == '' )
            window.open('{{ $link }}', '_blank');
        @else
            window.open('?couponId={{$id}}&couponCode={{$code}}', '_blank');
        @endif
    @endif
    ">
    
    <div id='c_{{ $code }}' class="coupon-button show-peel">
        <div class="coupon-button-peel">{{ $code }}</div>
        <span class="">
            {{ $type == 'coupon' ? 'Scopri il Coupon' : 'Vai all\'Offerta' }}
        </span>
    </div>
    
</div>