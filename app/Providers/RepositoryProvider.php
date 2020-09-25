<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\UserRepository::class
        );
    }
}
