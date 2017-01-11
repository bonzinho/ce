<?php

namespace codeFin\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\codeFin\Repositories\EventAbrangenceRepository::class, \codeFin\Repositories\EventAbrangenceRepositoryEloquent::class);
        $this->app->bind(\codeFin\Repositories\EventStateRepository::class, \codeFin\Repositories\EventStateRepositoryEloquent::class);
        $this->app->bind(\codeFin\Repositories\EventKindRepository::class, \codeFin\Repositories\EventKindRepositoryEloquent::class);
        $this->app->bind(\codeFin\Repositories\EventTypeRepository::class, \codeFin\Repositories\EventTypeRepositoryEloquent::class);
        $this->app->bind(\codeFin\Repositories\EventRepository::class, \codeFin\Repositories\EventRepositoryEloquent::class);
        $this->app->bind(\codeFin\Repositories\BankRepository::class, \codeFin\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\codeFin\Repositories\BankAccountRepository::class, \codeFin\Repositories\BankAccountRepositoryEloquent::class);
        $this->app->bind(\codeFin\Repositories\ClientRepository::class, \codeFin\Repositories\ClientRepositoryEloquent::class);
        //:end-bindings:
    }
}
