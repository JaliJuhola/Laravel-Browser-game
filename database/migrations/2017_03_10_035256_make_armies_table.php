<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeArmiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('armies', function (Blueprint $table) { // i know that its cities tho xD
            $table->increments('id')->index();
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')
                ->references('id')->on('citys')
                ->onDelete('cascade');
            $table->integer('xCord')->nullable(true);
            $table->integer('yCord')->nullable(true);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('armies');
    }
}
