<?php

namespace Support;

use Slim\App;
use Support\Traits\TRouter;
use Support\Contracts\CRouter;

final class SimpleRouter implements CRouter
{
    use TRouter;

    /**
     * @var App
     */
    private $app;

    public function __construct(App $app)
    {
        $this->app = $app;
    }
}