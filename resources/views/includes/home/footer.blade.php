
<footer id="footer">
    <div class="btmFooter">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 text-center">
                    <a href="/" class="logo">
                        <span class='left'>Glam</span>Promocodes
                    </a>

                    <div class='claim mt-2'>
                        <p class='text-left'>
                            We help thousands of users save money on online shopping!
                        </p>
                    </div>
                    
                </div>
            
                <div class="col-md-8 col-sm-12">
                    <div class="row links-row">
                        <div class="col-sm-3 col-xs-6" style='min-height: 220px;'>

                            <div class='footer-quick-links'>
                                <h5 class='list-header'>LinkS</h5>
                                <ul class='list-unstyled links'>

                                    <li class='m-b-10'>
                                        <a rel="nofollow" href='{{ route("topcoupons.index") }}'>Most Used Promo Codes</a>
                                    </li>

                                    <li class='m-b-10'>
                                        <a rel="nofollow" href='{{ route("expiredsoon.index") }}'>Expiring Promo Codes</a>
                                    </li>

                                    <li class='m-b-10'>
                                        <a rel="nofollow" href='{{ route("stores.index") }}'>Store List</a>
                                    </li>

                                    <li class='m-b-10'>
                                        <a rel="nofollow" href='{{ route("categories.index") }}'>Category List</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6" style='min-height: 220px;'>

                            <div class='footer-stores-links'>
                                <h5 class='list-header'>Editor Pick</h5>
                                <ul class='list-unstyled links'>
                                    
                                    @foreach($sidebar_featured_stores as $store)
                                        @if( $loop->index < 5 )
                                        <li class='m-b-10'>
                                            <a rel="nofollow" href='{{ route("stores_events.show", $store->slug) }}'>{{ $store->name }}</a>
                                        </li>
                                        @endif
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-3 col-xs-6" style='min-height: 220px;'>
                            <div class='footer-information-links'>
                            
                                <h5 class='list-header'>Info</h5>
                                <ul class='list-unstyled links'>
                                    @foreach($static_pages as $page)
                                        <li class='m-b-10'>
                                            <a rel="follow" href="{{ route('stores_events.show', $page->slug) }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                    <li class='m-b-10'>
                                        <a rel="nofollow" href="{{ route('contact.index') }}">Contacts</a>
                                    </li>
                                    
                                </ul>

                            </div>
                        </div>


                        <div class="col-sm-3 col-xs-6" style='min-height: 220px;'>
                            <div class='footer-follow-us'>
                                <h5 class='list-header'>Follow Us</h5>
                                <ul class='list-unstyled links'>

                                    <li class='m-b-10'>
                                        <a rel="nofollow noopener" href='https://www.facebook.com/' title="find us on Facebook"><i class='ti-facebook'></i> Facebook</a>
                                    </li>

                                    <li class='m-b-10'>
                                        <a rel="nofollow noopener" href='https://twitter.com/' title="follow us on Twitter"><i class='ti-twitter'></i> Twitter</a>
                                    </li>

                                    <li class='m-b-10'>
                                        <a rel="nofollow noopener" href='https://www.instagram.com/' title="follow on Instagram"><i class='ti-instagram'></i> Instagram</a>
                                    </li>

                                    <li class='m-b-10'>
                                        <a rel="nofollow noopener" href='https://www.pinterest.it/' title="follow on Pinterest"><i class='ti-pinterest'></i> Pinterest</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            
            <div class="row  m-t-30 copyright-content">
                <div class="col-md-6 col-sm-12 m-t-10">
                    <p class='copyright-text'>
                        Copyright © 2022 Glam. All rights reserved.
                    </p>
                </div>
                
                <div class='col-sm-4 col-md-2 col-4 m-t-10'>
                    <p class='text-left'>
                        PROMO CODES AND OFFERS <br>
                        <strong>{{ $total_coupons_offers }}</strong>
                    </p>
                </div>
                
                <div class='col-sm-4 col-md-1 col-4 m-t-10'>
                    <p class='text-left'>
                        STORES <br>
                        <strong>{{ $total_stores }}</strong>
                    </p>
                </div>
                
                <div class='col-sm-4 col-md-3 col-4 m-t-10'>
                    <p class='text-left'>
                        LAST UPFATE: <br>
                        
                        @if(isset($last_updated_at))
                            <strong>{{ \Carbon\Carbon::parse($last_updated_at)->translatedFormat('d') . ' ' . ucfirst(\Carbon\Carbon::parse($last_updated_at)->translatedFormat('F Y')) }}</strong>
                        @else
                            <strong>{{ \Carbon\Carbon::parse(\App\Models\Store::where('online', 1)->orderBy('updated_at', 'DESC')->first()->updated_at)->translatedFormat('d F Y') }}</strong>
                        @endif
                    </p>
                </div>
                        
            </div>

            <div class="row text-center m-t-30 developer-copyright-content">
                <div class="col-sm-12 text-center m-t-10">
                    <p class='developer-copyright-text'>
                        <strong>Developed By <a  rel="noreferrer" target='_blank' rel="nofollow" href='https://www.sonamak.tech'>Sonamak</a></strong>
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</footer>