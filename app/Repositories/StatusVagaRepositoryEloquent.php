<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StatusVagaRepository;
use App\Entities\StatusVaga;
use App\Validators\StatusVagaValidator;

/**
 * Class StatusVagaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StatusVagaRepositoryEloquent extends BaseRepository implements StatusVagaRepository {

    public function selectBoxList(string $descricao = 'descricao', string $chave = 'id') {
        return $this->model->pluck($descricao, $chave)->all();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return StatusVaga::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {

        return StatusVagaValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
