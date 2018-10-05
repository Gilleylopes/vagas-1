<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\StatusCandidato;

/**
 * Class StatusCandidatoTransformer.
 *
 * @package namespace App\Transformers;
 */
class StatusCandidatoTransformer extends TransformerAbstract
{
    /**
     * Transform the StatusCandidato entity.
     *
     * @param \App\Entities\StatusCandidato $model
     *
     * @return array
     */
    public function transform(StatusCandidato $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
