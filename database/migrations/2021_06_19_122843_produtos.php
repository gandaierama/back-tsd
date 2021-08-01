<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('produtos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->text('descricao');
            $table->string('peso')->nullable();
            $table->string('largura')->nullable();
            $table->string('altura')->nullable();
            $table->string('preco')->nullable();
            $table->string('destaque')->nullable();
            $table->string('status')->nullable();
            $table->string('id_categoria')->nullable();
            $table->string('id_subcategoria')->nullable();
            $table->string('estoque')->nullable();
            $table->string('estoque_min')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('keywords_seo')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('ncm')->nullable();
            $table->string('sku')->nullable();
            $table->string('barcode')->nullable();
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
        Schema::drop('produtos');
    }
}
