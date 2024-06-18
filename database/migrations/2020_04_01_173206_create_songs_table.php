<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('url');
            $table->string('name');
            $table->integer('artist_id')->unsigned();
            $table->integer('genero_id')->unsigned();
            $table->integer('album_id')->unsigned()->nullable();
            $table->string('image');
            $table->string('estreno');
            $table->string('slug');
            $table->text('letra');
            $table->string('fondo')->nullable();
            $table->string('video')->nullable();
            $table->text('description')->nullable();
            $table->integer('reproducciones')->default(0);
            $table->timestamps();
        });

        Schema::table('songs', function ($table) {
            $table->foreign('artist_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('songs', function ($table) {
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
        });

        Schema::table('songs', function ($table) {
            $table->foreign('album_id')->references('id')->on('album')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
