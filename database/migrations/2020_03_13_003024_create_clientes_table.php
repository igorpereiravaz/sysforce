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
            $table->string('cpf_cliente')->unique();
            $table->string('nome_cliente');
            $table->string('telefone_cliente');
            $table->date('nasc_cliente');
            $table->string('endereco_cliente');
            $table->string('bairro_cliente');
            $table->string('estado_cliente');
            $table->string('cidade_cliente');
            $table->string('nomeemer_cliente');
            $table->string('telefoneemer_cliente');
            $table->string('fuma_cliente');
            $table->string('diabete_cliente');
            $table->string('colesterol_cliente');
            $table->string('cardiaco_cliente');
            $table->string('qualcardiaco_cliente');
            $table->string('lesao_cliente');
            $table->string('locallesao_cliente');
            $table->string('medicamento_cliente');
            $table->string('qualmedicamento_cliente');
            $table->string('atividadefisica_cliente');


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
