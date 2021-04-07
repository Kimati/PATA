<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Phones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('OS');
            $table->float('price',8,2);
            $table->string('seller_phone');
            $table->string('seller_email');
            $table->string('county');
            $table->string('subcounty');
            $table->string('division');
            $table->string('location');
            $table->string('image');
            //$table->string('email')->unique();
            $table->timestamp('product_verified_at')->nullable();
            //$table->string('password');
            //$table->rememberToken();
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}

