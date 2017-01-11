<?php

namespace codeFin\Repositories;


use codeFin\Models\EventType;
use codeFin\Presenters\EventTypePresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;


/**
 * Class EventTypeRepositoryEloquent
 * @package namespace codeFin\Repositories;
 */
class EventTypeRepositoryEloquent extends BaseRepository implements EventTypeRepository{
    public function create(array $attributes){
        $data = $attributes;
        $skipPresenter = $this->skipPresenter;
        $this->skipPresenter(true); //força o skippresenter
        $model = parent::create($attributes); // com o skip recebe o modelo eloquent
        $this->skipPresenter = $skipPresenter; // skip presenter volta ao valor original
        return $this->parserResult($model);//parserResult verifica como é feito se tem ou não presenter
    }

    public function update(array $attributes, $id){
        $data = $attributes;
        $skipPresenter = $this->skipPresenter;
        $this->skipPresenter(true); //força o skippresenter
        $model = parent::update($attributes, $id);
        $this->skipPresenter = $skipPresenter;
        return $this->parserResult($model);
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return EventType::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(){
        return EventTypePresenter::class;
    }
}
