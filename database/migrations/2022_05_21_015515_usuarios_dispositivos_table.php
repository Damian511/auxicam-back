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
        Schema::create('usuariosdispositivos',function (Blueprint $table){
            $table->unsignedBigInteger('dispositivoid');
            $table->foreign('dispositivoid')->references('dispositivoid')->on('dispositivos');
            $table->unsignedBigInteger('usuarioid');
            $table->foreign('usuarioid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuariosdispositivos');
    }
};
