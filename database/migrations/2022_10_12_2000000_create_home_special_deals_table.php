<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeSpecialDealsTable extends Migration
{
    public function up()
    {
        Schema::create('home_special_deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('related_store_id');
            
            $table->string('deal_1_title');
            $table->string('deal_1_thumbnail');
            $table->string('deal_1_link');
            
            $table->string('deal_2_title');
            $table->string('deal_2_thumbnail');
            $table->string('deal_2_link');
            
            $table->string('deal_3_title');
            $table->string('deal_3_thumbnail');
            $table->string('deal_3_link');
            
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('home_special_deals');
    }
}
