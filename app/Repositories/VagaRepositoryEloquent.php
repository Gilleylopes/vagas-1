<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VagaRepository;
use App\Entities\Vaga;
use App\Validators\VagaValidator;

/**
 * Class VagaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VagaRepositoryEloquent extends BaseRepository implements VagaRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return Vaga::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {

        return VagaValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
