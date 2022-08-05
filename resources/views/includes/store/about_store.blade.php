<style>
    .about-store-container .card 
    {
        padding: 5px 0px;
        border: 1px solid #f1f1f1;
        margin-bottom: 10px;
    }
    .card img {
        max-width: 100%;
        height: auto !important;
    }
</style>
<div id='about-store'>
    <h5>Best Shopping with  {{ $store->name }} Promo Codes and Discounts</h5>
    
    <div class='about-store-container text-left'>
        @for($i = 1; $i <= 8; $i++)
        @php 
            $title = "about_store_".$i."_title";
            $description = "about_store_".$i."_description";
        @endphp
        
        @if( $store->$title || $store->$description )
        <div class='card'>
            
            <div class='card-body'>
                <h3 class='card-title border-bottom pb-3 mb-3 fw-bold'>{{ $store->$title }}</h3>
                
                <p class='lead fw-bold'>
                    {!! $store->$description !!}
                </p>
            </div>
            
        </div>
        @endif
        @endfor

    </div>

</div>