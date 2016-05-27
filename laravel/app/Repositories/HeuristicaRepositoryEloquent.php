<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HeuristicaRepository;
use App\Entities\Heuristica;
use App\Validators\HeuristicaValidator;

/**
 * Class HeuristicaRepositoryEloquent
 * @package namespace App\Repositories;
 */
class HeuristicaRepositoryEloquent extends BaseRepository implements HeuristicaRepository
{
    /**
     * Specify Model class
     *
     * @return string
     */
    public function model()
    {
        return Heuristica::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return HeuristicaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
