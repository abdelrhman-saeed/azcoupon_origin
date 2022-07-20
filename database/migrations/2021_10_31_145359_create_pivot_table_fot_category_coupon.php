<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableFotCategoryCoupon extends Migration
{
    public function up()
    {
        Schema::create('category_coupon', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('category_id');
            $table->foreignId('coupon_id');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('category_coupon');
    }
}
