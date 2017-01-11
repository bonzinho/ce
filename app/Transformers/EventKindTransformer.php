<?php

namespace codeFin\Transformers;

use League\Fractal\TransformerAbstract;
use codeFin\Models\EventKind;

/**
 * Class EventKindTransformer
 * @package namespace codeFin\Transformers;
 */
class EventKindTransformer extends TransformerAbstract
{

    /**
     * Transform the \EventKind entity
     * @param \EventKind $model
     *
     * @return array
     */
    public function transform(EventKind $model)
    {
        return [
            'id'         => (int) $model->id,
            'description' => (string) $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
