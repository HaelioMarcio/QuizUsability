<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ResultadoAvaliacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'resultado_avaliacao';

    protected $fillable = ['avaliacao_id', 'pergunta_id', 'resposta_id'];

    protected $dates = ['created_at', 'updated_at'];

    public function avaliacao()
    {
        return $this->belongsTo('App\Entities\Avaliacao');
    }

    public function pergunta()
    {
        return $this->belongsTo('App\Entities\Pergunta');
    }

    public function resposta()
    {
        return $this->belongsTo('App\Entities\Resposta');
    }
    
}
