<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Turma extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_turma', 'dias', 'horario'
    ];

    public function matricula()
    {
        return $this->hasMany(Matricula::class);
    }

    public function treinoturmas()
    {
        return $this->hasMany(Treinoturma::class);
    }

}
