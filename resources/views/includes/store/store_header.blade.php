<div id='store-header' class="dp-header">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class='store-logo-container'>
                    <img 
                    title='{{ $store->image ? $store->image->title : '' }}'
                    alt='{{ $store->image ? $store->image->alt : '' }}'
                    width='100' 
                    height='75' 
                    loading="lazy" 
                    src="{{ $store->image ? asset('storage/images/markets/'.$store->image->path) : asset('admin_assets\images\stores\store_placeholder_small.png') }}" class="profile-img" alt="">

                    <div class='store-meta-info'>

                        <div class="d-flex justify-content-center rating-box">
                            <div class="row">
                            
                                <div class="card">
                                    <div class="card-body text-center">
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
                                    <p>I coupon <strong>{{ $store->name }}</strong> hanno {{ $store->reviews->count() }} voti con una media di <strong>{{ $store_reviews }}</strong> stelle.</p>
                                </div>
                                    
                            </div>
                        </div>
                        
                        <div class='go-to-website-aff-link' id='go-to-website-aff-link-id-{{ $store->aff_link }}'>
                            <h5 style="color:#7156dd">Vai al negozio ufficiale {!! $store->name !!}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12 store-header">
                
                <h1 class='single-store-title'>{!! $store->title === '' ? 'Coupon ' . $store->name : $store->title !!}</h1>

                <h2 class='single-store-description'>
                    {!! str_replace('(v_date)', ucfirst( \Carbon\Carbon::parse(now()->toDateString())->translatedFormat('F Y') ), $store->seo_description ) !!}
                </h2>

                <div class='store-links'>

                    <a rel="nofollow" class='btn btn-default active all' href="#">TUTTI ({{ $all_coutpons_offers }})</a>
                    <a rel="nofollow" class='btn btn-default coupons' href="#">COUPON </a>
                    <a rel="nofollow" class='btn btn-default offers' href="#">OFFERTE </a>
                    
                </div>
            </div>

            <div class="col-xs-12 store-col-mob-filter-buttons d-none">
                <div class='store-links'>
                    <a rel="nofollow" class='btn btn-default active all' href="#">TUTTI ({{ $all_coutpons_offers }})</a>
                    <a rel="nofollow" class='btn btn-default coupons' href="#">COUPON </a>
                    <a rel="nofollow" class='btn btn-default offers' href="#">OFFERTE </a>
                </div>
            </div>

        </div>
    </div>
</div>