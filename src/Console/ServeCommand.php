<?php

declare(strict_types=1);
/**
 * This file is part of laravel-gateway-worker.
 *
 * @link     https://github.com/huangdijia/laravel-gateway-worker
 * @document https://github.com/huangdijia/laravel-gateway-worker/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */
namespace Huangdijia\GatewayWorker\Console;

use GatewayWorker\BusinessWorker;
use GatewayWorker\Gateway;
use GatewayWorker\Register;
use Huangdijia\GatewayWorker\GatewayWorkerEventInterface;
use Illuminate\Console\Command;
use Workerman\Worker;

class ServeCommand extends Command
{
    protected $signature = 'gateway-worker:serve
    {action=start : start|stop|restart|reload|status|connections|help}
    {--daemon}

    {--register : Enable register service}
    {--register-bind= : Bind host and port for register}
    {--register-processes= : Process num for register}

    {--register-address= : Register address for gateway or business worker}

    {--gateway : Enable gateway service}
    {--gateway-bind= : Bind host and port for gateway}
    {--gateway-processes= : Process num for gateway}
    {--lan-ip=127.0.0.1 : Lan IP}

    {--businessworker : Enable business worker service}
    {--businessworker-processes= : Process num for business worker}
    ';

    protected $description = 'Gateway Worker Service.';

    public function handle()
    {
        if (! in_array($action = $this->argument('action'), ['start', 'stop', 'restart', 'reload', 'status', 'connections', 'help'])) {
            $this->error('Error Arguments');
            exit;
        }

        if ($this->option('register')) {
            $registerBind = $this->option('register-bind') ?? config('gatewayworker.register.bind', '0.0.0.0:1215');
            $registerProcesses = $this->option('register-processes') ?? config('gatewayworker.register.processes', 1);

            $this->info('Register:');
            $this->table(['Argument', 'Value'], [
                ['bind', $registerBind],
                ['processes', $registerProcesses],
            ]);

            $register = new Register('text://' . $registerBind);
            $register->name = config('gatewayworker.register.name', 'Register');
            $register->count = $registerProcesses;
        }

        if ($this->option('gateway')) {
            $registerAddress = $this->option('register-address') ?? config('gatewayworker.register_address', '127.0.0.1:1215');
            $gatewayBind = $this->option('gateway-bind') ?? config('gatewayworker.gateway.bind', '0.0.0.0:1216');
            $gatewayProcesses = $this->option('gateway-processes') ?? config('gatewayworker.gateway.processes', 1);
            $lanIp = $this->option('lan-ip') ?? config('gatewayworker.gateway.lan_ip', '');
            $pingData = config('gatewayworker.gateway.ping_data', '{"mode":"heart"}');

            $this->info('Gateway:');
            $this->table(['Argument', 'Value'], [
                ['bind', $gatewayBind],
                ['processes', $gatewayProcesses],
                ['register_address', $registerAddress],
                ['lan_ip', $lanIp],
                ['ping_data', $pingData],
            ]);

            $gateway = new Gateway('websocket://' . $gatewayBind);
            $gateway->name = config('gatewayworker.gateway.name', 'Gateway');
            $gateway->count = $gatewayProcesses;
            $gateway->lanIp = $lanIp;
            $gateway->startPort = config('gatewayworker.gateway.start_port', 2300);
            $gateway->pingInterval = config('gatewayworker.gateway.ping_interval', 30);
            $gateway->pingNotResponseLimit = config('gatewayworker.gateway.ping_not_response_limit', 0);
            $gateway->pingData = $pingData;
            $gateway->registerAddress = $registerAddress;
        }

        if ($this->option('businessworker')) {
            $registerAddress = $this->option('register-address') ?? config('gatewayworker.register_address', '127.0.0.1:1215');
            $businessworkerProcesses = $this->option('businessworker-processes') ?? config('gatewayworker.businessworker.processes', 1);
            $eventHandler = config('gatewayworker.businessworker.event_handler', '');

            $this->info('BusinessWorker:');
            $this->table(['Argument', 'Value'], [
                ['processes', $businessworkerProcesses],
                ['register_address', $registerAddress],
                ['event_handler', $eventHandler],
            ]);

            $worker = new BusinessWorker();
            $worker->name = config('gatewayworker.businessworker.name', 'BusinessWorker');
            $worker->count = $businessworkerProcesses;
            $worker->registerAddress = $registerAddress;

            if ($eventHandler) {
                if (! class_exists($eventHandler)) {
                    throw new \Exception("Event '{$eventHandler}' is not exists", 1);
                }

                if (! in_array(GatewayWorkerEventInterface::class, (array) class_implements($eventHandler))) {
                    throw new \Exception("{$eventHandler} must implements of " . GatewayWorkerEventInterface::class, 1);
                }

                $worker->eventHandler = $eventHandler;
            }
        }

        global $argv;
        $argv[0] = 'gateway-worker:server';
        $argv[1] = $action;
        $argv[2] = $this->option('daemon') ? '-d' : '';

        Worker::$pidFile = config('gatewayworker.pid_file', storage_path('logs/workerman.pid'));
        Worker::$logFile = config('gatewayworker.log_file', storage_path('logs/workerman.log'));

        Worker::runAll();
    }
}
