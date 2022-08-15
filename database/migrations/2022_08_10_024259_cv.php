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
        Schema::create('cv',function(Blueprint $table)
        {
            $table->string('name');
            $table->string('position');
            $table->timestamps();
            $table->string('phone');
            $table->string('file');
            $table->integer('id_user');
            $table->increments('id');
            $table->integer('status');
            
        });

        Schema::table('cv',function(Blueprint $table){
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv');
    }
};
