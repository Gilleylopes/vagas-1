<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\VagaRepository::class, \App\Repositories\VagaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StatusVagaRepository::class, \App\Repositories\StatusVagaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CandidatoRepository::class, \App\Repositories\CandidatoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StatusCandidatoRepository::class, \App\Repositories\StatusCandidatoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NivelLinguaEstrangeiraRepository::class, \App\Repositories\NivelLinguaEstrangeiraRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TesteRepository::class, \App\Repositories\TesteRepositoryEloquent::class);
        //:end-bindings:
    }
}
