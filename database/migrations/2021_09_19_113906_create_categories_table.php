<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('seo_title');
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            
            $table->string('side_title')->nullable();
            $table->text('side_description')->nullable();
            
            $table->foreignId('user_id');

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}