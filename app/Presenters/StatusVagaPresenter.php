<?php

namespace App\Presenters;

use App\Transformers\StatusVagaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusVagaPresenter.
 *
 * @package namespace App\Presenters;
 */
class StatusVagaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusVagaTransformer();
    }
}
