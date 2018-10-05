<?php

namespace App\Presenters;

use App\Transformers\CandidatoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CandidatoPresenter.
 *
 * @package namespace App\Presenters;
 */
class CandidatoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CandidatoTransformer();
    }
}
