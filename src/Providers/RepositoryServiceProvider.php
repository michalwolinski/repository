<?php

namespace MichalWolinski\Repository\Providers;

use Illuminate\Support\ServiceProvider;
use MichalWolinski\Repository\Interfaces\Repository as RepositoryInterface;
use MichalWolinski\Repository\Repository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, Repository::class);
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
