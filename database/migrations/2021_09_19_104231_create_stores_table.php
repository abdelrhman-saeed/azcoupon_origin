<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            
            $table->string('seo_title');
            $table->text('seo_description');

            $table->string('name');
            $table->string('slug');
            $table->string('title');
            $table->text('aff_link')->nullable();
            $table->text('link')->nullable();

            $table->string('store_degree');
            
            $table->text('about_store_1_title')->nullable();
            $table->text('about_store_1_description')->nullable();
            $table->text('about_store_2_title')->nullable();
            $table->text('about_store_2_description')->nullable();
            $table->text('about_store_3_title')->nullable();
            $table->text('about_store_3_description')->nullable();
            $table->text('about_store_4_title')->nullable();
            $table->text('about_store_4_description')->nullable();
            $table->text('about_store_5_title')->nullable();
            $table->text('about_store_5_description')->nullable();
            $table->text('about_store_6_title')->nullable();
            $table->text('about_store_6_description')->nullable();
            $table->text('about_store_7_title')->nullable();
            $table->text('about_store_7_description')->nullable();
            $table->text('about_store_8_title')->nullable();
            $table->text('about_store_8_description')->nullable();
            
            $table->tinyInteger('online')->default(1);

            $table->boolean('featured')->default(false);
            $table->unsignedInteger('viewed')->default(0);

            $table->foreignId('updated_by');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
