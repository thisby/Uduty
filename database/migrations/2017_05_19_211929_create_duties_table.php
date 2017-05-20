<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
            Schema::create('duties', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('objet_id')->unsigned();
            $table->foreign('objet_id')->references('id')->on('objects');

            $table->string('contenu',255);

            $table->string('title',255);

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('country_id')->on('countries');

            $table->boolean('is_free');

            $table->string('min_price',45);
            $table->string('max_price',45);

            $table->date('ultimatum_date');

            $table->binary('image');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('duties');
    }
}
