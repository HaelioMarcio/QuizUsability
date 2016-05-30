<?php

namespace App\Entities;

use App\App\Entities\Pergunta;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Heuristica extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'heuristica';
    protected $fillable = ['descricao', 'created_at'];

    public function perguntas()
	{
		return $this->hasMany(Pergunta::class);
	}

}
