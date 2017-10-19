<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaUsuarios extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('nome', 50);
            $table->string('email', 50);
            $table->string('envolvimento', 50);
            $table->string('cpf', 50);
            $table->dateTime('data_cadastro');
            $table->dateTime('ultimo_envolvimento');
            $table->string('foto', 50);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::drop('usuarios');
    }
}
