<?php

namespace Mydnic\Kustomer;

use Illuminate\Support\ServiceProvider;

class KustomerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }

        $this->registerRoutes();
        $this->registerMigrations();
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../config/kustomer.php' => config_path('kustomer.php'),
        ], 'kustomer-config');

        $this->publishes([
            __DIR__ . '/../public' => public_path('vendor/kustomer'),
        ], 'kustomer-assets');
    }

    /**
     * Register the package's migrations
     *
     * @return void
     */
    protected function registerMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        });
    }

    /**
     * Get the Nova route group configuration array.
     *
     * @return array
     */
    protected function routeConfiguration()
    {
        return [
            'namespace' => 'Mydnic\Kustomer\Http\Controllers',
            'as' => 'kustomer.api',
            'prefix' => 'kustomer-api',
            'middleware' => 'api',
        ];
    }
}
