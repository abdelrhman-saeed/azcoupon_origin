<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->foreignId('store_id')->default(0);
            $table->foreignId('category_id')->default(0);
            $table->string('model');
            $table->string('date');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
