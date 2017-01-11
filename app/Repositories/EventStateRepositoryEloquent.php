<?php

namespace codeFin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use codeFin\Repositories\EventStateRepository;
use codeFin\Models\EventState;
use codeFin\Validators\EventStateValidator;

/**
 * Class EventStateRepositoryEloquent
 * @package namespace codeFin\Repositories;
 */
class EventStateRepositoryEloquent extends BaseRepository implements EventStateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EventState::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
