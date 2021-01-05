<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacaos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data');
            $table->integer('busto');
            $table->integer('bracoDireito');
            $table->integer('bracoEsquerdo');
            $table->integer('antebracoEsquerdo');
            $table->integer('antebracoDireito');
            $table->integer('peito');
            $table->integer('cintura');
            $table->integer('quadril');
            $table->integer('coxaDireita');
            $table->integer('coxaEsquerda');
            $table->integer('panturrilhaDireita');
            $table->integer('panturrilhaEsquerda');
            $table->integer('altura');
            $table->decimal('peso');
            $table->decimal('imc');
            $table->integer('cliente_id')->unsigned();
            $table->timestamps();

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avaliacao');
    }
}
