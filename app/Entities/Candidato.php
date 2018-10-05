<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Candidato.
 *
 * @package namespace App\Entities;
 */
class Candidato extends Model implements Transformable {

    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_vaga', 'id_status_candidatos', 'nome', 'email', 'telefone', 'url_linkedin', 'url_github', 'id_nivel_lingua_estrangeira', 'salario', 'carta_apresentacao', 'file_name'];

    public function vaga() {
        return $this->belongsTo(Vaga::class, 'id_vaga');
    }

    public function statusCandidato() {
        return $this->belongsTo(StatusCandidato::class, 'id_status_candidatos');
    }

    public function nivelLinguaEstrangeira() {
        return $this->belongsTo(NivelLinguaEstrangeira::class, 'id_nivel_lingua_estrangeira');
    }

}
