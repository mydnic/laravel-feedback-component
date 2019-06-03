<?php

namespace Mydnic\Kustomer;

use Illuminate\Support\Facades\Route;
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
        $this->registerTranslations();
        $this->registerViews();
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

        $this->publishes([
            __DIR__ . '/../resources/js/components' => resource_path('js/components/Kustomer'),
        ], 'kustomer-vue-component');

        $this->publishes([
            __DIR__ . '/../resources/sass' => resource_path('sass'),
        ], 'kustomer-sass-component');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/kustomer'),
        ], 'kustomer-locales');

        $this->publishes(
            [__DIR__ . '/../resources/views' => resource_path('views/vendor/kustomer')],
            'kustomer-views'
        );
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
     * Register the package translations.
     *
     * @return void
     */
    protected function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'kustomer');
    }

    /**
     * Register the package views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'kustomer');
    }

    /**
     * Get the Kustomer route group configuration array.
     *
     * @return array
     */
    protected function routeConfiguration()
    {
        return [
            'namespace' => 'Mydnic\Kustomer\Http\Controllers',
            'as' => 'kustomer.api.',
            'prefix' => 'kustomer-api',
            'middleware' => 'web',
        ];
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/kustomer.php',
            'kustomer'
        );

        $this->commands([
            Console\PublishCommand::class,
        ]);
    }
}
