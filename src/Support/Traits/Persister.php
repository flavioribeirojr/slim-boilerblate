<?php

namespace Support\Traits;

use Support\Database\DBConnection;

trait Persister
{
    public function persist($entity)
    {
        $entityManager = DBConnection::getEntityManager();

        $entityManager->persist($entity);
        $entityManager->flush();
    }

    public function remove($entiy)
    {
        $entityManager = DBConnection::getEntityManager();

        $entityManager->remove($entiy);
        $entityManager->flush();
    }
}
