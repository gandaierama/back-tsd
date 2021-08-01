<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gateway extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('gateways', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('url')->nullable();
            $table->string('method')->nullable();
            $table->string('body')->nullable();
            $table->string('header1')->nullable();
            $table->string('header2')->nullable();
            $table->string('header3')->nullable();
            $table->string('status')->nullable();
            $table->string('imagem')->nullable();
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
        Schema::drop('gateways');
    }
}
