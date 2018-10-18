<?php

use Psr\Container\ContainerInterface;
use Support\SimpleRouter;
use Support\ApplicationBuilder;
use Support\ControllerArgumentStrategy;

return [
    'app' => function (ContainerInterface $container) {
        return ApplicationBuilder::getApp();
    },
    'foundHandler' => function () {
        return new ControllerArgumentStrategy;
    },
    'custom_router' => function (ContainerInterface $container) {
        return new SimpleRouter($container->get('fw'));
    }
];