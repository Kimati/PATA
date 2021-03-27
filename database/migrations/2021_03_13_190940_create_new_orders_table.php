<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('custfirstname');
            $table->string('custsecondname');
            $table->string('custphone');
            $table->string('custemail');
            $table->string('itemname');
            $table->string('itemquantity');
            $table->float('itemcost');
            $table->float('pickupcounty');
            $table->float('pickupstation');
            $table->float('shiftingfee');
            $table->float('totalcost');
            $table->string('ordernumber');
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
        Schema::dropIfExists('new_orders');
    }
}
