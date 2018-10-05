<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NivelLinguaEstrangeiraRepository;
use App\Entities\NivelLinguaEstrangeira;
use App\Validators\NivelLinguaEstrangeiraValidator;

/**
 * Class NivelLinguaEstrangeiraRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NivelLinguaEstrangeiraRepositoryEloquent extends BaseRepository implements NivelLinguaEstrangeiraRepository {

    public function selectBoxList(string $descricao = 'descricao', string $chave = 'id') {
        return $this->model->pluck($descricao, $chave)->all();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model() {
        return NivelLinguaEstrangeira::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator() {

        return NivelLinguaEstrangeiraValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot() {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
