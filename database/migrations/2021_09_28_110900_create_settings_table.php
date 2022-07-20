<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // Home Columns
            $table->string('meta_title');
            $table->string('meta_description');

            $table->string('title');
            $table->string('subtitle');
            $table->tinyInteger('special_events_num');
            $table->tinyInteger('latest_stores_num');
            $table->tinyInteger('featured_brands_num');
            $table->tinyInteger('featured_coupons_num');
            $table->tinyInteger('latest_coupons_num');

            $table->text('contact_meta_title');
            $table->text('contact_meta_description');

            // Coupons lists
            $table->tinyInteger('top_coupons_featured_num');
            $table->tinyInteger('top_coupons_num');
            $table->tinyInteger('expiring_soon_coupons_featured_num');
            $table->tinyInteger('expiring_soon_coupons_num');
            $table->tinyInteger('single_event_featured_coupons_num');
            $table->tinyInteger('single_event_last_added_coupons_num');
            // Store Columns
            $table->tinyInteger('store_coupons_featured_num');
            $table->string('store_coupons_specific_month');
            $table->tinyInteger('store_specific_month_coupons_num');
            $table->tinyInteger('store_latest_coupons_offers_num');
            $table->tinyInteger('store_expired_coupons_num');
            $table->string('top_stores_ids')->nullable();
            
            // Category Columns
            $table->tinyInteger('category_coupons_featured_num');
            $table->tinyInteger('category_coupons_num');
            $table->string('navbar_categories_order_by')->default('id');
            $table->string('navbar_categories_order_type')->default('ASC');
            
            // Other Columns
            $table->tinyInteger('sidebar_related_categories_num');
            $table->tinyInteger('sidebar_featured_stores_num');
            
            
            $table->text('top_coupon_page_seo_title')->nullable();
            $table->text('top_coupon_page_seo_description')->nullable();
            $table->text('expired_coupon_page_seo_title')->nullable();
            $table->text('expired_coupon_page_seo_description')->nullable();
            
            $table->text('global_site_tag')->nullable();
            $table->text('push_engage_notifications')->nullable();
            
            // slider links
            $table->string('slider_link_1_title')->nullable();
            $table->string('slider_link_1_link')->nullable();
            $table->string('slider_link_2_title')->nullable();
            $table->string('slider_link_2_link')->nullable();
            $table->string('slider_link_3_title')->nullable();
            $table->string('slider_link_3_link')->nullable();

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}