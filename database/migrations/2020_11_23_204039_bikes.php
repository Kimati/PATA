<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use Illuminate\Support\Facades\DB;

class Bikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bikes', function (Blueprint $table) {
           $table->increments('id');
           // $table->id()->startingValue(1);
            $table->string('name');
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
            //$table->image('phone_photo');
        });

        DB::statement("ALTER TABLE bikes AUTO_INCREMENT = 1;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('bikes');

    }
}
