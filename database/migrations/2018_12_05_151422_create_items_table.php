<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned(); // id do pedido
            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade'); //se deletar o usuario automaticamente deleta o registo vinculado

            $table->integer('product_id')->unsigned(); // id do produto
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('quantidade');
            $table->float('valor_unit');
            $table->float('sub_total');
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
        Schema::dropIfExists('items');
    }
}
