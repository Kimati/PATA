<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      

        Schema::create('product_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_type');
             $table->string('product_name');
              $table->string('req_fname');
              $table->string('req_sname');
              $table->string('req_phone');
              $table->string('req_email');
              $table->string('county');
              $table->string('subcounty');
              $table->string('division');
              $table->string('location');
              $table->string('seller_phone');
              $table->string('seller_email');
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
        Schema::dropIfExists('product_requests');
    }
}
