<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Convidado extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'convidado';

    protected $fillable = ['nome', 'email'];

    protected $dates = ['created_at', 'updated_at'];
    
}
