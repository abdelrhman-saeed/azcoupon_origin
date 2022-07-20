<!-- Large modal -->
<div class="coupon_modal modal fade couponModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="ti-close"></i></span> </button>
            <div class="coupon_modal_content">
                
                <div class='coupon-modal-header'>
                    <div class="row">

                        <div class="col-xs-4 col-xs-offset-4 modal-logo-container text-center">
                            <img alt='' width='50' src="{{ asset('admin_assets/images/stores/store_placeholder_small.png') }}" alt="">
                        </div>
                    </div>

                    <div class="row">
                        <p class='lead text-center m-t-20 modal-description'>
                            <strong></strong>
                        </p>
                    </div>
                </div>

                <div class='coupon-modal-content'>

                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-4 col-xs-6 col-xs-offset-3"> 
                            <div class='coupon_code alert alert-info'>
                                <a id="copy-me" href="#" class='code'></a>
                                <a href="#" class="btn btn-main copy-btn" data-clipboard-target="#copy-me">Click to Copy</a>
                            </div>
                        </div>

                        <div class='clear'></div>
                    </div>

                    <div class="row text-center copy-section">
                        
                    </div>

                </div>
                
                <hr>

                <div class='phone-collect'>

                    <p class='text-center'>
                    Add your phone number <strong></strong> - Is Totally Free!
                    </p>

                    <div class='text-center'>
                        <input type="tel" value='+39' name='visitor_phone' id="visitor_phone">
                        <button class='btn btn-main btn-sm submit-phone'>
                            <i class='ti-check'></i>
                        </button>
                    </div>

                </div>
                    
                <div class='coupon-modal-footer'>
                    <div class="row">
                        <div class="col-sm-12">
                          <div class='report'>Check for other promo codes <strong><a rel='follow' href=""></a></strong></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>