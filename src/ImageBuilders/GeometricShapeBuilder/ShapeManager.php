<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\ImageBuilders\GeometricShapeBuilder;

use Cyberwavee\ImageGenerator\Interfaces\ImageBuilders\GeometricShapeBuilder\ShapeBuilderInterface;
use Cyberwavee\ImageGenerator\Interfaces\ShapeInterface;

class ShapeManager
{
    protected ShapeBuilderInterface $builder;

    /**
     * @param ShapeBuilderInterface $builder
     * @return $this
     */
    public function setBuilder(ShapeBuilderInterface $builder)
    {
        $this->builder = $builder;

        return $this;
    }

    /**
     * @param array $params
     *
     * @return ShapeInterface
     */
    public function createLines(array $params): ShapeInterface
    {
        return $this->builder->get();
    }

    /**
     * @param array $params
     *
     * @return ShapeInterface
     */
    public function createSquares(array $params): ShapeInterface
    {
        return $this->builder->get();
    }
}