<?php

namespace Support\Database;

use Doctrine\ORM\EntityManager;
use Support\Application;
use Doctrine\ORM\Tools\Setup;
use Doctrine\DBAL\Types\Type;
use Ramsey\Uuid\Doctrine\UuidType;
use Gedmo\DoctrineExtensions;
use Doctrine\Common\EventManager;
use Gedmo\Timestampable\TimestampableListener;

final class DBConnection
{
    /**
     * @var EntityManager
     */
    private static $entityManager;

    private function __construct() {}

    private function __clone() {}

    public static function getEntityManager(): EntityManager
    {
        if (!self::$entityManager) {
            self::$entityManager = self::buildEntityManager();
        }

        return self::$entityManager;
    }

    private static function buildEntityManager(): EntityManager
    {
        Type::addType('uuid', UuidType::class);

        $config = Application::config();

        $paths = $config['models_path'];

        $isDevMode = $config['debug'];
        $dbParams = $config['database'];

        $dbConfig = Setup::createAnnotationMetadataConfiguration(
            $paths,
            $isDevMode,
            null,
            null,
            false
        );
        
        $eventManager = new EventManager();

        $timestampable = new TimestampableListener();
        $eventManager->addEventSubscriber($timestampable);

        DoctrineExtensions::registerAnnotations();

        return EntityManager::create($dbParams, $dbConfig, $eventManager);
    }
}
