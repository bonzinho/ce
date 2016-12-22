<?php

namespace codeFin\Repositories;

use codeFin\Presenters\BankAccountPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use codeFin\Repositories\BankAccountRepository;
use codeFin\Models\BankAccount;

/**
 * Class BankAccountRepositoryEloquent
 * @package namespace codeFin\Repositories;
 */
class BankAccountRepositoryEloquent extends BaseRepository implements BankAccountRepository
{

    protected $skipPresenter = false; //se for true desativa o presenter (fractal)

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BankAccount::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return BankAccountPresenter::class;
    }
}
