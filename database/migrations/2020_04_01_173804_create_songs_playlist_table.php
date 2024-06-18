<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsPlaylistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs_playlist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playlist_id')->unsigned();
            $table->integer('song_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('songs_playlist', function ($table) {
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
        });

        Schema::table('songs_playlist', function ($table) {
            $table->foreign('playlist_id')->references('id')->on('playlist')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs_playlist');
    }
}
