<?php

use Psr\Container\ContainerInterface;
use Support\SimpleRouter;
use Support\ApplicationBuilder;
use Support\ControllerArgumentStrategy;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

return [
    'app' => function (ContainerInterface $container) {
        return ApplicationBuilder::getApp();
    },
    'foundHandler' => function () {
        return new ControllerArgumentStrategy;
    },
    'custom_router' => function (ContainerInterface $container) {
        return new SimpleRouter($container->get('fw'));
    },
    'logger' => function (ContainerInterface $container) {
        $config = config();

        $logger = new Logger($config['name']);

        foreach ($config['logs'] as $logLevel => $logFile) {
            $fileHandler = new StreamHandler($logFile, $logLevel);
            $logger->pushHandler($fileHandler);
        }

        return $logger;
    }
];