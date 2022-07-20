<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            
            $table->boolean('single_event');
            $table->string('banner')->nullable();
            $table->string('banner_title')->nullable();
            $table->text('banner_subtitle')->nullable();

            $table->foreignId('user_id');
            $table->foreignId('updated_by');

            $table->text('description');
            $table->text('another_description');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('events');
    }
}