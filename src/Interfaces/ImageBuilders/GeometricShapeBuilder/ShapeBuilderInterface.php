<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Interfaces\ImageBuilders\GeometricShapeBuilder;

use Cyberwavee\ImageGenerator\Interfaces\ShapeInterface;

interface ShapeBuilderInterface
{
    /**
     * @return ShapeBuilderInterface
     */
    public function create(): ShapeBuilderInterface;

    /**
     * @return ShapeInterface
     */
    public function get(): ShapeInterface;
}