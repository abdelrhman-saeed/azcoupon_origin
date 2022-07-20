

<div id="special-events-wrapper" class="container-fluid">

<div id="special-events">

    <header class="section-header">
        <h3 class="section-header__title">Events Promo Codes</h3>
    </header>
    
    <div class='special-events'>

    @forelse($special_events as $event)
        <a 
        rel="follow"
        title="{{ $event->name }}"
        class='btn btn-default' href="{{ route('stores_events.show', $event->slug) }}">{{ $event->name }}</a>
    @empty
        <p class='lead text-muted'>There are no Events Available</p>
    @endforelse
    
    </div>
    
</div>   
</div>