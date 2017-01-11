<?php

namespace codeFin\Presenters;

use codeFin\Transformers\EventStateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EventStatePresenter
 *
 * @package namespace codeFin\Presenters;
 */
class EventStatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EventStateTransformer();
    }
}
