<?php

namespace App\Providers;

use App\Repositories\CommentRepository;
use App\Repositories\Contracts\CommentContract;
use App\Repositories\Contracts\PostContract;
use App\Repositories\Contracts\UserContract;
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
        $this->app->bind(
            CommentContract::class,
            CommentRepository::class
        );
    }
}
