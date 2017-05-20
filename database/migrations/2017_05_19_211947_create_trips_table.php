<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 

    public function up()
    {
                Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('country_id')->on('countries');

            $table->integer('transport_id')->unsigned();
            //$table->foreign('country_id')->references('country_id')->on('countries');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->date('departure_date');
            $table->date('end_date');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
        
    }
}
