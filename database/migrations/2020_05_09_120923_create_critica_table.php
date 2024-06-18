<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriticaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('song_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('texto');
            $table->date('fecha');
            $table->integer('estrellas')->nullable();
            $table->timestamps();
        });

        Schema::table('critica', function ($table) {
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
        });

        Schema::table('critica', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('critica');
    }
}
