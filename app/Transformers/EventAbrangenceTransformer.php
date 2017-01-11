<?php

namespace codeFin\Transformers;

use League\Fractal\TransformerAbstract;
use codeFin\Models\EventAbrangence;

/**
 * Class EventAbrangenceTransformer
 * @package namespace codeFin\Transformers;
 */
class EventAbrangenceTransformer extends TransformerAbstract
{

    /**
     * Transform the \EventAbrangence entity
     * @param \EventAbrangence $model
     *
     * @return array
     */
    public function transform(EventAbrangence $model)
    {
        return [
            'id'         => (int) $model->id,
            'description' => (string) $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
