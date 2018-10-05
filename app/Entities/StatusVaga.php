<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StatusVaga.
 *
 * @package namespace App\Entities;
 */
class StatusVaga extends Model implements Transformable {

    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['descricao'];
    public $timestamps = true;

    public function vagas() {
        return $this->hasMany(Vaga::class);
    }

}
