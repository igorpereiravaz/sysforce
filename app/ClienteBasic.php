<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Notifications\Notifiable;


class ClienteBasic
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf_cliente','nome_cliente','telefone_cliente','nasc_cliente','endereco_cliente',
        'bairro_cliente','estado_cliente','cidade_cliente','nomeemer_cliente','telefoneemer_cliente',
        'fuma_cliente','diabete_cliente','colesterol_cliente','cardiaco_cliente','qualcardiaco_cliente',
        'lesao_cliente','locallesao_cliente','medicamento_cliente','qualmedicamento_cliente','atividadefisica_cliente'
    ];

}
