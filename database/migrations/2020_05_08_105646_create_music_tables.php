<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusicTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('gerne');
            $table->string('year');
            $table->string('top100')->nullable();
            $table->integer('artist_id')->unsigned()->nullable();
            $table->foreign('artist_id')->references('id')->on('artists');
            $table->timestamps();
        });


        Schema::create('listeners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('album_listener', function (Blueprint $table) {
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')->references('id')->on('albums');
            $table->integer('listener_id')->unsigned();
            $table->foreign('listener_id')->references('id')->on('listeners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artists');
        Schema::dropIfExists('albums');
        Schema::dropIfExists('listeners');
        Schema::dropIfExists('album_listener');
    }
}
