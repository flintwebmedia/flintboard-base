<?php

namespace FlintWebmedia\FlintboardBase;

use Illuminate\Support\ServiceProvider;

class FlintboardBaseProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/FlintboardBaseRouter.php');
        
        $this->publishes([
            __DIR__.'/config/flintboardbase.php' => config_path('Flintboard/base.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/resources/views', 'flintboardbase');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
