@props(['thecoupon'])

<div class="coupon_accordion">
    <div class="card">
        <div class="card-header">
            <div class='row'>
                <div class='col-md-8 col-sm-6 col-xs-12'>


                    <strong>
                        @if( $thecoupon->expire_date == NULL || $thecoupon->expire_date == '0000-00-00' )
                            {{ $thecoupon->offer ? 'Offerta sempre attiva' : 'Coupon sempre attivo' }} 
                        @else
                            {{ 'Attivo fino al ' . \Carbon\Carbon::parse($thecoupon->expire_date)->translatedFormat('d F Y') }}
                        @endif
                        | usata {{ $thecoupon->viewed }} volte
                    </strong>
                
                </div>
                <div class='col-md-4 col-sm-6 col-xs-12'>
                    <a class='coupon-term-collapse-btn' role="button" aria-expanded="false" data-toggle="collapse" data-target="#{{ $thecoupon->id }}" aria-expanded="false" aria-controls="{{ $thecoupon->id }}">
                        <strong>termini & condizioni <i class='ti ti-arrow-circle-down'></i> </strong>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div id="{{ $thecoupon->id }}" class="collapse terms-collapse">
    <div class="card-body">
        <div class="coupon-footer-list-container">
            <div class="cp-desc content column" style="display: block;">
                <ol>
                    @foreach($thecoupon->couponterms as $term)
                        @if($term->term !== '')
                        <li>{{ $term->term }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>