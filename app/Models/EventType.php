<?php

namespace codeFin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EventType extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['event_type', 'discount'];

}
