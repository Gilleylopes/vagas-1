<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CandidatoRepository;
use App\Entities\Candidato;
use App\Validators\CandidatoValidator;

/**
 * Class CandidatoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CandidatoRepositoryEloquent extends BaseRepository implements CandidatoRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Candidato::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {

        return CandidatoValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
