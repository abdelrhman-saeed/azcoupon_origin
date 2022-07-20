<div class="col-lg-10 w-featured--same-shop">
    <div class="row">
        @for($i=1;$i< 4;$i++)
        
        @php
            $title = "deal_".$i."_title";
            $thumbnail = "deal_".$i."_thumbnail";
            $link = "deal_".$i."_link";
            
            $title=$homedeals->$title;
            $thumbnail=$homedeals->$thumbnail;
            $link=$homedeals->$link;
        @endphp
        
        <div class="col-lg-4 col-md-6  ">
            
            @if( $homedeals->store )    
            
            <div class="w-featured__item w-featured__item--big" data-shop-name="{{ $homedeals->store->name }}">
                <a 
                class="w-featured__frame" 
                data-shop-name="{{ $homedeals->store->name }}" 
                title="{{ $title }}" 
                href="{{ $link }}" 
                target="_blank" 
                title="{{ $title }}" data-index="{{$i}}">
                    <img 
                    class="w-featured__hero img-responsive" 
                    src="" 
                    alt="{{ $homedeals->store->name }} Promo Codes" 
                    srcset="{{ asset($homedeals->getThumbnail($thumbnail)) }}?width=370&amp;height=120 1x, {{ $homedeals->getThumbnail($thumbnail) }}?width=740&amp;height=240&amp;quality=60 2x">
                    <div class="w-featured__footer">
                        <div class="w-featured__content">
                            <span class="w-featured__shop-title">{{ $homedeals->store->name }}</span>
                            <div class="w-featured__description">{{ $title }}</div>
                        </div>
                    </div>
                </a>
            </div>
            
            @endif
        </div>
        @endfor
    </div>
</div>
