<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StatusCandidato.
 *
 * @package namespace App\Entities;
 */
class StatusCandidato extends Model implements Transformable {

    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao'];
    public $timestamps = true;

    public function candidatos() {
        return $this->hasMany(Candidato::class);
    }

}
