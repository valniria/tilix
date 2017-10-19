<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaTitulos extends Migration
{
    public function up()
    {
        Schema::create('titulos', function($table) {
            $table->increments('id', true);
            $table->dateTime('data_vencimento');
            $table->string('valor', 10);
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('titulos', function($table) {
           $table->foreign('id_usuario')->references('id')->on('usuarios');
       });
    }

    public function down()
    {
        Schema::drop('titulos');
    }
}
