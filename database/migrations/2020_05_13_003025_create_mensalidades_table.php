<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('valor');
            $table->dateTime('datapagamento');
            $table->string('datames');
            $table->integer('matricula_id')->unsigned();
            $table->timestamps();

            $table->foreign('matricula_id')
                ->references('id')
                ->on('matriculas')
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
