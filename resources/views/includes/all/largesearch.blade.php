
  <!-- .m-search-box -->

<div class="m-search-box" role="search" data-area="SE">

  <div class="container">

    <div class="row">

      <div class="col-12 p-0">

        <div class="search-container">

          <div class="search-header">

            <form action="{{ route('home.search') }}" method="GET" id="searchForm" class="m-search-box__form" data-widget="search" data-search-result-selector="#search-header-results">

              <input value="{{ $query }}" name='coupon' id='searchInput' autofocus="autofocus" autocomplete="off" class="m-search-box__input" data-autocomplete-url="/vouchercodes/searches/shop_autocomplete" data-search-input placeholder="Search: NET A PORTER, FARFETCH, The Outnet... " required type="search" aria-label="Search: %{shops}... ">

              <button class="m-search-box__submit" type="submit" data-search-submit data-active="m-search-box__submit--opened" role="button" aria-label="Search">

                <ion-icon class='icon' name="search"></ion-icon>

              </button>

            </form>

          </div>

          <div class="hidden hidden-xs search-header-results" data-search-result id="search-header-results">

          </div>

        </div>

      </div>

      <div class="col-12 p-0">


      </div>

    </div>

  </div>

</div>

<!-- ./m-search-box -->