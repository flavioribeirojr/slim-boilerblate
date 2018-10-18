<?php

namespace Tests\Utils;

use Support\Database\DBConnection;


trait DBTransaction
{
    public function openTransaction()
    {
        DBConnection::getEntityManager()
            ->getConnection()
            ->beginTransaction();
    }

    public function closeTransaction()
    {
        DBConnection::getEntityManager()
            ->getConnection()
            ->rollBack();
    }
}
