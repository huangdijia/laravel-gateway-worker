<?php

declare(strict_types=1);
/**
 * This file is part of laravel-gateway-worker.
 *
 * @link     https://github.com/huangdijia/laravel-gateway-worker
 * @document https://github.com/huangdijia/laravel-gateway-worker/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */

namespace Huangdijia\GatewayWorker;

use GatewayWorker\BusinessWorker;

interface GatewayWorkerEventInterface
{
    public static function onWorkerStart(BusinessWorker $businessWorker): void;

    public static function onConnect(string $clientId): void;

    public static function onWebSocketConnect(string $clientId, array $data): void;

    public static function onMessage(string $clientId, mixed $revData): void;

    public static function onClose(string $clientId): void;
}
