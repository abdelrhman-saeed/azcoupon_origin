@foreach($category->widgets as $widget)
<div class="widget categories b-b-0 w-faq">
   <div class="widget-heading">
      <h3 class="widget-title text-dark">{{ $widget->title }}</h3>
      <div class="clearfix"></div>
   </div>
   <div class="widget-body">
      <div class="well">{!! $widget->description !!}</div>
   </div>
</div>
@endforeach

@if( $category->side_title != '' )
<div class="widget categories b-b-0 w-faq">
    <div class="widget-heading">
        <h3 class="widget-title text-dark">{{ $category->side_title }}</h3>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <div class="well">{{ $category->side_description }}</div>
    </div>
</div>
@endif

<div class="widget categories b-b-0 related-stores w-faq">
    <div class="widget-heading">
        <h3 class="widget-title text-dark">Negozi con Coupon {{ $category->name }}</h3>
        <div class="clearfix"></div>
    </div>
    <div class="widget-body">
        <div class="well">
            <div class='row'>
                @foreach($related_stores as $store)
                    <div class='col-xs-4 text-center'>
                        <a style='text-decoration: none;' class="widget-store" rel="follow" href="{{ route('stores_events.show', $store->slug) }}" title="vai ai codici sconto {{ $store->name }}">
                            <img 
                            style='display: inline;'
                            width="100" 
                            height="70" 
                            title='Vai ai Coupon {{ $store->image ? $store->image->alt : '' }}'
                            alt="codici sconto {{ $store->image ? $store->image->title : '' }}" 
                            class="lozad img-responsive center-block" 
                            src="{{ $store->image ? asset('storage/images/markets/'.$store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }}" 
                            data-src="{{ $store->image ? asset('storage/images/markets/'.$store->image->path) : asset('admin_assets/images/stores/store_placeholder_small.png') }}">
                            <br>
                            <span>{{ $store->name }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="widget categories b-b-0 related-categories w-faq">
   <div class="widget-heading">
        <h3 class="widget-title text-dark">Scopri anche i coupon disponibili nelle altre categorie</h3>
        <div class="clearfix"></div>
   </div>
   <div class="widget-body">
      <div class="well">
          <div style="text-align:justify">
            @foreach($related_categories as $category)
                <a 
                rel="follow"
                style='text-decoration: none; padding: 2px;margin: 2px;' 
                class="widget-category" 
                href="{{ route('categories.show', $category->slug) }}" 
                title="vai ai codici sconto {{ $category->name }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
      </div>
   </div>
</div>