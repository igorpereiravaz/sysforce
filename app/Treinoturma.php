<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Treinoturma extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "treinoturmas";

    protected $fillable = [
        'nome', 'data', 'turma_id'
    ];

    public function exercicios()
    {
        return $this->belongsToMany(Exercicio::class, 'treinoturma_exercicio');
    }

}
