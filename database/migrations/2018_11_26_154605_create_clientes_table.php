<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            //$table->timestamps();
            $table->string('nome', 100);
            $table->string('CNPJ')->nullable();
           // $table->integer('user_id')->unsigned(); // id do usuario
           // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //se deletar o usuario automaticamente deleta o registo vinculado
            $table->date('data_cadastro');
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
        Schema::dropIfExists('clientes');
    }
}
