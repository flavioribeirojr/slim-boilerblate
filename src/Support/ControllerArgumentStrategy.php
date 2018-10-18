<?php

namespace Support;

use Slim\Interfaces\InvocationStrategyInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class ControllerArgumentStrategy implements InvocationStrategyInterface
{
    public function __invoke(
        callable $callable,
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $routeArguments
    ) {
        return call_user_func_array($callable, $routeArguments);  
    }
}
