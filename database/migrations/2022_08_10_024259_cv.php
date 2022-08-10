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
            $table->dateTime('dateapply');
            $table->string('phone');
            $table->string('file');
            $table->integer('id_user');
            $table->increments('id_cv');
            $table->integer('status');
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
