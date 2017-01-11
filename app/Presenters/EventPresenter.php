<?php

namespace codeFin\Presenters;

use codeFin\Transformers\EventTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EventPresenter
 *
 * @package namespace codeFin\Presenters;
 */
class EventPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EventTransformer();
    }
}
