<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Questionario extends Model implements Transformable
{
    use TransformableTrait;

    use SoftDeletes;
    
    protected $table = 'questionario';

    protected $fillable = [];

    protected $dates = ['deleted_at'];
    
    /**
     * @return array
     */
    public function projeto()
    {
        return $this->belongsTo('App\App\Entities\Projeto');
    }
    

}
