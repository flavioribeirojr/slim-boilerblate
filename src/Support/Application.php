<?php

namespace Support;

use Slim\App;
use Support\Traits\RouterTrait;
use Psr\Container\ContainerInterface;
use Dotenv\Dotenv;
use Support\Database\DBConnection;

final class Application
{
    /**
     * @var ApplicationBuilder
     */
    private static $instance;

    /**
     * @var array
     */
    public static $config;

    /**
     * @var App
     */
    private $slimApp;

    private function __construct () {}

    private function __clone() {}

    public static function getApp(): self
    {
        if (!self::$instance) {
            self::$instance = new self;
            self::$instance->build();
        }

        return self::$instance;
    }

    private function build()
    {
        if (file_exists(ROOT_DIR . '/.env')) {
            (new Dotenv(ROOT_DIR))->load();
        }

        self::$config = require_once(ROOT_DIR . '/config/application.php');

        $slimApp = new App([
            'settings' => [
                'displayErrorDetails' => self::$config['debug']
            ]
        ]);

        $containerRegisters = require_once(ROOT_DIR . '/config/container.php');
        $container = $slimApp->getContainer();

        $container['fw'] = function () use ($slimApp) {
            return $slimApp;
        };

        $em = DBConnection::getEntityManager();

        $container['entity_manager'] = function () use ($em) {
            return $em;
        };

        $containerRegistration = function ($registers) use (&$container) {
            foreach ($registers as $id => $resolver) {
                $container[$id] = $resolver;    
            }
        };

        $containerRegistration($containerRegisters);

        $router = $container->get('custom_router');

        foreach (self::$config['domains'] as $class => $domain) {
            $routerClassName = $domain['routes'];

            $containerRegistration($domain['containers']);
            $routes = (new $routerClassName)($router, $container);
        }

        $this->slimApp = $slimApp;
    }

    public function run()
    {
        return $this->slimApp->run();
    }

    /**
     * Application config
     * 
     * @method config
     * @return array
     */
    public static function config(): array
    {
        return self::$config;
    }
}
