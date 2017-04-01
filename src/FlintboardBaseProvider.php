<?php

namespace FlintWebmedia\FlintboardBase;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Composer;

class FlintboardBaseProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // -- Publish files
        $this->publishes([
            __DIR__.'/config/flintboardbase.php' => config_path('Flintboard/base.php'),
        ]);

        // -- Load migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        // -- Load views
        $this->loadViewsFrom(__DIR__.'/resources/views', 'flintboardbase');
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function setupRoutes()
    {
        Route::group(['namespace' => 'FlintWebmedia\FlintboardBase\app\Http\Controllers'], function () {
            Route::group(['middleware' => ['web', 'admin'], 'prefix' => config('backpack.base.route_prefix', 'admin')], function () {

                // Define CRUD controllers, based on backpack/CRUD
                \CRUD::resource('page', 'Admin\PageCrudController');
                \CRUD::resource('content', 'Admin\PageEntityCrudController');

            });
        });

        // Test route, check if package is succesfully installed
        Route::get('flintboardbase', function() {
            return view('flintboardbase::flintboardbase');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // register the current package
        $this->app->bind('flintboard', function ($app) {
            return new FlintboardBase($app);
        });

        $this->app->bind('App\Contracts\Content', 'FlintWebmedia\FlintboardBase\Helpers\ContentHelper');

        // -- register Backpack service providers
        $this->app->register(\Backpack\Base\BaseServiceProvider::class);
        $this->app->register(\Backpack\CRUD\CrudServiceProvider::class);

        $this->setupRoutes();

    }
}
