<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Mensalidade extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'valor', 'datapagamento', 'matricula_id', 'datames'
    ];

    public function matricula()
    {
        return $this->belongsTo(Matricula::class);
    }

}
