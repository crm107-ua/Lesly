<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs_event', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->integer('song_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('songs_event', function ($table) {
            $table->foreign('song_id')->references('id')->on('songs')->onDelete('cascade');
        });

        Schema::table('songs_event', function ($table) {
            $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs_event');
    }
}
