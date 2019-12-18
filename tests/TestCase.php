<?php

namespace Huangdijia\GatewayWorker\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
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

    protected function setUp(): void
    {
        parent::setUp();

        // Your code here
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
