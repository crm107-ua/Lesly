<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersFollowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_follow', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user')->unsigned();
            $table->integer('friend')->unsigned();
            $table->timestamps();
        });

        Schema::table('users_follow', function ($table) {
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('users_follow', function ($table) {
            $table->foreign('friend')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_follow');
    }
}
