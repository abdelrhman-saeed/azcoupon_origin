<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $meta_title
 * @property string $meta_description
 * @property string $title
 * @property string $subtitle
 * @property int $special_events_num
 * @property int $latest_stores_num
 * @property int $featured_brands_num
 * @property int $featured_coupons_num
 * @property int $latest_coupons_num
 * @property string|null $contact_meta_title
 * @property string|null $contact_meta_description
 * @property int $top_coupons_featured_num
 * @property int $top_coupons_num
 * @property int $expiring_soon_coupons_featured_num
 * @property int $expiring_soon_coupons_num
 * @property int $single_event_featured_coupons_num
 * @property int $single_event_last_added_coupons_num
 * @property int $store_coupons_featured_num
 * @property string $store_coupons_specific_month
 * @property int $store_specific_month_coupons_num
 * @property int $store_latest_coupons_offers_num
 * @property int $store_expired_coupons_num
 * @property string|null $top_stores_ids
 * @property int $category_coupons_featured_num
 * @property int $category_coupons_num
 * @property string $navbar_categories_order_by
 * @property string $navbar_categories_order_type
 * @property int $sidebar_related_categories_num
 * @property int $sidebar_featured_stores_num
 * @property string|null $top_coupon_page_seo_title
 * @property string|null $top_coupon_page_seo_description
 * @property string|null $expired_coupon_page_seo_title
 * @property string|null $expired_coupon_page_seo_description
 * @property string|null $global_site_tag
 * @property string|null $push_engage_notifications
 * @property string|null $slider_link_1_title
 * @property string|null $slider_link_1_link
 * @property string|null $slider_link_2_title
 * @property string|null $slider_link_2_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $slider_link_3_title
 * @property string|null $slider_link_3_link
 * @method static \Database\Factories\SettingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCategoryCouponsFeaturedNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCategoryCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContactMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereContactMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereExpiredCouponPageSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereExpiredCouponPageSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereExpiringSoonCouponsFeaturedNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereExpiringSoonCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFeaturedBrandsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereFeaturedCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereGlobalSiteTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLatestCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereLatestStoresNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMetaDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMetaTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNavbarCategoriesOrderBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNavbarCategoriesOrderType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting wherePushEngageNotifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSidebarFeaturedStoresNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSidebarRelatedCategoriesNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSingleEventFeaturedCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSingleEventLastAddedCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSliderLink1Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSliderLink1Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSliderLink2Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSliderLink2Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSliderLink3Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSliderLink3Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSpecialEventsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereStoreCouponsFeaturedNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereStoreCouponsSpecificMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereStoreExpiredCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereStoreLatestCouponsOffersNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereStoreSpecificMonthCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTopCouponPageSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTopCouponPageSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTopCouponsFeaturedNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTopCouponsNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTopStoresIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];
    
}
