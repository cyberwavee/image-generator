<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Factory\ImageArtGenerators;

use Cyberwavee\ImageGenerator\Factory\ArtCreator;
use Cyberwavee\ImageGenerator\Factory\ImageArtTypes\GeometricArt;
use Cyberwavee\ImageGenerator\Interfaces\Factory\ImageRenderInterface;

class GeometricArtGenerator extends ArtCreator
{
    /** @var array */
    protected array $params;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * @return ImageRenderInterface
     */
    function getTypeOfArt(): ImageRenderInterface
    {
        return new GeometricArt($this->params);
    }
}