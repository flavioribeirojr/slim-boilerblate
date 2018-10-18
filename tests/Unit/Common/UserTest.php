<?php

namespace Tests\Unit\Common;

use Tests\TestCase;
use Tests\Utils\DataFakers\FUser;
use Support\Traits\Persister;

class UserTest extends TestCase
{
    /**
     * @var FUser
     */
    private $fakeUser;

    public function setUp()
    {
        parent::setUp();

        $this->fakeUser = new FUser($this->faker);
    }

    public function testGetUserEmailMustBeNonEmpty()
    {
        $user = $this->fakeUser->getUser();

        $this->assertNotEmpty($user->getEmail());
    }
}
