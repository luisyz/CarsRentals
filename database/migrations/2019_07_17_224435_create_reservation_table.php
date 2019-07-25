<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('reservations', function (Blueprint $table) {
             $table->increments('id');
             $table->string('fullname');
             $table->string('email');
             $table->string('address');
             $table->integer('zipcode');
             $table->string('creditcard');
             $table->integer('pickup_id');
             $table->integer('return_id');
             $table->date('pickup_date');
             $table->date('return_date');
             $table->integer('category_id');
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
         Schema::dropIfExists('reservations');
     }
}
