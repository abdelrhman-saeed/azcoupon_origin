<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponEventPivotTable extends Migration
{
    public function up()
    {
        Schema::create('coupon_event', function (Blueprint $table) {
            $table->id();

            $table->foreignId('coupon_id')->constrained()->onDelete('cascade');;
            $table->foreignId('event_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('coupon_event');
    }
}
