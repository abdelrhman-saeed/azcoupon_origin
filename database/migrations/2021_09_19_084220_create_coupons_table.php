<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('code')->nullable();
            $table->integer('discount')->default(0);
            $table->string('preference');
            $table->date('expire_date')->nullable();
            $table->text('link')->nullable();
            $table->tinyInteger('online')->default(1);
            
            // Foreign Keys
            $table->foreignId('user_id');
            $table->foreignId('updated_by');
            $table->foreignId('store_id');

            $table->boolean('offer')->default(false);
            $table->boolean('featured')->default(false);
            $table->boolean('super_featured')->default(false);
            $table->boolean('verified')->default(false);
            $table->unsignedInteger('viewed')->default(0);
            
            $table->boolean('top_coupon')->default(false);
            $table->boolean('expire_soon')->default(false);
            
            $table->string('publish_type')->default('now');
            $table->date('schedule_from')->nullable();
            $table->date('schedule_to')->nullable();

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}