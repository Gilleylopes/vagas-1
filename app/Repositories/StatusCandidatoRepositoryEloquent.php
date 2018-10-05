<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StatusCandidatoRepository;
use App\Entities\StatusCandidato;
use App\Validators\StatusCandidatoValidator;

/**
 * Class StatusCandidatoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StatusCandidatoRepositoryEloquent extends BaseRepository implements StatusCandidatoRepository {

    public function selectBoxList(string $descricao = 'descricao', string $chave = 'id') {
        return $this->model->pluck($descricao, $chave)->all();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return StatusCandidato::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {

        return StatusCandidatoValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
