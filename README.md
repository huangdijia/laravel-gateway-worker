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

## Cluster

Cluster

|Role|IP|Command|
|--|--|--|
|Register|192.168.1.101|`php artisan gateway-worker:serve --register --register-bind=0.0.0.0:1215`|
|Gateway|192.168.2.102-105|`php artisan gateway-worker:serve --gateway --gateway-bind=0.0.0.0:1216 --register-address=192.168.1.101:1215 --lan-ip=192.168.1.xxx`|
|Businessworker|192.168.1.106-110|`php artisan gateway-worker:serve --businessworker --register-address=192.168.1.101:1215`|

In One

~~~bash
php artisan --register --gateway --businessworker
~~~
