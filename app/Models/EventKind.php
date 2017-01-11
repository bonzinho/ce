<?php

namespace codeFin\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class EventKind extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['description'];

}
