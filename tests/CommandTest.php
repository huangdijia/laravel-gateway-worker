<?php

namespace Huangdijia\GatewayWorker\Tests;

class CommandTest extends TestCase
{
    public function testPublish()
    {
        $this->artisan('vendor:publish', [
            '--provider' => '"Huangdijia\GatewayWorker\GatewayWorkerServiceProvider"',
        ])
            ->assertExitCode(0);
    }

    public function testStartCommand()
    {
        $this->artisan('gateway-worker:serve start --daemon')->assertExitCode(0);
    }

    public function testStatusCommand()
    {
        $this->artisan('gateway-worker:serve status')->assertExitCode(0);
    }

    public function testStopCommand()
    {
        $this->artisan('gateway-worker:serve stop')->assertExitCode(0);
    }
}
