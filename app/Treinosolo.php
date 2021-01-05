<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Treinosolo extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "treinosolos";

    protected $fillable = [
        'nome', 'data', 'cliente_id'
    ];

    public function exercicios()
    {
        return $this->belongsToMany(Exercicio::class,'treinosolo_exercicio');
    }

}
