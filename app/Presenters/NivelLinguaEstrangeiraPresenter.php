<?php

namespace App\Presenters;

use App\Transformers\NivelLinguaEstrangeiraTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NivelLinguaEstrangeiraPresenter.
 *
 * @package namespace App\Presenters;
 */
class NivelLinguaEstrangeiraPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NivelLinguaEstrangeiraTransformer();
    }
}
