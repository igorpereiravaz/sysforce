<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('data');
            $table->integer('plano_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('turma_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('plano_id')
                ->references('id')
                ->on('planos')
                ->onDelete('cascade');

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes')
                ->onDelete('cascade');

            $table->foreign('turma_id')
                ->references('id')
                ->on('turmas')
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
        Schema::dropIfExists('matriculas');
    }
}
