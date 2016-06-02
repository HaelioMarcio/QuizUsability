<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Avaliacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'avaliacao';

    protected $fillable = ['id','questionario_id', 'convidado_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function questionario()
    {
        return $this->belongsTo('App\Entities\Questionario');
    }
    
    public function convidado()
    {
        return $this->belongsTo('App\Entities\Convidado');
    }
}
