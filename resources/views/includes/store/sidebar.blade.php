<div class="col-lg-4" data-area="SB">
    <div class="sidebar mb-10" id="sidebar">
        <div class="sidebar__logo d-none d-lg-block">
            <a
            class="sidebar__logo-link" 
            data-shop="{{ $store->name }}" 
            href="{{ $store->aff_link }}" 
            rel="nofollow" 
            target="_blank" 
            data-element="SPL">
                <img 
                alt="{{ $store->image->alt }}" 
                title="{{ $store->image->title }}" 
                class="img-responsive" 
                height="200" 
                width="200" src="{{ $store->getStoreImage() }}?width=200&amp;height=200" />
            </a>
        </div>
        <div class="sidebar__shop-link d-none d-lg-block">
            <a
            style="background-color: #04777b;"
            rel="nofollow"
            target="_blank" 
            class="sidebar__btn btn btn--warning fw-bold text-white"
            data-shop="John Greed" 
            data-element="FU" href="{{ $store->aff_link }}">
                Visit {{ $store->name }}
            </a>
        </div>

        <div class="widget widget--rating">
        
            <h2>Rate the vouchers from {{ $store->name }}</h2>
        
            <div class="star-rating-container">
                <div class="star-rating star-rating--storage" data-shop-id="{{ $store->id }}" data-votes="{{ $store_reviews }}" data-total-stars="80">
                    
                    
                    <style>
                        @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);fieldset{display:initial;}fieldset,label{margin:0;padding:0}.rating{border:none}.rating>[id^=star]{display:none}.rating>label:before{margin:5px;font-size:1.5em;font-family:FontAwesome;display:inline-block;content:"\f005"}.rating>.half:before{content:"\f089";position:absolute}.rating>label{color:#ddd;float:right;font-size:18px;}.rating>[id^=star]:checked~label,.rating:not(:checked)>label:hover,.rating:not(:checked)>label:hover~label{color:#354043}.reset-option{display:none}.rating-box .card{position:relative;display:flex;width:100%;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box}.rating-box .card .card-body{padding:1rem;margin:auto}.rating-box .card-body{flex:1 1 auto;padding:1.25rem}
                    </style>
                    
                   <link href="{{ asset('assets/css/rating.css') }}" rel="preload" as="style" onload='this.onload=null;this.rel="stylesheet"'>
                   <noscript><link rel="stylesheet" href="{{ asset('assets/css/rating.css') }}"></noscript>

                    <div class="card row">
                        <div class="card-body text-center col-md-12">
                            <fieldset class="rating">
                                
                                <input {{ $store_reviews == 5 ? 'checked' : '' }} type="radio" id="star5" name="rating" value="5" />
                                <label class="full" for="star5" title="Ottimo - 5 stelle"></label> 
                                
                                <input {{ $store_reviews == 4.5 ? 'checked' : '' }} type="radio" id="star4half" name="rating" value="4.5" />
                                <label class="half" for="star4half" title="Eccezionale - 4.5 stelle"></label> 
                                
                                <input {{ $store_reviews == 4 ? 'checked' : '' }} type="radio" id="star4" name="rating" value="4" />
                                <label class="full" for="star4" title="Molto Buono - 4 stelle"></label> 
                                
                                <input {{ $store_reviews == 3.5 ? 'checked' : '' }} type="radio" id="star3half" name="rating" value="3.5" />
                                <label class="half" for="star3half" title="Buono - 3.5 stelle"></label> 
                                
                                <input {{ $store_reviews == 3 ? 'checked' : '' }} type="radio" id="star3" name="rating" value="3" />
                                <label class="full" for="star3" title="Accettabile - 3 stelle"></label> 
                                
                                <input {{ $store_reviews == 2.5 ? 'checked' : '' }} type="radio" id="star2half" name="rating" value="2.5" />
                                <label class="half" for="star2half" title="Accettabile - 2.5 stelle"></label> 
                                
                                <input {{ $store_reviews == 2.0 ? 'checked' : '' }} type="radio" id="star2" name="rating" value="2" />
                                <label class="full" for="star2" title="Mediocre - 2 stelle"></label> 
                                
                                <input {{ $store_reviews == 1.5 ? 'checked' : '' }} type="radio" id="star1half" name="rating" value="1.5" />
                                <label class="half" for="star1half" title="Mediocre - 1.5 stelle"></label> 
                                
                                <input {{ $store_reviews == 1.0 ? 'checked' : '' }} type="radio" id="star1" name="rating" value="1" />
                                <label class="full" for="star1" title="Scarso - 1 stelle"></label> 
                                
                                <input {{ $store_reviews == 0.5 ? 'checked' : '' }} type="radio" id="starhalf" name="rating" value="0.5" />
                                <label class="half" for="starhalf" title="Pessimo - 0.5 stelle"></label> 
                                
                                <input type="radio" class="reset-option" name="rating" value="reset" /> 

                            </fieldset>
                        </div>
                    </div>
                    
                    <p class="bold-text"></p>
                </div>
                <p>
                    <span class="star-rating__count" data-reviewCount="{{ $store->reviews->count() }}"></span>
                    <span class="font-18">ratings with the average rating of</span>
                    <span class="star-rating__value" data-separator="." data-ratingValue="{{ $store_reviews }}"></span>
                    <b class="font-18">out of 5 stars</b>.
                </p>
            </div>
        </div>
        
        <div class="widget widget--faq ">
            <h2 class="fw-bold">FAQs with {{$store->name}}</h2>
            @foreach($store->widgets as $widget)
            <h3 class="fw-bold">{!! $widget->title !!}</h3>
            <p class="font-18">
                {!! $widget->description !!}
            </p>
            
{{--            @if( strpos($widget->title, "Dove inserire il codice coupon") !== false)--}}
{{--                <div style="padding:10px">--}}
{{--                    --}}
{{--                    <img --}}
{{--                    src="{{ asset('storage/images/left_sidebar_images/coupon_' . $widget->store->name . '.jpg') }}" --}}
{{--                    data-src="{{ asset('storage/images/left_sidebar_images/coupon_' . $widget->store->name . '.jpg') }}" --}}
{{--                    alt="dove inserire il Coupon {{ $widget->store->name }}" --}}
{{--                    class="img img-responsive" --}}
{{--                    style="display:block;margin:0 auto;" --}}
{{--                    title="dove inserire il Coupon {{ $widget->store->name }}">--}}
{{--                    --}}
{{--                    <p style="padding-top: 10px;font-size: 13px;font-style: italic;color: #888">--}}
{{--                        L'immagine mostra il carrello elettronico {{ $widget->store->name }}; la casella dove inserire il codice coupon {{ $widget->store->name }} è evidenziata dal cerchio rosso.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            @endif--}}
            
            @endforeach
        </div>

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
            .sidebar__shop-link a{
                font-size: 18px;
            }
            .widget--rating h2 {
                font-size: revert !important;
            }
            .related__col--similar a {
                font-size: 18px;
            }

        </style>


        <!--<div class="widget widget--faq ">-->
        <!--    <h3>Related Stores</h3>-->
            
            <!--<ul class="popular-shops">-->
                
                <!--<li class="popular-shops__item d-none d-sm-block">-->
                <!--    <a href="" title=>-->
                <!--        <img -->
                <!--        alt="" -->
                <!--        title="" -->
                <!--        class="img-responsive" -->
                <!--        height="200" -->
                <!--        width="200" -->
                <!--        src="?width=200&amp;height=200">-->
                <!--    </a>-->
                <!--</li>-->
                
        <!--    </ul>-->
        <!--</div>-->

        <div class="widget widget--faq mb-2">
            <h3 class="fw-bold">Related Categories</h3>
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