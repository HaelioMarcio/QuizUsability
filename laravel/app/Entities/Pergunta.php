<?php

namespace App\App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $table = 'pergunta';
    protected $fillable = ['descricao'];

    public function heuristicas()
	{
		return $this->belongsTo('App\Entities\Heuristica');
	}
}
