<?php

namespace Support\Traits;

trait TRouter
{
    /**
     * @method get
     * @param string $path
     * @param callable|string $handler
     */
    public function get(string $path, $handler)
    {
        $this
            ->app
            ->get($path, $handler);
    }

    /**
     * @method post
     * @param string $path
     * @param callable|string $handler
     */
    public function post(string $path, $handler)
    {
        $this
            ->app
            ->post($path, $handler);
    }

    /**
     * @method put
     * @param string $path
     * @param callable|string $handler
     */
    public function put(string $path, $handler)
    {
        $this
            ->app
            ->put($path, $handler);
    }

    /**
     * @method delete
     * @param string $path
     * @param callable|string $handler
     */
    public function delete(string $path, $handler)
    {
        $this
            ->app
            ->delete($path, $handler);
    }

    /**
     * @method patch
     * @param string $path
     * @param callable|string $handler
     */
    public function patch(string $path, $handler)
    {
        $this
            ->app
            ->patch($path, $handler);
    }

    /**
     * @method group
     * @param string $path
     * @param callable $resolver
     */
    public function group(string $path, callable $resolver)
    {
        $this
            ->app
            ->group($path, $resolver);
    }
}
