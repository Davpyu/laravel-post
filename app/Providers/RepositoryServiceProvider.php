<?php

namespace App\Providers;

use App\Repositories\Interfaces\PostContract;
use App\Repositories\Interfaces\UserContract;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
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
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            PostContract::class,
            PostRepository::class
        );
        $this->app->bind(
            UserContract::class,
            UserRepository::class
        );
    }
}
