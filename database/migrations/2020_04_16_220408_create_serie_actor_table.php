<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerieActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie_actor', function (Blueprint $table) {
            $table->unsignedBigInteger('serie_id');
            $table->unsignedBigInteger('actor_id');
            $table->foreign('serie_id')->references('serie_id')->on('series');
            $table->foreign('actor_id')->references('actor_id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serie_actor');
    }
}
