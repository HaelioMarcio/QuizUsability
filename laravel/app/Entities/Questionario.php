<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Questionario extends Model implements Transformable
{
    use TransformableTrait;
    
    protected $table = 'questionario';

    protected $fillable = [];

    /**
     * @return array
     */
    public function projeto()
    {
        return $this->belongsTo('App\Entities\Projeto');
    }
    

}
