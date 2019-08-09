<?php

namespace Huangdijia\GatewayWorker;

interface GatewayWorkerEventInterface
{
    public static function onWorkerStart($businessWorker);
    public static function onConnect($clientId);
    public static function onWebSocketConnect($clientId, $data);
    public static function onMessage($clientId, $message);
    public static function onClose($clientId);
}
