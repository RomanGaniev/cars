<?php

namespace App\Providers;

use App\Repositories\Cars\CarRepositoryInterface;
use App\Repositories\Cars\EloquentCarRepository;
use App\Repositories\Makes\MakeRepositoryInterface;
use App\Repositories\Makes\EloquentMakeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            MakeRepositoryInterface::class,
            EloquentMakeRepository::class
        );
        $this->app->bind(
            CarRepositoryInterface::class,
            EloquentCarRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
