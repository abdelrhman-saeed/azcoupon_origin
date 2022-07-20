
<div id='store-header' class="dp-header">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-xs-4">
                <div class='store-logo-container'>
                    <img 
                    title="{{ $category->image ? $category->image->title : '' }}"
                    alt="{{ $category->image ? $category->image->alt : '' }}"
                    width='100' 
                    height='100' src="{{ $category->image ? asset('storage/' . $category->image->path) : asset('admin_assets/images/categories/category_placeholder.webp') }}" class="profile-img" alt="{{ $category->name }}">
                </div>
            </div>

            <div class="col-md-8 col-xs-8 category-header-info">
                <h1 class='heading'>{!! strtoupper($category->seo_title) !!}</h1>

                <h2 class='description h3'>{!! $category->description !!}</h2>

                <div class='store-links'>

                    <a rel="nofollow" class='btn btn-default active all' href="#">TUTTI ({{ $category_coupons_count_all }})</a>
                    <a rel="nofollow" class='btn btn-default coupons' href="#">COUPON ({{ $category_coupons_count_coupons }})</a>
                    <a rel="nofollow" class='btn btn-default offers' href="#">OFFERTE ({{ $category_coupons_count_offers }})</a>
                
                </div>
            </div>

        </div>
    </div>
</div>