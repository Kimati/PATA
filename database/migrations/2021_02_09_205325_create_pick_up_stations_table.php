<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickUpStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pick_up_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('county');
            $table->string('firststation');
            $table->string('secondstation');
            $table->string('thirdstation');
            $table->float('1stationcost');
            $table->float('2stationcost');
            $table->float('3stationcost');
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
        Schema::dropIfExists('pick_up_stations');
    }
}
