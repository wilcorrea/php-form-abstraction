<?php
declare(strict_types=1);

use App\Application\Template\Engine;
use App\Application\Template\EngineInterface;
use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        EngineInterface::class => static function (ContainerInterface $container) {
            $settings = $container->get('settings');
            $viewSettings = $settings['view'];
            return new Engine($viewSettings['path'], $viewSettings['ui']);
        },
        LoggerInterface::class => static function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            $logger->pushHandler($handler);

            return $logger;
        },
    ]);
};
