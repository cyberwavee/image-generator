<?php

declare(strict_types=1);

namespace Cyberwavee\ImageGenerator\Factory;

use Cyberwavee\ImageGenerator\Interfaces\Factory\ImageRenderInterface;

abstract class ArtCreator
{
    /**
     * @return ImageRenderInterface
     */
    abstract function getTypeOfArt(): ImageRenderInterface;

    /**
     * @return void
     */
    public function render(): string
    {
        $creator = $this->getTypeOfArt();

        return $creator->createImage();
    }
}