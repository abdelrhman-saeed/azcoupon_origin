<div class="sub-nav-bar" role="navigation" aria-label="Breadcrumb" data-area="SHD">

    <div class="container">

      <div class="row align-items-center search-container">

        <div class="col-10 col-lg-9">
<div class="breadcrumbs">

    <ol class="breadcrumbs__list" data-event-category="breadcrumb">
        <li class="breadcrumbs__item">
            <a href="{{ route('home.index') }}">
                <ion-icon name="home"></ion-icon>
            </a>
        </li>

        @if( ! ( isset($query) && $query != "" ) && ! isset($event) && ! isset( $exception ) )
        <li class="breadcrumbs__item">
            <span>/</span>
        </li>
        @endif

        @if( request()->route()?->getName() == 'stores.index' )
        <li class="breadcrumbs__item breadcrumbs__item--active">
            <span>Shops</span>
        </li>
        @endif

        @if( request()->route()?->getName() == 'categories.index' )
        <li class="breadcrumbs__item breadcrumbs__item--active">
            <span>Categories</span>
        </li>
        @endif

        @if( request()->route()?->getName() == 'stores_events.show' || request()->route()?->getName() == 'categories.show' )

        <li class="breadcrumbs__item">
            @if( request()->route()?->getName() == 'stores_events.show' )
                @if( isset( $store ) )
                    <a href="{{ route('stores.index') }}"><span>Shops</span></a>
                @endif
            @elseif( request()->route()?->getName() == 'categories.show' )
            <a href="{{ route('categories.index') }}"><span>Categories</span></a>
            @endif
        </li>

        @endif

        @if( request()->route()?->getName() == 'stores_events.show' ||
        request()->route()?->getName() == 'categories.show' ||
        ( isset($query) && $query != "" ) )

        <li class="breadcrumbs__item">
            <span>/</span>
        </li>

        <li class="breadcrumbs__item breadcrumbs__item--active">
            <span>
                @if( ( isset($store) || isset($event) ) && request()->route()?->getName() == 'stores_events.show' )
                    {{ isset($store) ? $store->name : $event->banner_title }}
                @elseif( request()->route()?->getName() == 'categories.show' )
                    {{ ! isset($category) ?: $category->name }}
                @elseif(isset($query) && $query != '')
                    {{ 'Search in our site' }}
                @else
                    {{ 'Shops' }}
                @endif
            </span>
        </li>
        @endif
    </ol>
</div>

<!-- ./breadcrumbs -->


        </div>

        <div class="col-2 col-lg-3">

            <div class="search-header">

  <form
  action="{{ route('home.search') }}"
  class="m-search-box__form m-search-box__form--small"
  data-widget="search"
  data-search-result-selector="#search-header-results" role="search">

    <div class="m-search-box__input-wrp">

      <input
      value="{{ isset($query) ? $query : '' }}"
      id='searchInput'
      autocomplete="off"
      class="m-search-box__input"
      name="coupon" placeholder="Search: NET A PORTER, FARFETCH, The Outnet..... " required="" type="search" aria-label="Search: %{shops}... ">

    </div>

    <button class="m-search-box__submit" data-search-submit="" data-active="m-search-box__submit--opened" type="submit" role="button" aria-label="Search">

        <ion-icon class='icon' name="search"></ion-icon>

    </button>

  </form>

</div>



        </div>

        <div class="col-12 col-lg-3 offset-lg-9">

          <div class="hidden search-header-results search-header-results--small"  id="search-header-results" data-area="SE">

          </div>

        </div>

      </div>

    </div>

  </div>
