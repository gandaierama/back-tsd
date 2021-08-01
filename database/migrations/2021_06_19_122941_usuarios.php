<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome')->nullable();
            $table->string('sobrenome')->nullable();
            $table->string('email')->nullable();
            $table->string('senha')->nullable();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('imagem')->nullable();
            $table->string('id_grupo')->nullable();
            $table->integer('status');
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
        //
        Schema::drop('usuarios');
    }
}
