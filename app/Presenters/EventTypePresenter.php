<?php

namespace codeFin\Presenters;

use codeFin\Transformers\EventTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EventTypePresenter
 *
 * @package namespace codeFin\Presenters;
 */
class EventTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EventTypeTransformer();
    }
}
