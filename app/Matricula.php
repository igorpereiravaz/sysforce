<?php

namespace App;

use App\Models\System\Permissions\Permissions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Matricula extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'data', 'plano_id', 'cliente_id', 'turma_id'
    ];
    public function mensalidades()
    {
        return $this->hasMany(Mensalidade::class);
    }

    public function plano()
    {
        return $this->belongsTo(Plano::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

}
