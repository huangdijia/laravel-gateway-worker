<?php

declare(strict_types=1);
/**
 * This file is part of hyperf/helpers.
 *
 * @link     https://github.com/huangdijia/laravel-gateway-worker
 * @document https://github.com/huangdijia/laravel-gateway-worker/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */
namespace Huangdijia\GatewayWorker;

use Illuminate\Support\ServiceProvider;

class GatewayWorkerServiceProvider extends ServiceProvider
{
    public function boot()
    {
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
