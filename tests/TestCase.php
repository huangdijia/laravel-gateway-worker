<?php

declare(strict_types=1);
/**
 * This file is part of laravel-gateway-worker.
 *
 * @link     https://github.com/huangdijia/laravel-gateway-worker
 * @document https://github.com/huangdijia/laravel-gateway-worker/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */

namespace Huangdijia\GatewayWorker\Tests;

/**
 * @internal
 * @coversNothing
 */
class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Your code here
    }

    protected function getPackageProviders($app)
    {
        return [
            \Huangdijia\GatewayWorker\GatewayWorkerServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            // 'Acme' => 'Acme\Facade',
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        // $app['config']->set('database.default', 'testbench');
        // $app['config']->set('database.connections.testbench', [
        //     'driver'   => 'sqlite',
        //     'database' => ':memory:',
        //     'prefix'   => '',
        // ]);
    }
}
