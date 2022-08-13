@extends('layouts.front.master')

@section("structured_schema")
    <script type="application/id+json">
        {
            "@context": "https://schema.org",
            "url": "{{request()->getSchemeAndHttpHost()}}"
            "id": "{{url()->current()}}"
            "@type": "WebPage",
            "image": "{{ asset('assets/images/icons/logo-svg.svg') }}",
            "logo": "{{ asset('assets/images/icons/logo-svg.svg') }}",

            "Provider": {
                "@type": "Organization",
                "name": "Glam Promo Codes",
                "logo": {
                    "@type": "ImageObject",
                    "contentUrl": "LOGO"
                }
            },
            "@type": "BreadcrumbList",
            "@type": "FAQPage"
        }
    </script>
@endsection

@section('title', $home_meta_title)

@section('css')

<link rel="preload" href="{{ asset('assets/css/home/style.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<style>
    body{color:#354043!important;line-height:1.5;background-color:#f7f7f7}h1,h2,h3,h4,h5,h6{font-family:OptimaNovaLTProRegular,sans-serif}a{text-decoration:none}i[class^=icon-]{font-weight:400;font-family:simple!important;font-style:normal;font-feature-settings:normal;font-variant:normal;line-height:1;text-transform:none;speak:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.icon-chevron-right:before{content:"\e906"}.sub-nav-bar .search-header,body{margin:0}.container{width:100%;margin-right:auto;margin-left:auto;padding-right:15px;padding-left:15px}.d-none{display:none!important}.col{position:relative}[class*=col-]{padding-right:15px;padding-left:15px}.p-0{padding:0!important}header,main,nav{display:block}h1,h2,h3,h4,h5,h6{margin-top:0;margin-bottom:.5rem}ol,p,ul{margin-top:0;margin-bottom:1rem}.hidden{display:none!important}.row{display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col,.col-12,.col-lg-12,.col-md-8{position:relative;width:100%;padding-right:15px;padding-left:15px}.col,.col-12{max-width:100%}.col{flex-basis:0;flex-grow:1}.col-12{flex:0 0 100%;max-width:100%}*,:after,:before,html{box-sizing:border-box}img,svg{vertical-align:middle}img{border-style:none}svg{overflow:hidden}button{text-transform:none;border-radius:0}button,input{margin:0;overflow:visible;font-size:inherit;font-family:inherit;line-height:inherit}[type=submit],button{-webkit-appearance:button}[type=search]{outline-offset:-2px;-webkit-appearance:none}#content{order:1;border-top:1px solid transparent}.m-search-box{padding:42px 0 12px;background-color:#ececec}.m-search-box__form{position:relative;width:100%}.m-search-box__form ::placeholder{color:#3e769e;font-style:italic;opacity:1}.m-search-box__input{width:100%;padding:14px 0;text-indent:27px;border:1px solid #e3e3e3;pointer-events:auto}.m-search-box__input::-webkit-search-cancel-button{display:none}.m-search-box__submit{position:absolute;top:9px;right:11px;width:32px;height:32px;padding:0;color:#3e769e;font-size:17px;line-height:1;background:#ececec;border:none;border-radius:50%;cursor:pointer}.m-navigation{position:relative;margin:0;padding:0;font-family:BasicCommercialLTW04-Light,sans-serif;background-color:#031128}.m-navigation__list{height:40px;margin:0;padding:0;list-style-type:none}.m-navigation__arrow{position:absolute;top:7px;width:29px;color:#fff;font-size:20px;text-align:center}.m-navigation__arrow--left{left:0;line-height:1;transform:rotate(180deg)}.m-navigation__arrow--right{right:0}.m-navigation__item{display:inline-block;float:left;padding:8px 100px 8px 0}.m-navigation__link{color:#fff;font-weight:700;font-size:14px;text-transform:uppercase}.m-navigation__chevron{display:inline-block;margin-left:5px}.sub-menu{position:absolute;top:39px;left:0;z-index:1;display:none;width:100%;padding:21px 0 10px;background-color:rgba(3,17,40,.9);border-top:2px solid #1bafcd}.search-header{width:100%;margin:23px 0}.search-container{position:relative;justify-content:space-between;width:100%}.premium-slider{margin:26px -15px}.premium-slider__container{position:relative;display:flex;align-items:center;height:100%;scroll-snap-type:x mandatory;overflow-x:scroll;overflow-y:hidden;scroll-behavior:smooth}.premium-slider__container::-webkit-scrollbar{display:none}.premium-slider__arrow{position:absolute;top:0;width:90px;height:100%;cursor:pointer}.premium-slider__arrow--left{left:15px}.premium-slider__arrow--right{right:15px}.premium-slider__indicator-list{position:absolute;bottom:19px;display:flex;justify-content:center;width:100%;margin:0 -15px;padding:0;list-style-type:none}.premium-slider__indicator-item span{display:block;width:16px;height:16px;margin:8px;background-color:#fff;border-radius:50%;cursor:pointer;opacity:.5}.premium-slider__indicator-item--active span{opacity:1}.premium-slider__item{position:relative;display:flex;align-items:center;justify-content:center;scroll-snap-align:center;width:100%;min-width:100%;height:240px;color:#fff;background-repeat:no-repeat;background-size:cover;-webkit-transition:none!important}.premium-slider__item:hover{color:#fff;text-decoration:none}.premium-slider:hover{color:#fff;text-decoration:none}.premium-slider__content{margin:-15px 10px 10px;font-weight:400;text-align:left}.premium-slider--opacity-white{position:relative}.premium-slider--opacity-white:before{position:absolute;top:0;left:0;display:block;width:100%;height:100%;background:rgba(0,0,0,.48);content:""}.premium-slider__links{display:flex;flex-wrap:wrap;align-items:center;margin:0 0 10px;padding:0;overflow:hidden;list-style-type:none;background-color:#fff}.premium-slider__link{display:flex;flex-grow:1;justify-content:space-around;height:60px;margin:0;background-color:#fff;border-top:1px solid rgba(0,0,0,.1);border-left:1px solid rgba(0,0,0,.1)}.premium-slider__link a{align-self:center;padding:14px 16px;color:#354043;text-decoration:none}body{font-family:BasicCommercialLTW04-Light,sans-serif}.m-search-box,body .featured-shops{background-color:#fff}*{-webkit-font-smoothing:antialiased}.t-topbar{height:60px;background:#fff}.t-topbar .row{justify-content:space-between}.t-topbar__right{display:flex;align-items:center;margin:10px 0}.m-navigation{height:55px;background-color:#072a3a}.m-navigation__item{height:46px;padding:11px 5px 8px;border-bottom:4px solid transparent;border-left:1px solid #0a394c}.m-navigation__item:last-of-type{border-right:1px solid #0a394c}.m-navigation__item:first-child{border-left:none}.m-navigation__arrow{display:none;width:24px;height:24px;color:#0a394c;font-size:17px;background:#fff}.m-navigation__chevron--down{display:none}.icon-chevron-right:before{display:inline-block;width:10px;margin-top:5px}.m-navigation__link,.sub-menu__link{font-weight:400;font-size:16px;font-family:Aileron,sans-serif;text-transform:none}.m-search-box{padding:0}.m-search-box__input{font-size:16px;font-family:BasicCommercialLTW04-Light,sans-serif;text-indent:57px;background:#f8f8f8}.m-search-box__submit{right:0;left:10px;color:#000;background:0 0}.w-featured__list{margin-top:26px}.w-featured__list+.premium-offers,.w-featured__list+.premium-widget{margin-top:40px}
    /*.premium-slider__headline {*/
    /*    font-size: 1em;*/
    /*}*/
</style>
<noscript>
    <link rel="stylesheet" href="{{ asset('assets/css/home/style.css') }}">
</noscript>

@endsection

@section('canonical')
    <link rel="canonical" href="{{ route('home.index') }}">
@endsection

@section('searchbar')
    @include('includes.all.largesearch')
@endsection

@section('content')
<div class='t-container'>
      
<style>
    .icon-chevron-right:before {
        content: "\e906";
    }
</style>

<main class="container" role="main" id="content" data-area="MB">

    @include('includes.home.slider')
    
    @if( count( $featured_coupons ) ) 
    
    <div class="row">
        
        <div class="col-lg-12 text-center">
            <h2>The Best Verified Glam Promo Codes </h2>
           
        </div>
        
        <div class="col-lg-12 w-featured__list--33 w-featured__list  " data-widget="featuredCoupons" data-element="WFC">
    
            <div class="row">
{{--                {{ dd($featured_coupons[0])  }}--}}
                @foreach($featured_coupons as $coupon)
                <div class="col-lg-4 col-md-6 col-sm-12">
        
                    <div class="w-featured__item w-featured__item--small" data-shop-name="{{ $coupon->store?->name }}">
        
                        <a 
                        class="w-featured__frame" 
                        data-coupon-id='{{ $coupon->id }}' 
                        data-shop-name='{{ $coupon->store?->name }}' 
                        title='{{ $coupon->title }}' 
                        data-coupon-url='{{ $coupon->store?->aff_link }}' 
                        href='{{ route("open_coupon", $coupon) }}' 
                        onclick="
                        @if($coupon->offer)
                        window.location='{{ $coupon->link ?? $coupon->store->aff_link  }}'
                        @endif
                        " 
                        target='_blank' 
                        title="{{ $coupon->description }}" 
                        data-index="1">
                            <div class="w-featured__footer">
                                
                                @if($coupon->store && $coupon->store?->image)
        
                                <img 
                                title='{{ $coupon->store?->image ? $coupon->store?->image->title : '' }}'
                                alt='{{ $coupon->store?->image ? $coupon->store?->image->alt : '' }}'
                                class="img-responsive w-featured__logo" 
                                src="" 
                                data-normal="{{ $coupon->store?->getStoreImage() }}?width=110&amp;height=110" 
                                data-srcset="{{ $coupon->store?->getStoreImage() }}?width=110&amp;height=110 1x, {{ $coupon->store?->getStoreImage() }}?width=220&amp;height=220&amp;quality=60 2x">
                        
                                @endif
                                
                                <div class="w-featured__content">
                        
                                    <span class="w-featured__shop-title">{{ $coupon->store?->name }}</span>
                        
                                    <div class="w-featured__description">{{ \Str::limit($coupon->title, 60) }}</div>
                        
                                  
                                    <span class="coupon__label-code">
                                    
                                        Code
                                    
                                    </span>
                        
                                </div>
        
        
                            </div>
                        </a>
        
                    </div>
        
                </div>
                
                @endforeach
            </div>
    
        </div>

    </div>
    
    @endif
    
    <div class=" w-featured__list hide-last-featured w-featured--same-shop" data-widget="featuredCoupons" data-element="WFC">
    
    @if( $homedeals )
    <div class="row">
        <div class="col-5 col-md-3 w-featured--same-shop d-block d-lg-none">
            <div class="w-featured__logo w-featured__logo--same-shop">
                <img 
                alt="" 
                class="img-responsive" 
                src="" 
                srcset="{{ $homedeals->store->getStoreImage() }}?width=110&amp;height=110 1x, {{ $homedeals->store->getStoreImage() }}?width=120&amp;height=120&amp;quality=60 2x">
            </div>
        </div>
        <div class="col">
            <h2 class="w-featured__headline h2">The Best {{ $homedeals->store->name }} Deals</h2>
            <a href="{{ route('stores_events.show', $homedeals->store->slug) }}" class="w-featured__more-link">View all
                <i class="icon-chevron-right"></i>
            </a>
        </div>
    </div>
    @endif
    
    @if( $homedeals ) 
    <div class="row">
        <div class="col-lg-2 w-featured--same-shop align-content-center d-lg-flex d-none">
            <div class="w-featured__logo w-featured__logo--same-shop">
                <img 
                alt="" 
                class="img-responsive" 
                src="" 
                srcset="{{ $homedeals->store->getStoreImage() }}?width=150&amp;height=150 1x, {{ $homedeals->store->getStoreImage() }}?width=250&amp;height=250&amp;quality=60 2x">
            </div>
        </div>
        
        @include('includes.home.homedeals')
        
    </div>
    @endif
    
  </div>
  
    <div class="premium-widget" data-element="WPW">
        
        <div class="container">
    
            <div class="row px-3">
                
                <div class="col-sm-12 col-md-4 mb-5">
        
                    <h2 class="premium-widget__header">
                        Our Top Shops
                    </h2>
                    <div class="row">
                        <div class="col-6">
                            <ul class="premium-widget__shops">
                                @for($i = 0; $i < count($navbar_stores) / 2; $i++)
                                    @php $store = $navbar_stores[$i]; @endphp
                                    <li class="premium-widget__shops-item">
                                        <a href="{{ route('stores_events.show', $store->slug) }}">{{ $store->name }}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>

                        <div class="col-6">
                            <ul class="premium-widget__shops">
                                @for($i = count($navbar_stores) / 2; $i < count($navbar_stores); $i++)
                                    @php $store = $navbar_stores[$i]; @endphp
                                    <li class="premium-widget__shops-item">
                                        <a href="{{ route('stores_events.show', $store->slug) }}">{{ $store->name }}</a>
                                    </li>
                                @endfor
                            </ul>
                        </div>

                    </div>

        
              </div>
        
              <div class="col-sm-12 col-md-8">
        
                <h2 class="premium-widget__header">
                    Our Latest Coupons/Offers
                </h2>
        
                <div class="row">
        
                @forelse($latest_coupons as $coupon)
        
                <div class="col-sm-6 col-md-12 col-xl-6">
        
                    <div class="premium-widget__coupons">
        
                        <a 
                        class="premium-widget__coupon" 
                        data-coupon-id='{{ $coupon->id }}' 
                        data-shop-name='{{ $coupon->store?->name }}' 
                        title='{{ $coupon->title }}' 
                        data-coupon-url='{{ $coupon->store?->aff_link }}' 
                        href='{{ route("open_coupon", $coupon) }}' 
                        onclick="
                        @if($coupon->offer)
                        window.location='{{$coupon->link ?? $coupon->store->aff_link}}'
                        @endif
                        " 
                        target='_blank' 
                        title="{{ $coupon->title }}">
        
                            <img alt="{{ $coupon->store?->name }} Discount Codes" class="premium-widget__coupon-image" src="" data-normal="{{ $coupon->store?->getStoreImage() }}?width=110&amp;height=110" data-srcset="{{ $coupon->store?->getStoreImage() }}?width=110&amp;height=110 1x, {{ $coupon->store?->getStoreImage() }}?width=220&amp;height=220&amp;quality=60 2x">
        
                            <div class="premium-widget__coupon-aside">
                                <p class="premium-widget__coupon-text">{{ $coupon->title ?: $coupon->description }}</p>
                            </div>
                        </a>
                        
                    </div>
                </div>
                  
                @empty
                <p class='lead text-muted text-center'>Any Promocode Available for today.</p>
                @endforelse
                </div>
              </div>
            </div>
        </div>
</div>

<div class="row top-similar-shops">
    <div class="col">
        <h4>Trending Shops with active Promo Codes and Discounts</h4>
        <ul class="shop-list-columns shop-list-columns-5">
            @forelse($featured_brands as $store)
            <li class="shop-list-columns__item">
                <a href="{{ route('stores_events.show', $store->slug) }}" target="_blank">{{ $store->name }}</a>
            </li>
            @empty
            <p class='lead text-muted text-center'>Any Shop Available for today.</p>
            @endforelse
        </ul>
    </div>
</div>

@if( $topvouchercodes )
<div class='seo-text' data-area="SEO">
    <div class="row" data-element="WTXT">
        <div class="col-md-4">
          <div class="seo-text__card">
            <div class="seo-text__header">
              <div class="seo-text__title" id="heading_0">
                <h2 id="top_voucher_codes_and_offers_in_one_place_1">{{ $topvouchercodes->title }}</h2>
              </div>
            </div>
            <div class="seo-text__content" aria-labelledby="heading_0">
                {!! $topvouchercodes->content !!}
            </div>
          </div>
        </div>
    </div>
</div>
@endif
  <!-- ./seo-text -->

</main>
@endsection