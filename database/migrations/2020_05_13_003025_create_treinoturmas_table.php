<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinoturmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinoturmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->dateTime('data');
            $table->integer('turma_id')->unsigned();
            $table->timestamps();

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
