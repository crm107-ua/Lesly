<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('artist')->default(false);
            $table->string('image')->default("../../../../images/default/default_1.png");
            $table->string('slug');
            $table->string('image2')->default("../../../../images/default/default_2.png")->nullable();
            $table->string('image3')->default("../../../../images/default/default_3.png")->nullable();
            $table->string('image4')->default("../../../../images/default/default_4.png")->nullable();
            $table->string('escuchando')->nullable();
            $table->text('description')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->integer('reproducciones')->default(0);
            $table->integer('pais_id')->unsigned()->default(210);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function ($table) {
            $table->foreign('pais_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
