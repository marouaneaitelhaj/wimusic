<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists_songs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('song_id');
            $table->unsignedBigInteger('playlists_id');
            $table->timestamps();
            $table->foreign('song_id')->references('id')->on('pieces')->onDelete('cascade');
            $table->foreign('playlists_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->unique(['song_id', 'playlists_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlists_songs');
    }
};
