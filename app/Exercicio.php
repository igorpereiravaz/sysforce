<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Exercicio extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome_exercicio'
    ];

    public function treinoturmas()
    {
        return $this->belongsToMany(Treinoturma::class, 'treinoturma_exercicio');
    }

    public function treinosolos()
    {
        return $this->belongsToMany(Treinosolo::class,'treinosolo_exercicio');
    }

}
