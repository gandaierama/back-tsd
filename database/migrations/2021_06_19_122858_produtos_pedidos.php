<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutosPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('produtos_pedido', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_produto');
            $table->integer('id_pedido')->nullable();
            $table->integer('quantidade')->nullable();
            $table->text('atributos')->nullable();
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
        Schema::drop('produtos_pedido');
    }
}
