<?php

namespace Support\Traits;

use Support\Database\DBConnection;

trait Persister
{
    public function persist($entity)
    {
        DBConnection::getEntityManager()
            ->persist($entity);
    }

    public function remove($entiy)
    {
        DBConnection::getEntityManager()
            ->remove($entiy);
    }
}
