<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\StatusVaga;

/**
 * Class StatusVagaTransformer.
 *
 * @package namespace App\Transformers;
 */
class StatusVagaTransformer extends TransformerAbstract
{
    /**
     * Transform the StatusVaga entity.
     *
     * @param \App\Entities\StatusVaga $model
     *
     * @return array
     */
    public function transform(StatusVaga $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
