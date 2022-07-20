@extends('layouts.front.master')

@section('title', $category->seo_title )

@section('seo_title', $category->seo_title)
@section('description', $category->description)

@section('canonical')
    <link rel="canonical" href="{{ route('categories.show', $category) }}">
@endsection

@section('pagename', 'categories show')

@section('css')
    <style type="text/css">body{color:#354043!important;line-height:1.5;background-color:#f7f7f7}@media (min-width:1200px){.container{max-width:1200px!important}}h1,h2,h3,h4,h5,h6{font-family:BasicCommercialLTW04-Light,sans-serif}a{text-decoration:none}.img-responsive{max-width:100%;height:auto}.h2{font-weight:400;font-size:24px}.align-items-center{align-items:center!important}.btn{display:inline-block;min-width:150px;padding:11px 20px;color:#fff;font-weight:700;font-size:14px;font-family:BasicCommercialLTW04-Light,sans-serif;text-align:center;text-decoration:none;background-color:#0051ad;border:none;border-radius:35px;cursor:pointer}.btn:hover{color:#fff;text-decoration:none;background-color:#00397a}.btn[disabled]{opacity:.3;pointer-events:none}.btn--warning{background-color:#be2a34}.btn--warning:hover{background-color:#942129}.btn--large{min-width:230px;padding:17px 0;font-size:20px;text-align:center}.btn--full{width:100%}.btn--close{display:flex;align-items:center;justify-content:center;width:32px;min-width:auto;height:32px;padding:0;border-radius:50%}.btn:not([href]){color:#fff}.page-title{margin:30px 0 0;font-weight:700;font-size:36px}@media (max-width:767px){.page-title{font-size:26px;line-height:1.1}}.page-updated{display:block;margin-top:-5px;margin-bottom:24px;color:#57696e;font-size:13px}@media (max-width:575px){.page-updated{text-align:center}}.page-subtitle{font-weight:300;font-size:22px}.background--white{background-color:#fff}i[class^=icon-]{font-weight:400;font-family:simple!important;font-style:normal;font-feature-settings:normal;font-variant:normal;line-height:1;text-transform:none;speak:none;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.icon-lens:before{content:"\e911"}.icon-house:before{content:"\e90f"}.icon-star-empty:before{content:"\e915"}.icon-star:before{content:"\e916"}.icon-double-chevron:before{content:"\e90a"}.icon-chevron-right:before{content:"\e906"}.topbar{display:flex;align-items:center;height:70px;background-color:#001c4c}.topbar__logo{display:block;max-height:70px}@media (max-width:575px){.topbar__logo{max-height:35px;margin:0 auto}}.topbar__logo img{width:100%;max-width:420px;height:auto;max-height:100%}.sub-nav-bar{padding:13px 0;background:#fff}.sub-nav-bar .search-header,body{margin:0}.container{width:100%;margin-right:auto;margin-left:auto;padding-right:15px;padding-left:15px}.d-none{display:none!important}.col{position:relative}.col-lg-4{width:100%}@media (min-width:576px){.container{max-width:540px}}@media (min-width:768px){.container{max-width:720px}}@media (min-width:992px){.container{max-width:960px}}@media (min-width:1200px){.container{max-width:1140px}}[class*=col-]{padding-right:15px;padding-left:15px}.p-0{padding:0!important}header,main,nav{display:block}h1,h2,h3,h4,h5,h6{margin-top:0;margin-bottom:.5rem}ol,p,ul{margin-top:0;margin-bottom:1rem}ul ul{margin-bottom:0}.hidden{display:none!important}.row{display:flex;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.col,.col-12,.col-lg-12,.col-md-8{position:relative;width:100%;padding-right:15px;padding-left:15px}.col,.col-12{max-width:100%}.col{flex-basis:0;flex-grow:1}.col-1{flex:0 0 8.333333%;max-width:8.333333%}.col-2{flex:0 0 16.666667%;max-width:16.666667%}.col-3{flex:0 0 25%;max-width:25%}.col-4{flex:0 0 33.333333%;max-width:33.333333%}.col-5{flex:0 0 41.666667%;max-width:41.666667%}.col-6{flex:0 0 50%;max-width:50%}.col-7{flex:0 0 58.333333%;max-width:58.333333%}.col-8{flex:0 0 66.666667%;max-width:66.666667%}.col-9{flex:0 0 75%;max-width:75%}.col-10{flex:0 0 83.333333%;max-width:83.333333%}.col-11{flex:0 0 91.666667%;max-width:91.666667%}.col-12{flex:0 0 100%;max-width:100%}.d-block{display:block!important}@media (min-width:768px){.col-md-8{flex:0 0 66.66667%;max-width:66.66667%}.col-md-12{flex:0 0 100%;max-width:100%}.offset-md-2{margin-left:16.66667%}.col-md-3{-webkit-box-flex:0;flex:0 0 25%;max-width:25%}}@media (min-width:576px){.d-sm-none{display:none!important}.d-sm-flex{display:flex!important}}@media (min-width:992px){[class^=col]{padding-right:15px;padding-left:15px}.col-lg-9{flex:0 0 75%;max-width:75%}.col-lg-8{flex:0 0 66.66667%;max-width:66.66667%}.col-lg-4{flex:0 0 33.33333%;max-width:33.33333%}.col-lg-3{flex:0 0 25%;max-width:25%}.offset-lg-1{margin-left:8.33333%}}@media (min-width:992px){.d-lg-none{display:none!important}}.justify-content-center{justify-content:center!important}*,:after,:before,html{box-sizing:border-box}img,svg{vertical-align:middle}img{border-style:none}svg{overflow:hidden}button{text-transform:none;border-radius:0}button,input{margin:0;overflow:visible;font-size:inherit;font-family:inherit;line-height:inherit}[type=submit],button{-webkit-appearance:button}[type=submit]::-moz-focus-inner,button::-moz-focus-inner{padding:0;border-style:none}[type=search]{outline-offset:-2px;-webkit-appearance:none}[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{font:inherit;-webkit-appearance:button}#content{order:1;border-top:1px solid transparent}@media (max-width:991px){#content{order:0}}.title-and-filters-container{display:flex;justify-content:space-between}.m-search-box{padding:42px 0 12px;background-color:#ececec}.m-search-box__form{position:relative;width:100%}.m-search-box__form ::placeholder{color:#3e769e;font-style:italic;opacity:1}.m-search-box__form :-ms-input-placeholder{color:#3e769e;font-style:italic}.m-search-box__form ::-ms-input-placeholder{color:#3e769e;font-style:italic}.m-search-box__form--small{position:relative;height:35px}.m-search-box__form--small .m-search-box__submit{top:3px;right:4px;width:30px;height:30px;color:#3e769e;font-size:13px;background:#f7f7f7}.m-search-box__form--small .m-search-box__submit:active,.m-search-box__form--small .m-search-box__submit:focus,.m-search-box__form--small .m-search-box__submit:hover{color:#fff;background:#3e769e}@media (max-width:767px){.m-search-box__form--small .m-search-box__submit--opened{color:#fff;background:#3e769e}.m-search-box__form--small .m-search-box__submit--opened:before{position:absolute;top:6px;left:-7px;width:0;height:0;border-top:10px solid transparent;border-right:15px solid #3e769e;border-bottom:10px solid transparent;content:""}}.m-search-box__form--small .m-search-box__input{display:inline-block;padding:6px 18px;text-indent:0;outline:none;box-shadow:inset 0 0 3px #ececec}@media (max-width:991px){.m-search-box__form--small .m-search-box__input{display:inline-block;transform:translateX(200px);transition:transform .3s ease-in-out;pointer-events:auto}.m-search-box__form--small .m-search-box__input--opened{transform:none}}@media (max-width:991px){.m-search-box__form--small .m-search-box__input-wrp{position:absolute;top:0;right:35px;width:200px;overflow:hidden;pointer-events:none}}.m-search-box__input{width:100%;padding:14px 0;text-indent:27px;border:1px solid #e3e3e3;pointer-events:auto}.m-search-box__input::-webkit-search-cancel-button{display:none}.m-search-box__input::-ms-clear{display:none}.m-search-box__input:active,.m-search-box__input:focus{outline:none;box-shadow:inset 0 0 3px #ececec}.m-search-box__submit{position:absolute;top:9px;right:11px;width:32px;height:32px;padding:0;color:#3e769e;font-size:17px;line-height:1;background:#ececec;border:none;border-radius:50%;cursor:pointer}.m-search-box__submit:hover{background:#d3d3d3}.m-search-box__popular{margin:4px 0 0;padding-left:17px;text-transform:uppercase;list-style-type:none}.m-search-box__popular li{display:inline-block;float:left;margin-right:17px}.m-search-box__popular li a{color:#354043;font-size:14px}.m-navigation{position:relative;margin:0;padding:0;font-family:BasicCommercialLTW04-Light,sans-serif;background-color:#031128}@media (max-width:991px){.m-navigation .container{max-width:1200px;overflow-x:scroll;scroll-behavior:smooth}}.m-navigation__list{height:40px;margin:0;padding:0;list-style-type:none}.m-navigation__arrow{position:absolute;top:7px;width:29px;color:#fff;font-size:20px;text-align:center}.m-navigation__arrow--left{left:0;line-height:1;transform:rotate(180deg)}.m-navigation__arrow--right{right:0}.m-navigation__item{display:inline-block;float:left;padding:8px 100px 8px 0}@media (max-width:991px){.m-navigation__item{padding-right:15px;padding-left:15px}}.m-navigation__item:hover .m-navigation__link{color:#1bafcd}.m-navigation__item:hover .m-navigation__link svg path{fill:#1bafcd}.m-navigation__item:hover .sub-menu{display:block}.m-navigation__link{color:#fff;font-weight:700;font-size:14px;text-transform:uppercase}.m-navigation__link:focus,.m-navigation__link:hover{color:#1bafcd;text-decoration:none}.m-navigation__link:focus svg path,.m-navigation__link:hover svg path{fill:#1bafcd}.m-navigation__chevron{display:inline-block;margin-left:5px}.m-navigation__chevron svg{margin-top:-2px}.m-navigation__chevron svg path{fill:#fff}.sub-menu{position:absolute;top:39px;left:0;z-index:1;display:none;width:100%;padding:21px 0 10px;background-color:rgba(3,17,40,.9);border-top:2px solid #1bafcd}.sub-menu__list{max-width:1170px;margin:0 auto;padding-left:0;list-style-type:none}.sub-menu__item{display:inline-block;margin-bottom:8px}.sub-menu__link{padding:5px 15px;color:#fff;font-weight:700;font-size:14px;text-decoration:none}.sub-menu__link:hover{color:#031128;text-decoration:none;background-color:#1bafcd;border-radius:25px}.breadcrumbs{overflow:hidden;font-size:14px;font-family:BasicCommercialLTW04-Light,sans-serif;line-height:1}@media (max-width:991px){.breadcrumbs{overflow-x:scroll}}.breadcrumbs__list{padding-left:0;list-style-type:none}@media (max-width:991px){.breadcrumbs__list{display:flex;margin-bottom:0}}.breadcrumbs__item{float:left;padding-right:6px;padding-left:6px;white-space:nowrap}.breadcrumbs__item:first-of-type{padding-left:0}.breadcrumbs__item:first-of-type:before{display:none}.breadcrumbs__item a{color:#000;font-style:italic}.coupon__see-details{display:inline-block;color:#0173b9;font-weight:700;font-size:14px;cursor:pointer}.coupon__see-details--opened:after{transform:rotate(-90deg)}.coupon__see-details:hover{text-decoration:none}.coupon__see-details:hover span{text-decoration:underline}.coupon__tag{position:absolute;top:11px;right:11px;color:#595959;font-size:14px}.coupon__tag:before{margin-right:3px;font-size:14px;font-family:simple;content:"\e919"}.coupon__text{display:-webkit-box;max-height:48px;margin-top:12px;padding-right:10px;overflow:hidden;font-size:14px;line-height:1.3;-webkit-box-orient:vertical;-webkit-line-clamp:2;text-overflow:ellipsis}.coupon__text--full{display:inline-block;max-height:500px}.coupon__text--full .coupon-info{display:block}.coupon__text--hidden{display:none;max-height:0}.search-header{width:100%;margin:23px 0}.search-container{position:relative;justify-content:space-between;width:100%}.flyout{position:fixed;right:0;bottom:175px;z-index:100;display:grid;grid-template-columns:80px auto auto;align-items:center;width:515px;height:auto;min-height:150px;padding:15px 21px 20px 48px;color:#000;font-family:BasicCommercialLTW04-Light,sans-serif;background-color:#f5f5f5;border-radius:15px 0 0 15px;box-shadow:-5px 7px 17px rgba(0,0,0,.34);transform:translateX(150%);transition:transform .3s ease-in-out}@media (max-width:575px){.flyout{grid-template-areas:"logo text" "btn btn";justify-items:center;width:90%;height:165px;padding:16px 10px 15px 47px}}.flyout:before{position:absolute;left:0;width:30px;height:100%;background-color:#04777b;background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg width='18' height='20' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M18 16.26l-.205-.185a8.821 8.821 0 01-1.517-1.808 7.92 7.92 0 01-.815-2.967V8.252a6.753 6.753 0 00-1.623-4.418A6.49 6.49 0 009.76 1.62V.824A.833.833 0 009.525.24a.798.798 0 00-1.14 0 .833.833 0 00-.237.583v.808a6.492 6.492 0 00-4.033 2.23 6.754 6.754 0 00-1.602 4.39V11.3a7.92 7.92 0 01-.816 2.967 8.843 8.843 0 01-1.492 1.808L0 16.26V18h18v-1.74zM7 19c.067.277.306.531.674.715.367.184.838.285 1.326.285.488 0 .959-.101 1.326-.285.368-.184.607-.438.674-.715H7z' fill='%23fff'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position-x:center;background-position-y:center;border-radius:15px 0 0 15px;content:""}@media (max-width:575px){.flyout:before{height:165px}}.flyout__close-btn{position:absolute;top:-20px;right:16px;width:40px;height:40px;background-color:#c4c4c4;background-image:url("data:image/svg+xml;charset=utf-8,%3Csvg width='16' height='16' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M14.667 14.667L1.333 1.333m13.334 0L1.333 14.667' stroke='%23000' stroke-width='2' stroke-linecap='round'/%3E%3C/svg%3E");background-repeat:no-repeat;background-position-x:center;background-position-y:center;border-radius:50%;cursor:pointer;content:""}.flyout__close-btn:hover{background-color:#959595}.flyout--visible{transform:translateX(0)}.flyout--hide{transform:translateX(calc(100% - 30px))}.flyout--default{padding:11px 15px 11px 47px}.flyout__logo{display:flex;flex-direction:column;justify-content:center;width:80px;height:80px;color:#000}@media (max-width:575px){.flyout__logo{grid-area:logo}}.flyout__logo--default{flex:1 0 83px;height:60px;border-right:2px solid #fff}.flyout__logo--first{background-color:#fff}.flyout__amount{font-weight:700}.flyout__amount,.flyout__type{line-height:1.5em}.flyout__text{padding:0 20px;font-weight:300;font-size:20px;line-height:1.4;text-align:center}@media (max-width:575px){.flyout__text{grid-area:text;padding:0 10px;font-size:16px;text-align:left}}.flyout__text:first-line{font-weight:700}.flyout__clickout{display:flex;align-items:center;justify-content:center;width:115px;height:40px;background:#04777b;border-radius:5px;cursor:pointer}@media (max-width:575px){.flyout__clickout{grid-area:btn}}.flyout__clickout--default{padding:8px 16px;font-weight:700;font-size:11px;line-height:1;white-space:nowrap;text-align:center;border:1px solid #fff;border-radius:30px}@media (max-width:575px){.flyout__clickout--default{padding:8px;font-size:10px}}.flyout__clickout--default:hover{background-color:#fff}.flyout__button{color:#fff;font-size:16px}.flyout__button:hover{color:#fff;font-weight:700;text-decoration:none}.head-disclaimer{position:relative;top:0;width:100%;padding:3px;color:#fff;font-weight:400;font-size:12px;text-align:center;background:#000}.head-disclaimer-text{margin:0}.browserupgrade{display:none}.no-borderimage body>*,.no-flexbox body>*{display:none!important}.no-borderimage .browserupgrade,.no-flexbox .browserupgrade{display:block!important;padding-top:20px;font-size:18px;text-align:center}.no-borderimage .browserupgrade a,.no-flexbox .browserupgrade a{text-decoration:underline}.climate-banner{margin:10px 0;background-color:rgba(68,151,132,.05);border-color:#449784;border-style:solid;border-width:1px 0}.climate-banner__link:hover{text-decoration:none}.climate-banner__wrapper{display:grid;grid-template-areas:"logo heading description button";grid-template-columns:1fr 3fr 7fr 155px;align-items:center;min-height:34px;padding:0 15px;font-size:13px;line-height:15px}@media (max-width:767px){.climate-banner__wrapper{display:block;padding:0;text-align:center}}.climate-banner__wrapper img{grid-area:logo;width:35px;height:auto;margin:4px auto}@media (max-width:767px){.climate-banner__wrapper img{display:inline-block;margin:4px 0}}.climate-banner__wrapper .climate-banner__heading{display:inline-block;grid-area:heading;padding:0 10px;color:#000;font-weight:500}@media (max-width:767px){.climate-banner__wrapper .climate-banner__heading{text-align:left;text-decoration:underline}}.climate-banner__wrapper .climate-banner__body{display:inline-block;grid-area:description;padding:0 10px;color:#555;font-weight:300}@media (max-width:767px){.climate-banner__wrapper .climate-banner__body{display:none}}.climate-banner__wrapper .climate-banner__cta{grid-area:button;padding:10px 11px 8px;color:#fff;font-weight:600;font-size:10px;line-height:13px;text-align:center;background-color:#449784;border-radius:100px}@media (max-width:767px){.climate-banner__wrapper .climate-banner__cta{display:none}}.hero{height:300px;border:1px solid #e3e3e3;box-shadow:0 0 10px rgba(0,0,0,.1)}@media (max-width:767px){.hero{height:auto;min-height:150px}}.hero__wrapper{margin:10px 0 20px;background-color:#f7f7f7}@media (max-width:1199px){.hero__wrapper{margin:0}}.hero__links{flex-wrap:wrap;align-items:center;margin:0 0 10px;padding:0;overflow:hidden;list-style-type:none}.hero__link,.hero__links{display:flex;background-color:#fff}.hero__link{flex-grow:1;justify-content:space-around;height:90px;margin-top:-1px;margin-left:-1px;border-top:1px solid rgba(0,0,0,.1);border-left:1px solid rgba(0,0,0,.1)}.hero__link:hover{text-decoration:underline;cursor:pointer}.hero__link--divider{height:100%;border-right:1px solid #354043;opacity:.1}.hero__link a{align-self:center;padding:14px 16px;color:#354043;text-decoration:none}.sponsor-bar{height:100px;margin:10px 0;padding:10px 45px;background:#f2f2f2}@media (max-width:767px){.sponsor-bar{height:auto;padding:10px 20px}}.sponsor-bar a:hover{color:initial}.sponsor-bar__container{display:grid;grid-template:"logo title button" "logo desc button";grid-template-columns:1fr 4fr 1fr;gap:5px;align-items:center;height:100%;color:#3d3d3d}@media (max-width:767px){.sponsor-bar__container{grid-template:"title title logo" auto "desc desc logo" auto "button button logo" auto/1fr 1fr 1fr}}.sponsor-bar__logo{grid-area:logo;max-height:80px}@media (max-width:767px){.sponsor-bar__logo{max-height:70px;margin:0 auto}}.sponsor-bar__title{grid-area:title;color:#000;font-weight:700;font-size:25px;line-height:30px}@media (max-width:767px){.sponsor-bar__title{font-size:16px;line-height:19px}}.sponsor-bar__text{display:inline-block;grid-area:desc;width:100%;font-weight:400;font-size:20px;line-height:24px;letter-spacing:.05em}@media (max-width:767px){.sponsor-bar__text{font-size:16px;line-height:19px}}.sponsor-bar__btn{grid-area:button;font-size:14px;line-height:18px;background-color:#04777b;border-radius:0}@media (max-width:767px){.sponsor-bar__btn{width:80%;min-width:auto;padding:5px;font-size:14px;line-height:17px}.sponsor-bar__btn.o-button{margin:0}}.new_premium_hero{margin:26px -15px}.new_premium_hero__logo{z-index:1;display:flex;align-items:center;justify-content:center;width:118px;height:118px;margin:0 8px;overflow:hidden;text-align:center;background:#fff;border-radius:50%}@media (max-width:767px){.new_premium_hero__logo{height:80px!important}}.new_premium_hero__img{padding:15px}@media (max-width:767px){.new_premium_hero__img{max-width:80px;max-height:80px}}.new_premium_hero__item{display:flex;align-items:center;justify-content:center;width:100%;height:240px;color:#fff;background-repeat:no-repeat;background-size:cover;-webkit-transition:none!important}@media (min-width:992px){.new_premium_hero__item{background-position:top}.new_premium_hero__item--50{width:50%}.new_premium_hero__item--50:first-child{float:left}.new_premium_hero__item--50:nth-child(2){float:right;border-left:1px solid #fff}}@media (max-width:767px){.new_premium_hero__item{width:100%;height:145px;margin-bottom:5px}}.new_premium_hero__item:hover{color:#fff;text-decoration:none}.new_premium_hero:hover{color:#fff;text-decoration:none}@media (max-width:767px){.new_premium_hero__headline{font-size:18px}}@media (min-width:768px){.new_premium_hero__headline{margin:10px;font-size:40px;line-height:1;text-align:left}}@media (min-width:992px){.new_premium_hero__headline--50{font-size:30px}}.new_premium_hero__content{margin:-15px 10px 10px;font-weight:400;text-align:left}@media (min-width:992px){.new_premium_hero__content{font-size:30px;line-height:1}.new_premium_hero__content--50{font-size:24px}}@media (max-width:767px){.new_premium_hero__content{margin-left:0;font-size:16px}}.new_premium_hero--opacity-white:before{position:absolute;top:0;left:0;display:block;width:100%;height:100%;background:rgba(0,0,0,.48);content:""}.new_premium_hero .hero__links{padding:0 15px;background:transparent}.new_premium_hero .hero__link{height:60px;margin:0}.campaigns .new_premium_hero .hero__links{display:none}.premium-slider{margin:26px -15px}.premium-slider__container{position:relative;display:flex;align-items:center;height:100%;scroll-snap-type:x mandatory;overflow-x:scroll;overflow-y:hidden;scroll-behavior:smooth}.premium-slider__container::-webkit-scrollbar{display:none}.premium-slider__arrow{position:absolute;top:0;width:90px;height:100%;cursor:pointer}.premium-slider__arrow i:before{position:absolute;top:50%;left:50%;width:auto;margin:0;color:#fff;font-size:40px;transform:translate(-50%,-50%)}.premium-slider__arrow:focus,.premium-slider__arrow:hover{background:rgba(0,0,0,.48)}.premium-slider__arrow:active{background:transparent}@media (max-width:991px){.premium-slider__arrow{display:none}}.premium-slider__arrow--left{left:15px}.premium-slider__arrow--left i:before{transform:translate(-50%,-50%) rotate(180deg)}.premium-slider__arrow--right{right:15px}.premium-slider__indicator-list{position:absolute;bottom:19px;display:flex;justify-content:center;width:100%;margin:0 -15px;padding:0;list-style-type:none}@media (max-width:767px){.premium-slider__indicator-list{bottom:9px}}.premium-slider__indicator-item span{display:block;width:16px;height:16px;margin:8px;background-color:#fff;border-radius:50%;cursor:pointer;opacity:.5}@media (max-width:767px){.premium-slider__indicator-item span{width:12px;height:12px;margin:0 5px}}.premium-slider__indicator-item--active span{opacity:1}.premium-slider__logo{z-index:1;display:flex;align-items:center;justify-content:center;width:118px;height:118px;margin:0 8px;overflow:hidden;text-align:center;background:#fff;border-radius:50%}@media (max-width:767px){.premium-slider__logo{height:80px!important}}.premium-slider__img{padding:15px}@media (max-width:767px){.premium-slider__img{max-width:80px;max-height:80px}}.premium-slider__item{position:relative;display:flex;align-items:center;justify-content:center;scroll-snap-align:center;width:100%;min-width:100%;height:240px;color:#fff;background-repeat:no-repeat;background-size:cover;-webkit-transition:none!important}@media (max-width:767px){.premium-slider__item{width:100%;height:240px}}.premium-slider__item:hover{color:#fff;text-decoration:none}.premium-slider:hover{color:#fff;text-decoration:none}@media (max-width:767px){.premium-slider__headline{font-size:18px}}@media (min-width:768px){.premium-slider__headline{margin:10px;font-size:40px;line-height:1;text-align:left}}@media (min-width:992px){.premium-slider__headline--50{font-size:30px}}.premium-slider__content{margin:-15px 10px 10px;font-weight:400;text-align:left}@media (min-width:992px){.premium-slider__content{font-size:30px;line-height:1}.premium-slider__content--50{font-size:24px}}@media (max-width:767px){.premium-slider__content{margin-left:0;font-size:16px}}.premium-slider--opacity-white{position:relative}.premium-slider--opacity-white:before{position:absolute;top:0;left:0;display:block;width:100%;height:100%;background:rgba(0,0,0,.48);content:""}.premium-slider__links{display:flex;flex-wrap:wrap;align-items:center;margin:0 0 10px;padding:0;overflow:hidden;list-style-type:none;background-color:#fff}.premium-slider__link{display:flex;flex-grow:1;justify-content:space-around;height:60px;margin:0;background-color:#fff;border-top:1px solid rgba(0,0,0,.1);border-left:1px solid rgba(0,0,0,.1)}@media (max-width:767px){.premium-slider__link{justify-content:flex-start}}.premium-slider__link:hover{text-decoration:underline;cursor:pointer}.premium-slider__link--divider{height:100%;border-right:1px solid #354043;opacity:.1}.premium-slider__link a{align-self:center;padding:14px 16px;color:#354043;text-decoration:none}.coupon-filter{margin-bottom:0;padding-left:0;text-align:right;list-style-type:none}@media (max-width:575px){.coupon-filter{padding:10px 0;text-align:center}}.coupon-filter li{display:inline-block;margin-left:5px;color:#0173b9;cursor:pointer}.coupon-filter li.active{text-decoration:underline}@media (max-width:991px){.coupons.index #content{order:2}.coupons.index .sidebar{margin-bottom:20px}}body{font-family:BasicCommercialLTW04-Light,sans-serif}.m-search-box,body .featured-shops{background-color:#fff}*{-webkit-font-smoothing:antialiased}.hero__links{order:1}.hero{order:2}.topbar{display:none}.t-topbar{height:60px;background:#fff}.t-topbar .row{justify-content:space-between}.t-topbar__triangle{float:right}.t-topbar__link{display:flex;flex-flow:column;justify-content:center;padding-left:15px}.t-topbar__link:active,.t-topbar__link:focus,.t-topbar__link:hover{text-decoration:none}@media (min-width:426px){.t-topbar__link{flex-flow:wrap;align-items:center}}@media (max-width:375px){.t-topbar__link{padding-left:5px}}@media (max-width:767px){.t-topbar__desktop{display:none}}.t-topbar__mobile{display:none}@media (max-width:767px){.t-topbar__mobile{display:block}}@media (max-width:375px){.t-topbar__mobile svg{width:190px}}.t-topbar__right{display:flex;align-items:center;margin:10px 0}.t-topbar__triangle{display:inline-block}@media (max-width:767px){.t-topbar__triangle{display:none}}.t-topbar__subscribe{position:relative;display:flex;flex-flow:column;height:100%;padding:8px 30px 8px 9px;color:#072a3a;font-size:13px;font-family:Aileron,sans-serif;line-height:1.1;text-decoration:none;background-color:#56c0ab;transition:all .1s ease-in-out}.t-topbar__subscribe-text{display:inline-block}.t-topbar__subscribe-desc{font-size:10px;line-height:1.1}@media (max-width:375px){.t-topbar__subscribe-desc{font-size:10px}}.t-topbar__subscribe:hover{color:#fff;text-decoration:none;background-color:#04777b}@media (max-width:375px){.t-topbar__subscribe{padding:8px 9px}}@media (max-width:767px){.t-header{position:relative;z-index:1041}}.backlink{padding:10px 14px;color:#fff;font-size:13px}@media (max-width:767px){.backlink{display:none}}.backlink-wrapper{display:flex;align-items:center;height:100%;font-family:OptimaNovaLTProRegular,sans-serif;background-color:#0f364b}.m-navigation{height:55px;background-color:#072a3a}@media (max-width:767px){.m-navigation{height:46px;padding-left:8px}}.m-navigation__item{height:46px;padding:11px 5px 8px;border-bottom:4px solid transparent;border-left:1px solid #0a394c}@media (min-width:768px){.m-navigation__item{height:55px;padding:15px 5px}}.m-navigation__item:hover{padding-bottom:2px;border-bottom:4px solid #02c3aa}@media (min-width:1200px){.m-navigation__item:hover{padding-bottom:12px}}.m-navigation__item:last-of-type{border-right:1px solid #0a394c}.m-navigation__item:first-child{border-left:none}.m-navigation__arrow{display:none;width:24px;height:24px;color:#0a394c;font-size:17px;background:#fff}.m-navigation .m-navigation__item:hover .m-navigation__link,.m-navigation .m-navigation__link:focus,.m-navigation .m-navigation__link:hover{color:#fff}.m-navigation__chevron--down{display:none}.icon-chevron-right:before{display:inline-block;width:10px;margin-top:5px}.m-navigation__link,.sub-menu__link{font-weight:400;font-size:16px;font-family:Aileron,sans-serif;text-transform:none}a.sub-menu__link{font-family:Aileron,sans-serif}.m-search-box{padding:0}.m-search-box__input{font-size:16px;font-family:BasicCommercialLTW04-Light,sans-serif;text-indent:57px;background:#f8f8f8}.m-search-box__submit{right:0;left:10px;color:#000;background:transparent}.m-search-box__submit:hover{background:inherit}.m-search-box__submit .icon-lens{font-size:15px;line-height:1.5}.m-search-box__popular{width:100%;font-family:BasicCommercialLTW04-Light,sans-serif;text-transform:capitalize}@media (max-width:991px){.m-search-box__popular{display:flex;order:2;margin:15px 0 0;padding-bottom:5px;padding-left:0;overflow-x:auto;overflow-y:hidden;white-space:nowrap;list-style:none}}@media (min-width:992px){.m-search-box__popular{display:flex;justify-content:left;order:2;width:100%;margin-bottom:29px;padding:0 15px;color:#fff}}.m-search-box__popular li{margin-right:unset;padding:10px 28px 10px 10px;background:#f9f6f2;border:1px solid #ddd}@media (min-width:1200px){.m-search-box__popular li{float:left;min-width:auto;height:100%;padding:10px 11.5px 10px 12px;overflow:hidden;white-space:pre;text-align:center;text-overflow:ellipsis}}@media (min-width:992px){.m-search-box__popular li{width:100%}.m-search-box__popular li:last-child{width:123%}.m-search-box__popular li:nth-child(3){width:152%}}@media (max-width:991px){.m-search-box__popular li a{color:#222;font-size:16px;line-height:24px}}@media (min-width:992px){.m-search-box__popular li a{color:#222;font-size:16px;line-height:24px;text-transform:capitalize}}.m-search-box__form :-ms-input-placeholder,.m-search-box__form ::-ms-input-placeholder,.m-search-box__form ::placeholder{color:#b5b5b5;font-size:16px;font-style:normal}@media (max-width:767px){.m-search-box__form{position:relative;width:auto;margin:10px}}.m-search-box__form--small .m-search-box__input{text-indent:20px}.m-search-box__form--small .m-search-box__submit,.m-search-box__form--small .m-search-box__submit:hover{color:#000;background:transparent}@media (max-width:991px){.m-search-box__form--small .m-search-box__input-wrp{right:0}}@media (max-width:767px){.m-search-box__form--small .m-search-box__submit--opened:before{display:none}}input#input_search_header::placeholder{color:#000;font-style:normal}@media (min-width:992px){.search-container{padding-right:15px;padding-left:15px}}.breadcrumbs__item a,.breadcrumbs__item a:hover,.breadcrumbs__item span{color:#000;font-family:BasicCommercialLTW04-Light,sans-serif;font-style:normal}.new_premium_hero{margin:26px 0}.new_premium_hero--opacity-white{position:relative}.new_premium_hero--opacity-white:before{background:rgba(4,119,123,.6);mix-blend-mode:multiply}.new_premium_hero>.row .col .container{padding:0}.new_premium_hero .hero__link{font-family:BasicCommercialLTW04-Light,sans-serif;background-color:#f9f6f2}@media (max-width:991px){.new_premium_hero .hero__link{margin:5px 0;background-color:#f9f6f2;border:1px solid #ddd}}@media (min-width:992px){.new_premium_hero .hero__link{margin:5px 5px 5px 0;border:1px solid #ddd}}.new_premium_hero .hero__link a{color:#222;font-weight:400;font-size:16px;line-height:24px}.new_premium_hero .hero__links{margin-bottom:0}@media (min-width:992px){.new_premium_hero .hero li.hero__link:last-child{margin-right:0}}@media (min-width:768px){.new_premium_hero__headline{line-height:40px}}.page-subtitle,.page-title{color:#222;font-weight:600;font-size:26px;font-family:OptimaNovaLTProRegular,sans-serif;font-style:normal;font-stretch:normal;line-height:1.15;letter-spacing:normal}.page-subtitle{font-weight:400;font-size:20px;font-family:BasicCommercialLTW04-Light,sans-serif}.shop-banner{max-width:100%}.shop-banner img{width:100%}.coupon-filter{min-height:27px;margin-bottom:15px;font-family:Aileron,sans-serif;border-bottom:1px solid #d8d8d8}.coupon-filter li{color:#222}.coupon-filter li:hover{border-bottom:3px solid #04777b}.coupon-filter li.active{font-weight:700;text-decoration:none;border-bottom:3px solid #04777b}.categories .page-subtitle{color:#222;font-weight:400;font-size:16px;font-family:BasicCommercialLTW04-Light,sans-serif;font-style:normal;font-stretch:normal;line-height:1.5;letter-spacing:normal}.w-featured__content .coupon__label{font-size:14px}.coupon__tag{top:0;right:10px;left:auto;color:#00797e}.coupon__tag:before{position:absolute;top:-1px;left:-23px;content:url("data:image/svg+xml;charset=utf-8,%3Csvg width='19' height='25' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg filter='url(%23filter0_d)'%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%23fff'/%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%23fff'/%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%23fff'/%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%2300797E'/%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_d' x='0' y='0' width='19' height='25' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeColorMatrix in='SourceAlpha' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0'/%3E%3CfeOffset dy='2'/%3E%3CfeGaussianBlur stdDeviation='1'/%3E%3CfeColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0'/%3E%3CfeBlend in2='BackgroundImageFix' result='effect1_dropShadow'/%3E%3CfeBlend in='SourceGraphic' in2='effect1_dropShadow' result='shape'/%3E%3C/filter%3E%3C/defs%3E%3C/svg%3E")}@media (max-width:991px){.coupon__tag{top:-1px;font-size:10px}}.deals .coupon__label{width:unset;min-width:90px}@media (min-width:992px){.home .coupon__label{margin-top:0}.home .coupon__tag{border:none}.categories .w-featured__exclusive,.coupons .w-featured__exclusive,.searches .w-featured__exclusive{margin-bottom:30px}.coupon__label--exclusive{display:inline-block;padding:4px 6px 2px 0;color:#fff;font-weight:700;background-color:#00797e;border:none;border-radius:0}.coupon__label--exclusive:before{display:inline-block;padding:0 5px;font-family:simple;content:""}.categories .coupon__label--exclusive,.coupons .coupon__label--exclusive,.searches .coupon__label--exclusive,.shops .coupon__label--exclusive{position:absolute;width:auto;padding-right:10px;color:#fff;font-weight:700;border:none;border-radius:0}}@media (min-width:992px) and (max-width:1199px){.categories .coupon__label--exclusive,.coupons .coupon__label--exclusive,.searches .coupon__label--exclusive,.shops .coupon__label--exclusive{font-size:13px}}@media (min-width:992px){.categories .coupon--large .coupon__label--exclusive,.coupons .coupon--large .coupon__label--exclusive,.searches .coupon--large .coupon__label--exclusive,.shops .coupon--large .coupon__label--exclusive{bottom:12px;margin-left:179px;color:#00797e;background-color:#fff}}@media (min-width:992px) and (max-width:1199px) and (min-width:992px){.categories .coupon--large .coupon__label--exclusive,.coupons .coupon--large .coupon__label--exclusive,.searches .coupon--large .coupon__label--exclusive,.shops .coupon--large .coupon__label--exclusive{margin-left:150px}}@media (min-width:992px){.categories .coupon--large .coupon__tag,.coupons .coupon--large .coupon__tag,.searches .coupon--large .coupon__tag,.shops .coupon--large .coupon__tag{top:0;color:#fff;font-size:20px;border:none}.categories .coupon--large .coupon__tag:before,.coupons .coupon--large .coupon__tag:before,.searches .coupon--large .coupon__tag:before,.shops .coupon--large .coupon__tag:before{left:-28px;width:24px;content:url("data:image/svg+xml;charset=utf-8,%3Csvg width='23' height='30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg filter='url(%23filter0_d)' fill='%23fff'%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_d' x='0' y='0' width='23' height='29.293' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeColorMatrix in='SourceAlpha' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0'/%3E%3CfeOffset dy='2'/%3E%3CfeGaussianBlur stdDeviation='1'/%3E%3CfeColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0'/%3E%3CfeBlend in2='BackgroundImageFix' result='effect1_dropShadow'/%3E%3CfeBlend in='SourceGraphic' in2='effect1_dropShadow' result='shape'/%3E%3C/filter%3E%3C/defs%3E%3C/svg%3E")}}@media (max-width:991px){.coupon__label.coupon__label--exclusive{position:absolute;padding:3px 7px 3px 1px;color:#fff;font-weight:700;font-size:12px;background-color:#00797e;border:none;border-radius:0}.coupon__label.coupon__label--exclusive:before{padding:0 5px;font-family:simple;content:""}.coupons-list .coupon .coupon__tag{right:10px;left:auto;color:#00797e}.coupons-list .coupon .coupon__tag:before{content:url("data:image/svg+xml;charset=utf-8,%3Csvg width='19' height='25' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg filter='url(%23filter0_d)'%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%23fff'/%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%23fff'/%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%23fff'/%3E%3Cpath d='M2 21V0h15v21l-7.857-5.513L2 21z' fill='%2300797E'/%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_d' x='0' y='0' width='19' height='25' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeColorMatrix in='SourceAlpha' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0'/%3E%3CfeOffset dy='2'/%3E%3CfeGaussianBlur stdDeviation='1'/%3E%3CfeColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0'/%3E%3CfeBlend in2='BackgroundImageFix' result='effect1_dropShadow'/%3E%3CfeBlend in='SourceGraphic' in2='effect1_dropShadow' result='shape'/%3E%3C/filter%3E%3C/defs%3E%3C/svg%3E")}}@media (max-width:991px) and (max-width:767px){.coupons-list .coupon .coupon__tag{top:110px;left:35px;z-index:1;font-size:10px}.coupons-list .coupon .coupon__tag:before{position:absolute;left:-20px}}@media (max-width:991px){.categories .coupon__label--exclusive,.coupons .coupon__label--exclusive,.searches .coupon__label--exclusive,.shops .coupon__label--exclusive{position:absolute;width:90px;padding-right:10px;color:#fff;font-weight:700;border:none;border-radius:0}}@media (max-width:991px) and (min-width:576px){.categories .coupon__label--exclusive,.coupons .coupon__label--exclusive,.searches .coupon__label--exclusive,.shops .coupon__label--exclusive{width:100%}}@media (max-width:991px){.categories .coupon__label--exclusive:before,.coupons .coupon__label--exclusive:before,.searches .coupon__label--exclusive:before,.shops .coupon__label--exclusive:before{padding:0 5px}.categories .coupon--large .coupon__label--exclusive,.coupons .coupon--large .coupon__label--exclusive,.searches .coupon--large .coupon__label--exclusive,.shops .coupon--large .coupon__label--exclusive{width:100%;color:#00797e;font-size:14px;background-color:#fff}}@media (max-width:991px) and (min-width:992px){.categories .coupon--large .coupon__label--exclusive,.coupons .coupon--large .coupon__label--exclusive,.searches .coupon--large .coupon__label--exclusive,.shops .coupon--large .coupon__label--exclusive{min-width:140px}}@media (max-width:991px) and (max-width:575px){.categories .coupon--large .coupon__label--exclusive,.coupons .coupon--large .coupon__label--exclusive,.searches .coupon--large .coupon__label--exclusive,.shops .coupon--large .coupon__label--exclusive{margin-top:27px}}@media (max-width:991px){.categories .coupon--large .coupon__tag,.coupons .coupon--large .coupon__tag,.searches .coupon--large .coupon__tag,.shops .coupon--large .coupon__tag{font-size:10px;border:none}}@media (max-width:991px) and (max-width:575px){.categories .coupon--large .coupon__tag,.coupons .coupon--large .coupon__tag,.searches .coupon--large .coupon__tag,.shops .coupon--large .coupon__tag{top:108px}}@media (max-width:991px){.categories .coupon--large .coupon__tag:before,.coupons .coupon--large .coupon__tag:before,.searches .coupon--large .coupon__tag:before,.shops .coupon--large .coupon__tag:before{float:left;margin-left:0;font-size:14px;content:url("data:image/svg+xml;charset=utf-8,%3Csvg width='23' height='30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg filter='url(%23filter0_d)' fill='%23fff'%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_d' x='0' y='0' width='23' height='29.293' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeColorMatrix in='SourceAlpha' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0'/%3E%3CfeOffset dy='2'/%3E%3CfeGaussianBlur stdDeviation='1'/%3E%3CfeColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0'/%3E%3CfeBlend in2='BackgroundImageFix' result='effect1_dropShadow'/%3E%3CfeBlend in='SourceGraphic' in2='effect1_dropShadow' result='shape'/%3E%3C/filter%3E%3C/defs%3E%3C/svg%3E")}}@media (max-width:991px) and (max-width:991px){.categories .coupon--large .coupon__tag:before,.coupons .coupon--large .coupon__tag:before,.searches .coupon--large .coupon__tag:before,.shops .coupon--large .coupon__tag:before{content:url("data:image/svg+xml;charset=utf-8,%3Csvg width='23' height='17.28' viewBox='0 0 23 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cg filter='url(%23filter0_d)' fill='%23fff'%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3Cpath d='M2 25.293V0h19v25.293l-9.952-6.64L2 25.293z'/%3E%3C/g%3E%3Cdefs%3E%3Cfilter id='filter0_d' x='0' y='0' width='23' height='29.293' filterUnits='userSpaceOnUse' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-opacity='0' result='BackgroundImageFix'/%3E%3CfeColorMatrix in='SourceAlpha' values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0'/%3E%3CfeOffset dy='2'/%3E%3CfeGaussianBlur stdDeviation='1'/%3E%3CfeColorMatrix values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0'/%3E%3CfeBlend in2='BackgroundImageFix' result='effect1_dropShadow'/%3E%3CfeBlend in='SourceGraphic' in2='effect1_dropShadow' result='shape'/%3E%3C/filter%3E%3C/defs%3E%3C/svg%3E")}}@media (max-width:991px) and (max-width:991px){.categories .coupon--large .coupon__tag+.coupon__aside .coupon__label--exclusive,.coupons .coupon--large .coupon__tag+.coupon__aside .coupon__label--exclusive,.searches .coupon--large .coupon__tag+.coupon__aside .coupon__label--exclusive,.shops .coupon--large .coupon__tag+.coupon__aside .coupon__label--exclusive{margin-top:20px}}.campaigns .coupon__label--exclusive{margin:8px;font-size:13px;text-transform:capitalize}.campaigns .coupon__tag{position:absolute;top:0;left:auto}.campaigns .coupon__tag:before{top:0}@media (max-width:991px){.shops .coupon__label--exclusive{margin-top:27px}.shops .expired-coupons .coupon__label--exclusive{margin-top:7px}}@media (max-width:767px){.shops .coupons-list .coupon__tag{top:101px}}.categories .coupon__label--exclusive,.coupons .coupon__label--exclusive,.searches .coupon__label--exclusive{width:100px}@media (max-width:767px){.categories .coupon__aside img,.coupons .coupon__aside img,.searches .coupon__aside img{border:1px solid #e0e0e0}.categories .coupon__label--exclusive,.coupons .coupon__label--exclusive,.searches .coupon__label--exclusive{margin-top:25px}}@media (max-width:767px){.mobile-optimization-A .t-topbar{height:62px}.mobile-optimization-A .t-topbar__link{padding-left:12px}.mobile-optimization-A .t-topbar__mobile svg{width:186px}.mobile-optimization-A .t-topbar__subscribe{padding:11px 19px 11px 4px}.mobile-optimization-A .mobile-optimization-A .t-topbar__subscribe-desc,.mobile-optimization-A .t-topbar__subscribe-text{font-size:9px;line-height:10px}.mobile-optimization-A .m-navigation{height:36px}.mobile-optimization-A .m-navigation__item{height:36px;padding:5px 5px 6px}.mobile-optimization-A .m-navigation__link{font-size:13px;line-height:15px}.mobile-optimization-A .m-navigation__arrow{top:5px}.mobile-optimization-A .m-navigation__arrow i:before{margin-top:4px}.mobile-optimization-A .sub-nav-bar{padding:14px 0 6px}.mobile-optimization-A .breadcrumbs__item{padding:0}.mobile-optimization-A .breadcrumbs__item:before{margin-right:1px;margin-left:3px}.mobile-optimization-A .m-search-box__form{margin:0 10px 0 17px}}body.mobile-optimization-A{background-color:#fff}@media (max-width:767px){.mobile-optimization-B .t-topbar{height:62px}.mobile-optimization-B .t-topbar__link{padding-left:12px}.mobile-optimization-B .t-topbar__mobile svg{width:186px}.mobile-optimization-B .t-topbar__subscribe{padding:11px 19px 11px 4px}.mobile-optimization-B .mobile-optimization-B .t-topbar__subscribe-desc,.mobile-optimization-B .t-topbar__subscribe-text{font-size:9px;line-height:10px}.mobile-optimization-B .m-navigation{height:36px}.mobile-optimization-B .m-navigation__item{height:36px;padding:5px 5px 6px}.mobile-optimization-B .m-navigation__link{font-size:13px;line-height:15px}.mobile-optimization-B .m-navigation__arrow{top:5px}.mobile-optimization-B .m-navigation__arrow i:before{margin-top:4px}.mobile-optimization-B .sub-nav-bar{padding:14px 0 6px}.mobile-optimization-B .breadcrumbs__item{padding:0}.mobile-optimization-B .breadcrumbs__item:before{margin-right:1px;margin-left:3px}.mobile-optimization-B .m-search-box__form{margin:0 10px 0 17px}}body.mobile-optimization-B{background-color:#fff}.sidebar{background:#fff;border:1px solid #d3d3d3;box-shadow:0 1px 3px rgba(0,0,0,.11);margin-right:10px;padding:24px}.sidebar:hover{box-shadow:0 1px 3px rgba(0,0,0,.4)}@media (max-width:1200px){.sidebar{margin-right:0;padding:20px 10px 0}}.sidebar--static{margin-top:28px}.sidebar h3{font-weight:300;font-size:18px}.sidebar__logo{height:308px;border:1px solid #e3e3e3}.sidebar__logo-link{display:flex;align-items:center;justify-content:center;height:100%}.sidebar__shop-link{padding-top:24px;text-align:center}.sidebar .table{font-size:13px;table-layout:fixed}.sidebar .table-row--hover:hover{background-color:#eaeaea}.sidebar .table td{border-top:1px solid #ddd}.sidebar .table td.nowrap{white-space:nowrap}.sidebar__banner{margin-bottom:15px;cursor:pointer}.sidebar__banner a{display:block}.sidebar .widget{margin-bottom:15px;padding:18px 24px;font-size:14px;background-color:#f7f7f7}.sidebar .widget--rating{margin-top:24px;padding-bottom:8px}.sidebar .widget--summary a{display:block;color:inherit}.sidebar .widget--summary th:first-of-type{width:50%}.sidebar .widget--seo-text img{max-width:100%;height:auto}.sidebar .widget--seo-text h2{line-height:1.1;text-align:left!important}.sidebar .widget--seo-text ol,.sidebar .widget--seo-text ul{padding-left:20px}.star-rating{text-align:center}.star-rating.load{opacity:.6}.star-rating--voted .star-rating__list{opacity:.6;pointer-events:none}.star-rating-container{text-align:center}.star-rating__list{display:inline-block;margin-bottom:0;padding:15px 0 0;font-size:23px;text-align:center;list-style-type:none;background:transparent;cursor:pointer}.star-rating__item{float:right;margin:0 5px;color:#354043;font-size:23px;font-family:simple,serif;line-height:1;box-shadow:none}.star-rating__item:before{content:"\e915"}.star-rating__item:active,.star-rating__item:focus{margin-top:0;box-shadow:none}.star-rating__item--active,.star-rating__item--active~li,.star-rating__item:hover,.star-rating__item:hover~li{color:#354043}.star-rating__item--active:before,.star-rating__item--active~li:before,.star-rating__item:hover:before,.star-rating__item:hover~li:before{content:"\e916"}.star-rating__star{color:#354043}.star-rating__count,.star-rating__value{font-weight:600}.star-rating p{font-size:14px}.star-rating__count:after{content:attr(data-reviewCount)}.star-rating__value:after{content:attr(data-ratingValue)}.shops.show #content{order:0}@media (min-width:992px){.shops.show #content{flex:0 0 71%;max-width:71%}}.shops.show #content+.col-lg-4{order:1}@media (min-width:992px){.shops.show #content+.col-lg-4{flex:0 0 29%;max-width:29%}}.sidebar{border-top:4px solid #354043}.sidebar h2,.sidebar h3,.sidebar p{font-weight:400;font-family:BasicCommercialLTW04-Light,sans-serif}.sidebar h3{color:#354043}.sidebar .widget{background-color:transparent}.sidebar .widget--summary td:nth-child(2){text-align:center}.sidebar .table{width:100%}.sidebar__btn{color:#354043;font-family:Aileron,sans-serif;background-color:#fff;border-radius:0}.sidebar__btn:hover{color:#354043;background-color:#fff}.featured-shops{padding:12px 0;background-color:#f7f7f7}.background--white .featured-shops{background:transparent}.featured-shops__list{display:flex;justify-content:space-around;width:100%;min-width:100%;margin:0;padding-left:0;list-style-type:none}@media (max-width:991px){.featured-shops__list{flex-wrap:wrap;justify-content:center}}.featured-shops__counter{width:110px;margin-left:-7px;padding:0;font-size:12px;text-align:center;background-color:#fdc600}@media (max-width:1199px){.featured-shops__counter{width:auto;margin:0 -7px}}.featured-shops__item{display:inline-block;width:110px;height:110px;margin:0 8px;padding:6px;background:#fff;border:1px solid #e3e3e3}@media (max-width:991px){.featured-shops__item{flex-grow:1;margin:0 0 11px}}.featured-shops__item:first-of-type{margin-left:0}.featured-shops__item:last-of-type{margin-right:0}.featured-shops__item img{max-width:100%}@media (max-width:991px){.featured-shops__item img{height:99%}}.featured-shops__link{display:flex;align-items:center;justify-content:center;width:100%;height:100%}.featured-shops__counter{width:auto;margin:0;color:#000;background-color:#fff;border:1px solid #32757a}.featured-shops__item{border:none}@media (max-width:767px){.featured-shops__item{width:122px;height:138px}}@media (max-width:991px){.featured-shops__item{margin-bottom:15px}}.featured-shops__item img{padding:10px;border:none}@media (max-width:767px){.featured-shops__item img{height:auto}}.coupon{background:#fff;border:1px solid #d3d3d3;box-shadow:0 1px 3px rgba(0,0,0,.11);position:relative;width:100%;min-height:50px;margin-bottom:10px}.coupon:hover{box-shadow:0 1px 3px rgba(0,0,0,.4)}.coupon__body{display:flex;padding:22px 25px 7px}@media (max-width:1199px){.coupon__body{padding:10px 10px 7px}}@media (max-width:991px){.coupon__body{flex-wrap:nowrap}}.coupon__footer{min-height:34px;padding:5px 24px;background-color:#f7f7f7}.coupon__footer a{color:#fff}.coupon__footer a:hover{color:#fff}.coupon__aside{flex:0 1 16%;cursor:pointer}.coupon__aside-sdo{display:flex;align-items:center;justify-content:center;width:100%;height:100%;padding:5px;text-align:center;background:#fff}@media (max-width:991px){.coupon__aside-sdo{height:auto;margin-right:10px}}@media (max-width:991px){.coupon__aside-sdo svg{max-width:70px}}.coupon__esdo-box{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;min-width:90px;height:80%;margin-right:0;color:#fff;font-size:17px;text-align:center;background:#132d56}@media (min-width:1200px){.coupon__esdo-box{margin-right:20px}}.coupon__esdo-box-line1{width:100%;margin-top:auto;text-align:center}.coupon__esdo-box-nhs{width:100%;margin-bottom:auto;font-weight:600;font-size:36px;line-height:32px;text-align:center}.coupon__right{display:flex;flex:0 1 85%;flex-wrap:nowrap}@media (max-width:991px){.coupon__right{flex:0 1 75%;flex-wrap:wrap}}.coupon__desc{flex-grow:1}@media (max-width:1199px){.coupon__desc{padding:0 10px}}.coupon__action{text-align:right}.coupon__action .btn{margin-top:23px}.coupon__action .btn--esdo:hover{background:#132d56!important}.coupon__title{margin:0;font-size:18.72px;line-height:1.1;cursor:pointer}.coupon__title-geocoupon{margin-right:5px;color:#0a394c;font-size:inherit;font-family:inherit;text-transform:uppercase}.coupon__title-geocoupon svg{margin-bottom:3px;vertical-align:middle}.coupon__title-geocoupon svg path{fill:#0a394c}.coupon__logo{width:90px;height:90px}.coupon__logo--bg{display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;background-color:#681e6f}.coupon__amount{font-weight:700;font-size:36px;line-height:1}.coupon__type{font-size:19px;line-height:1}.coupon-info{display:none;margin-top:20px;line-height:1em}.coupon__label{display:inline-block;width:90px;margin-top:5px;font-weight:700;font-size:14px;text-align:center}.coupon__label--exclusive{color:#d73a00}.coupon__label--sale{color:#681e6f}.coupon__additional{color:#595959;font-size:14px}.coupon__votes{float:right}.coupon--large{margin-bottom:10px;border:2px solid #ff9448}@media (max-width:991px){.coupon--large{margin-top:11px}}.coupon--large .coupon__body{padding:34px 36px 14px}@media (max-width:991px){.coupon--large .coupon__body{padding:18px 10px 7px}}.coupon--large .coupon__desc{max-height:100%;padding:2px 12px 0}@media (max-width:991px){.coupon--large .coupon__desc{flex-grow:1}}.coupon--large .coupon__aside{flex:0 1 15%}.coupon--large .coupon__action .btn{min-width:230px;margin-top:38px;padding:17px 0;font-size:20px;text-align:center}@media (max-width:575px){.coupon--large .coupon__action .btn{min-width:150px;margin-top:10px;padding:10px 0;font-size:14px}}.coupon--large .coupon__tag{font-size:26px}@media (max-width:991px){.coupon--large .coupon__tag{top:165px;right:auto;left:26px;font-size:15px}}@media (max-width:575px){.coupon--large .coupon__tag{top:120px;right:auto;left:12px;font-size:12px}}.coupon--large .coupon__tag:before{margin-right:0;font-size:17px}@media (max-width:991px){.coupon--large .coupon__tag+.coupon__aside .coupon__label--exclusive{margin-top:30px;font-size:12px}}@media (max-width:575px){.coupon--large .coupon__tag+.coupon__aside .coupon__label--exclusive{margin-top:45px}}.coupon--large .coupon__logo{width:138px;height:138px}@media (max-width:575px){.coupon--large .coupon__logo{width:90px;height:90px}}.coupon--large .coupon__logo.coupon__logo--bg{background-color:#ff9448}.coupon--large .coupon__amount{font-weight:700}@media (max-width:575px){.coupon--large .coupon__amount{font-size:24px}}.coupon--large .coupon__type{font-size:20px;text-align:center;text-transform:uppercase}@media (max-width:575px){.coupon--large .coupon__type{font-size:24px}}.coupon--large .coupon__label{width:138px;margin-top:7px;font-size:20px}.coupon--large .coupon__title{font-size:24px;line-height:1}@media (max-width:575px){.coupon--large .coupon__title{font-size:14px}}.coupon--large .coupon-title{display:inline-block;min-height:65px;line-height:1.1;cursor:pointer}@media (max-width:767px){.coupon--large .coupon-title{min-height:40px;font-size:20px}}.coupon--large .coupon__title-geocoupon svg{width:15px;height:19px;margin-right:-2px;margin-bottom:4px}@media (max-width:767px){.coupon--large .coupon__title-geocoupon svg{width:10px;margin-right:0}}.coupon--large .coupon__text{display:-webkit-box;max-height:44px;margin:0;overflow:hidden;line-height:1.1;-webkit-line-clamp:2}@media (max-width:575px){.coupon--large .coupon__text{margin-top:17px;font-size:14px}}.coupon--large .coupon__text--full{display:inline-block;max-height:none}.coupon--large .coupon__additional{font-size:18px}@media (max-width:575px){.coupon--large .coupon__additional{font-size:14px}}.coupon--large .coupon__footer{padding:12px 35px 12px 45px;color:#fff;background-color:#ff9448}@media (max-width:991px){.coupon--large .coupon__footer{padding-left:10px}}@media (max-width:575px){.coupon--large .coupon__footer{padding:5px 35px 5px 10px}}.coupon--large .coupon__votes{font-size:20px}.coupon--large .coupon__votes .vote--yes{margin-right:10px}.coupon--info-widget{background:#d3d3d3}.coupon__label-code{display:none}@media (min-width:992px){.card-shop-header .climate-banner,.page-title+.climate-banner{display:none}}@media (max-width:991px){.card-shop-header .climate-banner .climate-banner__wrapper,.page-title+.climate-banner .climate-banner__wrapper{display:block;padding:0;text-align:center}.card-shop-header .climate-banner .climate-banner__wrapper img,.page-title+.climate-banner .climate-banner__wrapper img{display:inline-block;margin:4px 0}.card-shop-header .climate-banner .climate-banner__heading,.page-title+.climate-banner .climate-banner__heading{text-align:left;text-decoration:underline}.card-shop-header .climate-banner .climate-banner__body,.page-title+.climate-banner .climate-banner__body{display:none}}.additional-info .climate-banner,.sidebar .climate-banner{padding:0 20px;background-color:transparent;border:none}@media (max-width:991px){.additional-info .climate-banner,.sidebar .climate-banner{display:none}}.additional-info .climate-banner__wrapper,.sidebar .climate-banner__wrapper{grid-template-areas:"heading logo" "description logo";grid-template-columns:5fr 3fr;background-color:rgba(68,151,132,.05);border:1px solid #449784;border-radius:7px}.additional-info .climate-banner__wrapper img,.sidebar .climate-banner__wrapper img{width:50px;margin:10px auto}.additional-info .climate-banner__heading,.sidebar .climate-banner__heading{margin:15px 0 6px;padding:0;font-size:12px;line-height:15px}.additional-info .climate-banner__body,.sidebar .climate-banner__body{margin:0 0 15px;padding:0;font-size:10px;line-height:12px}.sidebar .climate-banner{padding:0}.expired-coupons{margin-top:26px;filter:grayscale(1) contrast(.93)}.expired-coupons .clickout{cursor:auto}.expired-coupons .coupon__body{padding-bottom:34px}.expired-coupons__title{margin-bottom:20px;font-weight:300;font-size:24px}@media (max-width:991px){.shop-info-mobile{background:#fff;border:1px solid #d3d3d3;box-shadow:0 1px 3px rgba(0,0,0,.11);display:flex;align-items:center;justify-content:space-between;margin-top:39px;padding:20px 17px}.shop-info-mobile:hover{box-shadow:0 1px 3px rgba(0,0,0,.4)}.shop-info-mobile__title{display:inline-block;margin:0;font-weight:600;font-size:24px;line-height:1.1}.shop-info-mobile__logo{border:1px solid #e3e3e3}}@media (max-width:767px){.shops.show .page-subtitle,.shops.show .page-title,.shops.show .page-updated{display:none}}.coupon__aside img{display:block}@media (max-width:991px){.coupon__aside{position:relative}}.coupon__amount{color:#222;font-weight:500;font-size:32px;font-family:Aileron,sans-serif;font-style:normal;font-stretch:normal;line-height:1.17;letter-spacing:normal;text-align:center}@media (max-width:767px){.coupon__amount span.textFitted{font-size:30px}}.coupon__title{color:#222;font-weight:700;font-size:26px;font-family:Aileron,sans-serif;line-height:1.15}.coupon__title-geocoupon svg{width:15px;height:20px}@media (max-width:991px){.coupon__title{font-size:20px}}.coupon__text{color:#737373;font-weight:500;font-size:16px;font-family:BasicCommercialLTW04-Light,sans-serif;line-height:24px}@media (max-width:991px){.coupon__text{margin-top:7px;font-size:15px;line-height:18px}}@media (max-width:767px){.coupon__text--full .coupon-info{width:auto}}@media (max-width:767px){.coupon__text--full table>tbody>tr>td:nth-child(2){word-break:break-word}}.coupon .coupon-info{font-size:14px}.coupon__action .clickout{font-family:Aileron,sans-serif}@media (max-width:991px){.coupon__action{margin-left:10px}}.coupon__action .btn{background-color:#04777b;border-radius:0}@media (max-width:991px){.coupon__action .btn{margin-top:10px}}.coupon__type{font-size:14px;font-family:Aileron,sans-serif}.coupon__tag{top:0;right:10px;font-weight:400;font-family:OptimaNovaLTProRegular,sans-serif}@media (max-width:767px){.coupon__tag{top:109px;left:14px;font-size:10px}}.coupon__additional{color:#222;font-weight:400}.coupon__label--exclusive{color:#fff}.coupon__see-details{color:#04777b;font-weight:600;font-size:12px;font-family:Aileron,sans-serif}.coupon__logo--bg{color:#222;background-color:transparent}.coupon__footer{background:transparent}.coupon--large{background-color:#04777b;border:none}.coupon--large .coupon-title{margin:0;color:#fff;font-size:26px;font-family:Aileron,sans-serif}@media (max-width:767px){.coupon--large .coupon-title{font-size:15px}}.coupon--large .coupon-info{font-size:16px}.coupon--large .coupon__text{margin-top:0;color:#fff;font-size:20px}@media (max-width:767px){.coupon--large .coupon__text{font-size:14px}}.coupon--large .coupon__clicks{color:#ededed}.coupon--large .coupon__footer{background-color:#04777b}.coupon--large .coupon__action .btn{color:#04777b;font-size:14px;background-color:#fff}.coupon--large .coupon__tag{color:#fff;font-family:OptimaNovaLTProRegular,sans-serif}@media (max-width:991px){.coupon--large .coupon__tag{top:156px;left:37px}}.coupon--large .coupon__logo.coupon__logo--bg{background-color:#fff}.coupon--large .coupon__icon-chevron,.coupon--large .coupon__see-details{color:#fff}.coupon--large .coupon__amount{font-size:30px}.coupon--large .coupon__type{font-size:14px}@media (min-width:576px){.coupon--large .coupon__aside-sdo svg{width:128px;max-width:128px;height:128px}}.clickout.btn .code,.textFitted>.code{display:none}@media (max-width:991px){.shop-info-mobile__logo{margin-left:15px}.shops.show .page-subtitle,.shops.show .page-title{position:absolute;right:0;left:105px;display:inline-block;align-items:center;margin:-31px auto 0;padding:20px 17px;overflow:hidden;font-weight:400;text-overflow:ellipsis;-webkit-box-orient:vertical}.shops.show .page-title{top:-90px;max-height:54px;font-size:16px;-webkit-line-clamp:2}.shops.show .page-subtitle{top:-45px;max-height:67px;font-size:14px;-webkit-line-clamp:3}.shops.show .page-updated{display:block;margin:8px 0 0;padding:0}}@media (max-width:991px){.shop-info-mobile__title{display:none}}@media (max-width:767px){.mobile-optimization-A .shop-info-mobile{padding:0;background-color:transparent;border:none;box-shadow:none}.mobile-optimization-A .shop-info-mobile a img{max-width:60px}.mobile-optimization-A .coupon-filter{display:flex;justify-content:space-around;border:none}.mobile-optimization-A .coupon-filter__item{color:#787878}.mobile-optimization-A .coupon-filter__item.active{color:#112a39}.mobile-optimization-A.shops.show .page-subtitle,.mobile-optimization-A.shops.show .page-title{left:88px;margin:0;padding:0;color:#333}.mobile-optimization-A.shops.show .page-title{top:-57px;font-size:20px;line-height:24px}.mobile-optimization-A.shops.show .page-subtitle{top:-6px;font-size:18px;line-height:18px}.mobile-optimization-A .title-and-filters-container{margin-bottom:38px}.mobile-optimization-A .coupon{border-left:4px solid #58c0ab;border-radius:5px}.mobile-optimization-A .coupon__body{padding:12px 10px 5px}.mobile-optimization-A .coupon__desc{padding:0 6px}.mobile-optimization-A .coupon__footer{padding:0 15px}.mobile-optimization-A .coupon .coupon__tag{display:none}.mobile-optimization-A .coupon .coupon__tag+.coupon__aside .coupon__label--exclusive{margin-top:0}.mobile-optimization-A .coupon__label.coupon__label--exclusive{position:relative;width:52px;margin-right:4px;margin-left:4px;padding:1px;color:#fff;font-weight:400;font-size:11px;line-height:13px;background-color:#58c0ab;border-radius:2px}.mobile-optimization-A .coupon__label.coupon__label--exclusive:before{content:none}.mobile-optimization-A .coupon__title{margin-bottom:2px;font-size:16px;line-height:19px}.mobile-optimization-A .coupon__logo{max-width:60px;height:60px;margin-top:15px}.mobile-optimization-A .coupon__amount,.mobile-optimization-A .coupon__type{width:45px!important}.mobile-optimization-A .coupon__amount{font-size:20px;line-height:1.1}.mobile-optimization-A .coupon__type{font-size:9px;line-height:1}.mobile-optimization-A .coupon__text{margin:0 0 6px;color:#222;font-size:14px;line-height:18px}.mobile-optimization-A .coupon__clicks{font-size:11px;line-height:13px}.mobile-optimization-A .coupon__action{margin-left:6px}.mobile-optimization-A .coupon__action .btn{min-width:107px;margin-top:7px;padding:7px 0;font-size:14px;line-height:16px;border-radius:2px}.mobile-optimization-A .coupon__see-details{color:#222;font-size:14px;line-height:16px}.mobile-optimization-A .coupon--large{border:none}.mobile-optimization-A .coupon--large .coupon__body{padding:13px 7px 5px;border-left:4px solid #58c0ab;border-radius:5px 5px 0 0}.mobile-optimization-A .coupon--large .coupon__footer{line-height:0;border-left:4px solid #58c0ab;border-radius:0 0 5px 5px}.mobile-optimization-A .coupon--large .coupon__logo.coupon__logo--bg{background-color:transparent}.mobile-optimization-A .coupon--large .coupon-title{min-height:auto;font-size:16px;line-height:19px}.mobile-optimization-A .coupon--large .coupon__amount,.mobile-optimization-A .coupon--large .coupon__logo,.mobile-optimization-A .coupon--large .coupon__see-details,.mobile-optimization-A .coupon--large .coupon__text{color:#fff}}@media (max-width:767px){.mobile-optimization-B .shop-info-mobile{padding:0;background-color:transparent;border:none;box-shadow:none}.mobile-optimization-B .shop-info-mobile a img{max-width:60px}.mobile-optimization-B .coupon-filter{display:flex;justify-content:space-around;border:none}.mobile-optimization-B .coupon-filter__item{color:#787878}.mobile-optimization-B .coupon-filter__item.active{color:#112a39}.mobile-optimization-B.shops.show .page-subtitle,.mobile-optimization-B.shops.show .page-title{left:88px;margin:0;padding:0;color:#333}.mobile-optimization-B.shops.show .page-title{top:-57px;font-size:20px;line-height:24px}.mobile-optimization-B.shops.show .page-subtitle{top:-6px;font-size:18px;line-height:18px}.mobile-optimization-B .title-and-filters-container{margin-bottom:38px}.mobile-optimization-B .coupon{border-left:4px solid #58c0ab;border-radius:5px}.mobile-optimization-B .coupon__body{padding:12px 10px 5px}.mobile-optimization-B .coupon__desc{padding:0 6px}.mobile-optimization-B .coupon__footer{padding:0 15px}.mobile-optimization-B .coupon .coupon__tag{display:none}.mobile-optimization-B .coupon .coupon__tag+.coupon__aside .coupon__label--exclusive{margin-top:0}.mobile-optimization-B .coupon__label.coupon__label--exclusive{position:relative;width:52px;margin-right:4px;margin-left:4px;padding:1px;color:#fff;font-weight:400;font-size:11px;line-height:13px;background-color:#58c0ab;border-radius:2px}.mobile-optimization-B .coupon__label.coupon__label--exclusive:before{content:none}.mobile-optimization-B .coupon__title{margin-bottom:2px;font-size:16px;line-height:19px}.mobile-optimization-B .coupon__logo{max-width:60px;height:60px;margin-top:15px}.mobile-optimization-B .coupon__amount,.mobile-optimization-B .coupon__type{width:45px!important}.mobile-optimization-B .coupon__amount{font-size:20px;line-height:1.1}.mobile-optimization-B .coupon__type{font-size:9px;line-height:1}.mobile-optimization-B .coupon__text{display:none;margin:0 0 6px;color:#222;font-size:14px;line-height:16px}.mobile-optimization-B .coupon__text--full{display:block}.mobile-optimization-B .coupon__clicks{font-size:11px;line-height:13px}.mobile-optimization-B .coupon__action{margin-left:6px}.mobile-optimization-B .coupon__action .btn{min-width:107px;margin-top:7px;padding:7px 0;font-size:14px;line-height:16px;border-radius:2px}.mobile-optimization-B .coupon__see-details{color:#222;font-size:14px;line-height:16px}.mobile-optimization-B .coupon--large{border:none}.mobile-optimization-B .coupon--large .coupon__body{padding:13px 7px 5px;border-left:4px solid #58c0ab;border-radius:5px 5px 0 0}.mobile-optimization-B .coupon--large .coupon__footer{line-height:0;border-left:4px solid #58c0ab;border-radius:0 0 5px 5px}.mobile-optimization-B .coupon--large .coupon__logo.coupon__logo--bg{background-color:transparent}.mobile-optimization-B .coupon--large .coupon-title{min-height:auto;font-size:16px;line-height:19px}.mobile-optimization-B .coupon--large .coupon__amount,.mobile-optimization-B .coupon--large .coupon__logo,.mobile-optimization-B .coupon--large .coupon__see-details,.mobile-optimization-B .coupon--large .coupon__text{color:#fff}}.shop-filter{max-height:365px;margin-right:10px;margin-bottom:26px;padding:32px 21px 35px 0;overflow:hidden;color:#fff;background-color:#0051ad}.shop-filter__title{display:flex;align-items:center;justify-content:flex-start;height:35px;padding-left:36px;color:#fff;font-size:18px;border-left:4px solid hsla(0,0%,100%,.5)}.shop-filter__content{max-height:270px;padding-right:15px;overflow-y:scroll;scrollbar-width:thin;scrollbar-color:hsla(0,0%,100%,.5) #0051ad}.shop-filter__content::-webkit-scrollbar{width:8px;background-color:#0051ad}.shop-filter__content::-webkit-scrollbar-thumb{background-color:hsla(0,0%,100%,.5);border-radius:10px}.shop-filter__list{padding:10px 0 0 42px;font-size:14px;list-style-type:none}.shop-filter__label{margin-bottom:4px;cursor:pointer}.shop-filter__checkbox{position:relative;width:18px;height:18px;margin-right:15px;vertical-align:middle;border:2px solid hsla(0,0%,100%,.5);border-radius:2px;-webkit-appearance:none;appearance:none;cursor:pointer}.shop-filter__checkbox:active,.shop-filter__checkbox:focus{outline:none;box-shadow:none}.shop-filter__checkbox:checked{background:#fff}.shop-filter__checkbox:checked:before{position:absolute;top:0;left:0;color:#0051ad;font-size:11px;font-family:simple!important;content:"\e904"}.shop-filter{background-color:#fff}.shop-filter__label,.shop-filter__title{color:#000}.shop-filter__checkbox{border-color:#000}.shop-filter__content::-webkit-scrollbar{background-color:#04777b}.shop-filter__checkbox:checked:before{color:#000}</style>
    <style>
        .coupon__type
        {
            width: 90px;
            white-space: nowrap!important;display: block!important;text-align: center!important;font-size: 22px!important;
        }
        .coupon__title_link {
            color: #222;
        }
        .coupon__title_link:hover {
            text-decoration: none;
            color: #222;
        }
        .shop-filter__label {
            font-size: 16px;
        }
        .related__link {
            font-size: 16px !important;
        }
        /*.widget widget--seo-text h2 */
    </style>
@endsection

@section('searchbar')
    @include('includes.all.smallsearch')
@endsection

@section('content')

<div class='t-container'>

  <main class="container" role="main">

    <div class="row">
        <div class="col">
            <h1 class="page-title">{{ $category->seo_title }}</h1>
            <div class="title-and-filters-container">
                <h2 class="page-subtitle">The latest voucher codes and deals for {{ $category->name }}</h2>
            </div>
        </div>
    </div>

    <div class="row">

      <!-- #content -->

      <div class="col-lg-8" id="content" data-area="MB">
    

  <div class="loader loader--coupons hidden" data-loader></div>

  <div class="coupons-list" data-element="CL" data-coupons-list >

    @foreach( $category_coupons_featured as $key => $coupon )
    <div class="container">

        <div class="row">
            <div
            data-index="{{$key}}" 
            id="coupon-{{$coupon->id}}"
            class="coupon shop-{{$coupon->store->id}} c-{{ $coupon->offer == 1 ? 'offer' : 'coupon' }} coupon--large"
            data-element="EP" 
            data-coupon-id="{{$coupon->id}}" 
            data-coupon-type="{{ $coupon->offer == 1 ? 'offer' : 'coupon' }}" 
            data-filter-ids="shop-{{$coupon->id}}x">
                <div class="coupon__body">
                    <span class="coupon__tag">
                        Top Pick
                    </span>
                    <div 
                        class="coupon__aside" 
                        data-coupon-id="{{$coupon->id}}" 
                        data-shop-name="{{$coupon->store->name}}"
                        title="{{$coupon->title}}" >


                        <div class="coupon__logo coupon__logo--bg ">
                            <a
                                class='coupon__title_link text-center'
                                onclick="
                                @if($coupon->offer == 0)
                                window.location='{{$coupon->link}}'
                                @endif
                                "
                                href="{{ route('open_coupon', $coupon) }}"
                                target="_blank">

                                @php $couponStore = $coupon->store @endphp

                                @if( ! $coupon->discount)
                                    <img
                                            alt="{{ $couponStore->name }} Discount Codes"
                                            class="premium-widget__coupon-image"
                                            src=""
                                            data-normal="{{ $storeImage = $couponStore->getStoreImage() }}?width=110&amp;height=110"
                                            data-srcset="{{ $storeImage }}?width=110&amp;height=110 1x, {{ $storeImage }}?width=220&amp;height=220&amp;quality=60 2x">
                                @else
                                    <span class="coupon__amount">{{$coupon->discount}} {{ $coupon->preference }}</span>
                                    <span class="coupon__type">{{ $coupon->offer == 1 ? 'Offer' : 'Code' }}</span>
                                @endif

                            </a>
                        </div>
                    </div>

                    <div class="coupon__right">
                        <div class="coupon__desc">

                            <a
                            title='{{ $coupon->title }}'
                            onclick="
                            @if($coupon->offer == 0)
                            window.location='{{$coupon->link}}'
                            @endif
                            "
                            href="{{ route('open_coupon', $coupon) }}"
                            target="_blank" >

                                <h2
                                data-coupon-id="{{$coupon->id}}"
                                data-shop-name="{{$coupon->store->name}}"
                                title="{{$coupon->title}}"
                                class="coupon-title">
                                    {{$coupon->title}}
                                </h2>
                            </a>

                            <div class="coupon__text">
                                {{ $coupon->description }}
                            </div>

                            <div class="collapse p-0" id="collapseExample{{$key}}">
                                <div class="card card-body bg-transparent border-0 p-0">
                                        @if (count($coupon->couponterms))
                                            <div class="copoun_terms my-1">
                                                <ul class="list-group-flush bg-transparent">
                                                    @foreach($coupon->couponterms as $couponterm)
                                                        <li class="list-group-item bg-transparent border-0 m-0 p-0" style="color: #fff; font-size: .9rem;"> <span>-</span> {{ $couponterm->term  }} </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                            </div>

                        </div>
                        <div class="coupon__action">
                            <a
                                class="clickout btn"
                                data-coupon-id='{{ $coupon->id }}'
                                data-shop-name='{{ $coupon->store->name }}'
                                title='{{ $coupon->title }}'
                                data-coupon-url='{{ $coupon->store?->aff_link }}'
                                href='{{ route("open_coupon", $coupon) }}'
                                onclick="
                                    @if($coupon->offer)
                                        window.location='{{$coupon->link}}'
                                    @endif
                                "
                                target='_blank'
                                title="{{ $coupon->description }}"
                                data-index="1">
                                GET {{ $coupon->offer ? 'OFFER' : 'CODE' }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="coupon__footer">
                    <p>
                        @if (count($coupon->couponterms))
                            <span class="m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$key}}" aria-expanded="false" aria-controls="collapseExample">
                                Further details
                            </span>
                        @endif
                        <span class="coupon__label-code">Code</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
    @endforeach

    @foreach($category_coupons as $key => $coupon)
    <div
        id="coupon-{{$coupon->id}}"
        class="coupon c-{{ $coupon->offer == 1 ? 'offer' : 'coupon' }} shop-{{$coupon->store->id}}"
        data-coupon-item
        data-coupon-id="{{$coupon->id}}"
        data-index="{{$key}}"
        data-coupon-type='{{ $coupon->offer == 1 ? "offer" : "coupon" }}'
        data-filter-ids='shop-{{$coupon->store->id}}x' >

        <div class="coupon__body">

            <div
            class=""
            data-coupon-id='{{$coupon->id}}'
            data-shop-name='{{$coupon->store->name}}'
            title='{{ $coupon->title }}'
            href="{{ route('open_coupon', $coupon) }}"
            target='_blank'>

                <a href="{{ route('stores_events.show', $coupon->store->slug) }}">
                    <img
                    alt="{{ $coupon->store->image->alt }}"
                    title="{{ $coupon->store->image->title }}"
                    class="border"
                    height="100"
                    width="100"
                    src=""
                    srcset="{{$coupon->store->getStoreImage()}}?width=110&amp;height=110 1x, {{$coupon->store->getStoreImage()}}?width=220&amp;height=220&amp;quality=60 2x">
                </a>

            </div>

            <div class="coupon__right ml-2">
                <div class="coupon__desc">
                    <a
                    class='coupon__title_link'
                    title='{{ $coupon->title }}'
                    onclick="
                    @if($coupon->offer == 0)
                    window.location='{{$coupon->link}}'
                    @endif
                    "
                    href="{{ route('open_coupon', $coupon) }}"
                    target="_blank">
                        <h3
                        data-coupon-id='{{$coupon->id}}'
                        data-shop-name='{{$coupon->store->name}}'
                        class="coupon__title">
                            {{ $coupon->title }}
                        </h3>
                    </a>

                    <div class="coupon__text">
                        {{ \Str::limit($coupon->description, 150) }}
                    </div>
                    <div class="collapse p-0" id="collapseExample{{$key}}random-text">
                        <div class="card card-body bg-transparent border-0 p-0">
                                @if (count($coupon->couponterms))
                                    <div class="copoun_terms my-1">
                                        <ul class="list-group-flush bg-transparent">
                                            @foreach($coupon->couponterms as $couponterm)
                                                <li class="list-group-item bg-transparent border-0 m-0 p-0 text-muted" style="font-size: .9rem;"> <span>-</span> {{ $couponterm->term  }} </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                    </div>
                </div>
                <div class="coupon__action">

                    <a
                        class="clickout btn"
                        data-coupon-id='{{ $coupon->id }}'
                        data-shop-name='{{ $coupon->store->name }}'
                        title='{{ $coupon->title }}'
                        data-coupon-url='{{ $coupon->store?->aff_link }}'
                        href='{{ route("open_coupon", $coupon) }}'
                        onclick="
                            @if($coupon->offer)
                                window.location='{{$coupon->link}}'
                            @endif
                        "
                        target='_blank'
                        title="{{ $coupon->description }}"
                        data-index="1">
                        SEE {{ $coupon->offer ? 'OFFER' : 'CODE' }}
                    </a>
                    
                </div>
            </div>
        </div>

        <div class="coupon__footer">
            <p>
                @if (count($coupon->couponterms))
                    <span class="m-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample{{$key}}random-text" aria-expanded="false" aria-controls="collapseExample">
                        Further details
                    </span>
                @endif
                <span class="coupon__label-code">Code</span>
            </p>
        </div>

    </div>
    @endforeach
    
    
    @include('includes.store.newsletter')
    
    </div>

      </div>

      <!-- #/content -->

        <!-- .sidebar -->

        <div class="col-lg-4" data-area="SB">
            <div class="shop-filter">
                <h2 class="shop-filter__title">
                  Filter Results
                </h2>
            
                <div class="shop-filter__content">
                    <ul class="shop-filter__list" data-widget="shopFilter" >
                        @foreach($stores_to_filter as $store)
                        <li>
                            <label class="shop-filter__label">
                                <input id='{{ $store->id }}' class="filter-checkbox" type="checkbox" data-shop="{{ $store->name }}" data-shop-id="{{ $store->id }}" >
                                {{ $store->name }}
                            </label>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="sidebar" id="sidebar">

                <div class="d-none d-sm-block">
                    @foreach($category->widgets as $widget)
                    <div class="widget widget--seo-text" data-area="SEO">
                        <h2>{{ $widget->title }}</h2>
                        <h3> {!! $widget->description !!} </h3>
                    </div>
                    @endforeach
                    
                    @if( $category->side_title != '' )
                    
                    <div class="widget widget--seo-text" data-area="SEO">
                        <h2>{{ $category->side_title }}</h2>
                        <h3> {!! $category->side_description !!} </h3>
                    </div>
                    
                    @endif
                    
                    
                    <style>
                        ul.popular-shops{
                            padding-left: 0;
                            list-style: none;
                            display: flex;
                            flex-wrap: wrap;
                            justify-content: space-between;
                        }
                        .popular-shops__item {
                            flex: 0 0 33.3%;
                            max-width: 33.3%;
                            padding: 5px;
                        }
                        .related__col {
                            padding-top: 0!important;
                            padding-bottom: 0!important;
                        }
                        .related-categories li a {
                            color: grey;
                            transition: 0.3s ease-in-out;
                        }
                        .related-categories li a:hover{
                            color: #000;
                        }
                    </style>
                    
                    
                    <div class="widget widget--faq mb-2">
                        <h3>Related Categories</h3>
                        <div class='related__col related__col--similar related-categories'>
                            <ul class="related__list">
                            @foreach($related_categories as $r_category)    
                                <li class="related__item">
                                    <a 
                                    href="{{route('categories.show', $r_category->slug)}}" 
                                    title="{{$r_category->name}}" 
                                    class="related__link">
                                        {{$r_category->name}}
                                    </a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./sidebar -->
    </div>


      <div class="row">

        <div class="col">

          
    <div class="d-block d-sm-none">
        
        @foreach($category->widgets as $widget)
        <div class="widget widget--seo-text" data-area="SEO">
            <h2>{{ $widget->title }}</h2>
             <h3> {{ $widget->description }} </h3>
        </div>
        @endforeach
        
        @if( $category->side_title != '' )
        
        <div class="widget widget--seo-text" data-area="SEO">
            <h2>{{ $category->side_title }}</h2>
            <h3> {{ $category->side_description }} </h3>
        </div>
        
        @endif
        
        
        <style>
            ul.popular-shops{
                padding-left: 0;
                list-style: none;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }
            .popular-shops__item {
                flex: 0 0 33.3%;
                max-width: 33.3%;
                padding: 5px;
            }
            .related__col {
                padding-top: 0!important;
                padding-bottom: 0!important;
            }
            .related-categories li a {
                color: grey;
                transition: 0.3s ease-in-out;
            }
            .related-categories li a:hover{
                color: #000;
            }
        </style>
        
        
        <div class="widget widget--faq mb-2">
            <h3>Related Categories</h3>
            <div class='related__col related__col--similar related-categories'>
                <ul class="related__list">
                @foreach($related_categories as $r_category)    
                    <li class="related__item">
                        <a 
                        href="{{route('categories.show', $r_category->slug)}}" 
                        title="{{$r_category->name}}" 
                        class="related__link">
                            {{$r_category->name}}
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>

    </div>


  <div class="see-more-categories" data-style="">

    <h2 class="see-more-categories__title">

      See more categories

    </h2>

    <div class="see-more-categories__content">


        <ul class="see-more-categories__list">
            @php $i=0; @endphp
            @for(; $i < floor(count($sidebar_last_added_categories) * (1/3)); $i++)
            @php
                $category = $sidebar_last_added_categories[$i];
            @endphp
            <li class="see-more-categories__item">

              <a href="{{ route('categories.show', $category->slug) }}">
                  {{ $category->name }}
              </a>

            </li>
            
            @endfor


        </ul>


        <ul class="see-more-categories__list">

            @for( ; $i < floor(count($sidebar_last_added_categories) * (2/3)); $i++)
            @php
                $category = $sidebar_last_added_categories[$i];
            @endphp
            <li class="see-more-categories__item">
                <a href="{{ route('categories.show', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
            
            @endfor

        </ul>


        <ul class="see-more-categories__list">

            @for( ; $i < floor(count($sidebar_last_added_categories)); $i++)
            @php
                $category = $sidebar_last_added_categories[$i];
            @endphp
            <li class="see-more-categories__item">
                <a href="{{ route('categories.show', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </li>
            
            @endfor

        </ul>


    </div>

  </div>
        </div>

      </div>
      <!-- /.row -->


  </main>
  <!-- /.container -->

@endsection

@section('end_script')

<script>
    
    $(function(){
        $(document).on("change", ".shop-filter .shop-filter__list .filter-checkbox", (e) => {
            e.preventDefault();
            $(".coupon").hide();
            $(".filter-checkbox:checked").each( function(index, element){
                $(".shop-" + $(element).attr("id")).show();
            })
        });
    });
    $('body').addClass('additional_space');
    $('button.close-featured-coupon-ad').click( function () {
        $(this).parent().hide(200);
        $('body').removeClass('additional_space');
    });
</script>

@endsection