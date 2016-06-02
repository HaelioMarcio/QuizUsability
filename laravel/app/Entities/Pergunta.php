<?php 
namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    protected $table = 'pergunta';
    protected $fillable = ['descricao'];

    public function heuristica()
	{
		return $this->belongsTo('App\Entities\Heuristica');
	}

    public function usuario()
    {
        return $this->belongsTo('App\Entities\Heuristica');
    }
}
