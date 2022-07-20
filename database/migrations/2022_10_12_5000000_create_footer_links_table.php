<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterLinksTable extends Migration
{
    public function up()
    {
        Schema::create('footer_links', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->string('link');
            $table->boolean('active');
            $table->unsignedInteger('link_order');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('footer_links');
    }
}
