<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Support\Database\DBConnection;

require_once __DIR__ . '/../bootstrap.php';

$entityManager = DBConnection::getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);