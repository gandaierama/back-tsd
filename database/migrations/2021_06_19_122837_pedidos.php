<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order');
            $table->string('total');
            $table->string('status');
            $table->string('id_cliente');
            $table->string('type');
            $table->string('id_endereco');
            $table->text('observacao1');
            $table->text('observacao2');
            $table->string('id_provider');
            $table->string('valor_frete');
            $table->string('frete');
            $table->string('link');
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
        Schema::drop('pedidos');
    }
}
