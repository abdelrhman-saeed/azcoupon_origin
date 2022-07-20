<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition()
    {
        return [
            'meta_title' => 'Home | Glam',
            'meta_description' => 'Glam is the best coupons site.',
            'title' => 'Glam verifica ogni giorno nuovi Codici Sconto attivi sui Negozi online più famosi!',
            'subtitle' => 'Coupons, promo codes and deals for all shops and brands in UAE.',
            'special_events_num' => 5,
            'latest_stores_num' => 8,
            'featured_brands_num' => 12,
            'featured_coupons_num' => 4,
            'latest_coupons_num' => 4,

            'top_coupons_featured_num' => 3,
            'top_coupons_num' => 10,
            'expiring_soon_coupons_featured_num' => 3,
            'expiring_soon_coupons_num' => 10,
            'single_event_featured_coupons_num' => 3,
            'single_event_last_added_coupons_num' => 10,

            'store_coupons_featured_num' => 3,
            'store_coupons_specific_month' => '2021-10',
            'store_specific_month_coupons_num' => 4,
            'store_latest_coupons_offers_num' => 3,
            'store_expired_coupons_num' => 10,

            'top_stores_ids' => "1,2",
            'category_coupons_featured_num' => 3,
            'category_coupons_num' => 10,
            'sidebar_related_categories_num' => 5,
            'sidebar_featured_stores_num' => 12,
            'top_coupon_page_seo_title' => 'Top Coupon',
            'top_coupon_page_seo_description' => 'Top Coupon Description',
            'expired_coupon_page_seo_title' => 'Expire Soon Coupon',
            'top_coupon_page_seo_title' => 'Expire Soon Coupon Description',
        ];
    }
}