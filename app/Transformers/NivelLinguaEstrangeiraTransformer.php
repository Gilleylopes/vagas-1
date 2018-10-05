<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\NivelLinguaEstrangeira;

/**
 * Class NivelLinguaEstrangeiraTransformer.
 *
 * @package namespace App\Transformers;
 */
class NivelLinguaEstrangeiraTransformer extends TransformerAbstract
{
    /**
     * Transform the NivelLinguaEstrangeira entity.
     *
     * @param \App\Entities\NivelLinguaEstrangeira $model
     *
     * @return array
     */
    public function transform(NivelLinguaEstrangeira $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
