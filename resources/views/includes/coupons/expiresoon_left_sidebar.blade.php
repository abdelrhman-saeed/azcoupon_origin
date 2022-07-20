@foreach($widgets as $widget)
   <div class="widget categories b-b-0 w-faq">
      <div class="widget-heading">
         <h3 class="widget-title text-dark">{!! $widget->title !!}</h3>
         <div class="clearfix"></div>
      </div>
      <div class="widget-body">
         <div class="well">{!! $widget->description !!}</div>
      </div>
   </div>
@endforeach