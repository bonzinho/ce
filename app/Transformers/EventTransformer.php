<?php

namespace codeFin\Transformers;

use League\Fractal\TransformerAbstract;
use codeFin\Models\Event;

/**
 * Class EventTransformer
 * @package namespace codeFin\Transformers;
 */
class EventTransformer extends TransformerAbstract
{

    /**
     * Transform the \Event entity
     * @param \Event $model
     *
     * @return array
     */
    public function transform(Event $model)
    {
        return [
            'id'         => (int) $model->id,
            'denomination' => (string) $model->denomination,
            'start_date_time' => $model->start_date_time,
            'end_date_time' => $model->end_date_time,
            'work_plan' => (string) $model->work_plan,
            'rider_tecnique' => (string) $model->rider_tecnique,
            'program' => (string) $model->program,
            'notes' => (string) $model->notes,
            'scheduling' => (bool) $model->scheduling,
            'provisional_price' => (float) $model->provisional_price,
            'final_price' => (float) $model->final_price,
            'participants_number' => (int) $model->participants_number,
            'days_number' => (int) $model->days_number,
            'programme_doc' => (string) $model->programme_doc,
            'procedding_doc' => (string) $model->procedding_doc,
            'abrangence_id' => (int) $model->abrangence_id,
            'eventState_id' => (int) $model->eventState_id,
            'eventType_id' => (int) $model->eventType_id,
            'eventKind_id' => (int) $model->eventKind_id,
            'user_id' => (int) $model->user_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
