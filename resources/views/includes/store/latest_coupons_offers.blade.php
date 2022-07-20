
@if(count($store_latest_coupons_offers))
<div id='latest-coupons-offers'>

    <h2>Ultimi Codici Sconto {{ $store->name }} e Offerte</h2>
    
    <div class='table-responsive table-container'>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>Coupon / Offerta</th>
                <th>Sconto</th>
                <th>Scadenza</th>
                </tr>
            </thead>
            <tbody>
                @foreach($store_latest_coupons_offers as $coupon)
                <tr>
                    <td>{{ $coupon->title }}</td>
                    <td>{{ $coupon->discount . $coupon->preference }}</td>
                    <td>
                        @if( $coupon->expire_date != '0000-00-00' && $coupon->expire_date != NULL )
                            {{ \Carbon\Carbon::parse($coupon->expire_date)->translatedFormat('d F Y') }}
                        @else
                            {{ $coupon->offer ? 'Offerta sempre attiva' : 'Coupon sempre attivo' }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endif