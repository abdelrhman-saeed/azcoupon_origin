@if( count( $related_stores ) )
    <div class="widget widget--faq ">
        <h3>Related Stores</h3>
        
        <ul class="popular-shops">
        @foreach($related_stores as $r_store)    
            <li class="popular-shops__item d-none d-sm-block">
                <a href="{{route('stores_events.show', $store->slug)}}" title="{{$store->name}}">
                    <img 
                    alt="{{$r_store->image->alt}}" 
                    title="{{$r_store->image->title}}" 
                    class="img-responsive" 
                    height="200" 
                    width="200" 
                    src="{{$r_store->getStoreImage()}}?width=200&amp;height=200">
                </a>
            </li>
        @endforeach
        </ul>
    </div>
@endif