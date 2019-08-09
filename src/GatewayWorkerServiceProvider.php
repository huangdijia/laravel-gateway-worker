<?php

namespace Huangdijia\GatewayWorker;

use Illuminate\Support\ServiceProvider;

class GatewayWorkerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/gatewayworker.php', 'gatewayworker');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/gatewayworker.php' => $this->app->basePath('config/gatewayworker.php')]);
        }

        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\ServeCommand::class,
            ]);
        }

        Client::$registerAddress = config('gatewayworker.register_address');
    }
}
