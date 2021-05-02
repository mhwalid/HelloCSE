<?php

namespace App\Providers;

use App\Interfaces\Star\StarRepositoryInterface;
use App\Repository\Star\StarRepository;
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
        $this->app->bind(StarRepositoryInterface::class, StarRepository::class);
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
