<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
            'App\Repository\Interfaces\FeesInterface',
            'App\Repository\Repo\FeesRepository'
        );
        $this->app->bind(
            'App\Repository\Interfaces\KlassInterface',
            'App\Repository\Repo\KlassRepo'
        );
        $this->app->bind(
            'App\Repository\Interfaces\GroupInterface',
            'App\Repository\Repo\GroupRepo'
        );
        $this->app->bind(
            'App\Repository\Interfaces\ClassSectionInterface',
            'App\Repository\Repo\ClassSectionRepo'
        );
        $this->app->bind(
            'App\Repository\Interfaces\StudentInterface',
            'App\Repository\Repo\StudentRepo'
        );
        $this->app->bind(
            'App\Repository\Interfaces\PaymentInterface',
            'App\Repository\Repo\PaymentRepo'
        );
        $this->app->bind(
            'App\Repository\Interfaces\FeesSetupInterface',
            'App\Repository\Repo\FeesSetupRepo'
        );
    }
}
