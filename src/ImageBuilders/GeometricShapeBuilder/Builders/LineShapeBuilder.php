<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\ImageBuilders\GeometricShapeBuilder\Builders;

use Cyberwavee\ImageGenerator\ImageBuilders\GeometricShapeBuilder\Shapes\LineShape;
use Cyberwavee\ImageGenerator\Interfaces\ImageBuilders\GeometricShapeBuilder\Builders\LineShapeBuilderInterface;
use Cyberwavee\ImageGenerator\Interfaces\ShapeInterface;

class LineShapeBuilder implements LineShapeBuilderInterface
{
    private ShapeInterface $lineShape;

    public function __construct()
    {
        $this->create();
    }

    /**
     * @return $this|LineShapeBuilderInterface
     */
    public function create(): LineShapeBuilderInterface
    {
        $this->lineShape = new LineShape();

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