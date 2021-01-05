<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Avaliacao extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'data', 'busto', 'bracoDireito', 'bracoEsquerdo',
        'antebracoEsquerdo' , 'AntebracoDireito' , 'peito' , 'cintura',
        'quadril' , 'coxaDireita' , 'coxaEsquerda' , 'panturrilhaDireita',
        'panturrilhaEsquerda' , 'altura' , 'peso', 'imc' , 'cliente_id'
    ];

}
