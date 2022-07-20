<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelSubscribersTable extends Migration
{
    
    public function up()
    {
        Schema::create('tel__subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_phone');
            $table->string('date');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('tel__subscribers');
    }
}
