<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Plano extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_plano', 'qtdtreino_plano', 'valor_plano'
    ];

    public function matricula()
    {
        return $this->hasOne(Matricula::class);
    }

}
