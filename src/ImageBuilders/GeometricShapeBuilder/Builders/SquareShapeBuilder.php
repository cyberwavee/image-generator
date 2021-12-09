<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\ImageBuilders\GeometricShapeBuilder\Builders;

use Cyberwavee\ImageGenerator\ImageBuilders\GeometricShapeBuilder\Shapes\SquareShape;
use Cyberwavee\ImageGenerator\Interfaces\ImageBuilders\GeometricShapeBuilder\Builders\SquareShapeBuilderInterface;
use Cyberwavee\ImageGenerator\Interfaces\ShapeInterface;

class SquareShapeBuilder implements SquareShapeBuilderInterface
{
    private ShapeInterface $lineShape;

    public function __construct()
    {
        $this->create();
    }

    /**
     * @return $this|SquareShapeBuilderInterface
     */
    public function create(): SquareShapeBuilderInterface
    {
        $this->lineShape = new SquareShape();

        return $this;
    }

    /**
     * @return ShapeInterface
     */
    public function get(): ShapeInterface
    {
        $result = $this->lineShape;
        $this->create();

        return $result;
    }
}