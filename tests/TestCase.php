<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Support\Application;
use Faker\Generator as Faker;
use Faker\Factory;

class TestCase extends PHPUnitTestCase
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Faker
     */
    protected $faker;

    public function buildApp()
    {
        $this->app = Application::getApp();
        $this->faker = Factory::create();
    }

    public function setUp()
    {
        parent::setUp();

        $this->buildApp();
    }
}
