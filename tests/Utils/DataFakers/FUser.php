<?php

namespace Tests\Utils\DataFakers;

use Faker\Generator as Faker;
use Common\Models\User;

final class FUser
{
    /**
     * @var Faker
     */
    private $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    public function getUser(): User
    {
        $faker = $this->faker;

        $user = new User;
        $user
            ->setName($faker->name)
            ->setEmail($faker->email)
            ->setPassword($faker->password);

        return $user;
    }
}
