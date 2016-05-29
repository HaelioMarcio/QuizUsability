<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\HeuristicaRepository', 
            'App\Repositories\HeuristicaRepositoryEloquent'
        );

        $this->app->bind(
            'App\Repositories\ProjetoRepository',
            'App\Repositories\ProjetoRepositoryEloquent'
        );

        $this->app->bind(
            'App\Repositories\QuestionarioRepository',
            'App\Repositories\QuestionarioRepositoryEloquent'
        );

//        $this->app->bind(
//            'App\Repositories\HeuristicaRepository',
//            'App\Repositories\HeuristicaRepositoryEloquent'
//        );
    }
}
