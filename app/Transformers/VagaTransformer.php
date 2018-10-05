<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Vaga;

/**
 * Class VagaTransformer.
 *
 * @package namespace App\Transformers;
 */
class VagaTransformer extends TransformerAbstract
{
    /**
     * Transform the Vaga entity.
     *
     * @param \App\Entities\Vaga $model
     *
     * @return array
     */
    public function transform(Vaga $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
