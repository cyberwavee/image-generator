<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Interfaces;

use Closure;

interface ShapeDrawerInterface
{
    /**
     * @param array $data
     * @param Closure $next
     *
     * @return array|null
     */
    public function handle(array $data, Closure $next): ?array;
}