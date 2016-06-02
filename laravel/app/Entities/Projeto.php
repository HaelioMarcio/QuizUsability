<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Projeto extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'projeto';

    protected $fillable = ['titulo', 'descricao', 'url'];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questionarios() {
        return $this->hasMany('App\Entities\Questionario');
    }
}
