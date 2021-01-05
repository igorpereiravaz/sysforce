<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use http\Env\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Builder;


class Cliente extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

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

    public function scopeTeste(Builder $query, $search){
        $clientes = $query->where('nome_cliente', 'LIKE', '%'.$search.'%')
            ->orWhere('cpf_cliente', 'LIKE', '%'.$search.'%')
            ->orWhere('telefone_cliente', 'LIKE', '%'.$search.'%')
            ->paginate(5);
    }

    public function matricula()
    {
        return $this->hasMany(Matricula::class);
    }

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);
    }

    public function treinosolos()
    {
        return $this->hasMany(Treinosolo::class);
    }
}
