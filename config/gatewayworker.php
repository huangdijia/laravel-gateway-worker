<?php

return [
    'register'         => [
        'bind'      => env('GATEWAYWORKER_REGISTER_BIND', '0.0.0.0:1215'),
        'processes' => env('GATEWAYWORKER_REGISTER_PROCESSES', 1),
    ],
    'register_address' => env('GATEWAYWORKER_REGISTER_ADDRESS', '127.0.0.1:1215'),
    'gateway'          => [
        'bind'      => env('GATEWAYWORKER_GATEWAY_BIND', '0.0.0.0:1216'),
        'name'      => env('GATEWAYWORKER_GATEWAY_NAME', 'Gateway'),
        'processes' => env('GATEWAYWORKER_GATEWAY_PROCESSES', 1),
        'ping_data' => env('GATEWAYWORKER_GATEWAY_PING_DATA', '{"mode":"heart"}'),
    ],
    'businessworker'   => [
        'name'          => env('GATEWAYWORKER_BUSINESSWORKER_NAME', 'BusinessWorker'),
        'processes'     => env('GATEWAYWORKER_BUSINESSWORKER_PROCESSES', 1),
        'event_handler' => '', // implements \Huangdijia\GatewayWorker\GatewayWorkerEventInterface
    ],
];
