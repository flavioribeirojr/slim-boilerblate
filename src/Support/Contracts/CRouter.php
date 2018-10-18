<?php

namespace Support\Contracts;

interface CRouter
{
    public function get(string $path, $handler);

    public function post(string $path, $handler);

    public function put(string $path, $handler);
    
    public function delete(string $path, $handler);

    public function patch(string $path, $handler);

    public function group(string $path, callable $resolver);
}