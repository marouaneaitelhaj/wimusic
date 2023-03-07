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
        Schema::create('membres', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bande');
            $table->unsignedBigInteger('id_membre');
            $table->foreign('id_bande')->references('id')->on('bandes')->onDelete('cascade');
            $table->foreign('id_membre')->references('id')->on('artistes')->onDelete('cascade');
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
        Schema::dropIfExists('membres');
    }
};
