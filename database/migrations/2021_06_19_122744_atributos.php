<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Atributos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('frete_gratis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cep_inicial')->nullable()->nullable();
            $table->string('cep_final')->nullable()->nullable();
            $table->integer('status')->nullable()->nullable();
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
        Schema::drop('frete_gratis');
    }
}
