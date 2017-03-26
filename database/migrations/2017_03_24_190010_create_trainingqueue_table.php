<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingqueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troopqueue', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('troopname', 25);
            $table->integer('army_id');
            $table->integer('troopsready');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}