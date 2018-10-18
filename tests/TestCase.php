<?php

namespace Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Support\Application;

class TestCase extends PHPUnitTestCase
{
    protected $app;

    public function buildApp()
    {
        if (!defined('ROOT_DIR')) {
            define('ROOT_DIR', __DIR__ . '/../');
        }

        $this->app = Application::getApp();
    }

    public function setUp()
    {
        parent::setUp();

        $this->buildApp();
    }
}
