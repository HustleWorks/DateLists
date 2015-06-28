<?php namespace HustleWorks\DateLists;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class DateListsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        if (preg_match('/^4/', Application::VERSION)) {
            $this->package('hustleworks/datelists');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['datelists'] = $this->app->share(function ($app) {
            return new DateLists;
        });

        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('DateLists', 'HustleWorks\DateLists\DateListsFacade');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('datelists');
    }
}
