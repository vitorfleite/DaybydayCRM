<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simcards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('simcard_number');
            $table->string('simcard_status');
            $table->string('simcard_origin');
            $table->string('simcard_operator');
            $table->text('simcard_comments');
            $table->string('simcard_package');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simcards');
    }
}
