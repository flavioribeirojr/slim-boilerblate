<?php

namespace Support\Traits\Entities;

use Doctrine\ORM\Mapping as ORM;

trait UUID
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }
}
