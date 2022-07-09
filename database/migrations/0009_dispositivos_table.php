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
        Schema::create('dispositivos',function (Blueprint $table){
            $table->id('dispositivoid');
            $table->string('descripcion');
            $table->unsignedBigInteger('simcardid');
            $table->foreign('simcardid')->references('simcardid')->on('simcards');
            $table->unsignedBigInteger('mascotaid');
            $table->foreign('mascotaid')->references('mascotaid')->on('mascotas');
            $table->unsignedBigInteger('estadoid');
            $table->foreign('estadoid')->references('estadoid')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dispositivos');
    }
};
