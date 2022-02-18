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
