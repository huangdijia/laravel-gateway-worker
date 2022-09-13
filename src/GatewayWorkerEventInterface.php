<?php

namespace Huangdijia\GatewayWorker;

interface GatewayWorkerEventInterface
{
    /**
     * @param \GatewayWorker\BusinessWorker $businessWorker 
     * @return void 
     */
    public static function onWorkerStart($businessWorker);

    /**
     * @param string $clientId 
     * @return void 
     */
    public static function onConnect($clientId);

    /**
     * @param string $clientId 
     * @param array $data 
     * @return void 
     */
    public static function onWebSocketConnect($clientId, $data);

    /**
     * @param string $clientId 
     * @param mixed $revData 
     * @return void 
     */
    public static function onMessage($clientId, $revData);

    /**
     * @param string $clientId 
     * @return void 
     */
    public static function onClose($clientId);
}
