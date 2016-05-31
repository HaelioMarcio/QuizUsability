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

    protected $fillable = ['descricao', 'objetivo', 'projeto_id', 'token', 'perguntas'];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    /**
     * @return array
     */
    public function projeto()
    {
        return $this->belongsTo('App\Entities\Projeto', 'projeto_id');
    }

    public function perguntas()
    {
        return $this->belongsToMany('App\Entities\Pergunta', 'questionario_pergunta', 'questionario_id', 'pergunta_id');
    }


    

}
