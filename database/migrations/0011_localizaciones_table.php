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
        Schema::create('localizaciones',function (Blueprint $table){
            $table->id('localizacionid');
            $table->unsignedBigInteger('dispositivoid');
            $table->foreign('dispositivoid')->references('dispositivoid')->on('dispositivos');
            $table->string('latitud',20);
            $table->string('longitud',20);
            $table->dateTime('fechahora');
            $table->integer('bateria');
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
        Schema::drop('localizaciones');
    }
};
