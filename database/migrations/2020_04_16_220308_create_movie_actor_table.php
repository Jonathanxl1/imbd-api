<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_actor', function (Blueprint $table) {
            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('actor_id');
            $table->foreign('movie_id')->references('movie_id')->on('movies');
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
        Schema::dropIfExists('movie_actor');
    }
}
