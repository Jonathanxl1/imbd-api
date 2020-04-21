<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerieDirectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie_director', function (Blueprint $table) {
            $table->unsignedBigInteger('serie_id');
            $table->unsignedBigInteger('director_id');
            $table->foreign('serie_id')->references('serie_id')->on('series');
            $table->foreign('director_id')->references('director_id')->on('directors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serie_director');
    }
}
