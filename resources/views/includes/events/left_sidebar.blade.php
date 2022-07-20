
@if( $event->seo_title != '' )
    <div class="widget categories b-b-0 w-faq">
       <div class="widget-heading">
          <h3 class="widget-title text-dark">{{ $event->seo_title }}</h3>
          <div class="clearfix"></div>
       </div>
       <div class="widget-body">
          <div class="well">{!! $event->seo_description !!}</div>
       </div>
    </div>
@endif

@foreach($event->widgets as $widget)
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