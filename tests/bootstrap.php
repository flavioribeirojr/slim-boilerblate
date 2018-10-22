<?php

use Doctrine\ORM\Tools\SchemaTool;
use Support\Database\DBConnection;
use Doctrine\ORM\EntityManager;
use Support\Application;

require __DIR__ . '/../vendor/autoload.php';

class TestBuilder
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function build()
    {
        if (!defined('ROOT_DIR')) {
            define('ROOT_DIR', __DIR__ . '/../');
        }

        if (env('ENV', 'DEV') === 'DEV') {
            (new \Dotenv\Dotenv(realpath(ROOT_DIR)))->load();
        }

        $this->dbTestEnv();

        // Build the app
        Application::getApp();

        $config = Application::config();

        $this->entityManager = DBConnection::getEntityManager();

        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->updateSchema($this->getMetaClass($config));
    }

    private function dbTestEnv()
    {
        putenv('DB_HOST=' . env('DB_TEST_HOST', '127.0.0.1'));
        putenv('DB_NAME=' . env('DB_TEST_NAME', 'api_test'));
        putenv('DB_DRIVER=' . env('DB_TEST_DRIVER', 'pdo_pgsql'));
        putenv('DB_USER=' . env('DB_TEST_USER'));
        putenv('DB_PASS=' . env('DB_TEST_PASS'));
        putenv('DB_PORT=' . env('DB_TEST_PORT', '5432'));
    }

    private function getMetaClass(array $config): array
    {
        $entitiesNamespaces = array_keys($config['models_path']);

        $entities = reduce($entitiesNamespaces, function ($entities, $namespace) use ($config) {
            $namespaceEntities = array_diff(scandir($config['models_path'][$namespace]), ['.', '..']);

            return array_merge(
                $entities,
                map($namespaceEntities, function ($entitieByNamespace) use ($namespace) {
                    return "$namespace\\" . str_replace('.php', '', $entitieByNamespace);
                })
            );
        }, []);

        return map($entities, function ($entity) {
            return $this
                ->entityManager
                ->getClassMetadata($entity);
        });
    }
}

(new TestBuilder())->build();