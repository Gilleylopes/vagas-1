<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Candidato;

/**
 * Class CandidatoTransformer.
 *
 * @package namespace App\Transformers;
 */
class CandidatoTransformer extends TransformerAbstract
{
    /**
     * Transform the Candidato entity.
     *
     * @param \App\Entities\Candidato $model
     *
     * @return array
     */
    public function transform(Candidato $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
