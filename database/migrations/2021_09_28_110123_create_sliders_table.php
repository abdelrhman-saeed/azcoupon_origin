<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slide');
            $table->string('title');
            $table->string('excerpt');
            $table->string('link');
            $table->foreignId('related_store');

            $table->boolean('enabled')->default(1);

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
