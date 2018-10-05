<?php

namespace App\Presenters;

use App\Transformers\StatusCandidatoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusCandidatoPresenter.
 *
 * @package namespace App\Presenters;
 */
class StatusCandidatoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusCandidatoTransformer();
    }
}
