<?php

namespace codeFin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use codeFin\Repositories\EventKindRepository;
use codeFin\Models\EventKind;
use codeFin\Validators\EventKindValidator;

/**
 * Class EventKindRepositoryEloquent
 * @package namespace codeFin\Repositories;
 */
class EventKindRepositoryEloquent extends BaseRepository implements EventKindRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EventKind::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
