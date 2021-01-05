<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinosoloExercicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinosolo_exercicio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('treinosolo_id')->unsigned();
            $table->integer('exercicio_id')->unsigned();
            $table->timestamps();

            $table->foreign('treinosolo_id')
                ->references('id')
                ->on('treinosolos')
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
