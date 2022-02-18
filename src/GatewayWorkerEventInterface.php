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

interface GatewayWorkerEventInterface
{
    public static function onWorkerStart($businessWorker);

    public static function onConnect($clientId);

    public static function onWebSocketConnect($clientId, $data);

    public static function onMessage($clientId, $message);

    public static function onClose($clientId);
}
