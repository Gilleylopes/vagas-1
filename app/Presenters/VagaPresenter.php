<?php

namespace App\Presenters;

use App\Transformers\VagaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VagaPresenter.
 *
 * @package namespace App\Presenters;
 */
class VagaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VagaTransformer();
    }
}
