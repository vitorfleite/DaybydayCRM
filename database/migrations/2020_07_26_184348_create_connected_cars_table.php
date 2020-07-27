<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectedCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connected_cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('connectedcar_name');
            $table->string('connectedcar_model');
            $table->string('connectedcar_color');
            $table->string('connectedcar_vin');
            $table->string('connectedcar_year');
            $table->string('connectedcar_plate');
            $table->text('connectedcar_comments');
            $table->string('connectedcar_client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connected_cars');
    }
}
