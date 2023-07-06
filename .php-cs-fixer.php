<?php

declare(strict_types=1);
/**
 * This file is part of laravel-gateway-worker.
 *
 * @link     https://github.com/huangdijia/laravel-gateway-worker
 * @document https://github.com/huangdijia/laravel-gateway-worker/blob/2.x/README.md
 * @contact  huangdijia@gmail.com
 */
use Huangdijia\PhpCsFixer\Config;

require __DIR__ . '/vendor/autoload.php';

return (new Config())
    ->setHeaderComment(
        projectName: 'laravel-gateway-worker',
        projectLink: 'https://github.com/huangdijia/laravel-gateway-worker',
        projectDocument: 'https://github.com/huangdijia/laravel-gateway-worker/blob/2.x/README.md',
        contacts: [
            'huangdijia@gmail.com',
        ],
    )
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude('public')
            ->exclude('runtime')
            ->exclude('vendor')
            ->in(__DIR__)
            ->append([
                __FILE__,
            ])
    )
    ->setUsingCache(false);
