<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Machines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('machines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('price',8,2);
            $table->string('seller_phone');
            $table->string('seller_email');
            $table->string('county');
            $table->string('subcounty');
            $table->string('division');
            $table->string('location');
            $table->file('image');
            //$table->string('email')->unique();
            $table->timestamp('product_verified_at')->nullable();
            //$table->string('password');
            //$table->rememberToken();
            $table->timestamps();
            //$table->image('phone_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('machines');

    }
}
