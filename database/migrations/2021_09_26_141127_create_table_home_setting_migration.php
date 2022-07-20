<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHomeSettingMigration extends Migration
{
    public function up()
    {
        Schema::create('home_setting', function (Blueprint $table) {
            $table->id();
            $table->string('home_title');
            $table->string('home_subtitle');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('home_setting');
    }
}
