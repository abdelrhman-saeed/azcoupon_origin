<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWidgetsTable extends Migration
{
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');

            $table->foreignId('user_id');
            $table->foreignId('updated_by');

            $table->string('related_sidebar');

            $table->foreignId('store_id')->default(0);
            $table->foreignId('event_id')->default(0);
            $table->foreignId('category_id')->default(0);

            $table->tinyInteger('order')->default(0);

            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('widgets');
    }
}
