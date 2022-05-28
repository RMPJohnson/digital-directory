<?php

namespace App\Providers;

use App\Repository\Eloquent\CategoryRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\BusinessRepository;


use App\Repository\EloquentRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;
use App\Repository\BusinessRepositoryInterface;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(BusinessRepositoryInterface::class, BusinessRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
