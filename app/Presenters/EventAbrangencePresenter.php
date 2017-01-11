<?php

namespace codeFin\Presenters;

use codeFin\Transformers\EventAbrangenceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class EventAbrangencePresenter
 *
 * @package namespace codeFin\Presenters;
 */
class EventAbrangencePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new EventAbrangenceTransformer();
    }
}
