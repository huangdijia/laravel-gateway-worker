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

use GatewayClient\Gateway;
use Illuminate\Support\Traits\Macroable;

class Client extends Gateway
{
    use Macroable;
}
