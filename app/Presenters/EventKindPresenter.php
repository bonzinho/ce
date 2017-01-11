<?php

namespace codeFin\Presenters;

use codeFin\Transformers\EventKindTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EventKindPresenter
 *
 * @package namespace codeFin\Presenters;
 */
class EventKindPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EventKindTransformer();
    }
}
