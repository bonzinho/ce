<?php

namespace codeFin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Event extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'denomination',
        'start_date_time',
        'end_date_time',
        'work_plan',
        'rider_tecnique',
        'program',
        'notes',
        'scheduling',
        'provisional_price',
        'final_price',
        'participants_number',
        'days_number',
        'programme_doc',
        'procedding_doc',
        'abrangence_id',
        'eventState_id',
        'eventType_id',
        'eventKind_id',
        'user_id',
    ];

    // relacionamento de muitos para um
    public function eventAbrangece(){
        return $this->belongsTo(EventAbrangence::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function eventKind(){
        return $this->belongsTo(EventKind::class);
    }

    public function eventState(){
        return $this->belongsTo(EventState::class);
    }

    public function eventType(){
        return $this->belongsTo(EventType::class);
    }

}
