<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Vaga.
 *
 * @package namespace App\Entities;
 */
class Vaga extends Model implements Transformable {

    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'descricao', 'funcao', 'qualificacao', 'cidade', 'uf', 'id_status_vagas'];

    public function statusVaga() {
        return $this->belongsTo(StatusVaga::class, 'id_status_vagas');
    }

    public function candidatos() {
        return $this->hasMany(Candidato::class, 'id_vaga');
    }

}
