<?php

namespace codeFin\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use codeFin\Repositories\EventAbrangenceRepository;
use codeFin\Models\EventAbrangence;
use codeFin\Validators\EventAbrangenceValidator;

/**
 * Class EventAbrangenceRepositoryEloquent
 * @package namespace codeFin\Repositories;
 */
class EventAbrangenceRepositoryEloquent extends BaseRepository implements EventAbrangenceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EventAbrangence::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
