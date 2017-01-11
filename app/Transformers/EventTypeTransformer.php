<?php

namespace codeFin\Transformers;

use League\Fractal\TransformerAbstract;
use codeFin\Models\EventType;

/**
 * Class EventTypeTransformer
 * @package namespace codeFin\Transformers;
 */
class EventTypeTransformer extends TransformerAbstract
{

    /**
     * Transform the \EventType entity
     * @param \EventType $model
     *
     * @return array
     */
    public function transform(EventType $model)
    {
        return [
            'id'         => (int) $model->id,
            'event_type' => (string) $model->id,
            'discount'   => (float) $model->discount,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
