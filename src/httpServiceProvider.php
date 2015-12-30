<?php

namespace check\http;

use Illuminate\Support\ServiceProvider;

class httpServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__.'/config/config.php' => config_path('checkhttp/config.php'),
        ]);

        require __DIR__.'/routes.php';
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
