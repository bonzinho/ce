<?php

namespace codeFin\Transformers;

use League\Fractal\TransformerAbstract;
use codeFin\Models\EventState;

/**
 * Class EventStateTransformer
 * @package namespace codeFin\Transformers;
 */
class EventStateTransformer extends TransformerAbstract
{

    /**
     * Transform the \EventState entity
     * @param \EventState $model
     *
     * @return array
     */
    public function transform(EventState $model)
    {
        return [
            'id'         => (int) $model->id,
            'description' => (string) $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
