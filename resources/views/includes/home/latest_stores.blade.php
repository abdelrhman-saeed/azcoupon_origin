

<div id="latest-stores-wrapper" class="container-fluid">

<div id="latest-stores">

    <header class="section-header">
        <h3 class="section-header__title">New Stores</h3>
    </header>
    
    <div class='latest-stores'>
        @forelse($latest_stores as $store)
            <a 
            rel="follow"
            title="go to {{ $store->name }} promo codes"
            class='btn btn-default' href="{{ route('stores_events.show', $store->slug) }}">{{ $store->name }}</a>
        @empty
            <p class='lead text-muted'>Any New Store available today</p>
        @endforelse
    </div>
    
</div>   
</div>