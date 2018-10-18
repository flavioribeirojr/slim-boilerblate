<?php

use Support\ApplicationBuilder;

/**
 * Get an ENV value of return the default
 * @param string $key
 * @param mixed $default = null
 * @return mixed
 */
function env(string $key, $default = null) {
    $value = getenv($key);

    return empty($value) ? $default : $value;
}

/**
 * Get the application config as an array
 * @return array
 */
function config(): array {
    return ApplicationBuilder::$config;
}

function map(array $array, callable $callback) {
    return array_map($callback, $array, array_keys($array));
}

function reduce(array $array, callable $callback, $initialValue) {
    return array_reduce($array, $callback, $initialValue);
}

function filter(array $array, callable $callback) {
    return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
}

function swap_keys(array $swap, array $subject) {
    return array_reduce(array_keys($subject), function ($swaped, $key) use ($subject) {
        $swaped[$swap[$key]] = $subject[$key];

        return $swaped;
    }, []);
}