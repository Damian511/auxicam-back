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
        Schema::create('simcards',function (Blueprint $table){
            $table->id('simcardid');
            $table->string('numero')->unique();
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
        Schema::drop('simcards');
    }
};
