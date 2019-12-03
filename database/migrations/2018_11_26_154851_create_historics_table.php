<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // id do usuario
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //se deletar o usuario automaticamente deleta o registo vinculado
            $table->enum('tipo',['Cliente', 'Colaborador', 'Fornecedor']);
            $table->date('data');
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
        Schema::dropIfExists('historics');
    }
}
