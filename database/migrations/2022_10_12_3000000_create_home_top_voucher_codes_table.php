<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTopVoucherCodesTable extends Migration
{
    public function up()
    {
        Schema::create('home_top_voucher_codes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('home_top_voucher_codes');
    }
}
