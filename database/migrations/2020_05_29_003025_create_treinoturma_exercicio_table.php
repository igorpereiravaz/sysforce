<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinoturmaExercicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinoturma_exercicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('treinoturma_id')->unsigned();
            $table->integer('exercicio_id')->unsigned();
            $table->timestamps();

            $table->foreign('treinoturma_id')
                ->references('id')
                ->on('treinoturmas')
                ->onDelete('cascade');

            $table->foreign('exercicio_id')
                ->references('id')
                ->on('exercicios')
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
