<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('artist_id')->unsigned();
            $table->string('estreno');
            $table->string('descripcion');
            $table->string('image');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::table('album', function ($table) {
            $table->foreign('artist_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
