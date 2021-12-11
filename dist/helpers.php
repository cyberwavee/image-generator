<?php

declare(strict_types=1);

if (!function_exists('throw_if')) {
    /**
     * Throw the given exception if the given condition is true.
     *
     * @param mixed $condition
     * @param \Throwable|string $exception
     * @param mixed ...$parameters
     * @return mixed
     *
     * @throws \Throwable
     */
    function throw_if($condition, $exception, ...$parameters)
    {
        if ($condition) {
            throw (is_string($exception) ? new $exception(...$parameters) : $exception);
        }

        return $condition;
    }
}

if (!function_exists('get_random_string')) {
    /**
     * Generate a random string
     *
     * @param int $length
     *
     * @return string
     */
    function get_random_string(int $length = 16): string
    {
        return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', (int)ceil($length / strlen($x)))), 1, $length);
    }
}