@foreach($left_sidebar_widgets as $widget)
    @if( $widget->title )
    <div class="widget categories b-b-0 w-faq">
        <div class="widget-heading">
            <h3 class="widget-title text-dark">{{ $widget->title }}</h3>
            <div class="clearfix"></div>
        </div>
        <div class="widget-body">
            <div class="well">{!! $widget->description !!}</div>
            @if( strpos($widget->title, "Dove inserire il codice coupon") !== false)
                
                <div style="padding:10px">
                    <img 
                    src="{{ asset('storage/images/left_sidebar_images/coupon_' . $widget->store->name . '.jpg') }}" 
                    data-src="{{ asset('storage/images/left_sidebar_images/coupon_' . $widget->store->name . '.jpg') }}" 
                    alt="dove inserire il Coupon {{ $widget->store->name }}" 
                    class="img img-responsive" 
                    style="display:block;margin:0 auto;" 
                    title="dove inserire il Coupon {{ $widget->store->name }}">
                    
                    <p style="padding-top: 10px;font-size: 13px;font-style: italic;color: #888">
                        L'immagine mostra il carrello elettronico {{ $widget->store->name }}; la casella dove inserire il codice coupon {{ $widget->store->name }} è evidenziata dal cerchio rosso.
                    </p>
                </div>

            @endif
        </div>
    </div>
    @endif
@endforeach