<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitysTable extends Migration
{

    public function up()
    {
        Schema::create('citys', function (Blueprint $table) { // i know that its cities xD
            $table->increments('id')->index();
            $table->boolean('capital')->default(false);
            $table->string('name', 100)->default('New City');
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')
                ->references('user_id')->on('players')
                ->onDelete('cascade');
            $table->integer('xCord')->nullable(true);
            $table->integer('yCord')->nullable(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citys');
    }
}
