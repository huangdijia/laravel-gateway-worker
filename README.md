# Gateway Worker For Laravel/Lumen

## Installation

### Laravel

~~~bash
composer require huangdijia/laravel-gateway-worker
~~~

### Lumen

copy config

~~~bash
cp vendor/huangdijia/laravel-gateway-worker/config/gatewayworker.php config
~~~

edit `bootstrap/app.php`, add

~~~php
$app->register(Huangdijia\GatewayWorker\GatewayWorkerServiceProvider::class);
// ...
$app->configure('gatewayworker');
~~~

## Usage

~~~bash
php artisan gateway-worker:serve [start|stop|restart|status|connections|help]
~~~

for help

~~~bash
php artisan gateway-worker:serve --help
~~~
