<?php

namespace Core\Models;

use Support\Traits\Entities\UUID;
use Doctrine\ORM\Mapping as ORM;
use Support\Traits\Entities\Timestamp;

/**
 * @ORM\Entity
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 */
class User
{
    use UUID;
    use Timestamp;

    /**
     * @ORM\Column(type="string", length=100)
     * 
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=100)
     * 
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function setName(string $name): self
    {
        $this->name = $name;
        $this->setUsername($name);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): self
    {
        $this->password = password_hash($password, PASSWORD_ARGON2I);

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
