<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreinosolosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treinosolos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->dateTime('data');
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
        Schema::dropIfExists('matriculas');
    }
}
